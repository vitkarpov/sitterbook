
//======================================//
//== Действия после загрузки страницы ==//
//======================================//

$(document).ready(function() {
  // Инициализируем jblocks
  $(document).jblocks('init');
});



//==========================//
//== Глобальное хранилище ==//
//==========================//

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
          // где-то в этом месте нужно
          // сформировать структуру и запомнить ее
          // в this (this.citiesState)
          dfd.resolve(response);
        }
      });

      return promise;
    }
  }
});



//=======================================================================//
//== Блок select-city-create-rezume для выбора города на create-rezume ==//
//=======================================================================//

$.jblocks({
  name: 'select-city-create-rezume',

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
          // нужно проверить структуру citiesState:
          // выбрать только те города, которые еще не были выбраны
          block.select.append(cities);
        })
      })
    },

    // Вызывается при изменении селекта
    onChangeSelect: function(e) {
      this.fetchCounties();

      var isMoscow = this.select.val() === '1';

      // нужно вызывать событие select-city-checked
      // т.е. всегда, не только для Москвы
      //
      // $(document).trigger('select-city-checked');
      //
      // здесь нужно обновить citiesState!

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

      // нужно сверяться с citiesState:
      // скрывать или показывать опшини в соответствии
      // с тем, что там лежит, но не трогать initiator

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
        //
        // нужно обновить citiesState:
        // достать текущий выбранный option, его value и найти его значение в структуре и обновить
        // и обновить сами селекты, т.е. кинуть события select-city-checked
        $('.select-city .city option[value="1"]').show();
      }

      this.$node.remove();
      this.destroy();
    }
  }
});



//=========================================================================//
//== Блок select-city-create-vacansy для выбора города на create-vacansy ==//
//=========================================================================//

