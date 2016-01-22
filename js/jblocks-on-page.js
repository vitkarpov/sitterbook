
//======================================//
//== Действия после загрузки страницы ==//
//======================================//

$(document).ready(function() {
  // Инициализируем jblocks
  $(document).jblocks('init');

  // Навешиваем на jQuery свой метод для переключения текста
  $.fn.toggleText = function(t1, t2){
    if (this.text() == t1) this.text(t2);
    else this.text(t1);
    return this;
  };
});



//==========================//
//== Глобальное хранилище ==//
//==========================//

$.jblocks({
  name: 'space'
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
      // Первночальный запрос на получение городов из БД
      this.fetchCities();
      // Здесь хранится структура с еще нечекнутыми городами
      this.unchecked = [];
    },

    // Забираем список городов из БД
    fetchCities: function() {
      // Сохраняем ссылку на блок get-cities
      var getCitiesBlock = this;

      // Работаем с promise
      var dfd = jQuery.Deferred();
      var promise = dfd.promise();

      if(this.promise) {
        return this.promise;
      };

      this.promise = promise;

      // AJAX-запрос
      $.ajax({
        type: 'post',
        url: 'act/fetch_select_cities.php',
        success: function(response) {
          getCitiesBlock.fillUnchecked(response);

          // Резолвим response
          dfd.resolve(response);
        }
      });

      // Возвращаем promise
      return promise;
    },

    fillUnchecked: function(options) {
      var unchecked = this.unchecked;

      $(options).each(function() {
        unchecked.push(this.value);
      })
    },

    _setState: function(select, isChecked) {
      var value = select.val();

      // если это был выбор в селекте,
      // то удалим из массива unchecked соответствующий опшин,
      // иначе — добавим его назад
      if (isChecked) {
        this.unchecked = this.unchecked.filter(function(i) {
          return i !== value;
        })
      } else {
        this.unchecked.push(value);
      }

      this.emit('state-changed', {
        unchecked: this.unchecked,
        select: select
      });
    },

    setChecked: function(select) {
      this._setState(select, true);
    },

    setUnchecked: function(select) {
      this._setState(select, false);
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
    'click .remove-city': 'removeCity',
    'click .sel.seld-old': 'showCountiesDropdown',
    'click .btn-rounded': 'hideCountiesDropdownOnOk'
  },

  methods: {
    oninit: function() {
      // Берем select
      this.select = this.$node.find('.js-city-select');
      // и контейнер, куда мы будем подставлять полученные
      // для города округа/районы/ссылки на модальные окна
      this.ajaxForm = this.$node.find('.js-ajax-form');
      this.getCities = $('#get-cities').jblocks('get')[0];

      // Фиксируем контекст внутри функции onCityChecked
      this.onCityChecked = this.onCityChecked.bind(this);
      // Фиксируем контекст внутри функции hideCountiesDropdownOnFocusout
      this.hideCountiesDropdownOnFocusout = this.hideCountiesDropdownOnFocusout.bind(this);
      // Вешаем обработчик для скрытия окошка выбора округов при потере фокуса
      $('body').on('click', this.hideCountiesDropdownOnFocusout);

      // На кастомное событие select-city-checked вешаем
      // функцию-обработчик onCityChecked
      $(document).on('select-city-checked', this.onCityChecked);

      // Запоняем селект с городами
      this.fillSelect();

      this.onCitiesStateChanged = this.onCitiesStateChanged.bind(this);
      this.getCities.on('state-changed', this.onCitiesStateChanged);
    },

    ondestroy: function() {
      // Отвязываем обработчики при удалении панели выбора города
      $('body').off('click', this.hideCountiesDropdownOnFocusout);
      $(document).off('select-city-checked', this.onCityChecked);
      this.getCities.off('state-changed', this.onCitiesStateChanged);
    },

    // Заполнение select'а
    fillSelect: function() {
      // console.log('fillSelect() started!');

      var // Ссылка на этот блок - select-city-create-rezume
          thisBlock = this,
          // Первый option это --Выберите город--
          firstOption = '<option disabled="disabled" selected="selected">-- Выберите город --</option>';

      // Заполняем селект городами
      this.getCities.fetchCities()
        .then(function(cities) {
          thisBlock.select.html(firstOption + cities);
          thisBlock.renderOptions(thisBlock.getCities.unchecked);
        });

      // console.log('fillSelect() ended!');
    },

    // Вызывается при фокусе на селекте
    onFocusSelect: function() {
      this.prevSelectedVal = this.select[0].selectedIndex;
      this.select.blur();
    },

    // Вызывается при изменении селекта
    onChangeSelect: function(e) {
      var getCities = $('#get-cities').jblocks('get')[0];

      getCities.setChecked(this.select);
    },

    // Запрос округов
    fetchCounties: function() {
      // console.log('fetchCounties() started!');

      $.ajax({
        type: 'post',
        url: 'act/fetch_select_counties.php',
        data: {
          get_option: this.select.val()
        },
        success: this.onSuccessCountiesRequest.bind(this)
      });

      // console.log('fetchCounties() ended!');
    },

    // Вызывается, когда приехали города
    onSuccessCountiesRequest: function(response) {
      // console.log('onSuccessCountiesRequest() started!');

      // Сначала удаляем содержимое .ajax-form для данного города
      this.ajaxForm.html(response);
      this.$node.jblocks('init');

      // запомним ссылку на вложенный компонент
      this.dropdown = this.$node.find('.all-city').jblocks('get')[0];

      // Инициализируем модальные окна
      openModal();

      // console.log('onSuccessCountiesRequest() ended!');
    },

    onCityChecked: function() {
      this.getCities.setChecked(this.select);
    },

    // Показать выпадающий список округов
    showCountiesDropdown: function(e) {
      this.dropdown.open();
      e.stopPropagation();
    },

    // Скрытие выпадающего списка городов на нажатие OK
    hideCountiesDropdownOnOk: function() {
      this.closeCountiesDropdown();
    },

    // Скрытие выпадающего списка городов на потерю фокуса
    hideCountiesDropdownOnFocusout: function(e) {
      var hasClickedOut = !$(e.target).closest(this.dropdown).length;

      if (hasClickedOut) {
        this.closeCountiesDropdown();
      }
    },

    // Скрыть выпадающий список округов
    closeCountiesDropdown: function() {
      if (!this.dropdown) {
        return;
      }
      this.dropdown.close();
    },

    // Удаление города
    removeCity: function(e) {
      // console.log('removeCity() started!');

      this.getCities.setUnchecked(this.select);
      this.$node.remove();
      this.destroy();

      // console.log('removeCity() ended!');
    },

    /**
     * Когда изменилось состояние городов,
     * нужно отобразить это в интерфейсе:
     * показать/скрыть соответствующие опшины
     */
    onCitiesStateChanged: function(e, data) {
      if (this.select === data.select) {
        return;
      }
      this.renderOptions(data.unchecked);
    },

    /**
     * Обновляет видимость опшинов в соответствии
     * с переданным стейтом
     */
    renderOptions: function(unchecked) {
      this.select.find('option').each(function() {
        var $option = $(this);

        return (unchecked.indexOf(this.value) > -1)
          ? $option.show()
          : $option.hide();
      });
    }
  }
});



