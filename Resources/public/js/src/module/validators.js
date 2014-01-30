;(function($) {
  $.validator.addMethod('time', function(value, element) {
    return this.optional(element) || /^([01]\d|1?\d)(:[0-5]\d) [A|P]M$/i.test(value);
  }, 'Time must be in format: 12:59 PM');
  $.validator.addClassRules('time', { time: true });

  $.validator.addMethod('phone',
    function(value, element, regexp) {
      count=0;
      for (n = 0; n < value.length; n++)
        if ( !isNaN(value.charAt(n)) && value.charAt(n)!=' ') {count++;}
      return this.optional(element)|| count==10
    },'Please check your phone number.'
  );
  $.validator.addClassRules('telephone', {phone:true});

  $.validator.addMethod('naturalnumber',
    function(value, element, param) {
      return this.optional(element) || /^[1-9][0-9]*$/.test(value);//add parse with \d
    },'Please check your input.'
  );
  $.validator.addClassRules('naturalnumber', {naturalnumber:true});

  $.validator.addMethod('zip',
    function(value, element, param) {
      return this.optional(element) || /^\d{5}(-\d{4})?$/.test(value);
    },'Invalid zip code'
  );
  $.validator.addClassRules('zip', {zip:true});

  $.validator.addMethod('social',
    function(value, element, param) {
      return this.optional(element) || value.replace(/[^0-9]/g, '').length === 9;
    },'Invalid social security number'
  );
  $.validator.addClassRules('social', { social:true });

  $.validator.addMethod('ein',
    function(value, element, param) {
      return this.optional(element) || value.replace(/[^0-9]/g, '').length === 9;
    },'Invalid EIN'
  );
  $.validator.addClassRules('ein', { ein:true });
  
  $.validator.addMethod('regex',
    function(value, element, regexp) {
      var re = new RegExp(regexp);
      return this.optional(element) || re.test(value);
    },'Please check your input.'
  );
})(jQuery);
