;(function($) {
  var _defaults = {
    /**
     * Automatically submit the form after it is bound
     */
    submitOnBind: false,

    /**
     * The expected response dataType
     */
    dataType: 'json',

    /**
     * Called when a valid form is submitted.
     *
     * Return false to halt further event execution.
     */
    onSubmit:  $.noop,

    /**
     * Called when a form returns a successful response.
     *
     * Takes one argument: response
     * Return false to halt further event execution.
     */
    onSuccess: $.noop,

    /**
     * Called when a form returns an error response.
     *
     * Takes three arguments: jqXHR, textStatus, errorThrown
     * Return false to halt further event execution.
     */
    onError:   $.noop,

    /**
     * @see jQuery.validate.settings.showErrors
     *
     * Overrides the default, funky show/hide functionality.
     * If using this implementation, highlight and unhighlight are responsible
     * for showing and hiding elements, respectively.
     */
    showErrors: function() {
      var i, elements;
      for (i = 0; this.errorList[i]; i++) {
        var error = this.errorList[i];
        if (this.settings.highlight) {
          this.settings.highlight.call(this, error.element, this.settings.errorClass, this.settings.validClass);
        }

        this.showLabel(error.element, error.message);
      }

      if (this.settings.unhighlight) {
        for (i = 0, elements = this.validElements(); elements[i]; i++) {
          this.settings.unhighlight.call(this, elements[i], this.settings.errorClass, this.settings.validClass);
        }
      }
    },

    /**
     * @see jQuery.validate.settings.errorPlacement
     */
    errorPlacement: function (error, element) {
      $(element).closest('.form-group').find('.help-block').html(error.text()).show();
    },

    /**
     * @see jQuery.validate.settings.highlight
     */
    highlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').addClass(errorClass).find('.help-block').show();
    },

    /**
     * @see jQuery.validate.settings.unhighlight
     */
    unhighlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass(errorClass).find('.help-block').text('').hide();
    }
  };

  var _submitHandlerFactory = function(options) {
    var _chainHandlers = function(handlerA, handlerB) {
      return function() {
        if (false !== handlerA.apply(null, arguments)) {
          handlerB.apply(null, arguments);
        }
      };
    };

    var successHandler = _chainHandlers(options.onSuccess, Orkestra.response.successHandler);
    var errorHandler = _chainHandlers(options.onError, Orkestra.response.errorHandler);

    var defaultSubmitHandler = function(form) {
      $(form).ajaxSubmit({
        dataType: options.dataType,
        success:  successHandler,
        error:    errorHandler
      });
    };

    return _chainHandlers(options.onSubmit, defaultSubmitHandler);
  };

  var _bindEnhancements = function(form) {
    var $form = $(form);

    // Datepicker
    $('input.date', $form).datepicker({
      format: 'mm/dd/yy',
      autoclose: true
    });

    // Currency
    $('input.currency', $form).formatCurrency(true);

    // Telephone
    $('input.telephone', $form).formatPhoneNumber();
    
    // Social
    $('input.social', $form).formatSocial();

    // EIN
    $('input.ein', $form).formatEin();

    // Social
    $('input.url', $form).formatUrl();
  };

  var helper = function() {

  };

  helper.prototype = $.extend(helper.prototype, {
    bind: function(form, options) {
      options = $.extend({}, _defaults, options);

      options.submitHandler = options.submitHandler || _submitHandlerFactory(options);

      $(form).data('validator', null).unbind('submit').validate(options);
      _bindEnhancements.call(this, form);

      if (true === options.submitOnBind) {
        $(function() {
          $(form).submit();
        });
      }
    },

    bindEnhancements: _bindEnhancements
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.FormHelper = helper;
})(jQuery);
