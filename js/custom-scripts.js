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

$.jblocks({
  name: 'space'
});

// 1. на инит каждого селекта нужно посмотреть в хранилище,
//    если есть уже выбранный, то скрыть сразу Москву
// 2. на change каждого селекта нужно положить в хранилище флаг
//    и обновить все селекты, кроме текущего
// 3. на удаление нужно проверить: если была выбрана Москва в текущем селекте,
//    то нужно назад обновить сторе (удалить moscowChecked)


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
    'click .btn-rounded': 'hideCitiesDropdownOnOk'
  },

  methods: {
    oninit: function() {
      this.select = this.$node.find('.js-city-select');
      this.ajaxForm = this.$node.find('.js-ajax-form');

      this.fillSelect();

      this.hideCitiesDropdownOnFocusout = this.hideCitiesDropdownOnFocusout.bind(this);
      $('body').on('click', this.hideCitiesDropdownOnFocusout);

      this.onMoscowChecked = this.onMoscowChecked.bind(this);

      $(document).on('select-city-moscow-checked', this.onMoscowChecked);

      var space = $('body').jblocks('get')[0];

      if (space.moscowChecked) {
        this.hideMoscow();
      }
    },

    ondestroy: function() {
      $('body').off('click', this.hideCitiesDropdownOnFocusout);
      $(document).off('select-city-moscow-checked', this.onMoscowChecked);
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

      var isMoscow = this.select.val() === '1';

      if (isMoscow) {
        $(document).trigger('select-city-moscow-checked', this);
      }
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
      this.$node.jblocks('init');

      // запомним ссылку на вложенный компонент
      this.dropdown = this.$node.find('.all-city').jblocks('get')[0];

      // Инициализируем модальные окна
      openModal();
    },

    onMoscowChecked: function(e, initiator) {
      var space = $('body').jblocks('get')[0];
      space.moscowChecked = true;

      if (initiator === this) {
        return;
      }
      this.hideMoscow();
    },

    hideMoscow: function() {
      var itemMoscow = this.select.find('option[value="1"]');
      itemMoscow.hide();
      this.isMoscowHidden = true;
    },

    showCitiesDropdown: function(e) {
      this.dropdown.open();
      e.stopPropagation();
    },

    hideCitiesDropdownOnOk: function() {
      this.closeDropdown();
    },

    hideCitiesDropdownOnFocusout: function(e) {
      var hasClickedOut = !$(e.target).closest(this.dropdown).length;

      if (hasClickedOut) {
        this.closeDropdown();
      }
    },

    closeDropdown: function() {
      if (!this.dropdown) {
        return;
      }
      this.dropdown.close();
    },

    remove: function() {
      var space = $('body').jblocks('get')[0];

      if (this.isMoscowHidden) {
        space.moscowChecked = false;

        // TODO: найти остальные блоки (которые select-city) и дернуть у них метод «покажи москву»
        // @see https://github.com/vitkarpov/jblocks/issues/5
        $('.select-city .city option[value="1"]').show();
      }

      this.$node.remove();
      this.destroy();
    }
  }
});

$.jblocks({
  name: 'all-city-dropdown',

  events: {
    'b-inited': 'oninit',
    'click .all': 'toggleAll'
  },

  methods: {
    oninit: function() {
        var allToggle = this.$node.find('.checkbox.all');
        var allCheckboxes = allToggle.nextAll('.checkbox');

        this.allToggleInput = allToggle.children().children('input');
        this.allToggleClick = allToggle.children().children('.lab');

        this.allCheckboxesInput = allCheckboxes.children().children('input');
    },

    toggleAll: function(e) {
      e.preventDefault();

      if ( this.allToggleInput.is(':checked') ) {
        // Если "Все" отмечено
        this.allToggleInput.prop('checked', false);
        this.allCheckboxesInput.prop('checked', false);
      } else {
        // Если "Все" НЕ отмечено
        this.allToggleInput.prop('checked', true);
        this.allCheckboxesInput.prop('checked', true);
      }
    },

    open: function() {
      this.$node.show();
    },

    close: function() {
      this.$node.hide();
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
// function snapEventCheckboxesCountiesOnMain() {
//   var // Чекбокс "Все"
//       allToggle = $('.all-city .checkbox.all'),
//       allToggleInput = allToggle.children().children('input'),
//       allToggleClick = allToggle.children().children('.lab'),
//       // Остальные чекбоксы
//       allCheckboxes = allToggle.nextAll('.checkbox'),
//       allCheckboxesInput = allCheckboxes.children().children('input');

//   // При нажатии на "Все", чекаем/анчекаем все остальные элементы
//   allToggleClick.on('click', function(e) {
//     e.preventDefault();

//     if ( allToggleInput.is(':checked') ) {
//       // Если "Все" отмечено
//       allToggleInput.prop('checked', false);
//       allCheckboxesInput.prop('checked', false);
//     } else {
//       // Если "Все" НЕ отмечено
//       allToggleInput.prop('checked', true);
//       allCheckboxesInput.prop('checked', true);
//     }
//   });
// };



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
