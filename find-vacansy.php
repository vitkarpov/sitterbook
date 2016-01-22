<?php
//Подключаем функции и сессии
include_once "libs/start.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Поиск вакансий - SitterBook</title>

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
  <link rel="stylesheet" href="css/jquery-ui.custom.css">
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
          <a class="hov" href="#">Регистрация</a>
          <div class="auth">
            <a href="#">Войти</a>
            <div class="form-auth">
              <form name="myform" action="#" method="post">
                <input type="text" name="login" value="example@sitterbook.ru">
                <input type="password" name="pass" value="12345678">
                <input type="submit" name="send" value="Войти">
                <div class="checkbox">
                  <label>
                    <input class="ch" type="checkbox" checked="checked" value="yes" name="test">
                    <span></span>
                  </label>
                  <span class="lab">Запомнить меня</span>
                </div>
                <a class="for-pass" href="#">Забыли пароль?</a>
                <div class="clear"></div>
                <p class="soc">или для входа используйте</p>
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
              </form>
            </div>
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
      <div class="find-rezume-and-vacansy">
        <div class="wrap">
          <h1>Поиск вакансий</h1>

          <div class="form-rezume">
            <form name="myform" action="#" method="post" id="form-find-filters">
              <div class="work workadd">
                <p>Возможное место работы</p>

                <div><a class="addcity" href="#">+ Добавить город</a></div>               
              </div>
              <div id="options">
                <p>Возраст</p>
                <label class="m-l" for="year">от:
                  <input type="text" name="price" id="year">
                </label>
                
                <label for="price2">до:
                  <input type="text" name="year2" id="year2">
                </label>
                <div id="slider_price"></div>
              </div>
              <div class="sex">
                <p class="pol">Пол</p>
                <p>
                  <label><input type="radio" name="s" value="female"><span></span></label>
                  <span>Жен</span>
                </p>
                <p>
                  <label><input type="radio" name="s" value="male"><span></span></label>
                  <span>Муж</span>
                </p>
                <p class="last">
                  <label><input type="radio" name="s" value="all"><span></span></label>
                  <span>Любой</span>
                </p>
              </div>
              <div class="clear"></div>
              <div class="work">
                <p>Гражданство</p>
                <div class="styled-select styled-select2">
                  <select name="grajd">
                    <option>Любое</option>
                  </select>
                </div>
              </div>
              <div class="work">
                <p>Знание языков</p>
                <div class="styled-select styled-select2">
                  <select name="lang">
                    <option>Любых</option>
                  </select>
                </div>
              </div>
              <div id="options2">
                <p>Зарплата, руб.</p>
                <label class="m-l" for="price">от:
                  <input type="text" name="price" id="price">
                </label>
                
                <label for="price2">до:
                  <input type="text" name="price2" id="price2">
                </label>
                <div id="slider_price2"></div>
              </div>
              <div class="sex">
                <p>
                  <label><input type="radio" name="c" value="chas"><span></span></label>
                  <span>В час</span>
                </p>
                <p class="last">
                  <label><input type="radio" name="c" value="mes"><span></span></label>
                  <span>В месяц</span>
                </p>
              </div>
              <div class="clear"></div>
              <div class="work">
                <p>Режим работы</p>
                <div class="styled-select styled-select2">
                  <select name="rejim">
                    <option>Любой</option>
                  </select>
                </div>
              </div>
              <div class="work dop">
                <p>Опыт работы</p>
                <div class="styled-select styled-select2">
                  <select name="rejim">
                    <option>Любой</option>
                  </select>
                </div>
              </div>
              <div class="check dop">
                <p class="title">Опыт ухода за детьми возрастных групп</p>
                <p>
                  <label><input type="checkbox" name="check" value="1"><span></span></label>
                  <span>новорожденный - 3 месяца</span>
                </p>
                <p>
                  <label><input type="checkbox" name="check" value="2"><span></span></label>
                  <span>от 3 до 12 месяцев</span>
                </p>
                <p>
                  <label><input type="checkbox" name="check" value="3"><span></span></label>
                  <span>от 1 до 2 года</span>
                </p>
                <p>
                  <label><input type="checkbox" name="check" value="4"><span></span></label>
                  <span>от 2 до 5 лет</span>
                </p>
                <p>
                  <label><input type="checkbox" name="check" value="5"><span></span></label>
                  <span>от 5 до 10 лет</span>
                </p>
              </div>
              <div class="work dop">
                <p>Количество детей для ухода</p>
                <div class="styled-select styled-select2">
                  <select name="count">
                    <option>Любое</option>
                  </select>
                </div>
              </div>
              <div class="check dop">
                <p>
                  <label><input type="checkbox" name="check" value="6"><span></span></label>
                  <span>Готовность ухаживать за детьми, которые требуют особого ухода по медицинским и/или иным показателям</span>
                </p>
              </div>
              <div class="check bb">
                <p class="title">Дополнительные требования</p>
                <p class="dop">
                  <label><input type="checkbox" name="check" value="7"><span></span></label>
                  <span>Работа за рубежом</span>
                </p>
                <p class="dop">
                  <label><input type="checkbox" name="check" value="8"><span></span></label>
                  <span>Отсутствие аллергии и стресса к домашним животным</span>
                </p>
                <p class="dop">
                  <label><input type="checkbox" name="check" value="9"><span></span></label>
                  <span>Некурящий(ая)</span>
                </p>
                <p class="dop">
                  <label><input type="checkbox" name="check" value="10"><span></span></label>
                  <span>Наличие автотранспорта</span>
                </p>
                <p class="dop">
                  <label><input type="checkbox" name="check" value="11"><span></span></label>
                  <span>Готовность приступить к работе в кратчайшие сроки</span>
                </p>
                <p>
                  <label><input type="checkbox" name="check" value="12"><span></span></label>
                  <span>Скрыть в результатах поиска резюме агентств</span>
                </p>
              </div>
              <div class="button" data-b="toggle-filters-on-find">
                <input type="button" name="send" value="Применить">
                <p>
                  <a class="js-toggle-filters" href="#">
                    Показать все фильтры
                  </a>
                </p>
              </div>
            </form>
          </div>
          <div class="agent-rezume">
            <div class="rezume-block">
              <div class="block-img-right block-img-last">
                <div class="contacts-vacansy">
                  <p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
                  <a href="#">Няня-гувернантка к мальчику 5-ти лет</a>
                  <p class="info-contact info-contact-bold">Контактное лицо: <span>Ольга Александровна</span></p>
                </div>
                <div class="information">
                  <p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
                  <div class="experience">
                    <div class="left">
                      <p>Опыт работы няней: <span>– 6 лет</span></p>
                      <p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
                    </div>
                    <div class="right">
                      <p>Отношение к курению: <span>– не курю</span></p>
                      <p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
                    </div>  
                  </div>
                </div>
                <a class="works" name="modal" href="#dialog6"><span>Москва, м. Водный стадион, ул. Авангардная</span></a>
                <p class="price-vacansy">Стоимость оказания услуг: <span>250 - 400 руб / час</span></p>
                <p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
                <div class="buts">
                  <a class="buttons" href="#">Смотреть полностью</a>
                  <a class="favorites not-hearted" href="#" data-b="toggle-favorites">Добавить в избранное</a>
                </div>
              </div>
            </div>
            
            <div class="rezume-block">
              <div class="block-img-right block-img-last">
                <div class="contacts-vacansy">
                  <p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
                  <a href="#">Няня для мальчика 9-ти лет</a>
                  <p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
                </div>
                <div class="information">
                  <p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
                  <div class="experience">
                    <div class="left">
                      <p>Опыт работы няней: <span>– 6 лет</span></p>
                      <p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
                    </div>
                    <div class="right">
                      <p>Отношение к курению: <span>– не курю</span></p>
                      <p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
                    </div>  
                  </div>
                </div>
                <a class="works" name="modal" href="#dialog5"><span>Москва, Сходненская</span></a>
                <p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
                <p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
                <div class="buts">
                  <a class="buttons" href="#">Смотреть полностью</a>
                  <a class="favorites not-hearted" href="#" data-b="toggle-favorites">Добавить в избранное</a>
                </div>
              </div>
            </div>
            
            <div class="rezume-block">
              <div class="block-img-right block-img-last">
                <div class="contacts-vacansy">
                  <p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
                  <a href="#">Няня-гувернантка к мальчику 5-ти лет</a>
                  <p class="info-contact info-contact-bold">Контактное лицо: <span>Ольга Александровна</span></p>
                </div>
                <div class="information">
                  <p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
                  <div class="experience">
                    <div class="left">
                      <p>Опыт работы няней: <span>– 6 лет</span></p>
                      <p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
                    </div>
                    <div class="right">
                      <p>Отношение к курению: <span>– не курю</span></p>
                      <p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
                    </div>  
                  </div>
                </div>
                <a class="works" name="modal" href="#dialog5"><span>Москва, м. Водный стадион, ул. Авангардная</span></a>
                <p class="price-vacansy">Стоимость оказания услуг: <span>250 - 400 руб / час</span></p>
                <p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
                <div class="buts">
                  <a class="buttons" href="#">Смотреть полностью</a>
                  <a class="favorites not-hearted" href="#" data-b="toggle-favorites">Добавить в избранное</a>
                </div>
              </div>
            </div>
            
            <div class="rezume-block">
              <div class="block-img-right block-img-last">
                <div class="contacts-vacansy">
                  <p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
                  <a href="#">Няня для мальчика 9-ти лет</a>
                  <p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
                </div>
                <div class="information">
                  <p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
                  <div class="experience">
                    <div class="left">
                      <p>Опыт работы няней: <span>– 6 лет</span></p>
                      <p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
                    </div>
                    <div class="right">
                      <p>Отношение к курению: <span>– не курю</span></p>
                      <p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
                    </div>  
                  </div>
                </div>
                <a class="works" name="modal" href="#dialog5"><span>Москва, Сходненская</span></a>
                <p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
                <p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
                <div class="buts">
                  <a class="buttons" href="#">Смотреть полностью</a>
                  <a class="favorites not-hearted" href="#" data-b="toggle-favorites">Добавить в избранное</a>
                </div>
              </div>
            </div>    
            
            <div class="rezume-block">
              <div class="block-img-right block-img-last">
                <div class="contacts-vacansy">
                  <p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
                  <a href="#">Няня для мальчика 9-ти лет</a>
                  <p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
                </div>
                <div class="information">
                  <p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
                  <div class="experience">
                    <div class="left">
                      <p>Опыт работы няней: <span>– 6 лет</span></p>
                      <p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
                    </div>
                    <div class="right">
                      <p>Отношение к курению: <span>– не курю</span></p>
                      <p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
                    </div>  
                  </div>
                </div>
                <a class="works" name="modal" href="#dialog7"><span>Москва, Сходненская</span></a>
                <p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
                <p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
                <div class="buts">
                  <a class="buttons" href="#">Смотреть полностью</a>
                  <a class="favorites not-hearted" href="#" data-b="toggle-favorites">Добавить в избранное</a>
                </div>
              </div>
            </div>
            
            <div class="pagination">
              <ul>
                <li>
                  <a href="#"></a>
                </li>
                <li>
                  <a href="#">2</a>
                </li>
                <li>
                  <a href="#">3</a>
                </li>
                <li>
                  <a href="#">4</a>
                </li>
                <li>
                  <a href="#"></a>
                </li>
              </ul>
            </div>
            
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
  </div> <!-- end .content -->



  <!-- JS -->

  <script src="js/vendor/jquery.min.js"></script>
  <script src="js/vendor/jquery-ui.min.js"></script>
  <script src="js/vendor/jblocks.js"></script>

  <script src="js/jblocks-on-page.js"></script>

</body>
</html>
