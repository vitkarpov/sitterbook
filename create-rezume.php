<?php
//Подключаем функции и сессии
include_once "libs/start.php";
?>

<!DOCTYPE html>
<html>
<head>

	<title>Создание резюме - SitterBook</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width">

	<?php
	// Немного PHP, определим что агент содержит слово iPhone и все
	if (strpos($_SERVER['HTTP_USER_AGENT'],"iPhone")) { ?>

	<!-- Важный метатэг для портативных устройств на Safari, убирает пинч-зум, который используется при открытии любого сайта не под iPhone -->
	<meta name="viewport" content="width=1150">
	<link rel="stylesheet" href="css/iphone.css">

	<?php } ?>

	<!-- CSS -->
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
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
			<div class="create-rezume">
				<div class="wrap">
					<h1>Создание резюме</h1>

					<!-- Начало формы -->
					<form action="#" method="POST">
						<!-- Возможное место работы -->
						<div class="work-map">
							<p class="title-border">Возможное место работы</p>

							<div class="select-city">
								<p class="mb">Выберите город\а, где вы готовы работать:</p>

								<select class="fetched-cities-invisible"></select>

								<div class="wrap-sel">
									<div class="sel seld-title">
										<select name="city" class="city">
											<option disabled="disabled" selected="selected">-- Выберите город --</option>
											<!-- Вывод списка городов -->
											<?php //include_once "act/fetch_select_cities.php"; ?>
										</select>
									</div>

									<!--Подгружаем сюда карты/округа/районы города-->
									<div class="ajax-form">
										
									</div>

									<div class="clear"></div>
								</div>

								<div class="clear"></div>

								<!--Добавить город-->
								<span class="add-city">+ Добавить город</span>
							</div>
						</div>

						<!-- О себе -->
						<div class="o-sebe">
							<p class="title-border">О себе</p>

							<div class="textarea">
								<textarea class="blured" placeholder="Расскажите о себе, о своем опыте и умениях, применяемых при работе няней, поделитесь почему и как вы решили стать няней, почему вы любите свою работу и так далее.."></textarea>

								<div class="counter-textarea">
									<p class="bolshe">100</p>
									<p><span>Минимальная 100 символов<br>
									Макс 950 символов</span></p>
								</div>
							</div>

							<div class="two-block two-block2">
								<div class="inp-rad">
									<p class="title">Пол</p>

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

								<!-- Календарь -->
								<div class="birthday">
									<p class="title">Дата рождения:</p>
									<input type="text" name="birthday" id="datepicker" class="blured cal" placeholder="-- Выберите дату --" value=""/>
								</div>
							</div>

							<div class="two-block">
								<div class="sel">
									<p class="title">Гражданство</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любое</option>
											<option>Белоруссия</option>
											<option>Украина</option>
											<option>Россия</option>
										</select>
									</div>
								</div>
							</div>

							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Наличие водительских прав</p>

									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="prava" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="prava" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>

								<div class="inp-rad">
									<p class="title">Наличие своего автотранспорта</p>

									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="auto" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="auto" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>

							<div class="two-block">
								<div class="sel child">
									<p class="title">Комфортное кол-во детей для ухода:</p>

									<div class="styled-select">
										<select name="child">
											<option>Любое</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
							</div>

							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Аллергия и стресс к домашним животным</p>

									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="animal" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="animal" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>

								<div class="inp-rad">
									<p class="title">Отношение к курению</p>

									<div class="radio w42">
										<label>
											<input class="ch" type="radio" name="smoking" value="yes">
											<span></span>
										</label>
										<span class="lab">Курю</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="smoking" value="no">
											<span></span>
										</label>
										<span class="lab">Не курю</span>
									</div>
								</div>
							</div>

							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Возможен переезд</p>

									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="pereezd" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="pereezd" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>

							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Готовность помогать родителю<br>в выполнении отдельно и дополнительно<br>
									оговариваемых домашних делах:</p>

									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="homework" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="homework" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>

								<div class="inp-rad">
									<p class="title">Готовность ухаживать за детьми,<br>которым требуется особый уход<br>
									по медицинским и/или иным показаниям:</p>

									<div class="radio w42">
										<label>
											<input class="ch" type="radio" name="childs" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>

									<div class="radio">
										<label>
											<input class="ch" type="radio" name="childs" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>

							<div class="video">
								<p class="title">Видеорезюме</p>

								<div class="you">
									<input type="text" name="video" placeholder="http://youtube.com/watch?v=">
									<button>ОК</button>
								</div>

								<span>Добавьте ссылкку на ваше видеорезюме размещенное на сайте YouTube или RuTube</span>
							</div>
						</div>

						<!-- Образование -->
						<div class="education">
							<p class="title-border">Образование</p>

							<div class="course">
								<p class="title">Курсы, повышение квалификации</p>

								<div class="inputs">
									<input class="blured" type="text" name="cur" placeholder="Название"> 
									<input class="year blured" type="text" name="year" placeholder="Год окончания">
								</div>

								<span class="add-course">+ Указать еще одно повышение квалификации или курсы</span>
							</div>

							<div class="two-block">
								<div class="sel">
									<p class="title">Знание языков</p>

									<div class="styled-select">
										<select name="grajd">
											<option>-- Выбрите язык --</option>
											<option>Русский</option>
											<option>Английский</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<!-- Опыт работы -->
						<div class="work-stage">
							<p class="title-border">Опыт работы</p>

							<div class="two-block">
								<div class="sel">
									<p class="title">Опыт работы</p>

									<div class="styled-select">
										<select name="grajd">
											<option>-- Выберите ваш опыт работы --</option>
											<option>1 год</option>
											<option>2 года</option>
										</select>
									</div>
								</div>
							</div>

							<div class="checking-box">
								<p class="title">Опыт ухода за детьми возрастных групп:</p>

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
										от 4 до 6 лет
									</span>
								</div>

								<div class="checkbox">
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
										от 1 года до 3 лет
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
							</div>
						</div>

						<!-- График -->
						<div class="graph">
							<p class="title-border">График работы</p>

							<div class="checking-box">
								<p class="title">Предпочитаемый режим работы:</p>

								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										постоянный<br>
										(от 2 до 6 часов в день)
									</span>
								</div>

								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										разовый выход
									</span>
								</div>

								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										без проживания
									</span>
								</div>

								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										постоянный<br>
										(от 6 часов в день)
									</span>
								</div>

								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										с проживанием
									</span>
								</div>
							</div>

							<div class="inp-rad">
								<p class="title">Готовность приступить в кратчайшие сроки:</p>

								<div class="radio w42">
									<label>
										<input class="ch" type="radio" name="childs" value="yes">
										<span></span>
									</label>
									<span class="lab">Да</span>
								</div>

								<div class="radio">
									<label>
										<input class="ch" type="radio" name="childs" value="no">
										<span></span>
									</label>
									<span class="lab">Нет</span>
								</div>
							</div>
						</div>

						<!-- Фотографии -->
						<div class="photograph">
							<p class="title-border">Фотографии</p>

							<div class="clear"></div>

							<div class="icons">
								<div id="cropContainerOutput">
									
								</div>

								<!-- <div class="img" >
									<img src="img/avass.png" alt="">
									<div class="del">
										<a href="#">Удалить Х</a>
									</div>
								</div> -->

								<!-- <a href="#">
									<img src="img/add-photos.png" alt="">
								</a> -->
							</div>

							<div class="info" id="nota">
								<p>Добавление фото увеличивает ваши шансы,<br>что родитель выберет вас</p>
								<p>
									<span>Формат: jpg, gif, png.</span>
									<span>Максимальный размер файла 2Mb.</span>
								</p>
							</div>
						</div>

						<!-- Рекомендации от родителей -->
						<div class="recommend">
							<p class="title-border">Рекомендации от родителей</p>

							<div class="inputs">
								<p class="title">Напишите контакты родителей у которых вы работали няней:</p>

								<div class="three-inp">
									<input class="named blured" type="text" name="name" placeholder="Валентина Якубович">
									<input class="phones blured" type="text" name="phone" placeholder="+7 (903) 568-48-33">
									<input class="mail blured" type="text" name="mail" placeholder="valakub@ya.ru">
								</div>

								<span class="add-recommend"	href="#">+ Добавить еще одну</span>
							</div>
						</div>

						<!-- Контакты -->
						<div class="contacts">
							<p class="title-border">Контакты</p>

							<div class="two-block">
								<div class="in">
									<p class="title">Телефон:</p>
									<input class="blured" type="text" name="phone" placeholder="+7 (495) 123 45 67">
								</div>

								<div class="in">
									<p class="title">Дополнительный email:</p>
									<input class="blured" type="text" name="mail" placeholder="Email">
								</div>
							</div>
						</div>

						<!-- Пожелания по зарплате -->
						<div class="zarplata">
							<p class="title-border">Пожелания по зарплате</p>

							<div class="two-block">
								<div class="in">
									<p class="title">Зарплата, руб.:</p>
									<input class="blured" type="text" name="pay" placeholder="от 200">
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

						<!-- Кнопки сохранения и отмены -->
						<div class="buttons">
							<button type="submit" name="" class="save" value="Cохранить">Сохранить</button>
							<a class="cancel" href="#">Отменять не сохраняя</a>
						</div>
					</form> <!-- end form -->
				</div> <!-- end .wrap -->
			</div> <!-- end .create-rezume -->
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
	<script src="js/custom-scripts.js"></script>

</body>
</html>