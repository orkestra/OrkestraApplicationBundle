(function($) {
  function _formatNumber(value, precision, min, max) {
    var val = parseFloat(value);
    if (isNaN(val)) {
      val = 0.0;
    }

    if (typeof(min) != 'undefined' && null != min && val < min) {
      val = min;
    }

    if (typeof(max) != 'undefined' && null != max && val > max) {
      val = max;
    }

    return val.toFixed(precision);
  }

  $.fn.formatNumber = function(options) {
    var _defaults = {
      precision:  0,
      min:        null,
      max:        null,
      initValue:  false,
      callback:   null
    };

    options = $.extend({}, _defaults, options);

    this.each(function() {
      var $el = $(this),
        self = this;
      if (options.initValue) {
        $el.val(_formatNumber($el.val(), options.precision, options.min, options.max)).on('focus', function() {
          if (Math.abs(parseFloat($el.val()) - 0) < 0.001) {
            $el.val('');
          }
        });
      }

      $el.blur(function() {
        $el.val(_formatNumber($el.val(), options.precision, options.min, options.max));
        if (options.callback) {
          options.callback.apply(self, [ $el ]);
        }
      });
    });
  };

  $.fn.formatCurrency = function(flag, limit, callback) {
    this.formatNumber({
      precision: 2,
      min: 0,
      max: limit,
      initValue: flag,
      callback: callback
    });
  };

  $.fn.formatPhoneNumber = function() {
    this.each(function() {
      $(this).blur(function() {
        var el = $(this),
          value = el.val(),
          num = '';
        for (var n = 0; n < value.length; n++) {
          if (!isNaN(value.charAt(n)) && value.charAt(n) != ' ') {
            num = num + value.charAt(n);
          }
        }

        var size = num.length;

        value = (size >= 3) ? '(' + num.substring(0, 3) + ') ' : '';
        value = (size > 3) ? value + num.substring(3, Math.min(size, 6)) : value;
        value = (size > 6) ? value + '-' + num.substring(6, size) : value;

        el.val(value);
      });
    });
  };
  
  $.fn.formatSocial = function() {
    this.each(function() {
      $(this).blur(function() {
        var el = $(this),
          value = el.val(),
          num = value.replace(/[^0-9]/g, '');

        var size = num.length;

        value = (size >= 3) ? num.substring(0, 3) : '';
        value = (size > 3) ? value + '-' + num.substring(3, Math.min(size, 5)) : value;
        value = (size > 5) ? value + '-' + num.substring(5, Math.min(size, 9)) : value;

        el.val(value);
      });
    });
  };

  $.fn.formatEin = function() {
    this.each(function() {
      $(this).blur(function() {
        var el = $(this),
          value = el.val(),
          num = value.replace(/[^0-9]/g, '');

        var size = num.length;

        value = (size >= 2) ? num.substring(0, 2) : '';
        value = (size > 2) ? value + '-' + num.substring(2, Math.min(size, 9)) : '';

        el.val(value);
      });
    });
  };
  
  $.fn.formatUrl = function() {
    this.each(function() {
      $(this).blur(function() {
        var el = $(this),
          value = el.val();
        
        if (value.length > 0 && value.indexOf(':') < 0) {
          el.val('http://' + value).blur();
        }
      });
    });
  }
})(jQuery);