//=========================================================================//
//== Блок select-city-create-vacansy для выбора города на create-vacansy ==//
//=========================================================================//

// $.jblocks({
//   name: 'select-city-create-vacansy',

//   events: {
//     'b-inited': 'oninit',

//     'change .js-city-select': 'onChangeSelect',
//     'click .sel.seld-old': 'showCountiesDropdown',
//     'click .btn-rounded': 'hideCountiesDropdownOnOk'
//   },

//   methods: {
//     oninit: function() {
//       // Находим select и место куда будем вставлять округа и остальное
//       this.select = this.$node.find('.js-city-select');
//       this.ajaxForm = this.$node.find('.js-ajax-form');

//       // Заполняем select
//       this.fillSelect();

//       // Вешаем обработчики, скрывающие выпадашку с округами
//       this.hideCountiesDropdownOnFocusout = this.hideCountiesDropdownOnFocusout.bind(this);
//       $('body').on('click', this.hideCountiesDropdownOnFocusout);
//     },

//     // Заполнение select'а
//     fillSelect: function() {
//       var block = this;

//       $('#get-cities').jblocks('get').each(function() {
//         this.fetchCities().then(function(cities) {
//           block.select.html(cities);
//         })
//       })
//     },

//     // Вызывается при изменении селекта
//     onChangeSelect: function() {
//       this.fetchCounties();
//     },

//     // Запрос округов для выбранного города
//     fetchCounties: function() {
//       $.ajax({
//         type: 'post',
//         url: 'act/fetch_select_counties.php',
//         data: {
//           get_option: this.select.val()
//         },
//         success: this.onSuccessCountiesRequest.bind(this)
//       });
//     },

