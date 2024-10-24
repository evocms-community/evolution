<?php namespace EvolutionCMS;


use Exception;


use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use PDOStatement;

class Database extends Manager
{

    /**
     * @var int
     */
    protected $affectedRows = 0;

    /**
     * @var int
     */
    protected $safeLoopCount = 1000;

    protected $driver;

    public $conn;

    public $config;

    public function __construct(Container $container = null)
    {

        parent::__construct($container);
        $this->prepareNativeConfig();
    }

    /**
     * @param $tableName
     * @param  bool  $force
     * @return null|string|string[]
     * @throws Exceptions\TableNotDefinedException
     */
    public function replaceFullTableName($tableName, $force = false)
    {
        $tableName = trim($tableName);
        if ((bool) $force === true) {
            $result = $this->getConnection()->getTablePrefix() . $tableName;
        } elseif (strpos($tableName, '[+prefix+]') !== false) {
            $dbase = trim($this->getConfig('database'), '`');
            $prefix = $this->getConfig('prefix');

            $result = preg_replace(
                '@\[\+prefix\+\](\w+)@',
                '`' . $dbase . '`.`' . $prefix . '$1`',
                $tableName
            );
        } else {
            $result = $tableName;
        }
        if ($this->getConfig('driver') == 'pgsql') {
            $result = str_replace('"', "'", $result);
        }
        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function query($sql, $watchError = true)
    {
        try {
            $start = microtime(true);
            $pdo = DB::connection()->getPdo();
            $out = [];
            if (is_array($sql)) {
                foreach ($sql as $query) {
                    $out[] = $pdo->prepare($this->replaceFullTableName($query));
                }
            } else {
                $out = $pdo->prepare($this->replaceFullTableName($sql));
            }
            $out->execute();
            DB::connection()->logQuery($sql, [], (microtime(true) - $start));
            $this->conn = $pdo;
            $this->saveAffectedRows($out);
            return $out;
        } catch (Exception $exception) {
            if ($watchError === true) {
                evo()->getService('ExceptionHandler')->messageQuit(e($exception->getMessage()) . '<br><br>' . e($sql));
            }
        }
    }


    /**
     * {@inheritDoc}
     */
    public function makeArray($result, $index = false)
    {
        $rsArray = [];
        $iterator = 0;
        while ($row = $this->getRow($result)) {
            $returnIndex = $index !== false && isset($row[$index]) ? $row[$index] : $iterator;
            $rsArray[$returnIndex] = $row;
            $iterator++;
        }

        return $rsArray;
    }

    /**
     * @param  PDOStatement|bool  $result
     * @return int
     */
    protected function saveAffectedRows($result)
    {
        $this->affectedRows = \is_bool($result) ? 0 : $result->rowCount();
        return $this->getAffectedRows();
    }

    /**
     * @return int
     */
    public function getAffectedRows()
    {
        return $this->affectedRows;
    }

    /**
     * @param  PDOStatement|bool  $result
     * @return bool
     */
    public function execute($result)
    {
        return $this->isResult($result) ? $result->execute() : (bool) $result;
    }

    /**
     * @param  string  $sql
     * @return PDOStatement|bool
     * @throws Exceptions\ConnectException
     */
    public function prepare($sql)
    {
        $pdo = $this->getConnect()->getPdo();
        $result = $pdo->prepare(
            $sql,
            [
                \PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL,

            ]
        );

        if ($this->isResult($result)) {
            $result->setFetchMode(\PDO::FETCH_ASSOC);
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     * @return Connection
     */
    public function getConnect()
    {
        if (!$this->isConnected()) {
            $this->connect();
            if (!$this->conn->getPdo() instanceof PDO) {
                $this->conn->reconnect();
            }
        }
        
        return $this->conn;
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return true;
    }

    public function insertFrom(
        $fields,
        $table,
        $fromFields = '*',
        $fromTable = '',
        $where = '',
        $limit = ''
    ) {
        if (is_array($fields)) {
            $onlyKeys = true;
            foreach ($fields as $key => $value) {
                if (!empty($value)) {
                    $onlyKeys = false;
                    break;
                }
            }
            if ($onlyKeys) {
                $fields = array_keys($fields);
            }
        }

        return parent::insertFrom($fields, $table, $fromFields, $fromTable, $where, $limit);
    }

    /**
     * {@inheritDoc}
     */
    public function setDebug($flag)
    {
        parent::setDebug($flag);
        $driver = $this->getDriver();
        if ($driver instanceof Drivers\IlluminateDriver) {
            if ($this->isDebug()) {
                $driver->getConnect()->enableQueryLog();
            } else {
                $driver->getConnect()->disableQueryLog();
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getDriver()
    {
        return $this->driver;
    }

    public function getFullTableName($table)
    {
        return DB::getTablePrefix() . $table;
    }

    public function getTableName($table)
    {
        return $this->getFullTableName($table);
    }

    public function getValue($result)
    {
        $out = false;

        if (is_string($result)) {
            $result = $this->query($result);
        }

        if ($this->isResult($result)) {
            $result = $this->getRow($result, 'num');
            $out = is_array($result) && array_key_exists(0, $result) ? $result[0] : false;
        }

        return $out;
    }

    /**
     * {@inheritDoc}
     */
    public function isResult($result)
    {
        return $result instanceof PDOStatement;
    }

    /**
     * @param  PDOStatement  $result
     * {@inheritDoc}
     */
    public function getRow($result, $mode = 'assoc')
    {
        switch ($mode) {
            case 'assoc':
                $out = $result->fetch(\PDO::FETCH_ASSOC);
                break;
            case 'num':
                $out = $result->fetch(\PDO::FETCH_NUM);
                break;
            case 'object':
                $out = $result->fetchObject();
                break;
            case 'both':
                $out = $result->fetch(\PDO::FETCH_BOTH);
                break;
            default:
                throw new Exceptions\UnknownFetchTypeException(
                    "Unknown get type ($mode) specified for fetchRow - must be empty, 'assoc', 'num', 'object' or 'both'."
                );
        }

        return $out;
    }


    /**
     * {@inheritDoc}
     */
    public function select($fields, $tables, $where = '', $orderBy = '', $limit = '')
    {
        $fields = $this->prepareFields($fields);
        $tables = $this->prepareFrom($tables, true);
        $where = $this->prepareWhere($where);
        $orderBy = $this->prepareOrder($orderBy);
        $limit = $this->prepareLimit($limit);

        return $this->query("SELECT {$fields} FROM {$tables} {$where} {$orderBy} {$limit}");
    }

    /**
     * @param  string|array  $data
     * @param  bool  $ignoreAlias
     * @return string
     */
    protected function prepareFields($data, $ignoreAlias = false)
    {
        if (\is_array($data)) {
            $tmp = [];
            foreach ($data as $alias => $field) {
                $tmp[] = ($alias !== $field && !\is_int($alias) && $ignoreAlias === false) ?
                    ($field . ' as `' . $alias . '`') : $field;
            }

            $data = implode(',', $tmp);
        }
        if (empty($data)) {
            $data = '*';
        }

        return $data;
    }

    /**
     * @param  string|array  $data
     * @param  bool  $hasArray
     * @return string
     * @throws Exceptions\TableNotDefinedException
     */
    protected function prepareFrom($data, $hasArray = false)
    {
        if (\is_array($data) && $hasArray === true) {
            $tmp = [];
            foreach ($data as $table) {
                $tmp[] = $table;
            }
            $data = implode(' ', $tmp);
        }
        if (!is_scalar($data) || empty($data)) {
            throw new Exceptions\TableNotDefinedException($data);
        }

        return $data;
    }

    /**
     * @param  array|string  $data
     * @return string
     * @throws Exceptions\InvalidFieldException
     */
    protected function prepareWhere($data)
    {
        if (\is_array($data)) {
            if ($this->arrayOnlyNumeric(array_keys($data)) === true) {
                $data = implode(' ', $data);
            } else {
                throw (new Exceptions\InvalidFieldException('WHERE'))
                    ->setData($data);
            }
        }
        $data = trim($data);
        if (!empty($data) && stripos($data, 'WHERE') !== 0) {
            $data = "WHERE {$data}";
        }

        return $data;
    }

    /**
     * @param  string  $data
     * @return string
     */
    protected function prepareOrder($data)
    {
        $data = trim($data);
        if (!empty($data) && stripos($data, 'ORDER') !== 0) {
            $data = "ORDER BY {$data}";
        }

        return $data;
    }

    /**
     * @param  string  $data
     * @return string
     */
    protected function prepareLimit($data)
    {
        $data = trim($data);
        if (!empty($data) && stripos($data, 'LIMIT') !== 0) {
            $data = "LIMIT {$data}";
        }

        return $data;
    }

    /**
     * @param  array  $data
     * @return bool
     */
    protected function arrayOnlyNumeric(array $data)
    {
        $onlyNumbers = true;
        foreach ($data as $value) {
            if (!\is_numeric($value)) {
                $onlyNumbers = false;
                break;
            }
        }

        return $onlyNumbers;
    }

    public function getVersion()
    {
        return DB::connection()->getPdo()->getAttribute(\PDO::ATTR_SERVER_VERSION);
    }

    public function getConfig($option = null)
    {
        return DB::getConfig($option);
    }

    /**
     * {@inheritDoc}
     * @throws Exceptions\TooManyLoopsException
     */
    public function escape($data, $safeCount = 0)
    {
        $safeCount++;
        if ($this->safeLoopCount < $safeCount) {
            throw new Exceptions\TooManyLoopsException("Too many loops '{$safeCount}'");
        }
        if (\is_array($data)) {
            if (\count($data) === 0) {
                $data = '';
            } else {
                foreach ($data as $i => $v) {
                    $data[$i] = $this->escape($v, $safeCount);
                }
            }
        } else {
            if (is_string($data)) {
                $data = $this->getConnection()->getPdo()->quote($data);
                $data = $str = substr($data, 1, -1);
            }
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function connect()
    {
       return $this->getConnection();
    }

    /**
     * @param  string  $from
     * @param  string  $where
     * @param  string  $orderBy
     * @param  string  $limit
     * @return bool|mysqli_result
     */
    public function delete($from, $where = '', $orderBy = '', $limit = '')
    {

        $out = false;
        if (!$from) {
            evo()->getService('ExceptionHandler')->messageQuit("Empty \$from parameters in DBAPI::delete().");
        } else {
            $from = $this->replaceFullTableName($from);
            $where = trim($where);
            $orderBy = trim($orderBy);
            $limit = trim($limit);

            if ($where !== '' && stripos($where, 'WHERE') === false) {
                $where = "WHERE {$where}";
            }
            if ($orderBy !== '' && stripos($orderBy, 'ORDER BY') === false) {
                $orderBy = "ORDER BY {$orderBy}";
            }
            if ($limit !== '' && stripos($limit, 'LIMIT') === false) {
                $limit = "LIMIT {$limit}";
            }

            $out = DB::statement("DELETE FROM {$from} {$where} {$orderBy} {$limit}");
        }
        return $out;
    }

    /**
     * @return void
     */
    public function disconnect()
    {
        DB::disconnect();
    }

    /**
     * @param $name
     * @param  \mysqli_result|string  $dsq
     * @return array
     */
    public function getColumn($name, $dsq)
    {
        $col = [];

        if (!$this->isResult($dsq)) {
            $dsq = $this->query($dsq);
        }
        if ($dsq) {
            while ($row = $this->getRow($dsq)) {
                $col[] = $row[$name];
            }
        }

        return $col;
    }

    /**
     * @param  \mysqli_result|string  $dsq
     * @return array
     */
    public function getColumnNames($dsq): array
    {
        $names = [];
        if (!$this->isResult($dsq)) {
            $dsq = $this->query($dsq);
        }
        if ($dsq) {
            $limit = $this->numFields($dsq);
            for ($i = 0; $i < $limit; $i++) {
                $names[] = $this->fieldName($dsq, $i);
            }
        }

        return $names;
    }

    /**
     * @param  \PDOStatement  $rs
     * @return mixed
     */
    public function numFields($rs)
    {
        return $rs->columnCount();
    }

    /**
     * @param  \PDOStatement  $rs
     * @param  int  $col
     * @return string|null
     */
    public function fieldName($rs, $col = 0)
    {
        $meta = $rs->getColumnMeta($col);

        return $meta['name'] ?? null;
    }


    public function getInsertId($conn = null)
    {
        if (!($conn instanceof PDOStatement)) {
            $conn =& $this->conn;
        }

        return $conn->lastInsertId();
    }

    /**
     * @param  string|array  $fields
     * @param  string  $intotable
     * @param  string  $fromfields
     * @param  string  $fromtable
     * @param  string  $where
     * @param  string  $limit
     * @return mixed
     */
    public function insert($fields, $intotable, $fromfields = "*", $fromtable = "", $where = "", $limit = "")
    {
        $out = false;
        if (!$intotable) {
            evo()->getService('ExceptionHandler')->messageQuit("Empty \$intotable parameters in DBAPI::insert().");
        } else {
            $intotable = $this->replaceFullTableName($intotable);
            if (!is_array($fields)) {
                $this->query("INSERT INTO {$intotable} {$fields}");
            } else {
                if (empty($fromtable)) {
                    switch ($this->getConfig('driver')) {
                        case 'pgsql':
                            $fields = "(\"" . implode("\", \"", array_keys($fields)) . "\") VALUES('" . implode("', '",
                                    array_values($fields)) . "')";
                            break;
                        default:
                            $fields = "(`" . implode("`, `", array_keys($fields)) . "`) VALUES('" . implode("', '",
                                    array_values($fields)) . "')";
                            break;
                    }
                    $this->query("INSERT INTO {$intotable} {$fields}");
                } else {
                    $fromtable = $this->replaceFullTableName($fromtable);
                    $fields = "(" . implode(",", array_keys($fields)) . ")";
                    $where = trim($where);
                    $limit = trim($limit);
                    if ($where !== '' && stripos($where, 'WHERE') !== 0) {
                        $where = "WHERE {$where}";
                    }
                    if ($limit !== '' && stripos($limit, 'LIMIT') !== 0) {
                        $limit = "LIMIT {$limit}";
                    }
                    $this->query("INSERT INTO {$intotable} {$fields} SELECT {$fromfields} FROM {$fromtable} {$where} {$limit}");
                }
            }
            if (($lid = $this->getInsertId()) === false) {
                evo()->getService('ExceptionHandler')->messageQuit("Couldn't get last insert key!");
            }

            $out = $lid;
        }
        return $out;
    }

    /**
     * @param  PDOStatement  $ds
     * @return int
     */
    public function getRecordCount($ds)
    {
        return ($ds instanceof PDOStatement) ? $ds->rowCount() : 0;
    }


    /**
     * @param  array|string  $fields
     * @param $table
     * @param  string  $where
     * @return bool|mysqli_result
     */
    public function update($fields, $table, $where = "")
    {
        $out = false;
        if (!$table) {
            evo()->getService('ExceptionHandler')->messageQuit('Empty ' . $table . ' parameter in DBAPI::update().');
        } else {
            $table = $this->replaceFullTableName($table);
            if (is_array($fields)) {
                foreach ($fields as $key => $value) {
                    if ($value === null || strtolower($value) === 'null') {
                        $f = 'NULL';
                    } else {
                        $f = "'" . $value . "'";
                    }
                    switch ($this->getConfig('driver')) {
                        case 'pgsql':
                            $fields[$key] = "\"{$key}\" = " . $f;
                            break;
                        default:
                            $fields[$key] = "`{$key}` = " . $f;
                            break;
                    }

                }
                $fields = implode(',', $fields);
            }
            $where = trim($where);
            if ($where !== '' && stripos($where, 'WHERE') !== 0) {
                $where = 'WHERE ' . $where;
            }

            return $this->query('UPDATE ' . $table . ' SET ' . $fields . ' ' . $where);
        }
        return $out;
    }

    /**
     * @param  string  $table
     * @return array
     */
    public function getTableMetaData($table)
    {
        $metadata = [];
        if (!empty($table) && is_scalar($table)) {
            switch (DB::getDriverName()) {
                case 'pgsql':
                    $sql = " SELECT * FROM information_schema.columns WHERE table_name = '" . $table . "';";
                    break;
                default:
                    $sql = 'SHOW FIELDS FROM ' . $table;
                    break;
            }
            if ($ds = $this->query($sql)) {
                while ($row = $this->getRow($ds)) {
                    switch (DB::getDriverName()) {
                        case 'pgsql':
                            $fieldName = $row['column_name'];
                            break;
                        default:
                            $fieldName = $row['Field'];
                            break;
                    }
                    $metadata[$fieldName] = $row;
                }
            }
        }

        return $metadata;
    }

    /**
     * @param  int  $timestamp
     * @param  string  $fieldType
     * @return false|string
     */
    public function prepareDate($timestamp, $fieldType = 'DATETIME')
    {
        $date = false;
        if (!$timestamp === false && $timestamp > 0) {
            switch ($fieldType) {
                case 'DATE' :
                    $date = date('Y-m-d', $timestamp);
                    break;
                case 'TIME' :
                    $date = date('H:i:s', $timestamp);
                    break;
                case 'YEAR' :
                    $date = date('Y', $timestamp);
                    break;
                default :
                    $date = date('Y-m-d H:i:s', $timestamp);
                    break;
            }
        }

        return $date;
    }

    public function prepareNativeConfig()
    {
        try {
            $this->config = $this->getConfig();
            $this->config['table_prefix'] = $this->getConfig('prefix');
        } catch (Exception $e) {
            if (!is_cli()) {
                throw $e;
            }
        }
    }

    public function begin()
    {
        try {
            DB::beginTransaction();
        
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    public function commit()
    {
        try {
            DB::commit();

            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    public function rollback()
    {
        try {
            DB::rollBack();
        
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

    public function optimize($table_name)
    {
        DB::statement('OPTIMIZE TABLE ' . $table_name);
    }
}
