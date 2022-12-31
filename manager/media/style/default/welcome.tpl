[[@OnManagerWelcomePrerender]]

<div class="container container-body">
    <!-- safe mode -->
    <div id="safe_mode" style="display: [+show_safe_mode+]">
        <div class="widget-wrapper alert alert-danger">
            [+safe_mode_msg+]
        </div>
    </div>

    <!-- site available -->
	<div id="site_status" style="display: [+show_site_status+]">
		<div class="widget-wrapper alert alert-warning">
			[+site_status_msg+]
		</div>
	</div>

	<!-- logout reminder -->
	<div id="logout_reminder" style="display:[+show_logout_reminder+]">
		<div class="widget-wrapper alert alert-warning">
			[+logout_reminder_msg+]
		</div>
	</div>

	<!-- logout reminder -->
	<div id="multiple_sessions" style="display:[+show_multiple_sessions+]">
		<div class="widget-wrapper alert alert-warning">
			[+multiple_sessions_msg+]
		</div>
	</div>

	<!-- alert -->
	<div style="display:[+config_display+]">
		<div class="widget-wrapper alert alert-warning">
			[+config_check_results+]
		</div>
	</div>

	<!-- end  title -->
	<div class="row form-row widgets">
		[+widgets+]
	</div>

	<!--a class="btn btn-secondary mb-1"><i class="fa fa-cogs"></i> Добавить виджет</a-->
</div>

[[@OnManagerWelcomeRender]]
