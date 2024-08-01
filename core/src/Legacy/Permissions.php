<?php

namespace EvolutionCMS\Legacy;

use EvolutionCMS\Models\SiteContent;

/**
 * @class: udperms
 */
class Permissions
{
    /**
     * @var int
     */
    public $user;

    /**
     * @var int
     */
    public $document;

    /**
     * @var int
     */
    public $role;

    /**
     * @var bool
     */
    public bool $duplicateDoc = false;

    /**
     * @return bool
     */
    public function checkPermissions(): bool
    {
        $udperms_allowroot = evo()->hasPermission('udperms_allowroot');

        if ($this->role == 1 || (!$this->document && $udperms_allowroot == 1)) {
            return true;
        }

        $parent = SiteContent::query()->find($this->document)->parent ?? null;

        if (($this->duplicateDoc || $this->document == 0) && $parent == 0 && $udperms_allowroot == 0) {
            return false;
        }

        /* Note:
            A document is flagged as private whenever the document group that it
            belongs to is assigned or links to a user group. In other words if
            the document is assigned to a document group that is not yet linked
            to a user group then that document will be made public. Documents that
            are private to the manager users will not be private to web users if the
            document group is not assigned to a web user group and visa versa.
         */

        $docgrp = $_SESSION['mgrDocgroups'] ?? [];

        return SiteContent::query()
            ->when(
                $docgrp,
                fn($query) => $query->leftJoin('document_groups', 'site_content.id', '=', 'document_groups.document')
                    ->where(fn($q) => $q->whereIn('document_groups.document_group', $docgrp)
                        ->orWhere('site_content.privatemgr', 0)),
                fn($query) => $query->where('privatemgr', 0)
            )
            ->where('site_content.id', $this->document)
            ->exists();
    }
}
