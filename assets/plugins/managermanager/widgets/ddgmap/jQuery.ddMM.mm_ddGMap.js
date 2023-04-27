/**
 * jQuery.ddMM.mm_ddGMap
 * @version 1.1.1 (2016-11-15)
 * 
 * @uses jQuery 1.9.1
 * @uses $.ddMM 1.1.2
 * 
 * @copyright 2014–2016 [DivanDesign]{@link http://www.DivanDesign.biz }
 */

(function($){
$.ddMM.mm_ddGMap = {
	//Параметры по умолчанию
	defaults: {
		//Нужно ли скрывать оригинальное поле
		hideField: true,
		//Ширина контейнера с картой
		width: 'auto',
		//Высота контейнера с картой
		height: 400,
		//Default map zoom
		defaultZoom: 15
	},
	//Массив id всех TV
	tvs: new Array(),
	//Загруженна ли карта
	loaded: false,
	
	/**
	 * @method init
	 * @version 1.2 (2016-11-15)
	 * 
	 * @desc Инициализация карты.
	 * 
	 * @param elem {object_plain} — The parameters.
	 * @param elem.id {integer} — TV ID.
	 * @param elem.position {array} — Position.
	 * @param elem.position[0] {float} — Lat.
	 * @param elem.position[1] {float} — Lng.
	 * @param elem.$elem {jQuery} — Map element.
	 * @param elem.$searchInput {jQuery} — Search input element.
	 * @param elem.$searchSubmit {jQuery} — Searhc submit element.
	 * @param [elem.defaultZoom=$.ddMM.mm_ddGMap.defaults.defaultZoom] {integer} — Default map zoom.
	 * 
	 * @returns {void}
	 */
	init: function(elem){
		var GM = google.maps,
			//Карта
			map = new GM.Map($('#ddGMap' + elem.id).get(0), {
				zoom: elem.defaultZoom,
				center: new GM.LatLng(elem.position[0], elem.position[1]),
				mapTypeId: GM.MapTypeId.ROADMAP,
				streetViewControl: false,
				scrollwheel: false
			}),
			//Маркер
			marker = new GM.Marker({
				position: new GM.LatLng(elem.position[0], elem.position[1]),
				map: map,
				draggable: true
			});
		
		//При перетаскивании маркера
		GM.event.addListener(marker, 'drag', function(event){
			//Сохраняем значение в поле
			elem.$elem.val(event.latLng.lat() + ',' + event.latLng.lng());
		});
		
		//При клике по карте
		GM.event.addListener(map, 'click', function(event){
			//Меняем позицию маркера
			marker.setPosition(event.latLng);
			//Центрируем карту на маркере
//			map.setCenter(event.latLng);
			//Сохраняем значение в поле
			elem.$elem.val(event.latLng.lat() + ',' + event.latLng.lng());
		});
		
		var geocoder = new google.maps.Geocoder();
		
		elem.$searchSubmit.on('click', function(){
			var address = elem.$searchInput.val();
			
			geocoder.geocode({'address': address}, function(results, status){
				if (status === google.maps.GeocoderStatus.OK){
					map.setCenter(results[0].geometry.location);
					
					marker.setPosition(results[0].geometry.location);
					elem.$elem.val(results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng());
				}else{
					alert('No results were found.');
				}
			});
		});
		
		//Prevent document form submit
		elem.$searchInput.on('keydown', function(event){
			//If it is Enter
			if (event.keyCode == 13){
				event.preventDefault();
				elem.$searchSubmit.trigger('click');
			}
		});
	}
};

/**
 * jQuery.fn.mm_ddGMap Plugin
 * @version 1.2 (2016-11-15)
 * 
 * @desc Делает карту.
 * 
 * @uses $.ddMM.mm_ddGMap 1.1
 * 
 * @param [params] {object_plain} — The parameters.
 * @param [params.hideField=true] {boolean} — Нужно ли скрывать оригинальное поле.
 * @param [params.width='auto'] {integer|'auto'} — Ширина контейнера с картой.
 * @param [params.height=400] {integer} — Высота контейнера с картой.
 * @param [params.defaultZoom=15] {integer} — Default map zoom.
 * 
 * @copyright 2014–2016 [DivanDesign]{@link http://www.DivanDesign.biz }
 */
$.fn.mm_ddGMap = function(params){
	var _this = $.ddMM.mm_ddGMap;
	
	//Обрабатываем параметры
	params = $.extend({}, _this.defaults, params || {});
	
	//Если ширина является числом
	if ($.isNumeric(params.width)){
		//Допишем пиксели
		params.width += 'px';
	}
	
	return $(this).each(function(){
		var elem = {};
		
		//TV с координатами
		elem.$elem = $(this);
		//ID оригинальной TV
		elem.id = elem.$elem.attr('id');
		//Координаты
		elem.position = elem.$elem.val();
		//Default map zoom
		elem.defaultZoom = params.defaultZoom;
		
		//Родитель
		var	$elemParent = elem.$elem.parents('tr:first'),
			//Запоминаем название поля
			sectionName = $elemParent.find('.warning').text(),
			//Контейнер для карты
			$sectionContainer = $('<div class="sectionHeader">' + sectionName + '</div><div class="sectionBody"><div id="floating-panel"><input class="mm_ddGMap_searchInput" type="textbox" placeholder="Search query" value=""> <input class="mm_ddGMap_searchSubmit" type="button" value="Find"></div><div id="ddGMap' + elem.id + '" style="width: ' + params.width + '; height: ' + params.height + 'px; position: relative; border: 1px solid #c3c3c3;"></div></div>'),
			$map = $sectionContainer.find('#ddGMap' + elem.id);
		
		elem.$searchInput = $sectionContainer.find('.mm_ddGMap_searchInput');
		elem.$searchSubmit = $sectionContainer.find('.mm_ddGMap_searchSubmit');
		
		//Добавляем контейнер
		elem.$elem.parents('.tab-page:first').append($sectionContainer);
		
		//Скрываем родителя и разделитель
		$elemParent.hide().prev('tr').hide();
		
		//Если скрывать не надо, засовываем перед картой
		if (!params.hideField){
		 	elem.$elem.insertBefore($map);
		}
		
		//Если координаты не заданны, то задаём дефолт
		if ($.trim(elem.position) == ''){
			elem.position = '55.20432131317031,61.28999948501182';
		}
		
		//Разбиваем координаты
		elem.position = elem.position.split(',');
		
		//Если карта ещё не загруженна
		if (!_this.loaded){
			//Просто запоминаем (инициализируется само при загрузке)
			_this.tvs.push(elem);
		//Если же карта уже загружена
		}else{
			//Просто инициализируем
			_this.init(elem);
		}
	});
};

//Глобальная инициализация карт (для колбэка от Гугло.Карт)
window.mm_ddGMap_init = function(){
	//On document.ready (именно в таком порядке, а не наоборот, т.к. колбэк может сработать раньше, чем document.ready
	$(function(){
		var _this = $.ddMM.mm_ddGMap;
		
		//Перебираем все
		for (var i = _this.tvs.length - 1; i >= 0; i--){
			//Инициализируем карту для нужной TV
			_this.init(_this.tvs[i]);
		}
		
		//Запоминаем, что первый раз карта уже инициализированна
		_this.loaded = true;
	});
};
})(jQuery);