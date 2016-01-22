var Actors = {
  init: function( config ) {
    this.config = config;

    this.setupTemplates();
    this.bindEvents();

    $.ajaxSetup({
      url: 'index.php',
      type: 'POST'
    });

    $('.show-list').remove();
  },

  bindEvents: function() {
    this.config.letterSelection.on('change', this.fetchActors);
    this.config.actorsList.on('click', 'a', this.displayAuthorInfo);
  },

  setupTemplates: function() {
    this.config.actorListTemplate = Handlebars.compile(this.config.actorListTemplate);

    // Handlebars.registerHelper( 'fullName', function( actor ) {
    //   return actor.first_name + ' ' + actor.last_name;
    // });
  },

  fetchActors: function() {
    var self = Actors;

    $.ajax({
      dataType: 'json',
      data: self.config.form.serialize(),
      success: function(results) {
        self.config.actorsList.empty();
        if ( results[0] ) {
          self.config.actorsList.append( self.config.actorListTemplate( results ) );
        } else {
          self.config.actorsList.append('<tr><td colspan=2>Ничего не найдено</td></tr>');
        }
      }
    });
  },

  displayAuthorInfo: function( e ) {
    var self = Actors;

    $.ajax({
      data: { actor_id: $(this).data('actor_id') }
    });
    e.preventDefault();
  }
};

Actors.init({
  letterSelection: $('#q'),
  form: $('#actor-selection'),
  actorListTemplate: $('#actor_list_template').html(),
  actorsList: $('tbody'),
  actorInfo: $('.actor-info')
});

