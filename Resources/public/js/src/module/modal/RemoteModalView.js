;(function($) {
  window.Orkestra = window.Orkestra || {};
  Orkestra.Modal  = Orkestra.Modal || {};

  var _load = function(eventArgs) {
    eventArgs.deferred.reject();
    var self = this;
    $.ajax({
      url: self.options.url,
      success: function(response) {
        self.options.content = response;
        self.render();
        eventArgs.callback();
      },
      error: Orkestra.response.errorHandler
    });
  };

  Orkestra.Modal.RemoteModalView = Orkestra.Modal.GenericModalView.extend({
    initialize: function() {
      this.on('before_show', _load, this);
      this.on('show', function() {
        Orkestra.bindEnhancements(this.$el);
      }, this);
    },

    render: function() {
      this.$el.html(this.options.content);

      this.$el.addClass('fade');
      this.$acceptButton = this.$('.js-accept-button');
      this.$cancelButton = this.$('.js-cancel-button');

      var self = this;
      this.$cancelButton.click(function() {
        self.trigger('cancel', function() {
          self.hide();
        });
      });
      this.$acceptButton.click(function() {
        self.trigger('accept', function() {
          self.hide();
        });
      });

      return this;
    }
  });
})(jQuery);
