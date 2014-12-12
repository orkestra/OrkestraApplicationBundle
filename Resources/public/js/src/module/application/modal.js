;(function($) {
  var helper = function() {
    this.current = null;
  };

  helper.prototype = $.extend(helper.prototype, {
    current: null,

    create: function(options) {
      if (!options.type) {
        options.type = 'GenericModalView';
      }

      var modal = this.current = new Orkestra.Modal[options.type](options);

      modal.on('hide', function() {
        this.current = null;
      }, this);

      return modal;
    },

    hideAll: function() {
      $.modal('hide');
    },

    content: function(content, title) {
      return this.create({
        title: title,
        content: content
      });
    },

    remote: function(url, title) {
      return this.create({
        type: 'RemoteModalView',
        title: title,
        url: url
      });
    },

    embedded: function(options) {
      options = $.extend({
        type: 'EmbeddedModalView'
      }, options);

      return this.create(options);
    },

    confirm: function(options) {
      options = $.extend({
        title:        'Confirm',
        content:      'Are you sure you want to continue?',
        acceptLabel:  'OK',
        accept:       $.noop,
        cancel:       $.noop
      }, options);

      return this.create(options);
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.ModalHelper = helper;
})(jQuery);
