<?php namespace EvolutionCMS\DocumentManager\Services\Documents;

use EvolutionCMS\Exceptions\ServiceActionException;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Interfaces\ServiceInterface;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTmplvarTemplate;
use EvolutionCMS\Models\User;
use Illuminate\Support\Facades\Lang;

class DocumentDuplicate extends DocumentCreate
{
    /**
     * @var \string[][]
     */
    public $validate;

    /**
     * @var array
     */
    public $messages;

    /**
     * @var array
     */
    public $documentData;

    /**
     * @var bool
     */
    public $events;

    /**
     * @var bool
     */
    public $cache;

    /**
     * @var array $validateErrors
     */
    public $validateErrors;

    /**
     * @var int
     */
    public $currentDate;

    /**
     * @var array
     */
    public $tvs = [];

    /**
     * UserRegistration constructor.
     * @param array $documentData
     * @param bool $events
     * @param bool $cache
     */
    public function __construct(array $documentData, bool $events = true, bool $cache = true)
    {
        $this->validate = $this->getValidationRules();
        $this->messages = $this->getValidationMessages();
        $this->documentData = $documentData;
        $this->events = $events;
        $this->cache = $cache;
        $this->currentDate = EvolutionCMS()->timestamp((int)get_by_key($_SERVER, 'REQUEST_TIME', 0));
    }

    /**
     * @return \string[][]
     */
    public function getValidationRules(): array
    {
        return [
            'id' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function getValidationMessages(): array
    {
        return [
            'id.required' => Lang::get("global.required_field", ['field' => 'id']),
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ServiceActionException
     * @throws ServiceValidationException
     */
    public function process(): \Illuminate\Database\Eloquent\Model
    {
        if (!$this->checkRules()) {
            throw new ServiceActionException(\Lang::get('global.error_no_privileges'));
        }

        if (!$this->validate()) {
            $exception = new ServiceValidationException();
            $exception->setValidationErrors($this->validateErrors);
            throw $exception;
        }

        $document = SiteContent::query()
            ->withTrashed()
            ->find($this->documentData['id']);
        $tvArray = $document
            ->tv
            ->pluck('value', 'name')
            ->toArray();
        $documentArray = array_merge($document->toArray(), $tvArray);

        // Once we've grabbed the document object, start doing some modifications
        if (!isset($this->documentData['toplevel'])) {
            // count duplicates
            $pagetitle = SiteContent::query()
                ->withTrashed()
                ->find($this->documentData['id'])
                ->pagetitle;

            $count = SiteContent::query()
                ->withTrashed()
                ->where('pagetitle', 'LIKE', '%' . $pagetitle . ' ' . \Lang::get('global.duplicated_el_suffix') . '%')
                ->count();

            $count = $count >= 1 ? ' ' . ($count + 1) : '';

            $documentArray['pagetitle'] = $pagetitle . ' ' . \Lang::get('global.duplicated_el_suffix') . ' ' . $count;
            $documentArray['alias'] = null;
        } elseif (EvolutionCMS()->getConfig('friendly_urls') == 0 || EvolutionCMS()->getConfig('allow_duplicate_alias') == 0) {
            $documentArray['alias'] = null;
        }

        // change the parent accordingly
        if (isset($this->documentData['parent'])) {
            $documentArray['parent'] = $this->documentData['parent'];
        }

        if ($this->events) {
            // invoke OnBeforeDocDuplicate event
            EvolutionCMS()->invokeEvent('OnBeforeDocDuplicate', [
                'id' => $this->documentData['id']
            ]);
        }

        $document = \DocumentManager::create($documentArray);

        $oldDocGroups = DocumentGroup::query()
            ->where('document', $this->documentData['id'])
            ->get();

        foreach ($oldDocGroups->toArray() as $oldDocGroup) {
            unset($oldDocGroup['id']);
            $oldDocGroup['document'] = $document->getKey();
            DocumentGroup::query()->insert($oldDocGroup);
        }

        if ($this->events) {
            // invoke OnDocDuplicate event
            EvolutionCMS()->invokeEvent('OnDocDuplicate', [
                'id' => $this->documentData['id'],
                'new_id' => $document->getKey()
            ]);
        }

        $children = SiteContent::query()
            ->withTrashed()
            ->where('parent', $this->documentData['id'])
            ->where('deleted', 0)
            ->orderBy('id')
            ->get();

        foreach ($children as $item) {
            \DocumentManager::duplicate([
                'id' => $item->id,
                'parent' => $document->getKey(),
                'toplevel' => 1
            ]);
        }

        if ($this->cache) {
            EvolutionCMS()->clearCache('full');
        }

        return $document;
    }

    /**
     * @return bool
     */
    public function checkRules(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        $validator = \Validator::make($this->documentData, $this->validate, $this->messages);
        $this->validateErrors = $validator->errors()->toArray();
        return !$validator->fails();
    }
}
