<?php include_once MODX_MANAGER_PATH . 'includes/header.inc.php' ?>

<div class="directory-page">
    <h1>
        <i class="fa fa-list"></i>
        @yield('pagetitle', __('directory::global.main_caption'))
    </h1>

    @yield('buttons')

    <div class="sectionBody">
        @yield('breadcrumbs')

        <div class="tab-pane" id="documentPane">
            <script type="text/javascript">
                var tpModule = new WebFXTabPane(document.getElementById('documentPane'), false);
            </script>

            @yield('body')
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ MODX_BASE_URL }}assets/modules/directory/css/style.css">
@stack('scripts')

<?php include_once MODX_MANAGER_PATH . 'includes/footer.inc.php' ?>
