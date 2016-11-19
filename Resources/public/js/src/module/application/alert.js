;(function($, window) {
  var _showAlert = function(type, text, timeout) {
    timeout = timeout || 2000;
    var title = type.charAt(0).toUpperCase() + type.substr(1);

    var alert = $.gritter.add({
      title: title,
      text: text,
      time: timeout,
      class_name: 'gritter-' + type,
      sticky: false,
      after_open: function($el) {
        $el.on('click', function() {
          $.gritter.remove(alert, {
            speed: 'fast'
          });
        })
      }
    });
  };

  var helper = function() {

  };

  helper.prototype = $.extend(helper.prototype, {
    warning: function(message) {
      _showAlert('warning', message, 4000);
    },

    info: function(message) {
      _showAlert('info', message);
    },

    error: function(message) {
      _showAlert('error', message, 5000);
    },

    success: function(message) {
      _showAlert('success', message);
    },

    data: function(message, response) {
      this[response.type](message);
    },

    showFlashes: function(flashes) {
      _.each(flashes, function(messages, type) {
        if (! (type in this)) {
          return;
        }

        _.each(messages, function(message) {
          this[type](message);
        }, this);
      }, this);
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.AlertHelper = helper;
})(jQuery, this);
