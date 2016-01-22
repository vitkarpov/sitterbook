var validator = new FormValidator(
  'create-rezume-form',

  [{
      name: 'pay',
      display: 'Выберите желаемую зарплату',
      rules: 'required'
  }],

  function(errors, event) {
    if (errors.length > 0) {
      $('.buttons').children('p').remove();
      $('.buttons').prepend('<p>Поля отмеченные * обязательны для заполнения. Проверьте ввод.</p>');
    };

    // $('#create-rezume-form').submit();

    //evt.preventDefault();
    // if (evt && evt.preventDefault) {
    //     evt.preventDefault();
    // } else if (event) {
    //     event.returnValue = false;
    // }
  }
);

