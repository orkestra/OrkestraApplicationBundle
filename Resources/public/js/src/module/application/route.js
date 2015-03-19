;(function($, window) {

  var helper = function() {

  };

  helper.prototype = $.extend(helper.prototype, {
    getRoute: function getRoute(route, replacements) {
      for (var key in replacements) {
        route = route.replace(key, replacements[key]);
      }

      return route;
    }

  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.RouteHelper = helper;
})(jQuery, this);
