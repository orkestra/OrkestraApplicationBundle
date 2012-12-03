(function($) {
  $(function() {
    $('input.date').closest('.picker').datepicker({ format:'yyyy-mm-dd' });
    $('input.time').timepicker();
  });
})(jQuery);
