;(function($, window) {
  var helper = function() {

  };

  helper.prototype = $.extend(helper.prototype, {
    successHandler: function(response) {
      if ('redirect' === response.type) {
        window.location.href = response.redirect;

        return;
      } else if ('reload' === response.type) {
        window.location.reload(true);

        return;
      }

      if (response.message) {
        if (!(Orkestra.alert[response.type] instanceof Function)) {
          response.type = 'warning';
        }

        Orkestra.alert[response.type](response.message, response);
      }

      _.each(response.field_errors, function(messages, field) {
        var message = messages.join(' ');

        $(document.getElementById(field)).closest('.form-group').addClass('error').addClass('has-error').find('.help-block').text(message).show();
      });
    },

    errorHandler: function(jqXHR, textStatus, errorThrown) {
      Orkestra.alert.error('An error occurred. Please try again.');
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.JsonResponseHandler = helper;
})(jQuery, this);
