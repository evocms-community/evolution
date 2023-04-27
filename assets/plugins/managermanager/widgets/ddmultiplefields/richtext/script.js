$(function(){
	var $textarea = $('#ddMultipleFields_richtext');
	
	$textarea
		.val(
			window
				.$ddMultipleField_row_col_field
				.html()
				//Decode some HTML entities
				.replace(
					/&lt;/gi,
					'<'
				)
				.replace(
					/&gt;/gi,
					'>'
				)
				.replace(
					/&amp;/gi,
					'&'
				)
		)
		.trigger('change')
	;
	
	$('.js-ok').on(
		'click',
		function(){
			if (typeof tinyMCE != 'undefined'){
				tinyMCE.triggerSave();
			}
			
			window.$ddMultipleField_row_col_field.html($textarea.val());
			$textarea.val('');
			window.close();
		}
	);
	
	$('.js-cancel').on(
		'click',
		function(){
			$textarea.val('');
			window.close();
		}
	);
});