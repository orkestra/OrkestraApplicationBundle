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
    autoWidth: false,
    dtOptions: {
    }
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
    bind: function(table, options) {
      var self = this;
      options = $.extend(true, {},_defaults, options);

      if (options.path || options.sAjaxSource || options.dtOptions.sAjaxSource) {
        options.dtOptions.sAjaxSource = options.path || options.sAjaxSource || options.dtOptions.sAjaxSource;

        if (options.transformer || options.transformer === false) {
          this.transformer = options.transformer;
        }

        if (options.template) {
          this.template = options.template;
        }

        options.dtOptions.fnServerData = function ( sSource, aoData, fnCallback, oSettings ) {
          oSettings.jqXHR = $.ajax( {
            dataType: 'json',
            type: "POST",
            url: sSource,
            data: aoData,
            success: function (data, string, xhr) {
              if (self.transformer) {
                self.transformer(data,string,xhr);
              }
              fnCallback(data,string,xhr);
              Orkestra.bindEnhancements(table);
            },
            error: Orkestra.response.error
          } );
        };

        options.dtOptions.bProcessing = true;
        options.dtOptions.bServerSide = true;
      }

      var dtOptions = $.extend({
        aaSorting: options.sort,
        bLengthChange: true,
        iDisplayLength: options.displayLength,
        fnInitComplete: options.initComplete,
        bAutoWidth:     options.autoWidth,
        aoColumns:      [],
        oTableTools : {
          sSwfPath : Orkestra.basePath + '/bundles/orkestraapplication/swf/copy_csv_xls_pdf.swf',
            aButtons : [
            {
              sExtends : 'collection',
              sButtonText : 'Save',
              aButtons : options.dtOptions.buttons
            }
          ]
        }
      }, options.dtOptions);

      if (!dtOptions.oTableTools.aButtons[0].aButtons) {
        delete dtOptions.oTableTools;

        // removes T from sDom definition if it is not in a quoted string (strings define classes for DOM elements to be created)
        if (dtOptions.sDom) {
          dtOptions.sDom = dtOptions.sDom.replace(/T(?=([^']*'[^']*')*[^']*$)/g, '').replace(/T(?=([^"]*"[^"]*")*[^"]*$)/g, '');
        } else {
          dtOptions.sDom = $.fn.dataTable.defaults.sDom.replace(/T(?=([^']*'[^']*')*[^']*$)/g, '').replace(/T(?=([^"]*"[^"]*")*[^"]*$)/g, '');
        }
      }

      var $table = $(table),
          headRow = $table.find('tr:first'),
          columnDefs = [];
      headRow.children().each(function(index) {
        var data = $(this).data();

        var columnDef = dtOptions.aoColumns[index] || {};
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
        var existingDtOptions = dtOptions;
        dtOptions = $.extend({}, dtOptions, (function($) {
          var responsiveHelper;

          return {
            fnPreDrawCallback: function (oSettings) {
              if (existingDtOptions.fnPreDrawCallback) {
                existingDtOptions.fnPreDrawCallback.apply(this, arguments);
              }

              if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper($(oSettings.nTable), options.responsive.breakpoints);
              }
            },
            fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
              if (existingDtOptions.fnRowCallback) {
                existingDtOptions.fnRowCallback.apply(this, arguments);
              }

              responsiveHelper.createExpandIcon(nRow);
            },
            fnDrawCallback : function (oSettings) {
              if (existingDtOptions.fnDrawCallback) {
                existingDtOptions.fnDrawCallback.apply(this, arguments);
              }

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
        $table.addClass('table-clickable').on('click.clickable', '.clickable', function(e) {
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

        $table.on('click.clickable', '.clickable a', function(e) {
          clickableIntercepted = true;
        });
      }

      return $table.dataTable(dtOptions);
    },

    transformer: function (data) {
      var self = this;
      if (this.template) {
        $.each(data['aaData'], function(key, value) {
          var actionIndex = value.length - 1;
          value[actionIndex] = self.template.replace(/__id__/g, value[actionIndex]);
        });
      }
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.TableHelper = helper;
})(jQuery, this);
