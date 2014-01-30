;(function($, Modernizr, window, document) {
  window.Orkestra = window.Orkestra || {};

  var _clickEvent = Modernizr.touch ? 'tap' : 'click';
  var _bindEnhancements = function(context) {
    /**
     * Bind special anchors
     */
    $('a[data-modal=true]', context).unbind(_clickEvent + '.modal').bind(_clickEvent + '.modal', function(e) {
      e.preventDefault();

      Orkestra.modal.remote($(this).attr('href')).show();
    });

    $('a[data-method]', context).unbind(_clickEvent + '.custom-method').bind(_clickEvent + '.custom-method', function(e) {
      e.preventDefault();

      var $this = $(this),
        data = $this.data(),
        href = $this.attr('href');

      var _load = function() {
        $.ajax({
          type: data.method,
          url: href,
          success: Orkestra.response.successHandler,
          error:   Orkestra.response.errorHandler
        });
      };

      if (data.confirm) {
        Orkestra.modal.confirm({
          content: typeof(data.confirm) == 'string' ? data.confirm : 'Are you sure you want to continue?',
          accept:  _load
        }).show();
      } else {
        _load();
      }
    });

    /**
     * Bind simple tooltips
     */
    $('[data-toggle=tooltip]', context).tooltip();
  };

  $(function() {
    var $document = $(document),
      spinner = new Spinner({
        length:  6,
        width:   4,
        radius:  8,
        lines:   10,
        corners: 2,
        color: '#FFF',
        shadow: true
      }),
      spinnerElement = document.getElementById('loading-spinner');

    $document.ajaxStart(function() {
      spinner.spin(spinnerElement);
    }).ajaxStop(function() {
      spinner.spin(false);
    });

    Orkestra.sidebar = new Orkestra.SidebarManager(document.getElementById('main-nav'));
    Orkestra.bindEnhancements($document);
  });

  Orkestra.alert    = new Orkestra.AlertHelper();
  Orkestra.response = new Orkestra.JsonResponseHandler();
  Orkestra.form     = new Orkestra.FormHelper();
  Orkestra.modal    = new Orkestra.ModalHelper();
  Orkestra.table    = new Orkestra.TableHelper();
  Orkestra.bindEnhancements = _bindEnhancements;
})(jQuery, Modernizr, this, this.document);
