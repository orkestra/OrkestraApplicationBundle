;(function($) {
  window.Orkestra = window.Orkestra || {};
  Orkestra.Modal  = Orkestra.Modal || {};

  var _createHeader = function(title) {
    this.$header = $(document.createElement('div'))
      .addClass('modal-header')
      .html($(document.createElement('h3')).addClass('modal-title').html(title))
      .prepend('<button type="button" class="close js-cancel-button">&times;</button>')
      .appendTo(this.$el);
  };

  var _createContent = function(content) {
    this.$content = $(document.createElement('div'))
      .addClass('modal-body')
      .html(content)
      .appendTo(this.$el);
  };

  var _createFooter = function() {
    this.$footer = $(document.createElement('div'))
      .addClass('modal-footer');

    if (this.options.cancelButton) {
      this.$footer.append(
        $(document.createElement('button'))
          .attr({ type: 'button', 'class': 'js-cancel-button btn btn-default' })
          .html('<i class="icon-remove"></i> ' + this.options.cancelLabel)
      );
    }

    if (this.options.acceptButton) {
      this.$footer.append(
        $(document.createElement('button'))
          .attr({ type: 'submit', 'class': 'js-accept-button btn btn-primary' })
          .html('<i class="icon-ok"></i> ' + this.options.acceptLabel)
      );
    }

    this.$footer.appendTo(this.$el);
  };

  var _defaults = {
    acceptButton: true,
    acceptLabel: 'Save Changes',
    cancelButton: true,
    cancelLabel: 'Cancel'
  };

  /**
   * A Modal window.
   *
   * Available events:
   *  - before_show, show,
   *  - before_hide, hide
   *  - before_cancel, cancel
   *  - before_accept, accept
   *  - bind
   *
   * @type Orkestra.Modal.GenericModalView
   */
  Orkestra.Modal.GenericModalView = Backbone.View.extend({
    className: 'modal',

    $header:  null,
    $content: null,
    $footer:  null,

    $form: null,

    $acceptButton: null,
    $cancelButton: null,

    context: null,

    initialize: function() {
      this.options = $.extend({}, _defaults, this.options);
      this.on('before_show', this.render, this);
      this.on('show', function() {
        Orkestra.bindEnhancements(this.$el);
      }, this);

      if (this.options.accept) {
        this.on('accept', this.options.accept, this);
      }

      if (this.options.cancel) {
        this.on('cancel', this.options.cancel, this);
      }
    },

    trigger: function(eventName, callback) {
      var beforeEventName = 'before_' + eventName,
        deferred = $.Deferred();

      var self = this,
        eventCallback = function() {
          callback.apply(self);
          Backbone.Events.trigger.call(self, eventName);
        };

      deferred.done(eventCallback);

      var eventArgs = {
        view:       self,
        deferred:   deferred,
        eventName:  eventName,
        callback:   eventCallback
      };

      Backbone.Events.trigger.call(self, beforeEventName, eventArgs);
      if ('pending' === deferred.state()) {
        deferred.resolve();
      }
    },

    bindControlsToForm: function(form, options) {
      Orkestra.form.bind(form, options);

      this.stopListening(this, 'before_accept');
      this.listenTo(this, 'before_accept', function(eventArgs) {
        eventArgs.deferred.reject();
        $(form).submit();
      });
    },

    bind: function() {
      var context = arguments;
      this.trigger('bind', function() {
        this.context = context;
      });

      return this;
    },

    show: function() {
      this.trigger('show', function() {
        this.$el.modal();
      });
    },

    hide: function() {
      this.trigger('hide', function() {
        this.$el.modal('hide');
      });
    },

    render: function() {
      _createHeader.call(this, this.options.title);
      _createContent.call(this, this.options.content);
      _createFooter.call(this);

      this.$el.addClass('fade');
      this.$acceptButton = this.$('.js-accept-button');
      this.$cancelButton = this.$('.js-cancel-button');

      var self = this;
      this.$cancelButton.unbind('click.cancel').bind('click.cancel', function() {
        self.trigger('cancel', function() {
          self.hide();
        });
      });
      this.$acceptButton.unbind('click.accept').bind('click.accept', function() {
        self.trigger('accept', function() {
          self.hide();
        });
      });

      return this;
    }
  });
})(jQuery);
