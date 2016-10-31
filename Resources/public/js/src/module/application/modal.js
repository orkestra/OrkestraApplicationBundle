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

    content: function(content, title, config) {
      var options = {
        title: title,
        content: content
      };
      if (config != undefined) {
        options = $.extend(options,config);
      }
      return this.create(options);
    },

    remote: function(url, title, config) {
      var options = {
        title: title,
        url: url
      };
      if (config != undefined) {
        options = $.extend(options,config);
      }
      options.type = 'RemoteModalView';

      return this.create(options);
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
