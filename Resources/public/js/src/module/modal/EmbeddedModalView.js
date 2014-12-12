;(function($) {
  window.Orkestra = window.Orkestra || {};
  Orkestra.Modal  = Orkestra.Modal || {};

  Orkestra.Modal.EmbeddedModalView = Orkestra.Modal.GenericModalView.extend({
    render: function() {
      this.$el.addClass('modal fade');
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
