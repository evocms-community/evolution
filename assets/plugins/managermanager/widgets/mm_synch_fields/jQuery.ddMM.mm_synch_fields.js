/**
 * jQuery.ddMM.mm_synch_fields
 * @version 1.1 (2020-10-28)
 * 
 * @uses jQuery.ddMM 1.2.2
 * 
 * @copyright 2020 [DD Group]{@link https://DivanDesign.biz }
 */

(function($){
	/**
	 * jQuery.fn.mm_synch_fields
	 * @version 1.1 (2020-10-28)
	 * 
	 * @copyright 2020 [DD Group]{@link https://DivanDesign.biz }
	 */
	$.fn.mm_synch_fields = function(){
		var $thisCollection = $(this);
		
		$thisCollection.on(
			'keyup',
			function(){
				var $thisField = $(this);
				
				$thisCollection
					.not($thisField)
					.val($thisField.val())
					.trigger('change')
				;
			}
		);
	};
})(jQuery);