$.jblocks({
  name: 'select-city-create-vacansy',

  events: {
    'b-inited': 'oninit',

    'change .js-city-select': 'onChangeSelect',
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
    },

    // Заполнение select'а
    fillSelect: function() {
      var block = this;

      $('#get-cities').jblocks('get').each(function() {
        this.fetchCities().then(function(cities) {
          block.select.html(cities);
        })
      })
    },

    // Вызывается при изменении селекта
    onChangeSelect: function() {
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
      this.$node.jblocks('init');

      // запомним ссылку на вложенный компонент
      this.dropdown = this.$node.find('.all-city').jblocks('get')[0];

      // Инициализируем модальные окна
      openModal();
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



//===============================================================//
//== Блок all-counties-dropdown для выпадающего списка округов ==//
//===============================================================//

$.jblocks({
  name: 'all-counties-dropdown',

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
      this.$node.fadeOut(10);
    }
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
      this.HTML = "<div class='wrap-sel' data-b='select-city-create-rezume'>" +
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

// 1. завести в блоке get-cities структуру вида
//  {
//    // value // checked
//    "1": false,
//    "2": false,
//    "3": false
//  }
// 2. в блоке get-cities завести метод
//    checkCity(value), который по переданному value (городу)
//    скажет — он уже был выбран или нет
// 3. в методе fillSelect, когда получили города,
//    нужно сверяться с citiesState
// 4. на изменение селекта нужно обновить citiesState и кинуть глобальное событие select-city-checked
// 5. в обработчике этого события каждый селект должно обновить свои опшини (скрыть/показать)
//    в соответсвии с тем, что лежит в citiesState



//======================================================================//
//== Блок textarea-about - поле биографии работника/описания вакансии ==//
//======================================================================//

$.jblocks({
  name: 'textarea-about',

  events: {
    'b-inited': 'oninit',
    'keyup textarea': 'recountText'
  },

  methods: {
    oninit: function() {
      this.taField = this.$node.find('textarea');
      this.taCounter = this.$node.find('.bolshe');

      var textMin = 100,
          textMax = 950;
    },

    recountText: function() {
      var field = this.taField,
          counter = this.taCounter;

      if ( field.val().length < 100 ) {
        // Мало символов
        counter.html(field.val().length);
        counter.removeClass('menshe').addClass('bolshe');
      } else if ( field.val().length > 950 ) {
        // Много символов
        counter.html(field.val().length);
        counter.removeClass('menshe').addClass('bolshe');
      } else {
        // То что нужно символов
        counter.html(field.val().length);
        counter.removeClass('bolshe').addClass('menshe');
      }
    }
  }
});



//==================================================================//
//== Блок manage-recommends для добавления/удаления рекоммендаций ==//
//==================================================================//

$.jblocks({
  name: 'manage-recommends',

  events: {
    'b-inited': 'oninit',
    'click .add-recommend': 'addRecommend',
    'click .remove': 'removeRecommend'
  },

  methods: {
    oninit: function() {
      this.btnAddRecommend = this.$node.find('.add-recommend');
    },

    addRecommend: function() {
      this.btnAddRecommend.before("<div class='three-inp'>" +
              "<input class='named blured' type='text' name='name' value=''>" +
              "<input class='phones blured' type='text' name='phone' value=''>" +
              "<input class='mail blured' type='text' name='mail' value=''>" +
              "<div class='remove'></div>" +
            "</div>");
    },

    removeRecommend: function() {
      this.btnAddRecommend.prev().remove();
    }
  }
});
























//==============================//
//== СКРИПТЫ ПОКА ВНЕ JBLOCKS ==//
//==============================//




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




/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Andrew Stromnov (stromnov@gmail.com). */
( function(factory) {
  if (typeof define === "function" && define.amd) {
    // AMD. Register as an anonymous module.
    define([ "../widgets/datepicker" ], factory);
  } else {
    // Browser globals
    factory(jQuery.datepicker);
  }
} (function(datepicker) {
    datepicker.regional.ru = {
      closeText: "Закрыть",
      prevText: "&#x3C;Пред",
      nextText: "След&#x3E;",
      currentText: "Сегодня",
      monthNames: [ "января","февраля","марта","апреля","мая","июня",
      "июля","августа","сентября","октября","ноября","декабря" ],
      monthNamesShort: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
      "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
      dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
      dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
      dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
      weekHeader: "Нед",
      dateFormat: "d MM yy",
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ""
    };

    datepicker.setDefaults( datepicker.regional.ru );

    return datepicker.regional.ru;
  })
);





// Ползунки


$(function() {
  $('#price').change(function () {
    var val = $(this).val();
    $('#slider_price2').slider("values",0,val);
  });

  $('#year').change(function () {
    var val = $(this).val();
    $('#slider_price').slider("values",0,val);
  });

  $('#year3').change(function () {
    var val = $(this).val();
    $('#slider_price3').slider("values",0,val);
  });

  $('#price2').change( function() {
    var val2 = $(this).val();
    $('#slider_price2').slider("values",1,val2);
  });

  $('#year2').change( function() {
    var val2 = $(this).val();
    $('#slider_price').slider("values",1,val2);
  });

  $('#year4').change( function() {
    var val2 = $(this).val();
    $('#slider_price').slider("values",1,val2);
  });

  $( "#slider_price" ).slider({
    range: true,
    //orientation: "vertical",
    min: 18,
    step:1,
    max: 60,
    values: [ 18, 60 ],
    slide: function( event, ui ) {
      //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      $('#year').val(ui.values[0]);
      $('#year2').val(ui.values[1]);
    }
  });

  $( "#slider_price3" ).slider({
    range: true,
    //orientation: "vertical",
    min: 16,
    step:1,
    max: 90,
    values: [ 16, 90 ],
    slide: function( event, ui ) {
      //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      $('#year3').val(ui.values[0]);
      $('#year4').val(ui.values[1]);
    }
  });

  $( "#slider_price2" ).slider({
    range: true,
    //orientation: "vertical",
    min: 0,
    step:100,
    max: 100000,
    values: [ 0, 100000 ],
    slide: function( event, ui ) {
      //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      $('#price').val(ui.values[0]);
      $('#price2').val(ui.values[1]);
    }
  });

  //$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
  //" - $" + $( "#slider-range" ).slider( "values", 1 ) );

  $('#price').val($('#slider_price2').slider("values",0));
  $('#price2').val($('#slider_price2').slider("values",1));

  $('#year').val($('#slider_price').slider("values",0));
  $('#year2').val($('#slider_price').slider("values",1));

  $('#year3').val($('#slider_price3').slider("values",0));
  $('#year4').val($('#slider_price3').slider("values",1));
});
