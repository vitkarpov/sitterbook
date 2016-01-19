//======================================//
//== Действия после загрузки страницы ==//
//======================================//

$(document).ready(function() {
  // Инициализируем jblocks
  $(document).jblocks('init');
});



//==================================================//
//== Блок get-сities для получения списка городов ==//
//==================================================//

$.jblocks({
  name: 'get-cities',

  events: {
    'b-inited': 'oninit'
  },

  methods: {
    oninit: function() {
      this.fetchCities();
    },

    fetchCities: function() {
      var dfd = jQuery.Deferred();
      var promise = dfd.promise();

      if(this.promise) {
        return this.promise;
      };

      this.promise = promise;

      $.ajax({
        type: 'post',
        url: 'act/fetch_select_cities.php',
        success: function(response) {
          dfd.resolve(response);
        }
      });

      return promise;
    }
  }
});


//==================================================//
//== Блок select-city для выбора города в селекте ==//
//==================================================//

$.jblocks({
  name: 'select-city',

  events: {
    'b-inited': 'oninit',
    'b-destroyed': 'ondestroy',

    'change .js-city-select': 'onChangeSelect',
    'click .remove-city': 'remove',
    'click .sel.seld-old': 'showCitiesDropdown',
    'click .btn-rounded': 'hideCitiesDropdownOnOk',
    // 'click body': 'hideCitiesDropdownOnFocusout',
    'click .create-rezume': 'hideCitiesDropdownOnFocusout'
  },

  methods: {
    oninit: function() {
      this.select = this.$node.find('.js-city-select');
      this.ajaxForm = this.$node.find('.js-ajax-form');

      this.fillSelect();
    },

    ondestroy: function() {

    },

    // Заполнение select'а
    fillSelect: function() {
      var block = this;

      $('#get-cities').jblocks('get').each(function() {
        this.fetchCities().then(function(cities) {
          block.select.append(cities);
        })
      })
    },

    // Вызывается при изменении селекта
    onChangeSelect: function(e) {
      this.fetchCounties();
    },

    // Запросим округа
    fetchCounties: function() {
      $.ajax({
        type: 'post',
        url: 'act/fetch_select_counties.php',
        data: {
          get_option: this.select.val()
        },
        success: this.onSuccessCountiesRequest.bind(this)
      });
    },

    // Вызывается, когда приехали города
    onSuccessCountiesRequest: function(response) {
      // Сначала удаляем содержимое .ajax-form для данного города
      this.ajaxForm.html(response);

      // Инициализируем модальные окна
      openModal();

      // Привязываем обработчики для чекбоксов округов
      snapEventCheckboxesCountiesOnMain();
      // snapEventCloseForCountiesOnMain();
    },

    showCitiesDropdown: function() {
      this.$node.find('.all-city').show();
    },

    hideCitiesDropdownOnOk: function() {
      // непонятно почему контейнер не скрывается на .hide()
      // и на .css({display: "none"}), хотя 
      // .show() в функции выше прокатывает

      this.$node.find('.all-city').fadeOut(10);
      // $('.all-city').hide();
      //console.log(this.$node.find('.all-city'));

      // И КАК РЕАЛИЗОВАТЬ СКРЫТИЕ ВЫПАДАШКИ НА ПОТЕРЮ ФОКУСА???
      // НИЖЕ СТАРЫЙ ПРИМЕР КОДА

      //   // Закрываем выпадашку при клике вне её
      //   $('body').on('click', function(e) {
      //     if ( ($(e.target).hasClass('all-city') === true) ||
      //           $(e.target).closest('.all-city').length > 0) {
      //       // 
      //     } else {
      //       $('.all-city').fadeOut(10);
      //     }
      //   });
      // };
    },

    hideCitiesDropdownOnFocusout: function(e) {
      console.log('focused out');
      // if ( ($(e.target).hasClass('all-city') === true) ||
      //       $(e.target).closest('.all-city').length > 0) {
      //   // 
      // } else {
      //   $('.all-city').fadeOut(10);
      // }
    },

    remove: function() {
      this.$node.remove();
    }
  }
});



//====================================================//
//== Блок select-county для выбора округов в городе ==//
//====================================================//

$.jblocks({
  name: 'select-county',

  events: {
    'b-inited': 'oninit'
  },

  methods: {
    oninit: function() {
      
    },
  }
});



//====================================================//
//== Блок add-city для добавления очередного города ==//
//====================================================//

$.jblocks({
  name: 'add-city',

  events: {
    'b-inited': 'oninit'
  },

  methods: {
    oninit: function() {
      // Разметка для очередного города
      this.HTML = "<div class='wrap-sel' data-b='select-city'>" +
                    "<div class='sel seld-title'>" +
                      "<select name='city' class='city js-city-select'>" +
                        "<option disabled='disabled' selected='selected'>-- Выберите город --</option>" +
                      "</select>" +
                    "</div>" +
                    "<div class='ajax-form js-ajax-form'></div>" +
                    "<div class='remove-city'></div>" +
                    "<div class='clear'></div>" +
                  "</div>";

      this.container = $('.js-container-wrap-sel');
      this.$node.on('click', this.onClickAddCity.bind(this));
    },

    onClickAddCity: function() {
      this.container.append(this.HTML);
      this.container.jblocks('init');
    }
  }
});






//==============================//
//== СКРИПТЫ ПОКА ВНЕ JBLOCKS ==//
//==============================//

// Окно выбора округа на основной странице "Создания резюме",
// вне модального окна

// Работа кнопки "Все" для выбора/снятия всех округов
// разом на основной странице
function snapEventCheckboxesCountiesOnMain() {
  var // Чекбокс "Все"
      allToggle = $('.all-city .checkbox.all'),
      allToggleInput = allToggle.children().children('input'),
      allToggleClick = allToggle.children().children('.lab'),
      // Остальные чекбоксы
      allCheckboxes = allToggle.nextAll('.checkbox'),
      allCheckboxesInput = allCheckboxes.children().children('input');

  // При нажатии на "Все", чекаем/анчекаем все остальные элементы
  allToggleClick.on('click', function(e) {
    e.preventDefault();

    if ( allToggleInput.is(':checked') ) {
      // Если "Все" отмечено
      allToggleInput.prop('checked', false);
      allCheckboxesInput.prop('checked', false);
    } else {
      // Если "Все" НЕ отмечено
      allToggleInput.prop('checked', true);
      allCheckboxesInput.prop('checked', true);
    }
  });
};



// Проверка кол-ва символов, введенных в поле "О себе"
var taCont = $('.textarea'),
    taField = taCont.children('textarea'),
    taCounter = taCont.find('.bolshe'),

    textMin = 100,
    textMax = 950;

taField.on('keyup', function() {
  if ( taField.val().length < 100 ) {
    // Мало символов
    taCounter.html(taField.val().length);
    taCounter.removeClass('menshe').addClass('bolshe');
  } else if ( taField.val().length > 950 ) {
    // Много символов
    taCounter.html(taField.val().length);
    taCounter.removeClass('menshe').addClass('bolshe');
  } else {
    // То что нужно символов
    taCounter.html(taField.val().length);
    taCounter.removeClass('bolshe').addClass('menshe');
  }
});



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




//== Скрипты для страниц поиска резюме/вакансий


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