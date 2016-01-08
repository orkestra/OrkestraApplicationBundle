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
      var $helpBlock = $(element).closest('.form-group').find('.help-block');
      $helpBlock.data('last-text', $helpBlock.html());
      $helpBlock.html(error.text()).show();
    },

    /**
     * @see jQuery.validate.settings.highlight
     */
    highlight: function(element, errorClass, validClass) {
      var $helpBlock = $(element).closest('.form-group').addClass(errorClass).find('.help-block').show();
    },

    /**
     * @see jQuery.validate.settings.unhighlight
     */
    unhighlight: function(element, errorClass, validClass) {
      var $helpBlock = $(element).closest('.form-group').removeClass(errorClass).find('.help-block');
      if ($helpBlock.data('last-text')) {
        $helpBlock.html($helpBlock.data('last-text'));
      } else {
        $helpBlock.text('').hide();
      }
    },
    
    errorClass: 'error has-error',
    
    validClass: ''
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

    // Date and time pickers
    if ($.isFunction($.fn.datetimepicker)) {
      $('input.date', $form).each(function (index,elem) {
        var data = $(elem).data() || {};
        $(elem).datetimepicker({
          pickTime : false,
          format : data['format'] || Orkestra.dateFormat || 'MM/DD/YY'
        });
      });

      $('input.timepicker', $form).each(function (index,elem) {
        var data = $(elem).data() || {};
        $(elem).datetimepicker({
          useSeconds : data['useSeconds'] || false,
          pickDate : false,
          minuteStepping : data['minuteStep'] || 1,
          format : data['format'] || Orkestra.timeFormat || 'hh:mm A'
        });
      });

      $('input.datetimepicker', $form).each(function (index,elem) {
        var data = $(elem).data() || {};
        $(elem).datetimepicker({
          useSeconds : data['useSeconds'] || false,
          format : data['format'] || ((Orkestra.dateFormat && Orkestra.timeFormat) ? (Orkestra.dateFormat + ' ' + Orkestra.timeFormat) : false) || 'MM/DD/YY hh:mm A'
        });
      });
    }

    // USA Currency
    if ($.isFunction($.fn.formatCurrency)) {
      // Currency
      $('input.currency', $form).formatCurrency(true);
    }

    // USA Telephone
    if ($.isFunction($.fn.formatPhoneNumber)) {
      // Telephone
      $('input.telephone', $form).formatPhoneNumber();
    }

    // USA SSN
    if ($.isFunction($.fn.formatSocial)) {
      $('input.social', $form).formatSocial();
    }

    // USA EIN
    if ($.isFunction($.fn.formatEin)) {
      $('input.ein', $form).formatEin();
    }

    // URL
    if ($.isFunction($.fn.formatUrl)) {
      $('input.url', $form).formatUrl();
    }

    // Integer
    if ($.isFunction($.fn.formatNumber)) {
      $('input.integer', $form).formatNumber({
        initValue: true
      });
    }
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

    bindEnhancements: _bindEnhancements,
    
    setDefaults: function(options) {
      $.extend(_defaults, options);
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.FormHelper = helper;
})(jQuery);
