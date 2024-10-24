<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $frames
 * @property int $home
 * @property int $view_document
 * @property int $new_document
 * @property int $save_document
 * @property int $publish_document
 * @property int $delete_document
 * @property int $empty_trash
 * @property int $action_ok
 * @property int $logout
 * @property int $help
 * @property int $messages
 * @property int $new_user
 * @property int $edit_user
 * @property int $logs
 * @property int $edit_parser
 * @property int $save_parser
 * @property int $edit_template
 * @property int $settings
 * @property int $credits
 * @property int $new_template
 * @property int $save_template
 * @property int $delete_template
 * @property int $edit_snippet
 * @property int $new_snippet
 * @property int $save_snippet
 * @property int $delete_snippet
 * @property int $edit_chunk
 * @property int $new_chunk
 * @property int $save_chunk
 * @property int $delete_chunk
 * @property int $empty_cache
 * @property int $edit_document
 * @property int $change_password
 * @property int $error_dialog
 * @property int $about
 * @property int $category_manager
 * @property int $file_manager
 * @property int $assets_files
 * @property int $assets_images
 * @property int $save_user
 * @property int $delete_user
 * @property int $save_password
 * @property int $edit_role
 * @property int $save_role
 * @property int $delete_role
 * @property int $new_role
 * @property int $access_permissions
 * @property int $bk_manager
 * @property int $new_plugin
 * @property int $edit_plugin
 * @property int $save_plugin
 * @property int $delete_plugin
 * @property int $new_module
 * @property int $edit_module
 * @property int $save_module
 * @property int $delete_module
 * @property int $exec_module
 * @property int $view_eventlog
 * @property int $delete_eventlog
 * @property int $new_web_user
 * @property int $edit_web_user
 * @property int $save_web_user
 * @property int $delete_web_user
 * @property int $web_access_permissions
 * @property int $view_unpublished
 * @property int $import_static
 * @property int $export_static
 * @property int $remove_locks
 * @property int $display_locks
 * @property int $change_resourcetype
 *
 * Virtual
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 */
class UserRole extends Model
{
    use Traits\Models\ManagerActions,
        Traits\Models\LockedElements;

    public $timestamps = false;

    protected $casts = [
        'frames' => 'int',
        'home' => 'int',
    ];

    protected $fillable = [
        'name',
        'description',
    ];

    protected array $managerActionsMap = [
        'actions.new' => 38,
        'id' => [
            'actions.edit' => 35,
        ],
    ];

    /**
     * @return BelongsToMany
     */
    public function tvs(): BelongsToMany
    {
        return $this->belongsToMany(
            SiteTmplvar::class,
            (new UserRoleVar())->getTable(),
            'roleid',
            'tmplvarid'
        )->withPivot('rank')
            ->orderBy('pivot_rank', 'ASC');
    }

    public function getIsAlreadyEditAttribute(): bool
    {
        return array_key_exists($this->getKey(), self::getLockedElements(8));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(8)[$this->getKey()] : null;
    }

    public function roleVar(): HasMany
    {
        return $this->hasMany(UserRoleVar::class, 'roleid', 'id');
    }

    public function delete(): bool
    {
        $this->roleVar()->delete();

        return parent::delete();
    }
}
