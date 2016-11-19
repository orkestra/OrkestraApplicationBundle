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
    dtOptions: {},
    transformer: function (data, string, xhr, template) {
      if (template) {
        $.each(data['aaData'], function(key, value) {
          var actionIndex = value.length - 1;
          value[actionIndex] = template.replace(/__id__/g, value[actionIndex]);
        });
      }
    },
    template: '',
    listeners:
        // false,
    {// this is an example of a listener
      modal: [{
        regexp: /\b\B/, // this regexp never matches anything so handler will never be called
        handler: function (dtable, row, $el, newVal, transformer, template) {
          newVal.on('show', function(){
            newVal.bindControlsToForm(newVal.$el.find('form'), {onSuccess: function(data,response) {
              // update row with response
              if (response.type == 'success') {
                transformer({aaData: [response.data]}, null, null, template);
                dtable.fnUpdate(response.data, row, undefined, false);
                Orkestra.bindEnhancements(row);
                newVal.hide();
              }
              return true;
            }});
          });
        }
      }]
    },
    handler: {
      modal: function (dtable, listeners, transformer, template, property, oldVal, newVal) {
        if (newVal !== null && newVal !== undefined) {
          var $el = $(document.activeElement);
          var row = $el.closest('tr')[0];
          for (var i in listeners) {
            if (listeners.hasOwnProperty(i)
                && (listeners[i].regexp.test(newVal.options.url)
                    || listeners[i].regexp.test($el.attr('href')) )
            ) {
              listeners[i].handler(dtable, row, $el, newVal, transformer, template);
            }
          }
        }
        return newVal;
      }
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
      options = $.extend(true, {}, _defaults, options);
      
      if (options.path || options.sAjaxSource || options.dtOptions.sAjaxSource) {
        options.dtOptions.sAjaxSource = options.path || options.sAjaxSource || options.dtOptions.sAjaxSource;

        options.dtOptions.fnServerData = function ( sSource, aoData, fnCallback, oSettings ) {
          oSettings.jqXHR = $.ajax( {
            dataType: 'json',
            type: "POST",
            url: sSource,
            data: aoData,
            success: function (data, string, xhr) {
              if (options.transformer) {
                options.transformer(data, string, xhr, options.template);
              }
              fnCallback(data,string,xhr);
              Orkestra.bindEnhancements(table);
            },
            error: Orkestra.response.error
          } );
        };

        options.dtOptions.bProcessing = true;
        options.dtOptions.bServerSide = true;
      } else {
        Orkestra.bindEnhancements(table);
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
          headRow = $table.find('thead tr'),
          columnDefs = [];
      headRow.children().each(function(index) {
        /*
         TODO this may not be the best way of supporting complex headers
         currently we are just telling it to skip tr with colspan attr and look at all
         tr in the thead element. This allows for multiple tr and potentially column grouping
         but any column specific attributes
         */
        if ($(this).attr('colspan')) {
          return;
        }

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

      dtTable = $table.dataTable(dtOptions);

      if (options.handler.modal && options.listeners.modal) {
        Orkestra.modal.watch('current', function(property, oldVal, newVal) {
          return options.handler.modal(dtTable, options.listeners.modal, options.transformer, options.template, property, oldVal, newVal);
        });
      }

      return dtTable;
    }
  });

  window.Orkestra = window.Orkestra || {};
  window.Orkestra.TableHelper = helper;
})(jQuery, this);
