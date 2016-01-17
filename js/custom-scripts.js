//======================================//
//== Действия после загрузки страницы ==//
//======================================//

$(document).ready(function() {
  fetch_select_cities();
});



//=================================//
//== Подгрузка городов и округов ==//
//=================================//

// AJAX-подгрузка городов на основную страницу в невидимое поле
function fetch_select_cities() {
  $.ajax({
    type: 'post',
    url: 'act/fetch_select_cities.php',
    success: function (response) {
      $('.fetched-cities-invisible').append(response);

      $('.select-city select.city').append(
        $('.fetched-cities-invisible').html()
      );
    }
  });
}

// Получение списка городов из промежуточного невидимого поля
function get_cities_from_invisible_field() {
  return $(".fetched-cities-invisible").html();
}

// При изменении select'а передаем выбранное значение
// вместе со ссылкой на этот select в функцию подгрузки округов
$(document).on('change', 'select.city', function() {
  changedThis = $(this);
  fetch_select_counties(this.value, changedThis);
  console.log('Done');
});

// AJAX-подгрузка округов на основную страницу
function fetch_select_counties(val, changedThis) {
  $.ajax({
    type: 'post',
    url: 'act/fetch_select_counties.php',
    data: {
      get_option: val
    },
    success: function (response) {
      // Сначала удаляем содержимое .ajax-form для данного города
      changedThis
        .parent()
        .siblings('.ajax-form')
        .children()
        .remove();
      // и затем вставляем список округов и ссылки вновь
      changedThis
        .parent()
        .next()
        .append(response);

      // Выполняем подгрузку содержимого модальных окон
      openModal();

      // Привязываем обработчики чекбоксов и кнопок
      // выпадающего списка округов на основной странице
      snapEventCheckboxesCountiesOnMain();
      snapEventOkCloseButtonForCountiesOnMain();
    }
  });
}

// Показать поле городов на странице "Создание резюме"
$(document).on("click", ".select-city .sel", function() {
  $(".all-city", this).css({
    display: "block"
  });
});

// Добавить/удалить поле выбора города на главной
$(document).on("click", ".select-city .add-city", function() {
  // Вставляем очередную строку с выбором города
  $(this)
    .prev()
    .prev()
    .after("<div class='wrap-sel'>" +
              "<div class='sel seld-title'>" +
                "<select name='city' class='city'></select>" +
              "</div>" +
              "<div class='ajax-form'></div>" +
              "<div class='remove-city'></div>" +
              "<div class='clear'></div>" +
            "</div>");

  // Вставляем очередную строку с выбором города
  $(this)
    .prev()
    .prev()
    .find('select.city')
    .append(
      "<option disabled='disabled' selected='selected'>-- Выберите город --</option>" +
      get_cities_from_invisible_field()
    );

});

$(document).on("click", ".select-city .remove-city", function() {
  $(this).parent().remove();
});



// Окно выбора округа на основной странице "Создания резюме",
// вне модального окна

// Работа кнопки "Все" для выбора/снятия всех округов
// разом на основной странице

function snapEventCheckboxesCountiesOnMain() {
  var // Чекбокс "Все"
      allToggle = $('.all-city .checkbox.all'),
      allToggleInput = allToggle.children().children('input'),
      allToggleLabel = allToggle.children(),
      //allToggleCheckbox = allToggle.children().children('.checkbox_box'),
      allToggleClick = allToggle.children().children('.lab'),
      // Остальные чекбоксы
      allCheckboxes = allToggle.nextAll('.checkbox'),
      allCheckboxesInput = allCheckboxes.children().children('input');

  // При нажатии на "Все", чекаем/анчекаем все остальные элементы
  allToggle.on('click', function(e) {
    e.preventDefault();

    if ( allToggleInput.attr('checked') ) {
      // Если "Все" отмечено
      console.log('Was checked');
      console.log('before: ' + allToggleInput.attr('checked'));
      allToggleInput.removeAttr('checked');
      allCheckboxesInput.removeAttr('checked');
      console.log('after: ' + allToggleInput.attr('checked'));
      console.log('===');
    } else {
      // Если "Все" НЕ отмечено
      console.log('Was NOT checked');
      console.log('before: ' + allToggleInput.attr('checked'));
      allToggleInput.attr('checked', true);
      allCheckboxesInput.attr('checked', true);
      console.log('after: ' + allToggleInput.attr('checked'));
      console.log('===');
    }
  });
};

// Закрытие окна с выбором округов на главной по клику на OK
function snapEventOkCloseButtonForCountiesOnMain() {
  $('.all-city .btn-rounded').on('click', function() {
    $(this).parent().fadeOut(10);
  });
};

// Добавить/удалить рекомендации
$(document).on("click", ".add-recommend", function() {
  $(".recommend .add-recommend")
    .before("<div class='three-inp'>" +
              "<input class='named blured' type='text' name='name' value=''>" +
              "<input class='phones blured' type='text' name='phone' value=''>" +
              "<input class='mail blured' type='text' name='mail' value=''>" +
              "<div class='remove'></div>" +
            "</div>");
});

$(document).on("click", ".recommend .three-inp .remove", function() {
  $(this).parent().remove();
});

// Авторизация
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



//================================================//
//== Скрипты для страниц поиска резюме/вакансий ==//
//================================================//

// Показать/скрыть фильтры
$(document).on("click", ".button p a", function() {
  var k = 2;

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

// Избранное
$(document).on("click", ".favorites", function() {
  var j = 2;

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



//============//
//== Прочее ==//
//============//

// Курсы

$(document).on("click", ".add-course", function() {
  $(".course .add-course").before("<div class='inputs'><input class='blured' type='text' name='cur' value=''><input class='year blured' type='text' name='year' value=''><div class='remove'></div></div>");
});

$(document).on("click", ".course .inputs .remove", function() {
  $(this).parent().remove();
});



// Календарь

$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
$.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
$(function() {
  $( "#datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    showAnim: "slideDown",
    yearRange: '-90:-16'
  })
});

// Открыть календарь

$(document).on("click", ".cal", function() { 
  $(".calendar").toggleClass("open"); 
});



// Показать/скрыть информационное поле

$(document).on("click", ".info-field a", function() {
  $(this).css({
    display: "none"
  });

  $(".inp").css({
    display: "block"
  });
});




// Чекбоксы

$(document).on("click", ".mess .ch", function() {
  if($(this).prop('checked')) {
    $(this).parent().parent().parent().addClass("bg");
  } else {
    $(this).parent().parent().parent().removeClass("bg");
  }
});