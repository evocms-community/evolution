<?php namespace FormLister;

/**
 * Правила проверки файлов
 * Class FileValidator
 * @package FormLister
 */
class FileValidator
{
    /**
     * @param $value
     * @return bool
     */
    public static function required($value): bool
    {
        $value = self::value($value);
        $flag = false;
        foreach ($value as $file) {
            $flag = !empty($file) && !$file['error'] && is_uploaded_file($file['tmp_name']);
            if (!$flag) {
                break;
            }
        }

        return $flag;
    }

    /**
     * @param $value
     * @return bool
     * @deprecated
     */
    public static function optional($value): bool
    {
        return self::required($value);
    }

    /**
     * @param $value
     * @param $allowed
     * @return bool
     */
    public static function allowed($value, $allowed): bool
    {
        $value = self::value($value);
        $flag = false;
        foreach ($value as $file) {
            $ext = strtolower(substr(strrchr($file['name'], '.'), 1));
            $flag = in_array($ext, $allowed);
            if (!$flag) {
                break;
            }
        }

        return $flag;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function images($value): bool
    {
        return self::allowed($value, ["jpg", "jpeg", "png", "gif", "bmp"]);
    }

    /**
     * @param $value
     * @param $max
     * @return bool
     */
    public static function maxSize($value, $max, $strict = false): bool
    {
        $value = self::value($value);
        $flag = false;
        foreach ($value as $file) {
            $size = round($file['size'] / 1024, 0);
            $flag = $strict ? $size < $max : $size <= $max;
            if (!$flag) {
                break;
            }
        }

        return $flag;
    }

    /**
     * @param $value
     * @param $min
     * @return bool
     */
    public static function minSize($value, $min, $strict = false): bool
    {
        $value = self::value($value);
        $flag = false;
        foreach ($value as $file) {
            $size = round($file['size'] / 1024, 0);
            $flag = $strict ? $size > $min : $size >= $min;
            if (!$flag) {
                break;
            }
        }

        return $flag;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @param  bool  $strict
     * @return bool
     */
    public static function sizeBetween($value, $min, $max, $strict = false): bool
    {
        $value = self::value($value);
        $flag = false;
        foreach ($value as $file) {
            $size = round($file['size'] / 1024, 0);
            $flag = $strict ? $size > $min && $size < $max : $size >= $min && $size <= $max;
            if (!$flag) {
                break;
            }
        }

        return $flag;
    }

    /**
     * @param $value
     * @param $max
     * @param  bool  $strict
     * @return bool
     */
    public static function maxCount($value, $max, $strict = false): bool
    {
        $value = self::value($value);
        $count = self::getCount($value);

        return $strict ? $count < $max : $count <= $max;
    }

    /**
     * @param $value
     * @param $min
     * @param  bool  $strict
     * @return bool
     */
    public static function minCount($value, $min, $strict = false): bool
    {
        $value = self::value($value);
        $count = self::getCount($value);

        return $strict ? $count > $min : $count >= $min;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function countBetween($value, $min, $max, $strict = false): bool
    {
        $value = self::value($value);
        $count = self::getCount($value);

        return $strict ? $count > $min && $count < $max : $count >= $min && $count <= $max;
    }

    /**
     * @param $value
     * @return bool
     */
    protected static function isArray($value): bool
    {
        return isset($value[0]);
    }

    /**
     * @param $value
     * @return array
     */
    protected static function value($value): array
    {
        $out = [];
        $isArray = self::isArray($value);
        if (!empty($value) && !$isArray) {
            $out = [$value];
        } elseif ($isArray) {
            $out = $value;
        }

        return $out;
    }

    /**
     * @param $value
     * @return int
     */
    protected static function getCount($value): int
    {
        $count = 0;
        foreach ($value as $file) {
            if (!$file['error'] && is_uploaded_file($file['tmp_name'])) {
                $count++;
            }
        }

        return $count;
    }
}
