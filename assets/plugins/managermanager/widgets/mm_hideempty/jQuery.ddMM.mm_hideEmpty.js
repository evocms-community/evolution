/**
 * jQuery.ddMM.mm_hideEmpty
 * @version 1.2 (2022-05-23)
 * 
 * @copyright 2016–2022
 */

(function($){
$.ddMM.mm_hideEmpty = {
	/**
	 * @method hideEmptySections
	 * @version 1.1 (2022-05-23)
	 * 
	 * @desc Hide empty sections.
	 * 
	 * @returns {void}
	 */
	hideEmptySections: function(){
		this
			.getEmptyElements('.sectionBody')
			.each(function(){
				var $this = $(this);
				
				//Section header
				$this
					.prev('.sectionHeader')
					.hide()
				;
				
				//Section body
				$this.hide();
			})
		;
	},
	
	/**
	 * @method hideEmptyTabs
	 * @version 1.0.3 (2022-05-23)
	 * 
	 * @desc Hide empty tabs.
	 * 
	 * @returns {void}
	 */
	hideEmptyTabs: function(){
		this
			.getEmptyElements('.tab-pane .tab-page')
			.each(function(){
				var $this = $(this);
				
				//Page
				$this.hide();
				
				//Navigation item
				$('.tab-pane .tab-row .tab')
					.eq(
						$this
							.get(0)
							.tabPage
							.index
					)
					.hide()
				;
			})
		;
	},
	
	/**
	 * @method getEmptyElements
	 * @version 1.1 (2022-05-23)
	 * 
	 * @desc Get parents that has no visible children.
	 * 
	 * @param selector {string} — jQuery selector to get elements.
	 * 
	 * @returns {jQuery}
	 */
	getEmptyElements: function(selector){
		var
			$elements = $(selector),
			$elementsVisible = $elements.filter(':visible'),
			$elementsInvisible = $elements.not($elementsVisible)
		;
		
		return (
			//First, get empty visible elements
			$elementsVisible
				//That has no visible inputs
				.not(':has([name]:visible)')
				//And has no visible iframes
				.not(':has(iframe:visible)')
				
				//Second, get empty invisible elements
				.add(
					$elementsInvisible
						//That has no inputs
						.not(':has([name])')
						//And has no iframes
						.not(':has(iframe)')
				)
		);
	}
};
})(jQuery);