//     // Вызывается, когда приехали города
//     onSuccessCountiesRequest: function(response) {
//       // Сначала удаляем содержимое .ajax-form для данного города
//       this.ajaxForm.html(response);
//       this.$node.jblocks('init');

//       // запомним ссылку на вложенный компонент
//       this.dropdown = this.$node.find('.all-city').jblocks('get')[0];

//       // Инициализируем модальные окна
//       openModal();
//     },

//     showCountiesDropdown: function(e) {
//       this.dropdown.open();
//       e.stopPropagation();
//     },

//     hideCountiesDropdownOnOk: function() {
//       this.closeCountiesDropdown();
//     },

//     hideCountiesDropdownOnFocusout: function(e) {
//       var hasClickedOut = !$(e.target).closest(this.dropdown).length;

//       if (hasClickedOut) {
//         this.closeCountiesDropdown();
//       }
//     },

//     closeCountiesDropdown: function() {
//       if (!this.dropdown) {
//         return;
//       }
//       this.dropdown.close();
//     }
//   }
// });



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



//===========================================================//
//== Блок manage-courses для управлениям полями доп.курсов ==//
//===========================================================//

$.jblocks({
  name: 'manage-courses',

  events: {
    'b-inited': 'oninit',
    'click .add-course': 'addCourse'
    // ,
    // 'click .remove': 'removeCourse'
  },

  methods: {
    oninit: function() {
      this.addCourse = this.$node.find('.add-course');

      $(document).on("click", ".course .inputs .remove", function() {
        $(this).parent().remove();
      });
    },

    addCourse: function() {
      this.addCourse.before("<div class='inputs'>" +
                              "<input class='blured' type='text' name='cur' value=''>" +
                              "<input class='year blured' type='text' name='year' value=''>" +
                              "<div class='remove'></div>" +
                            "</div>");
    }
  }
});



//===================================================================//
//== Блок main-menu-auth-popup для показа/скрытия меню авторизации ==//
//===================================================================//

$.jblocks({
  name: 'main-menu-auth-popup',

  events: {
    'b-inited': 'oninit',
    'click .js-auth-popup': 'toggleAuthPopup'
  },

  methods: {
    oninit: function() {
      this.toggleAuthPopupLink = this.$node.find('.js-auth-popup');
      this.authPopup = this.$node.find('.js-form-auth');
    },

    toggleAuthPopup: function() {
      this.toggleAuthPopupLink.toggleClass('auth-popup-link-closed auth-popup-link-opened');
      this.authPopup.toggleClass('auth-popup-vis auth-popup-hid');
      this.$node.toggleClass('auth2');
    }
  }
});



//===========================================================//
//== Блок input-with-calendar для показа/скрытия календаря ==//
//===========================================================//

$.jblocks({
  name: 'input-with-calendar',

  events: {
    'b-inited': 'oninit',
    'click .cal': 'toggleCal'
  },

  methods: {
    oninit: function() {
      // Локализация календаря
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

      $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );

      // Инициализация календаря
      $(function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          showOtherMonths: true,
          showAnim: "slideDown",
          yearRange: '-90:-16'
        })
      });
    },

    toggleCal: function() {
      this.$node.find('.calendar').toggleClass('open');
    }
  }
});



//========================================================================//
//== Блок toggle-filters-on-find для показа/скрытия доп.фильтров поиска ==//
//========================================================================//

$.jblocks({
  name: 'toggle-filters-on-find',

  events: {
    'b-inited': 'oninit',
    'click .js-toggle-filters': 'toggleFilters'
  },

  methods: {
    oninit: function() {
      this.additionalFields = this.$node.find('.js-toggle-filters');
    },

    toggleFilters: function(e) {
      e.preventDefault();

      this.additionalFields.toggleText('Скрыть дополнительные фильтры', 'Показать все фильтры');

      $('#form-find-filters').children('.dop').toggle();
    }
  }
});



//===================================================//
//== Блок toggle-favorites для отметок в избранное ==//
//===================================================//

$.jblocks({
  name: 'toggle-favorites',

  events: {
    'b-inited': 'oninit',
    'click': 'toggleFavorites'
  },

  methods: {
    oninit: function() {

    },

    toggleFavorites: function(e) {
      e.preventDefault();

      this.$node.toggleText('Добавить в избранное', 'В избранном');

      this.$node.toggleClass('hearted not-hearted');
    }
  }
});





















//==============================//
//== СКРИПТЫ ПОКА ВНЕ JBLOCKS ==//
//==============================//



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
