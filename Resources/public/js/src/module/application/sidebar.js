;(function($, Modernizr) {
  var _clickEvent = Modernizr.touch ? 'tap' : 'click';

  var manager = function(target) {
    this.$el = $(target);

    this.$el.bind(_clickEvent + '.nav', function(e) {
      var linkEl = $(e.target).closest('a');
      if (!linkEl || linkEl.length == 0) {
        return;
      }

      // Regular nav item, no children
      if (!linkEl.hasClass('dropdown-toggle')) {
        // Proceed with click
        return;
      }

      // Handle dropdown submenu
      var sub = linkEl.next().get(0);
      if (!$(sub).is(':visible')) {
        var parentUl = $(sub.parentNode).closest('ul');

        parentUl.find('> .current > ul').each(function() {
          if (this != sub) {
            $(this).slideUp(200, function() {
              $(this).parent().removeClass('current').find('.icon-angle-up').removeClass('icon-angle-up').addClass('icon-angle-down');
            });
          }
        });
      }

      var $sub = $(sub),
        $parent = $sub.parent();
      if ($parent.hasClass('current')) {
        $sub.slideUp(200, function() {
          $parent.removeClass('current').find('.icon-angle-up').removeClass('icon-angle-up').addClass('icon-angle-down');
        });
      } else {
        $sub.hide();
        $parent.addClass('current').find('.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-up');
        $sub.slideDown(200);
      }

      return false;
    });
  };

  manager.prototype = $.extend(manager.prototype, {

  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.SidebarManager = manager;
})(jQuery, Modernizr);
