;(function($, window) {
  var helper = function() {

  };

  var _defaults = {
    responsive: {
      breakpoints: {
        'tablet':           1024,
        'tablet-portrait':  768,
        'phone':            480,
        'phone-portrait':   320
      }
    },
    sort: [],
    displayLength: 10,
    initComplete: $.noop,
    clickable: false,
    autoWidth: false
  };

  var _bootstrapifyFilters = function(oSettings) {
    var $table = $(oSettings.nTable),
      $wrapper = $table.closest('.dataTables_wrapper'),
      $search = $wrapper.find('div[id$=_filter] input'),
      $length = $wrapper.find('div[id$=_length] select');

    $search.attr('placeholder', 'Search...').addClass('form-control input-sm');
    $length.addClass('form-control input-sm');
  };

  helper.prototype = $.extend(helper.prototype, {
    getDataTableDefaults: function(options) {
      return {
        aaSorting : options.sort,
        bLengthChange : true,
        iDisplayLength : options.displayLength,
        fnInitComplete : options.initComplete,
        bAutoWidth : options.autoWidth,
        oTableTools : {
          sSwfPath : Orkestra.basePath + '/bundles/orkestraapplication/swf/copy_csv_xls_pdf.swf',
          aButtons : [
            {
              sExtends : 'collection',
              sButtonText : 'Save',
              aButtons : [ 'xls', 'pdf', 'print' ]
            }
          ]
        }
      }
    },

    bind: function(table, options) {
      options = $.extend(true, _defaults, options);

      var dtOptions = this.getDataTableDefaults(options);

      var $table = $(table),
        headRow = $table.find('tr:first'),
        columnDefs = [];
      headRow.children().each(function() {
        var data = $(this).data();

        var columnDef = {};
        if (false === data.sortable) {
          columnDef.bSortable = false;
        }

        if (false === data.searchable) {
          columnDef.bSearchable = false;
        }

        if ('expand' === data['class']) {
          columnDef.bSortable = false;
        }

        columnDefs.push(columnDef);
      });

      dtOptions.aoColumns = columnDefs;

      if (false !== options.responsive) {
        dtOptions = $.extend(dtOptions, (function($) {
          var responsiveHelper;

          return {
            fnPreDrawCallback: function (oSettings) {
              if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper($(oSettings.nTable), options.responsive.breakpoints);
              }
            },
            fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
              responsiveHelper.createExpandIcon(nRow);
            },
            fnDrawCallback : function (oSettings) {
              responsiveHelper.respond();
            }
          };
        })($));
      }

      dtOptions.fnInitComplete = _bootstrapifyFilters;

      if (false !== options.clickable) {
        var callback = options.clickable,
          modal = false;
        if (typeof(options.clickable) == 'object') {
          if (options.clickable.route) {
            callback = options.clickable.route;
          } else {
            callback = options.clickable.callback;
          }

          modal = options.clickable.modal ? true : false;
        }

        if (typeof(callback) == 'string') {
          var route = callback;
          callback = function(row) {
            return Orkestra.router.generate(route, $(row).data());
          }
        }

        var clickableIntercepted = false;
        $table.addClass('table-clickable table-hover').find('.clickable').bind('click.clickable', function(e) {
          if (clickableIntercepted) {
            // Check to see if something below the clickable row was clicked.
            // This is to prevent issues dealing with stopping propagation breaking
            // dropdowns when within clickable tables.
            clickableIntercepted = false;

            return;
          }

          var url = callback(this);

          if (modal) {
            Orkestra.modal.remote(url).show();
          } else {
            window.location = url;
          }
        });

        $table.find('.clickable a').bind('click.clickable', function(e) {
          clickableIntercepted = true;
        });
      }

      $table.dataTable(dtOptions);
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.TableHelper = helper;
})(jQuery, this);
