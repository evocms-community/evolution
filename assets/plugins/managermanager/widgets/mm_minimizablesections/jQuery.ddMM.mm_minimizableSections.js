/**
 * jQuery.ddMM.mm_minimizableSections
 * @version 1.0 (2016-11-10)
 * 
 * @copyright 2016
 */

(function($){
$.ddMM.mm_minimizableSections = {
	defaults: {
		classNames: {
			header: 'mm_minimizableSections_header',
			minimized: 'mm_minimizableSections_minimized'
		}
	},
	
	inited: false,
	
	/**
	 * @method init
	 * @version 1.0 (2016-11-10)
	 * 
	 * @desc Initialization.
	 * 
	 * @param params {object_plain} — Parameters passed as plain object.
	 * @param params.minimizedByDefault {string} — Minimized by default sections.
	 * 
	 * @returns {void}
	 */
	init: function(params){
		var _this = this;
		
		if (!_this.inited){
			//Minimize by default
			$('.' + _this.defaults.classNames.header).filter(params.minimizedByDefault).addClass(_this.defaults.classNames.minimized).next().hide();
		}
	}
};

/**
 * jQuery.fn.mm_minimizableSections
 * @version 1.0 (2016-11-10)
 * 
 * @desc Делает карту.
 * 
 * @uses jQuery.ddMM.mm_minimizableSections
 * 
 * @copyright 2016
 */
$.fn.mm_minimizableSections = function(params){
	var _this = $.ddMM.mm_minimizableSections;
	
	_this.init(params);
	
	return $(this).addClass(_this.defaults.classNames.header).on('click', function(){
		var $this = $j(this);
		
		$this.next().slideToggle(400, function(){
			$this.toggleClass(_this.defaults.classNames.minimized);
		});
	});
};
})(jQuery);