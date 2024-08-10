<?php

use EvolutionCMS\Models\SiteTemplate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}

if (!evo()->hasPermission('save_template')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

if (isset($_GET['selectable'])) {
    $selectable = (int) $_GET['selectable'];
    $id = (int) ($_REQUEST['id'] ?? 0);

    try {
        /** @var SiteTemplate $model */
        $model = SiteTemplate::query()->findOrFail($id);

        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'upd',
            'id' => $model->getKey(),
        ]);

        $_SESSION['itemname'] = $model->templatename;

        $model->update(['selectable' => $selectable]);

        evo()->invokeEvent('OnTempFormSave', [
            'mode' => 'upd',
            'id' => $model->getKey(),
        ]);
    } catch (ModelNotFoundException $e) {
        evo()->webAlertAndQuit(__('global.error_no_id'));
    }

    header('Location: index.php?a=76&tab=0&r=2');
    exit;
}

$stay = (int) ($_POST['stay'] ?? '');
$createbladefile = $_POST['createbladefile'] ?? false;

/** @var SiteTemplate $data */
$data = (new SiteTemplate($_POST))
    ->setAttribute('content', $_POST['post'])
    ->setAttribute('category', ($_POST['newcategory'] ?? '') ?: ($_POST['category'] ?? 0))
    ->setAttribute('id', (int) $_POST['id']);

/**
 * @param string $templatealias
 * @param string $content
 *
 * @return void
 */
function createBladeFile(string $templatealias, string $content): void
{
    $templatealias = preg_replace('/\s*/', '', $templatealias);
    $templatealias = preg_replace('/[^a-zA-Z0-9_-]+/', '', $templatealias);

    if ($templatealias != '') {
        if (!file_exists($file = MODX_BASE_PATH . 'views' . '/' . $templatealias . '.blade.php')) {
            $dir = dirname($file);

            if (!is_dir($dir)) {
                mkdir($dir);
            }

            if (is_writeable($dir)) {
                file_put_contents($file, $content);
            }
        }
    }
}

function updateBladeFile(string $templatealias, string $oldTemplatealias, string $content)
{
}

switch ($_POST['mode'] ?? '') {
    case '19':
        // invoke OnBeforeTempFormSave event
        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'new',
            'id' => $data->getKey(),
        ]);

        // disallow duplicate names for new templates
        $count = SiteTemplate::query()->where('templatename', $data->templatename)->count();

        if ($count) {
            evo()->getManagerApi()->saveFormValues(19);
            evo()->webAlertAndQuit(
                sprintf(
                    __('global.duplicate_name_found_general'),
                    __('global.template'),
                    $data->templatename
                ),
                'index.php?a=19'
            );
        }

        $count = SiteTemplate::query()->where('templatealias', $data->templatealias)->count();

        if ($count) {
            evo()->getManagerApi()->saveFormValues(19);
            evo()->webAlertAndQuit(
                sprintf(__('global.duplicate_template_alias_found'), $data->getKey(), $data->templatealias),
                'index.php?a=19'
            );
        }

        //do stuff to save the new doc
        /** @var SiteTemplate $model */
        $model = SiteTemplate::query()->create($data->toArray());

        // invoke OnTempFormSave event
        evo()->invokeEvent('OnTempFormSave', [
            'mode' => 'new',
            'id' => $model->getKey(),
        ]);

        // Set new assigned Tvs
        saveTemplateAccess($model->getKey());

        if ($createbladefile) {
            createBladeFile($model->templatealias, $model->content);
        }

        // Set the item name for logger
        $_SESSION['itemname'] = $model->templatename;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($stay) {
            $a = ($stay == 2) ? '16&id=' . $model->getKey() : 19;
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $stay;
        } else {
            $header = 'Location: index.php?a=76&r=2';
        }

        header($header);

        break;
    case '16':
        // invoke OnBeforeTempFormSave event
        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'upd',
            'id' => $data->getKey(),
        ]);

        // disallow duplicate names for templates
        $count = SiteTemplate::query()->where('templatename', $data->templatename)
            ->where('id', '!=', $data->getKey())->count();

        if ($count) {
            evo()->getManagerApi()->saveFormValues(16);
            evo()->webAlertAndQuit(
                sprintf(
                    __('global.duplicate_name_found_general'),
                    __('global.template'),
                    $data->templatename
                ),
                'index.php?a=16&id=' . $data->getKey()
            );
        }

        $count = SiteTemplate::query()->where('templatealias', $data->templatealias)
            ->where('id', '!=', $data->getKey())->count();

        if ($count) {
            evo()->getManagerApi()->saveFormValues(16);
            evo()->webAlertAndQuit(
                sprintf(__('global.duplicate_template_alias_found'), $data->getKey(), $data->templatealias),
                'index.php?a=16&id=' . $data->getKey()
            );
        }

        //do stuff to save the edited doc
        /** @var SiteTemplate $model */
        $model = SiteTemplate::query()->find($data->getKey());

        $model->update($data->toArray());

        // Set new assigned Tvs
        saveTemplateAccess($data->getKey());

        if ($createbladefile) {
            createBladeFile($model->templatealias, $model->content);
        } else {
            updateBladeFile($model->templatealias, $model->content, $model->templatealias);
        }

        // invoke OnTempFormSave event
        evo()->invokeEvent('OnTempFormSave', [
            'mode' => 'upd',
            'id' => $model->getKey(),
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $model->templatename;

        // first empty the cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($stay) {
            $a = ($stay == 2) ? '16&id=' . $model->getKey() : 19;
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $stay;
        } else {
            evo()->unlockElement(1, $model->getKey());
            $header = 'Location: index.php?a=76&r=2';
        }

        header($header);

        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
