<?php
//Подключаем функции и сессии
include_once "libs/start.php";
?>

<!DOCTYPE html>
<html>
<head>

	<title>Создание вакансии - SitterBook</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width">

	<?php
	// Немного PHP, определим что агент содержит слово iPhone и все
	if (strpos($_SERVER['HTTP_USER_AGENT'],"iPhone")){ ?>

	<!-- Важный метатэг для портативных устройств на Safari, убирает пинч-зум, который используется при открытии любого сайта не под iPhone -->
	<meta name="viewport" content="width=1150">
	<link rel="stylesheet" href="css/iphone.css">

	<?php } ?>

	<!-- CSS -->
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/jquery-ui.custom.css">
	<link rel="stylesheet" href="css/croppic.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/mobile-style.css">

</head>



<body>

	<div id="container">
		<!-- Header -->
		<div class="header">
			<div class="wrap">
				<!-- Логотип -->
				<div class="logo">
					<a href="#">
						<img src="img/logo.png" alt="">
					</a>
				</div>

				<!-- Блок регистрации -->
				<div class="registration">
					<div class="success-auth">
						<a href="#">Папа римский</a>
					</div>
				</div>

				<!-- Главное меню -->
				<div class="header-menu">
					<nav>
						<ul>
							<li>
								<a href="#">Няни</a>
							</li>
							<li>
								<a href="#">Вакансии</a>
							</li>
							<li>
								<a href="#">Рекомендации</a>
							</li>
						</ul>
					</nav>
				</div>
			</div> <!-- end .wrap -->
		</div> <!-- end .header -->

		<!-- Контент -->
		<div class="content">
			<div class="create-vacansy">
				<div class="wrap">
					<div class="dva">
						<p>Поля отмеченные * обязательны для заполнения</p>
						<h1>Создание вакансии</h1>

						<!-- Начало формы -->
						<form action="" method="" id="">
							<!-- Место работы -->
							<div class="work-map">
								<p class="title-border">Место работы</p>

								<div class="wrap-sel">
									<div class="select-city">
										<p class="mb">Город: <span>*</span></p>

										<div class="create-mb">
											<!-- <p class="mb">Город: <span>*</span></p> -->

											<div class="sel seld-title">
												<select name="city" class="city" id="parent-city" onchange="fetch_select_counties(this.value)">
													<option disabled="disabled" selected="selected">-- Выберите город --</option>
													<!-- Вывод списка городов -->
													<div class="all-city">
														<?php include_once "act/fetch_select_cities.php"; ?>
													</div>
												</select>

												<div class="clear"></div>
											</div>

											<div class="clear"></div>
										</div>
									</div>

									<!--Подгружаем сюда карты/округа/районы города-->
									<div id="ajax-form"></div>

									<div class="clear"></div>
								</div>

								<div class="clear"></div>
							</div>

							<!-- О вакансии -->
							<div class="o-sebe">
								<p class="title-border">О вакансии</p>

								<div class="main-face">
									<p class="title">Контактное лицо: <span>*</span></p>
									<input class="blured" type="text" value="Виктория Сикрет" name="face">
								</div>

								<div class="textarea">
									<p class="title">Описание вакансии:</p>

									<textarea class="blured" placeholder="Опишите, что вам нужно в нескольких словах, например: 'Необходима няня, чтобы встречать ребенка из школы и быть с ним до возвращения родителя с работы.'"></textarea>

									<div class="counter-textarea">
										<p class="bolshe">100</p>

										<p>
											<span>
												Минимальная 100 символов<br>
												Макс 950 символов
											</span>
										</p>
									</div>
								</div>

								<div class="two-block">
									<div class="sel sel2">
										<p class="title">Кол-во детей для ухода: <span>*</span></p>

										<div class="styled-select">
											<select name="grajd">
												<option>Любое</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>
									</div>
								</div>

								<div class="checking-box">
									<p class="title">Уход за детьми возраста: <span>*</span></p>

									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">до 1 года</span>
									</div>

									<div class="checkbox w185">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">от 4 до 6 лет</span>
									</div>

									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">от 10 лет и старше</span>
									</div>

									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">от 1 года до 3 лет</span>
									</div>

									<div class="checkbox w185">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">от 7 до 10 лет</span>
									</div>
								</div>

								<div class="graph">
									<div class="checking-box">
										<p class="title">Режим работы: <span>*</span></p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">постоянный<br>(от 2 до 6 часов в день)</span>
										</div>

										<div class="checkbox w185">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">разовый выход</span>
										</div>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">без проживания</span>
										</div>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">постоянный<br>(от 6 часов в день)</span>
										</div>

										<div class="checkbox w185">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">с проживанием</span>
										</div>
									</div>
								</div>

								<div class="zarplata">
									<div class="two-block">
										<p class="title">Стоимость оказания услуги, руб.: <span>*</span></p>

										<div class="in">
											<input class="blured" type="text" name="pay" value="200">
										</div>

										<div class="inp-rad">
											<div class="radio">
												<label>
													<input class="ch" type="radio" name="pay" value="chas">
													<span></span>
												</label>
												<span class="lab">в час</span>
											</div>

											<div class="radio">
												<label>
													<input class="ch" type="radio" name="pay" value="month">
													<span></span>
												</label>
												<span class="lab">в месяц</span>
											</div>

											<div class="radio">
												<label>
													<input class="ch" type="radio" name="pay" value="dogovor">
													<span></span>
												</label>
												<span class="lab">по договоренности</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Требования -->
							<div class="trebovania">
								<p class="title-border">Требования</p>

								<div class="two-block two-block2">
									<div class="inp-rad">
										<p class="title">Пол</p>

										<div class="radio">
											<label>
												<input class="ch" type="radio" name="test" value="all">
												<span></span>
											</label>
											<span class="lab">Любой</span>
										</div>

										<div class="radio">
											<label>
												<input class="ch" type="radio" name="test" value="female">
												<span></span>
											</label>
											<span class="lab">Жен</span>
										</div>

										<div class="radio">
											<label>
												<input class="ch" type="radio" name="test" value="male">
												<span></span>
											</label>
											<span class="lab">Муж</span>
										</div>
									</div>

									<div class="checking-box">
										<p class="title">Отношение к курению:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												Не курящая/-ий
											</span>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div id="options">
										<p>Возраст</p>

										<label class="m-l" for="year">от:
											<input type="text" name="price" id="year3">
										</label>

										<label for="price2">до:
											<input type="text" name="year2" id="year4">
										</label>

										<div id="slider_price3"></div>
									</div>

									<div class="sel">
										<p class="title">Опыт работы:</p>

										<div class="styled-select">
											<select name="grajd">
												<option>Любой</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div class="sel sel2">
										<p class="title">Гражданство:</p>

										<div class="styled-select">
											<select name="grajd">
												<option>Любое</option>
											</select>
										</div>
									</div>

									<div class="checking-box">
										<p class="title">Опыт работы с детьми возраста:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												до 1 года
											</span>
										</div>

										<div class="checkbox w185">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												от 7 до 10 лет
											</span>
										</div>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												от 1 года до 3 лет
											</span>
										</div>

										<div class="checkbox w185">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												от 10 лет и старше
											</span>
										</div>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes">
												<span></span>
											</label>
											<span class="lab">
												от 4 до 6 лет
											</span>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div class="sel sel3">
										<p class="title">Знание языков:</p>

										<div class="styled-select">
											<select name="grajd">
												<option>Любых</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<!-- Дополнительные требования -->
							<div class="dop-treb">
								<p class="title-border">Дополнительные требования</p>
								<p class="chh">Отметьте если данные критерии являются принципиальными для вас</p>

								<div class="two-block">
									<div class="checking-box">
										<p class="title">Наличие водительских прав:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>

									<div class="checking-box">
										<p class="title">Наличие своего автотранспорта:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div class="checking-box">
										<p class="title">Готовность ухаживать за детьми,<br>которым требуется особый уход<br> по медицинским и/или иным показаниям:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>

									<div class="checking-box">
										<p class="title">Готовность помогать родителю<br>в выполнении отдельно и дополнительно<br>оговариваемых домашних делах</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div class="checking-box">
										<p class="title">Отсутствие стресса и аллерги<br>к домашним животным:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>

									<div class="checking-box">
										<p class="title">Работа за рубежом:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>
								</div>

								<div class="two-block">
									<div class="checking-box">
										<p class="title">Готовность приступить в кратчайшие сроки:</p>

										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" value="yes" name="test">
												<span></span>
											</label>
											<span class="lab">Да</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Фотографии -->
							<div class="photograph">
								<p class="title-border">Фотографии</p>

								<div class="clear"></div>

								<div class="icons">
									<div class="img">
										<img src="img/avass.png" alt="">
										<div class="del">
											<a href="#">Удалить Х</a>
										</div>
									</div>

									<a href="#">
										<img src="img/add-photos.png" alt="">
									</a>
								</div>

								<div class="info" id="nota">
									<p>
										Добавление фото увеличивает ваши шансы,<br>
										что родитель выберет вас
									</p>

									<p>
										<span>Формат: jpg, gif, png.</span>
										<span>Максимальный размер файла 2Mb.</span>
									</p>
								</div>

								<div class="clear"></div>
							</div>

							<!-- Контакты -->
							<div class="contacts">
								<p class="title-border">Контакты</p>

								<div class="two-block">
									<div class="in">
										<p class="title">Телефон: <span>*</span></p>
										<input class="blured" type="text" name="phone" value="+7 (495) 123 45 67">
									</div>
								</div>
							</div>

							<!-- Кнопки сохранения и отмены -->
							<div class="buttons">
								<a class="save" href="#">Сохранить</a>
								<a class="cancel" href="#">Отменить не сохраняя</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- end .content -->

		<!-- Footer -->
		<div class="footer">
			<div class="wrap wrap2">
				<!-- Меню в футере и копирайт -->
				<div class="footer-menu">
					<ul>
						<li>
							<a href="#">Миссия нашего сайта</a>
						</li>
						<li>
							<a href="#">Публичная оферта и правовая информация</a>
						</li>
						<li>
							<a href="#">Как пользоваться сайтом</a>
						</li>
						<li>
							<a href="#">Дополнительные услуги</a>
						</li>
						<li>
							<a href="#">Контакты</a>
						</li>
					</ul>

					<p class="copyright">&copy; 2014 ООО Ситтербук.ру, Bсе права защищены.</p>
				</div>

				<!-- Соц.сети -->
				<div class="social">
					<ul>
						<li>
							<a class="od" href="#"></a>
						</li>
						<li>
							<a class="vk" href="#"></a>
						</li>
						<li>
							<a class="fb" href="#"></a>
						</li>
					</ul>
				</div>
			</div>
		</div> <!-- end .footer -->

		<!-- Невидимо вставляем на страницу все карты городов -->
		<?php include_once 'act/load_all_maps_for_cities_on_main.php'; ?>

		<!-- Затенённая полупрозрачная маска для модального окна -->
		<div id="mask"></div>
	</div> <!-- end .content -->



	<!-- JS -->

	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/jquery-ui.min.js"></script>
	<script src="js/datepicker-ru-init.js"></script>
	<script src="js/vendor/croppic.js"></script>
	<script src="js/croppic-init.js"></script>
	<script src="js/vendor/raphael.js"></script>
	<script src="js/path.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/polz.js"></script>

	<!-- Подгрузка городов/округов/районов -->
	<script>
		function fetch_select(val) {
			$.ajax({
				type: 'post',
				url: 'act/vacansy-ajax2.php',
				data: {
					get_option: val
				},
				success: function (response) {
					document.getElementById("ajax-form").innerHTML = response;
					openModal();
				}
			});
		}
	</script>

	<script>
		var i = 2;

		$(document).on("click", ".auth a", function() {
			if (i % 2 == 0) {
				$(this).css({
					background: 'url(img/arrow-bottom-active.png) left center no-repeat'
				});
				$(".form-auth").css({
					display: 'block'
				});
				$(".auth").addClass("auth2");
			} else {
				$(this).css({
					background: 'url(img/arrow-bottom.png) left center no-repeat'
				});
				$(".form-auth").css({
					display: 'none'
				});
				$(".auth").removeClass("auth2");
			}

			i++;
		});

		var j = 2;

		$(document).on("click", ".favorites", function() {
			if (j % 2 == 0) {
				$(this).css({
					background: 'url(img/heart.png) left center no-repeat'
				});
				$(this).html("В избранном");
			} else {
				$(this).css({
					background: 'url(img/heart2.png) left center no-repeat'
				});
				$(this).html("Добавить в избранное");
			}

			j++;
		});

		var k = 2;

		$(document).on("click", ".button p a", function() {
			if (k % 2 == 0) {
				$(".dop").css({
					display: "block"
				});
				$(this).html("Скрыть дополнительные фильтры");
			} else {
				$(".dop").css({
					display: "none"
				});
				$(this).html("Показать все фильтры");
			}

			k++;
		});

		$(document).on("click", ".info-field a", function() {
			$(this).css({
				display: "none"
			});

			$(".inp").css({
				display: "block"
			});
		});

		$(document).on("click", ".mess .ch", function() {
			if($(this).prop('checked')) {
				$(this).parent().parent().parent().addClass("bg");
			} else {
				$(this).parent().parent().parent().removeClass("bg");
			}
		});

		$(document).on("click", ".add-course", function() {
			$(".course .add-course").before("<div class='inputs'><input class='blured' type='text' name='cur' value=''><input class='year blured' type='text' name='year' value=''><div class='remove'></div></div>");
		});

		$(document).on("click", ".course .inputs .remove", function() {
			$(this).parent().remove();
		});

		$(document).on("click", ".add-recommend", function() {
			$(".recommend .add-recommend").before("<div class='three-inp'><input class='named blured' type='text' name='name' value=''><input class='phones blured' type='text' name='phone' value=''><input class='mail blured' type='text' name='mail' value=''><div class='remove'></div></div>");
		});
		
		$(document).on("click", ".recommend .three-inp .remove", function() {
			$(this).parent().remove();
		});

		$(document).on("click", ".select-city .sel", function() {
			$(".all-city", this).css({
				display: "block"
			});
		});

		$(document).on("click", ".cal", function() {
			$(".calendar").toggleClass("open");
		});
	</script>

</body>
</html>