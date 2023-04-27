/**
 * jQuery.ddMM.mm_ddMultipleFields
 * @version 2.8 (2023-04-16)
 * 
 * @uses jQuery 1.9.1
 * @uses jQuery.ddTools 1.8.1
 * @uses jQuery.ddMM 1.1.2
 * 
 * @copyright 2013–2023 [DD Group]{@link https://DivanDesign.ru }
 */

(function($){
$.ddMM.mm_ddMultipleFields = {
	defaults: {
		//Колонки
		columns: [
			{
				type: 'text'
			}
		],
		//Стиль превьюшек
		previewStyle: '',
		//Минимальное количество строк
		minRowsNumber: 0,
		//Максимальное количество строк
		maxRowsNumber: 0,
		
		//Backward compatibility
		//Разделитель строк
		rowDelimiter: '||',
		//Разделитель колонок
		colDelimiter: '::'
	},
	/**
	 * @prop instances {objectPlain} — All instances.
	 * @prop instances[item] {objectPlain} — Item, when key — TV id.
	 * @prop instances[item].id {string} — Unique TV id (similar to key).
	 * @prop instances[item].columns {array} — Параметры колонок. Default: 'field'.
	 * @prop instances[item].columns[i] {objectPlain} — Колонка.
	 * @prop instances[item].columns[i].type {'text'|'textarea'|'richtext'|'date'|'select'} — Тип.
	 * @prop instances[item].columns[i].alias {string} — An unique column alias.
	 * @prop instances[item].columns[i].title {string} — Заголовок.
	 * @prop instances[item].columns[i].width {string} — Ширина.
	 * @prop instances[item].columns[i].data {string_JSON_array} — Данные (для type == 'select').
	 * @prop instances[item].previewStyle {string} — Стиль превьюшек.
	 * @prop instances[item].minRowsNumber {integer} — Минимальное количество строк.
	 * @prop instances[item].maxRowsNumber {integer} — Максимальное количество строк.
	 * @prop instances[item].$parent {jQuery} — TV field DOM parent.
	 * @prop instances[item].$originalField {jQuery} — TV field.
	 * @prop instances[item].$table {jQuery} — Multiple field table.
	 * @prop instances[item].$addButtons {jQuery} — New row adding buttons.
	 * @prop instances[item].$currentField {jQuery} — Current field from table.
	 * 
	 * Backward compatibility
	 * @prop instances[item].rowDelimiter {string} — Разделитель строк.
	 * @prop instances[item].colDelimiter {string} — Разделитель колонок.
	 * @prop instances[item].columnIdIndex {integer} — Index of the deprecated ID column.
	 */
	instances: {},
	richtextWindow: null,
	
	/**
	 * @method updateField
	 * @version 3.0 (2020-05-22)
	 * 
	 * @desc Обновляет мульти-поле, берёт значение из оригинального поля.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * 
	 * @returns {void}
	 */
	updateField: function(params){
		var _this = this;
		
		//Если есть текущее поле
		if (_this.instances[params.instanceId].$currentField){
			//Задаём значение текущему полю (берём у оригинального поля), запускаем событие изменения
			_this.instances[params.instanceId].$currentField
				.val($.trim(_this.instances[params.instanceId].$originalField.val()))
				.trigger('change.ddEvents')
			;
			//Забываем текущее поле (ибо уже обработали)
			_this.instances[params.instanceId].$currentField = false;
		}
	},
	
	/**
	 * @method updateTv
	 * @version 4.5 (2023-04-16)
	 * 
	 * @desc Обновляет оригинальное поле TV, собирая данные по мульти-полям.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * 
	 * @returns {void}
	 */
	updateTv: function(params){
		var
			_this = this,
			//Object that will be saved to the field
			fieldValueObject = {}
		;
		
		//Перебираем все строки
		_this
			.instances[params.instanceId]
			.$table
			.find('.ddMultipleField_row')
			.each(function(){
				var
					$row = $(this),
					//Get row ID from the `data-dd-row-id` attr
					rowId = $row.data('ddRowId'),
					columnValuesObject = {},
					isRowEmpty = true
				;
				
				//Перебираем все колонки, закидываем значения в массив
				$row
					.find('.ddMultipleField_row_col_field')
					.each(function(columnIndex){
						var columnParams = _this.instances[params.instanceId].columns[columnIndex];
						
						//Если колонка типа richtext
						if (columnParams.type == 'richtext'){
							//Сохраняем значение поля в объект
							columnValuesObject[columnParams.alias] = $.trim(
								$(this).html()
							);
						}else{
							//Сохраняем значение поля в объект
							columnValuesObject[columnParams.alias] = $.trim(
								$(this).val()
							);
						}
						
						//If row is still marked as empty
						if (isRowEmpty){
							//Depends on this column value length
							isRowEmpty =
								columnValuesObject[columnParams.alias] ==
								columnParams.defaultValue
							;
						}
					})
				;
				
				//Если значение было хоть в одной колонке из всех в этой строке
				if (!isRowEmpty){
					fieldValueObject[rowId] = columnValuesObject;
				}
			})
		;
		
		if (!$.isEmptyObject(fieldValueObject)){
			fieldValueObject = 
				JSON
					.stringify(fieldValueObject)
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
			;
		}else{
			fieldValueObject = '';
		}
		
		//Записываем значение в оригинальное поле
		_this
			.instances[params.instanceId]
			.$originalField
			.val(fieldValueObject)
		;
	},
	
	/**
	 * @method init
	 * @version 4.5 (2023-04-16)
	 * 
	 * @desc Инициализация.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.id {string} — TV id.
	 * @param params.value {string} — TV value.
	 * @param params.$parent {jQuery} — TV parent.
	 * @param params.$originalField {jQuery} — TV.
	 * @param params.columns {string_commaSeparated|array} — Колонки.
	 * @param params.columns[i] {objectPlain} — Колонка.
	 * @param params.columns[i].type {'text'|'textarea'|'richtext'|'date'|'select'} — Тип.
	 * @param [params.columns[i].alias] {string} — An unique column alias. If empty, just numeric index will be used.
	 * @param [params.columns[i].title=''] {string} — Заголовок.
	 * @param [params.columns[i].width=180] {integer} — Ширина.
	 * @param [params.columns[i].data=''] {integer} — Данные (для type == 'select').
	 * @param params.previewStyle {string} — Стиль превьюшек.
	 * @param params.minRowsNumber {integer} — Минимальное количество строк.
	 * @param params.maxRowsNumber {integer} — Максимальное количество строк.
	 * 
	 * Deprecated:
	 * @param params.rowDelimiter {string} — Разделитель строк.
	 * @param params.colDelimiter {string} — Разделитель колонок.
	 * 
	 * @returns {void}
	 */
	init: function(theInstance){
		var
			_this = this,
			//Шапка таблицы
			tableHeaderHtml = '',
			//По умолчанию без шапки
			isTableHeaderDisplayed = false;
		;
		
		//Provides backward compatibility
		theInstance.columnIdIndex = -1;
		
		//Перебираем колонки
		$.each(
			theInstance.columns,
			function(
				columnIndex,
				columnObject
			){
				//If it is deprecated ID column
				if (columnObject.type == 'id'){
					theInstance.columnIdIndex = columnIndex;
					
					//Continue
					return true;
				}
				
				//Prepare alias
				if (typeof columnObject.alias == 'undefined'){
					columnObject.alias = columnIndex;
				}
				
				//Prepare default value
				if (typeof columnObject.defaultValue == 'undefined'){
					columnObject.defaultValue = '';
				}
				
				//Prepare title
				if (!columnObject.title){
					theInstance.columns[columnIndex].title = '';
				}else{
					isTableHeaderDisplayed = true;
				}
				tableHeaderHtml +=
					'<th>' +
					columnObject.title +
					'</th>'
				;
				
				//Prepare width
				if (!columnObject.width){
					if (
						//Preverious column exist
						$.isPlainObject(theInstance.columns[columnIndex - 1]) &&
						theInstance.columns[columnIndex - 1].width
					){
						//Take from preverious column
						theInstance.columns[columnIndex].width = theInstance.columns[columnIndex - 1].width;
					}else{
						//Or by default
						theInstance.columns[columnIndex].width = 180;
					}
				}
				
				//Prepare data
				if (!columnObject.data){
					theInstance.columns[columnIndex].data = '';
				}
			}
		);
		
		//If deprecated ID column exists
		if (theInstance.columnIdIndex != -1){
			//Remove it
			theInstance.columns.splice(
				theInstance.columnIdIndex,
				1
			);
		}
		
		//Объект значения поля
		var fieldValueObject = _this.init_prepareFieldValueObject(theInstance);
		
		//Это поле нужно было только для инициализации
		delete theInstance.value;
		
		//Инициализируем кнопки +
		theInstance.$addButtons = $();
		
		//Сохраняем экземпляр текущего объекта с правилами
		_this.instances[theInstance.id] = theInstance;
		
		//Делаем таблицу мульти-поля
		theInstance.$table =
			$(
				'<table class="ddMultipleField" id="' +
				theInstance.id +
				'ddMultipleField"></table>'
			)
			.appendTo(theInstance.$parent)
		;
		
		if (isTableHeaderDisplayed){
			$(
				'<tr><th></th>' +
				tableHeaderHtml +
				'<th></th></tr>'
			)
				.appendTo(theInstance.$table)
			;
		}
		
		$.each(
			fieldValueObject,
			function(
				rowId,
				rowValue
			){
				_this.createRow({
					instanceId: theInstance.id,
					rowId: rowId,
					rowValue: rowValue
				});
			}
		);
		
		//Добавляем возможность перетаскивания
		theInstance.$table.sortable({
			items: 'tr:has(td)',
			handle: '.ddSortHandle',
			cursor: 'n-resize',
			axis: 'y',
			placeholder: 'ui-state-highlight',
			start: function(
				event,
				ui
			){
				ui
					.placeholder
					.html(
						'<td colspan="' +
						(theInstance.columns.length + 2) +
						'"><div></div></td>'
					)
					.find('div')
					.css(
						'height',
						ui.item.height()
					)
				;
			}
		});
	},
	
	/**
	 * @method init_prepareFieldValueObject
	 * @version 2.1 (2022-05-26)
	 * 
	 * @desc Инициализация → Подготовка объекта значений поля.
	 * 
	 * @param theInstance {objectPlain} — The instance. @required
	 * 
	 * @returns {objectPlain}
	 */
	init_prepareFieldValueObject: function(theInstance){
		var
			_this = this,
			//Объект значения поля
			fieldValueObject = {}
		;
		
		//If value is JSON object
		if (
			$.trim(theInstance.value).substr(
				0,
				1
			) ==
			'{'
		){
			try {
				fieldValueObject = $.parseJSON(theInstance.value);
			}catch{
				fieldValueObject = {};
			}
		//Bacward compatibility
		}else{
			var
				//Разбиваем значение по строкам
				rowValuesArray =
					theInstance
						.value
						.split(theInstance.rowDelimiter)
			;
			
			$.each(
				rowValuesArray,
				function(){
					var
						//Split by column
						columnValuesArray = this.split(theInstance.colDelimiter),
						//Generate row ID
						rowId = _this.generateRowId()
					;
					
					if (
						//If deprecated ID column exists
						theInstance.columnIdIndex != -1 &&
						//And not empty
						columnValuesArray[theInstance.columnIdIndex] != ''
					){
						rowId = columnValuesArray[theInstance.columnIdIndex];
					}
					
					//Init row
					fieldValueObject[rowId] = {};
					
					$.each(
						columnValuesArray,
						function(
							colKey,
							colValue
						){
							//If it is deprecated ID column
							if (colKey != theInstance.columnIdIndex){
								//Save column value
								fieldValueObject[rowId][colKey] = colValue;
							}
						}
					)
				}
			);
		}
		
		//Provide changes of column indexes to aliases
		Object.keys(fieldValueObject).forEach(
			(rowKey) =>
			{
				//Iterate over all columns params
				theInstance.columns.forEach(
					(
						columnParams,
						columnIndex
					) =>
					{
						if (
							//If column alias is not set as simple numeric index
							columnParams.alias != columnIndex &&
							//And the value for this column is not set by alias
							typeof fieldValueObject[rowKey][columnParams.alias] == 'undefined' &&
							//But set by index
							typeof fieldValueObject[rowKey][columnIndex] != 'undefined'
						){
							//Save value by the new alias
							fieldValueObject[rowKey][columnParams.alias] = fieldValueObject[rowKey][columnIndex];
							
							//And delete outdated by index
							delete fieldValueObject[rowKey][columnIndex];
						}
					}
				);
			}
		);
		
		var fieldValueObjectLength = Object.keys(fieldValueObject).length;
		
		//Проверяем на максимальное и минимальное количество строк
		if (
			theInstance.maxRowsNumber &&
			fieldValueObjectLength > theInstance.maxRowsNumber
		){
			$.each(
				fieldValueObject,
				function(
					rowKey,
					rowValue
				){
					if (
						fieldValueObjectLength >
						theInstance.maxRowsNumber
					){
						delete fieldValueObject[rowKey];
					}else{
						return false;
					}
					
					fieldValueObjectLength--;
				}
			);
		}else if (
			theInstance.minRowsNumber &&
			fieldValueObjectLength < theInstance.minRowsNumber
		){
			for (
				var rowIndex = fieldValueObjectLength;
				rowIndex < theInstance.minRowsNumber;
				rowIndex++
			){
				//Init empty row
				fieldValueObject[rowIndex] = {};
			}
		}
		
		return fieldValueObject;
	},
	
	/**
	 * @method generateRowId
	 * @version 1.1 (2020-05-25)
	 * 
	 * @desc Generates an uniquie ID for table row.
	 * 
	 * @returns {integer}
	 */
	generateRowId: function(){
		return (
			Date.now() +
			'' +
			//Get random number from 100 to 999
			Math.round(
				(
					Math.random() *
					(
						999 - 100
					)
				) +
				100
			)
		);
	},
	
	/**
	 * @method createRow
	 * @version 6.0.3 (2022-05-25)
	 * 
	 * @desc Функция создания строки.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * @param [params.rowId=this.generateRowId()] {integer} — Row ID.
	 * @param [params.rowValue={}] {objectPlain} — Row value.
	 * @param [params.$insertAfter=''] {string} — Row value.
	 * 
	 * @returns {jQuery}
	 */
	createRow: function(params){
		var	_this = this;
		
		//Defaults
		params = $.extend(
			{
				rowId: _this.generateRowId(),
				rowValue: {}
			},
			params
		);
		
		var
			//Общее количество строк на данный момент
			fieldRowsTotal =
				_this
					.instances[params.instanceId]
					.$table
					.find('.ddMultipleField_row')
					.length
		;
		
		if (
			//Если задано максимальное количество строк
			_this.instances[params.instanceId].maxRowsNumber &&
			//Проверяем превышает ли уже количество строк максимальное
			fieldRowsTotal >= _this.instances[params.instanceId].maxRowsNumber
		){
			return;
		}
		
		var
			$fieldRow =
				$(
					'<tr class="ddMultipleField_row ' +
					params.instanceId +
					'ddMultipleField_row" data-dd-row-id="' +
					params.rowId +
					'"><td class="ddSortHandle"><div class="fa fa-sort"></div></td></tr>'
				)
		;
		
		if (params.$insertAfter){
			$fieldRow.insertAfter(params.$insertAfter);
		}else{
			$fieldRow.appendTo(_this.instances[params.instanceId].$table);
		}
		
		var $field;
		
		//Перебираем колонки
		$.each(
			_this.instances[params.instanceId].columns,
			function(
				columnIndex,
				columnParams
			){
				if (!params.rowValue[columnParams.alias]){
					params.rowValue[columnParams.alias] = '';
				}
				
				var $col = _this.createColumn({$fieldRow: $fieldRow});
				
				//Если текущая колонка является изображением
				if(columnParams.type == 'image'){
					$field = _this.createFieldText({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						width: columnParams.width,
						$fieldCol: $col
					});
					
					_this.createFieldImage({
						instanceId: params.instanceId,
						$fieldCol: $col
					});
					
					//Create Attach browse button
					$('<input class="ddAttachButton" type="button" value="Вставить" />')
						.insertAfter($field)
						.on(
							'click',
							function(){
								_this.instances[params.instanceId].$currentField = $(this).siblings('.ddMultipleField_row_col_field');
								BrowseServer(params.instanceId);
							}
						)
					;
				//Если текущая колонка является файлом
				}else if(columnParams.type == 'file'){
					$field = _this.createFieldText({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						width: columnParams.width,
						$fieldCol: $col
					});
					
					//Create Attach browse button
					$('<input class="ddAttachButton" type="button" value="Вставить" />')
						.insertAfter($field)
						.on(
							'click',
							function(){
								_this.instances[params.instanceId].$currentField = $(this).siblings('.ddMultipleField_row_col_field');
								BrowseFileServer(params.instanceId);
							}
						)
					;
				//Если селект
				}else if(columnParams.type == 'select'){
					_this.createFieldSelect({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						data: columnParams.data,
						width: columnParams.width,
						$fieldCol: $col
					});
				//Если дата
				}else if(columnParams.type == 'date'){
					_this.createFieldDate({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						$fieldCol: $col
					});
				//Если textarea
				}else if(columnParams.type == 'textarea'){
					_this.createFieldTextarea({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						width: columnParams.width,
						$fieldCol: $col
					});
				//Если richtext
				}else if(columnParams.type == 'richtext'){
					_this.createFieldRichtext({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						width: columnParams.width,
						$fieldCol: $col
					});
				//По дефолту делаем текстовое поле
				}else{
					_this.createFieldText({
						value: params.rowValue[columnParams.alias],
						title: columnParams.title,
						width: columnParams.width,
						$fieldCol: $col
					});
				}
			}
		);
		
		var $lastCol = _this.createColumn({$fieldRow: $fieldRow});
		
		//Create DeleteButton
		_this.createButtonDeleteRow({
			instanceId: params.instanceId,
			$fieldCol: $lastCol
		});
		
		//Create addButton
		_this.createButtonAddRow({
			instanceId: params.instanceId,
			$fieldCol: $lastCol
		});
		
		if (
			//Если задано максимальное количество строк
			_this.instances[params.instanceId].maxRowsNumber &&
			//Если будет равно максимуму при создании этого поля
			fieldRowsTotal + 1 == _this.instances[params.instanceId].maxRowsNumber
		){
			_this.instances[params.instanceId].$addButtons.attr(
				'disabled',
				true
			);
		}
		
		//Специально для полей, содержащих изображения необходимо инициализировать
		$fieldRow
			.find('.ddMultipleField_row_col:has(.ddMultipleField_row_col_field_image) .ddMultipleField_row_col_field')
			.trigger('change.ddEvents')
		;
		
		return $fieldRow;
	},
	
	/**
	 * @method createColumn
	 * @version 3.0 (2020-05-25)
	 * 
	 * @desc Создание колонки поля.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.$fieldRow {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createColumn: function(params){
		return (
			$('<td class="ddMultipleField_row_col"></td>')
				.appendTo(params.$fieldRow)
		);
	},
	
	/**
	 * @method createButtonDeleteRow
	 * @version 4.0 (2018-05-25)
	 * 
	 * @desc Creates a delete button.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {void}
	 */
	createButtonDeleteRow: function(params){
		var _this = this;
		
		$('<button class="fa fa-trash btn ddDeleteButton"></button>')
			.appendTo(params.$fieldCol)
			.on(
				'click',
				function(event){
					//Проверяем на минимальное количество строк
					if (
						_this.instances[params.instanceId].minRowsNumber &&
						_this.instances[params.instanceId].$table.find('.ddMultipleField_row').length <= _this.instances[params.instanceId].minRowsNumber
					){
						return;
					}
					
					var
						$this = $(this),
						$par = $this.parents('.ddMultipleField_row:first')/*,
						$table = $this.parents('.ddMultipleField:first')*/
					;
					
					//Отчистим значения полей
					$par
						.find('.ddMultipleField_row_col_field')
						.val('')
					;
					
					//Если больше одной строки, то можно удалить текущую строчку
					if ($par.siblings('.ddMultipleField_row').length > 0){
						$par.animate(
							{
								opacity: 0
							},
							300,
							function(){
								//Сносим
								$par.remove();
								
								//При любом удалении показываем кнопки добавления
								_this
									.instances[params.instanceId]
									.$addButtons
									.removeAttr('disabled')
								;
								
								return;
							}
						);
					}
					
					event.preventDefault();
				}
			)
		;
	},
	
	/**
	 * @method createButtonAddRow
	 * @version 5.0 (2020-05-25)
	 * 
	 * @desc Функция создания кнопки +, вызывается при инициализации.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {void}
	 */
	createButtonAddRow: function(params){
		var
			_this = this,
			//Вешаем на кнопку создание новой строки
			$button =
				$('<button class="fa fa-plus btn ddAddButton"></button>')
					.appendTo(params.$fieldCol)
					.on(
						'click',
						function(event){
							_this
								.createRow({
									instanceId: params.instanceId,
									$insertAfter: $(this).parents('.ddMultipleField_row:first')
								})
								.css({
									opacity: 0
								})
								.animate(
									{
										opacity: 1
									},
									300
								)
							;
							
							event.preventDefault();
						}
					)
		;
		
		//Сохраняем в коллекцию
		_this
			.instances[params.instanceId]
			.$addButtons =
		_this
			.instances[params.instanceId]
			.$addButtons
			.add($button)
		;
	},
	
	/**
	 * @method createFieldText
	 * @version 3.0 (2020-05-25)
	 * 
	 * @desc Creates a text field.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.value {string} — Field value.
	 * @param params.title {string} — Field title.
	 * @param params.width {integer} — Field width.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createFieldText: function(params){
		var
			$field =
				$(
					'<input type="text" title="' +
					params.title +
					'" style="width:' +
					params.width +
					'px;" class="ddMultipleField_row_col_field" />'
				)
		;
		
		return (
			$field
				.val(params.value)
				.appendTo(params.$fieldCol)
		);
	},
	
	/**
	 * @method createFieldDate
	 * @version 3.0 (2020-05-25)
	 * 
	 * @desc Creates a date field.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.value {string} — Field value.
	 * @param params.title {string} — Field title.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createFieldDate: function(params){
		//name нужен для DatePicker`а
		var
			$field =
				$(
					'<input type="text" title="' +
					params.title +
					'" class="ddMultipleField_row_col_field DatePicker" name="ddMultipleDate" />'
				)
					.val(params.value)
					.appendTo(params.$fieldCol)
		;
		
		new DatePicker(
			$field.get(0),
			{
				yearOffset: $.ddMM.config.datepicker_offset,
				format: $.ddMM.config.datetime_format + ' hh:mm:00',
				dayNames: $.ddMM.lang.dp_dayNames,
				monthNames: $.ddMM.lang.dp_monthNames,
				startDay: $.ddMM.lang.dp_startDay
			}
		);
		
		return $field;
	},
	
	/**
	 * @method createFieldTextarea
	 * @version 3.0 (2020-05-25)
	 * 
	 * @desc Creates a textarea field.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.value {string} — Field value.
	 * @param params.title {string} — Field title.
	 * @param params.width {integer} — Field width.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createFieldTextarea: function(params){
		return (
			$(
				'<textarea title="' +
				params.title +
				'" style="width:' +
				params.width +
				'px;" class="ddMultipleField_row_col_field">' +
				params.value +
				'</textarea>'
			)
				.appendTo(params.$fieldCol)
		);
	},
	
	/**
	 * @method createFieldRichtext
	 * @version 3.0 (2020-05-25)
	 * 
	 * @desc Creates a richtext field.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.value {string} — Field value.
	 * @param params.title {string} — Field title.
	 * @param params.width {integer} — Field width.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createFieldRichtext: function(params){
		var
			_this = this,
			$field =
				$(
					'<div title="' +
					params.title +
					'" style="width:' +
					params.width +
					'px;" class="ddMultipleField_row_col_field">' +
					params.value +
					'</div>'
				)
					.appendTo(params.$fieldCol)
		;
		
		$(
			'<div class="ddMultipleField_row_col_edit"><a class="false" href="#">' +
			$.ddMM.lang.edit +
			'</a></div>'
		)
			.appendTo(params.$fieldCol)
			.find('a')
			.on(
				'click',
				function(event){
					_this.richtextWindow = window.open(
						(
							$.ddMM.config.site_url +
							$.ddMM.urls.mm +
							'widgets/ddmultiplefields/richtext/index.php'
						),
						'mm_ddMultipleFields_richtext',
						new Array(
							'width=700',
							'height=600',
							'left=' + (
								($.ddTools.windowWidth - 700) /
								2
							),
							'top=' + (
								($.ddTools.windowHeight - 600) /
								2
							),
							'menubar=no',
							'toolbar=no',
							'location=no',
							'status=no',
							'resizable=no',
							'scrollbars=yes'
						)
							.join(',')
					);
					
					if (_this.richtextWindow != null){
						_this.richtextWindow.$ddMultipleField_row_col_field = $field;
					}
					
					event.preventDefault();
				}
			)
		;
		
		return $field;
	},
	
	/**
	 * @method createFieldImage
	 * @version 4.0 (2018-05-25)
	 * 
	 * @desc Creates a image field.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.instanceId {string} — TV id.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {void}
	 */
	createFieldImage: function(params){
		var _this = this;
		
		// Create a new preview and Attach a browse event to the picture, so it can trigger too
		$(
			'<div class="ddMultipleField_row_col_field_image"><img src="" style="' +
			_this.instances[params.instanceId].previewStyle +
			'" /></div>'
		)
			.appendTo(params.$fieldCol)
			.hide()
			.find('img')
			.on(
				'click',
				function(){
					params
						.$fieldCol
						.find('.ddAttachButton')
						.trigger('click')
					;
				}
			)
			.on(
				'load.ddEvents',
				function(){
					//Удаление превьюшки, оставленная от виджета showimagetvs
					$(
						'#' +
						params.instanceId +
						'PreviewContainer'
					)
						.remove()
					;
				}
			)
		;
		
		//Находим поле, привязываем события
		$(
			'.ddMultipleField_row_col_field',
			params.$fieldCol
		)
			.on(
				'change.ddEvents load.ddEvents',
				function(){
					var
						$this = $(this),
						url = $this.val()
					;
					
					url =
						(
							url != '' &&
							url.search(/http:\/\//i) == -1
						) ?
						(
							$.ddMM.config.site_url +
							url
						) :
						url
					;
					
					//If field not empty
					if (url != ''){
						//Show preview
						$this
							.siblings('.ddMultipleField_row_col_field_image')
							.show()
							.find('img')
							.attr(
								'src',
								url
							)
						;
					}else{
						//Hide preview
						$this
							.siblings('.ddMultipleField_row_col_field_image')
							.hide()
						;
					}
				}
			)
		;
	},
	
	/**
	 * @method createFieldSelect
	 * @version 4.0 (2020-05-25)
	 * 
	 * @desc Функция создания списка.
	 * 
	 * @param params {objectPlain} — The parameters.
	 * @param params.value {string} — Field value.
	 * @param params.title {string} — Field title.
	 * @param [params.data] {sring_JSON_array} — Field data.
	 * @param params.data[i] {objectPlain} — Item.
	 * @param params.data[i].value {string} — Item value.
	 * @param [params.data[i].title=data[i].value] {string} — Item title.
	 * @param params.width {integer} — Field width.
	 * @param params.$fieldCol {jQuery} — Target container.
	 * 
	 * @returns {jQuery}
	 */
	createFieldSelect: function(params){
		var $select = $('<select class="ddMultipleField_row_col_field">');
		
		if (params.data){
			var options = '';
			
			params.data = $.parseJSON(params.data);
			
			$.each(
				params.data,
				function(
					index,
					item
				){
					if (!item.title){
						item.title = item.value;
					}
					
					options +=
						'<option value="' +
						item.value +
						'">' +
						item.title +
						'</option>'
					;
				}
			);
			
			$select.append(options);
		}
		
		if (params.value){
			$select.val(params.value);
		}
		
		$select.css(
			'width',
			(
				params.width ?
				params.width :
				180
			)
		);
		
		return $select.appendTo(params.$fieldCol);
	}
};

/**
 * jQuery.fn.mm_ddMultipleFields
 * @version 2.0.6 (2020-05-25)
 * 
 * @desc Делает мультиполя.
 * 
 * @param [params] {objectPlain} — The parameters.
 * @param [params.columns='field'] {string_commaSeparated|array} — Колонки.
 * @param [params.previewStyle=''] {string} — Стиль превьюшек.
 * @param [params.minRowsNumber=0] {integer} — Минимальное количество строк.
 * @param [params.maxRowsNumber=0] {integer} — Максимальное количество строк.
 * 
 * Deprecated:
 * @param [params.rowDelimiter='||'] {string} — Разделитель строк.
 * @param [params.colDelimiter='::'] {string} — Разделитель колонок.
 * 
 * @copyright 2013–2020 [DD Group]{@link https://DivanDesign.ru }
 */
$.fn.mm_ddMultipleFields = function(params){
	var _this = $.ddMM.mm_ddMultipleFields;
	
	//Обрабатываем параметры
	params = $.extend(
		{},
		_this.defaults,
		params || {}
	);
	
	params.minRowsNumber = parseInt(
		params.minRowsNumber,
		10
	);
	params.maxRowsNumber = parseInt(
		params.maxRowsNumber,
		10
	);
	
	return $(this).each(function(){
		//Attach new load event
		$(this)
			.on(
				'load.ddEvents',
				function(event){
					//Оригинальное поле
					var
						$this = $(this),
						//id оригинального поля
						id = $this.attr('id')
					;
					
					//Проверим на существование (возникали какие-то непонятные варианты, при которых два раза вызов был)
					if (!_this.instances[id]){
						//Скрываем оригинальное поле
						$this
							.removeClass('imageField')
							.off('.mm_widget_showimagetvs')
							.addClass('originalField')
							.hide()
						;
						
						//Назначаем обработчик события при изменении (необходимо для того, чтобы после загрузки фотки адрес вставлялся в нужное место)
						$this.on(
							'change.ddEvents',
							function(){
								//Обновляем текущее мульти-поле
								_this.updateField({
									instanceId: $this.attr('id')
								});
							}
						);
						
						//Если это файл или изображение, cкрываем оригинальную кнопку
						$this
							.next('input[type=button]')
							.hide()
						;
						
						//Создаём мульти-поле
						_this.init(
							$.extend(
								{
									id: id,
									value: $this.val(),
									$parent: $this.parent(),
									$originalField: $this
								},
								params
							)
						);
					}
				}
			)
			.trigger('load')
		;
	});
};

//On document.ready
$(function(){
	if (typeof(SetUrl) == 'undefined'){
		lastImageCtrl = '';
		lastFileCtrl = '';
		
		OpenServerBrowser = function(
			url,
			width,
			height
		){
			var
				iLeft =
					(screen.width - width) /
					2
				,
				iTop =
					(screen.height - height) /
					2
				,
				sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes';
			;
			
			sOptions += ',width=' + width;
			sOptions += ',height=' + height;
			sOptions += ',left=' + iLeft;
			sOptions += ',top=' + iTop;
			
			window.open(
				url,
				'FCKBrowseWindow',
				sOptions
			);
		};
		
		BrowseServer = function(ctrl){
			lastImageCtrl = ctrl;
			
			var
				w = screen.width * 0.5,
				h = screen.height * 0.5
			;
			
			OpenServerBrowser(
				$.ddMM.urls.manager + 'media/browser/mcpuk/browser.php?Type=images',
				w,
				h
			);
		};
		
		BrowseFileServer = function(ctrl){
			lastFileCtrl = ctrl;
			
			var
				w = screen.width * 0.5,
				h = screen.height * 0.5
			;
			
			OpenServerBrowser(
				$.ddMM.urls.manager + 'media/browser/mcpuk/browser.php?Type=files',
				w,
				h
			);
		};
		
		SetUrlChange = function(el){
			if ('createEvent' in document){
				var evt = document.createEvent('HTMLEvents');
				
				evt.initEvent(
					'change',
					false,
					true
				);
				el.dispatchEvent(evt);
			}else{
				el.fireEvent('onchange');
			}
		};
		
		SetUrl = function(
			url,
			width,
			height,
			alt
		){
			if(lastFileCtrl){
				var c = document.getElementById(lastFileCtrl);
				
				if(
					c &&
					c.value != url
				){
					c.value = url;
					SetUrlChange(c);
				}
				
				lastFileCtrl = '';
			}else if(lastImageCtrl){
				var c = document.getElementById(lastImageCtrl);
				
				if(
					c &&
					c.value != url
				){
					c.value = url;
					SetUrlChange(c);
				}
				
				lastImageCtrl = '';
			}else{
				return;
			}
		};
	}else{
		//For old MODX versions
		if (typeof(SetUrlChange) == 'undefined'){
			//Copy the existing Image browser SetUrl function
			var oldSetUrl = SetUrl;
			
			//Redefine it to also tell the preview to update
			SetUrl = function(
				url,
				width,
				height,
				alt
			){
				var $field = $();
				
				if(lastFileCtrl){
					$field = $(document.mutate[lastFileCtrl]);
				}else if(lastImageCtrl){
					$field = $(document.mutate[lastImageCtrl]);
				}
				
				oldSetUrl(
					url,
					width,
					height,
					alt
				);
				
				$field.trigger('change');
			};
		}
	}
	
	//Сабмит главной формы
	$.ddMM.$mutate.on(
		'submit',
		function(){
			$.each(
				$.ddMM.mm_ddMultipleFields.instances,
				function(key){
					$.ddMM.mm_ddMultipleFields.updateTv({instanceId: key});
				}
			);
		}
	);
});
})(jQuery);