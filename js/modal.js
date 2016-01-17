// Открытие модального окна с картой округов по нажатию на
// "Выбрать округа и районы на карте" на главной
function openModal() {
	// Кликаем по ссылке с нужным атрибутом 
	$('a[name="modal"]').click(function(e) {
		e.preventDefault();

		// Куда мы кликнули? На то, что попадет в id, а там #dialog1 или
		// другая цифра, в зависимости от выбранной карты
		var id = $(this).attr('href');

		// Показываем с анимацией модальное окно с нужной картой
		$(id).show('fast');

		// Получаем размеры затеннённой области модального окна
		var maskHeight = $(document).height(),
				maskWidth = $(window).width();

		// Получаем размеры маски модального окна 
		$('#mask').css({
			'width':maskWidth,
			'height':maskHeight
		});
		// и плавно его показываем
		$('#mask').fadeIn(1000);
		$('#mask').fadeTo("slow", 0.8);

		// Вычисляем размеры окна
		var winH = $(window).height(),
				winW = $(window).width();

		// Плавно показываем то, на что ссылается id
		$(id).fadeIn(2000);

		// На крестик вешаем закрытие модального окна
		$('.dialog .close').click(function (e) {
			e.preventDefault();
			$('#mask, .dialog').hide();
		});

		// На кнопку ОК также вешаем закрытие модального окна
		$('.dialog .do-close').click(function (e) {
			e.preventDefault();
			$('#mask, .dialog').hide();
		});

		// И на саму маску также вешаем закрытие модального окна
		$('#mask').click(function () {
			$(this).hide();
			$('.dialog').hide();
		});

		// Берем содержимое id и убираем решетку со всеми буквами идущими до цифр.
		// Перед цифрами, взятыми из запоминающей группы подставляем слово map.
		// В итоге получаем что-то вроде map1, map2 и так далее в зависимости
		// от того, на какую карту мы кликнули.
		// Все потому, что на кнопку, открывающую модальное окно,
		// мы изначально вешаем href со с цифрой карты, который генеруется
		// в зависмости от выбранного в дропбоксе города.
		var map = id.replace(/#[^\d]+(\d+)$/, 'map$1');

		// Проверяем не равен ли null указанный map
		if ($('#' + map).get(0).firstChild == null) {
			// Если равен, то запускаем функцию addModal,
			// которая рисует карты
			$(function addModal() {
				// Здесь инициализируется raphael.js и создается канва для рисования.
				// Первым параметром передаем то, что хотим сделать канвой,
				// далее ширина и высота.
				var r = Raphael(map, 700, 850),
						// А здесь лежат атрибуты линий для рисования SVG-карт 
						attributes = {
							fill: '#e6e7e8',
							stroke: '#b5b5b5',
							'stroke-width': 1,
							'stroke-linejoin': 'round',
							'class': 'map-not-checked',
						},

						// Пока пустой массив
						arr = new Array(),

						// Здесь лежит ссылка на список районов в модальном окне
						table = $('.' + map);

				// Перебираем города России, определенные в виде объекта russia в path.js;
				// используем в качестве индекса map для выбора карты нужного города
				for (var country in russia[map]) {
					// Берем path карты выбранного района, Raphael-фунцией path() рисуем её,
					// складывая затем в переменную obj4
					var obj4 = r.path(russia[map][country].path);

					// Raphael-объекту obj4 зададим атрибуты для рисования
					obj4.attr(attributes);
					obj4.attr('id', obj4.id);

					// Элементом массива запишем округ
					arr[obj4.id] = country;

					// Шаблон для разметки очередного пункта района в списке слева 
					var newRow = '<div class="parent-check">' +
													'<p>' +
														'<label class="label-wraper">' +
															'<input type="checkbox" name="check" id="'+ obj4.id + '" value="' + russia[map][country].name + '">' +
															'<span class="checkbox_box"></span>' +
															'<span class="lab">' +
																russia[map][country].name +
															'</span>' +
														'</label>' +
													'</p>' +
												'</div>';

					// Цепляем очередной пункт к списку районов слева
					table.append(newRow);

					// Вешаем hover на каждый район, чтобы он подсвечивался при
					// наведении курсора
					// obj4.hover(function() {
					// 	// Меняем цвет
					// 	this.animate({
					// 		fill: '#2495dd',
					// 		stroke: '#ffffff',
					// 	}, 300);
					// }, function() {
					// 	// Возвращаем цвета на исходное
					// 	this.animate({
					// 		fill: attributes.fill,
					// 		stroke: attributes.stroke
					// 	}, 300);
					// });

					obj4.click(function() {
						if (this.attr('class') == 'map-not-checked') {
							// Добавляем класс
							this.attr({'class': 'map-checked'});
							// Меняем цвет
							this.animate({
								fill: '#2495dd',
								stroke: '#ffffff',
							}, 300);
						} else {
							// Удаляем класс
							this.attr({'class': 'map-not-checked'});
							// Возвращаем цвета на исходное
							this.animate({
								fill: attributes.fill,
								stroke: attributes.stroke
							}, 300);
						};
					});

					// Вешаем click на каждый район чтобы при щелчке ЛКМ чекались
					// чекбоксы соответствующих районов слева
					obj4.click( function() {
						// Меняем хэш на новый округ на котором был произведен очередной клик
						document.location.hash = arr[this.id];

						// Получаем размер габаритного контейнера карты по которой мы кликнули
						var point = this.getBBox(0);
						// Выбираем контейнер с текущей картой, берем следующий за ней
						// div.point с подсказкой о том, что можно выбрать округа в данном
						// районе и удаляем его
						$('#' + map).next('.point').remove();
						// Вставляем еще один пока пустой div.point
						$('#' + map).after($('<div></div>').addClass('point'));

						// Если это map1 (Москва), то подсказка появляется со ссылкой;
						// с её помощью можно выбрать районы в данном округе
						if (map === "map1") {
							$('.point')
								// Вставляем разметку внутрь div.point
								.html('<div>' +
												'<p>' +
													'<a name="premodal" href=#' + russia[map][arr[this.id]].url + '>' +
														'Выберите районы<br> в данном округе' +
													'</a>' +
												'</p>' +
											'</div>')
								// Задаем координаты для подсказки
								.css({
									left: point.x + (point.width) + 70,
									top: point.y + (point.height / 2) + 50
								})
								// И плавно показываем
								.fadeIn();
						// Иначе если не Москва..
						} else {
							$('.point')
								// .. просто выводим название округа
								.html('<p>' + russia[map][arr[this.id]].name + '</p>')
								// Предваряем текст изображением с подсказкой-фоном
								.prepend($('<img>').attr('src', 'img/'+arr[this.id]+'.png'))
								// Задаем координаты для подсказки
								.css({
									left: point.x + (point.width) + 215,
									top: point.y + (point.height / 2) + 10
								})
								// И плавно показываем
								.fadeIn();
						}

						// Берем соответствующий карте, по которой был
						// произведен клик, input-чекбокс по id
						var checkbox = table.find('#' + this.id),
								// Проверяем, чекнут ли чекбокс и берем булево значение
								isChecked = checkbox.prop('checked');

						// Присваиваем чекбоксу инвертированное значение,
						// чтобы переключить состояние на противоположное
						checkbox.prop('checked', !isChecked);
					});
				}
			});
		}

		// При клике на округ слева чекается соответствующая карта
		$('.checkbox_box').on('click', function() {
			var mapId = $(this).prev().attr('id');

			$('path[id="' + mapId + '"]').click();
		})
	})
}


// ===========================================================
// Открытие модального окна с картой районов по нажатию на
// "Выберите районы в данном округе" в модальном окне округов.
// Вешаем обработчик на клик.
$(document).on("click", 'a[name=premodal]', function() {
	var id = $(this).attr('href'),
			dialog = id.replace(/#[^\d]+(\d+)$/, '#dialog$1'),
			map = id.replace(/#[^\d]+(\d+)$/, 'map$1'),
			maskHeight = $(document).height(),
			maskWidth = $(window).width();

	// Задаем размеры маски
	$('#mask').css({
		'width':maskWidth,
		'height':maskHeight
	});
	// И показываем её
	$('#mask').fadeIn(1000);
	$('#mask').fadeTo("slow",0.8);

	// Складываем размеры окна
	var winH = $(window).height(),
			winW = $(window).width();

	// Показываем модальное окно
	$(dialog).show('fast');
	$(dialog).css('top', winH/2-$(id).height()/2);
	$(dialog).fadeIn(2000);

	if ($('#' + map).get(0).firstChild == null) {
		$(function addModal() {
			// Здесь инициализируется raphael.js и создается канва для рисования.
			// Первым параметром передаем то, что хотим сделать канвой,
			// далее ширина и высота.
			var r = Raphael(map, 700, 850),
					// А здесь лежат атрибуты линий для рисования SVG-карт 
					attributes = {
						fill: '#e6e7e8',
						stroke: '#b5b5b5',
						'stroke-width': 1,
						'stroke-linejoin': 'round'
					},

					// Пока пустой массив
					arr = new Array(),

					// Здесь лежит ссылка на список районов в модальном окне
					table = $('.' + map);

			// Перебираем города России, определенные в виде объекта russia в path.js;
			// используем в качестве индекса map для выбора карты нужного города
			for (var country in russia[map]) {
				// Берем path карты выбранного района, Raphael-фунцией path() рисуем её,
				// складывая затем в переменную obj4
				var obj4 = r.path(russia[map][country].path);

				// Raphael-объекту obj4 зададим атрибуты для рисования
				obj4.attr(attributes);

				// Элементом массива запишем округ
				arr[obj4.id] = country;

				// Шаблон для разметки очередного пункта района в списке слева
				var newRow = '<div class="parent-check">' +
												'<p>' +
													'<label class="label-wraper">' +
														'<input type="checkbox" name="check" id="'+ obj4.id + '" value="' + russia[map][country].name + '">' +
														'<span class="checkbox_box"></span>' +
														'<span class="lab">' +
															russia[map][country].name +
														'</span>' +
													'</label>' +
												'</p>' +
											'</div>';

				// Цепляем очередной пункт к списку районов слева
				table.append(newRow);

				// Вешаем hover на каждый район, чтобы он подсвечивался при
				// наведении курсора
				obj4.hover(function() {
					// Меняем цвет
					this.animate({
						fill: '#2495dd',
						stroke: '#ffffff'
					}, 300);
				}, function() {
					// Возвращаем цвета на исходное
					this.animate({
						fill: attributes.fill,
						stroke: attributes.stroke
					}, 300);
				});

				// Вешаем click на каждый район чтобы при щелчке ЛКМ чекались
				// чекбоксы соответствующих районов слева
				obj4.click( function() {
					// Меняем хэш на новый округ на котором был произведен очередной клик
					document.location.hash = arr[this.id];

					// Получаем размер габаритного контейнера карты по которой мы кликнули
					var point = this.getBBox(0);
					// Выбираем контейнер с текущей картой, берем следующий за ней
					// div.point с подсказкой о том, что можно выбрать округа в данном
					// районе и удаляем его
					$('#'+map).next('.point').remove();
					// Вставляем еще один пока пустой div.point
					$('#'+map).after($('<div></div>').addClass('point'));

					// удаляем существующий div с классом point и создаём ещё один
					$('.point')
						// Выводим название округа
						.html('<p>' + russia[map][arr[this.id]].name + '</p>')
						// Предваряем текст изображением с подсказкой-фоном
						.prepend($('<img>').attr('src', 'images/region/test.svg'))
						// Задаем координаты для подсказки
						.css({
							left: point.x + (point.width) + 240,
							top: point.y + (point.height / 2) + 10
						})
						// И плавно показываем
						.fadeIn();

					// Берем соответствующий карте, по которой был
					// произведен клик, input-чекбокс по id
					var checkbox = table.find('#' + this.id),
							// Проверяем, чекнут ли чекбокс и берем булево значение
							isChecked = checkbox.prop('checked');

					// Присваиваем чекбоксу инвертированное значение,
					// чтобы переключить состояние на противоположное
					checkbox.prop('checked', !isChecked);
				});
			}
		});
	}
});





