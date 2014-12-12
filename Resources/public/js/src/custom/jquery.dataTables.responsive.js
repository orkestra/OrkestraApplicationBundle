/**
 * This file has been customized specifically for Easy Payment Kiosk.
 *
 * Changes:
 *  - Wrapped in module pattern
 *  - expandIcon changed to use icon- classes instead of images
 *  - Changed item-detail rendering scheme to use underscore
 *  - Changed breakpoint generation to allow a type called 'always' which
 *    always hides the column
 *  - Changed breakpoints so they now cascade downward; something hidden
 *    on tablet is now always hidden on phone.
 */

/**
 * File:        datatables.responsive.js
 * Version:     0.1.2
 * Author:      Seen Sai Yang
 * Info:        https://github.com/Comanche/datatables-responsive
 *
 * Copyright 2013 Seen Sai Yang, all rights reserved.
 *
 * This source file is free software, under either the GPL v2 license or a
 * BSD style license.
 *
 * This source file is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 *
 * You should have received a copy of the GNU General Public License and the
 * BSD license along with this program.  These licenses are also available at:
 *     https://raw.github.com/Comanche/datatables-responsive/master/license-gpl2.txt
 *     https://raw.github.com/Comanche/datatables-responsive/master/license-bsd.txt
 */
(function($, window, undefined) {
'use strict';

/**
 * Constructor for responsive datables helper.
 *
 * This helper class makes datatables responsive to the window size.
 *
 * The parameter, breakpoints, is an object for each breakpoint key/value pair
 * with the following format: { breakpoint_name: pixel_width_at_breakpoint }.
 *
 * An example is as follows:
 *
 *     {
 *         tablet: 1024,
 *         phone: 480
 *     }
 *
 * These breakpoint name may be used as possible values for the data-hide
 * attribute.  The data-hide attribute is optional and may be defined for each
 * th element in the table header.
 *
 * @param {Object|string} tableSelector jQuery wrapped set or selector for
 *                                      datatables container element.
 * @param {Object} breakpoints          Object defining the responsive
 *                                      breakpoint for datatables.
 */
function ResponsiveDatatablesHelper(tableSelector, breakpoints) {
  if (typeof tableSelector === 'string') {
    this.tableElement = $(tableSelector);
  } else {
    this.tableElement = tableSelector;
  }

  // State of column indexes and which are shown or hidden.
  this.columnIndexes = [];
  this.columnsShownIndexes = [];
  this.columnsHiddenIndexes = [];

  // Index of the th in the header tr that stores where the attribute
  //     data-class="expand"
  // is defined.
  this.expandColumn = undefined;

  // Stores the break points defined in the table header.
  // Each th in the header tr may contain an optional attribute like
  //     data-hide="phone,tablet"
  // These attributes and the breakpoints object will be used to create this
  // object.
  this.breakpoints = {
    /**
     * We will be generating data in the following format:
     *     phone : {
         *         lowerLimit   : undefined,
         *         upperLimit   : 320,
         *         columnsToHide: []
         *     },
     *     tablet: {
         *         lowerLimit   : 320,
         *         upperLimit   : 724,
         *         columnsToHide: []
         *     }
     */
  };

  // Expand icon template
  this.expandIconTemplate = '<button class="btn-expander btn btn-small"><i class="icon-plus"></i></button>';

  // Row template
  this.rowTemplate = _.template('<tr class="row-detail"><td colspan="<%= colspan %>"><dl class="dl-horizontal row-items"><%= items.join(\'\') %></dl></td></tr>');
  this.rowItemTemplate = _.template('<dt class="column-title"><%= title %></dt><dd class="column-value"><%= value %></dd>');

  // Responsive behavior on/off flag
  this.disabled = false;

  // Skip next windows width change flag
  this.skipNextWindowsWidthChange = false;

  // Initialize settings
  this.init(breakpoints);
}

/**
 * Responsive datatables helper init function.  Builds breakpoint limits
 * for columns and begins to listen to window resize event.
 *
 * See constructor for the breakpoints parameter.
 *
 * @param {Object} breakpoints
 */
ResponsiveDatatablesHelper.prototype.init = function (breakpoints) {
  /** Generate breakpoints in the format we need. ***************************/
  // First, we need to create a sorted array of the breakpoints given.
  var breakpointsSorted = [];
  _.each(breakpoints, function (value, key) {
    breakpointsSorted.push({
      name         : key,
      upperLimit   : value,
      columnsToHide: []
    });
  });
  breakpointsSorted = _.sortBy(breakpointsSorted, 'upperLimit');
  breakpointsSorted.unshift({
    name: 'always',
    lowerLimit: undefined,
    upperLimit: undefined,
    columnsToHide: []
  });

  // Set lower and upper limits for each breakpoint.
  var lowerLimit = undefined;
  _.each(breakpointsSorted, function (value) {
    value.lowerLimit = undefined;
    lowerLimit = value.upperLimit;
  });

  // Add the default breakpoint which shows all (has no upper limit).
  breakpointsSorted.push({
    name         : 'default',
    lowerLimit   : lowerLimit,
    upperLimit   : undefined,
    columnsToHide: []
  });

  // Copy the sorted breakpoint array into the breakpoints object using the
  // name as the key.
  breakpointsSorted.forEach(function (element) {
    this.breakpoints[element.name] = element;
  }, this);

  /** Create range of possible column indexes *******************************/
  // Get all visible column indexes
  var columns = this.tableElement.dataTable().fnSettings().aoColumns;
  columns.forEach(function (element, index) {
    if (element.bVisible) {
      this.columnIndexes.push(index)
    }
  }, this);

  // We need the range of possible column indexes to calculate the columns
  // to show:
  //     Columns to show = all columns - columns to hide
  var headerElements = $('thead th', this.tableElement);

  /** Add columns into breakpoints respectively *****************************/
    // Read column headers' attributes and get needed info
  _.each(headerElements, function (element, index) {
    // Get the column with the attribute data-class="expand" so we know
    // where to display the expand icon.
    if ($(element).attr('data-class') === 'expand') {
      this.expandColumn = index;
    }

    // The data-hide attribute has the breakpoints that this column
    // is associated with.
    // If it's defined, get the data-hide attribute and sort this
    // column into the appropriate breakpoint's columnsToHide array.
    var dataHide = $(element).attr('data-hide');
    if (dataHide !== undefined) {
      var splitBreakingPoints = dataHide.split(/,\s*/);
      _.each(splitBreakingPoints, function (e) {
        if (this.breakpoints[e] !== undefined) {
          // Translate visible column index to internal column index.
          this.breakpoints[e].columnsToHide.push(this.columnIndexes[index]);
        }
      }, this);
    }
  }, this);

  // Watch the window resize event and response to it.
  var that = this;
  $(window).bind("resize", function () {
    that.respond();
  });
};

/**
 * Respond window size change.  This helps make datatables responsive.
 */
ResponsiveDatatablesHelper.prototype.respond = function () {
  if (this.disabled) {
    return;
  }

  // Get new windows width
  var newWindowWidth = $(window).width();
  var updatedHiddenColumnsCount = 0;

  // Loop through breakpoints to see which columns need to be shown/hidden.
  var newColumnsToHide = [];
  _.each(this.breakpoints, function (element) {
    if ((!element.lowerLimit || newWindowWidth > element.lowerLimit)
      && (!element.upperLimit || newWindowWidth <= element.upperLimit)
    ) {
      newColumnsToHide = newColumnsToHide.concat(element.columnsToHide);
    }
  }, this);

  // Find out if a column show/hide should happen.
  // Skip column show/hide if this window width change follows immediately
  // after a previous column show/hide.  This will help prevent a loop.
  var columnShowHide = false;
  if (!this.skipNextWindowsWidthChange) {
    // Check difference in length
    if (this.columnsHiddenIndexes.length !== newColumnsToHide.length) {
      // Difference in length
      columnShowHide = true;
    } else {
      // Same length but check difference in values
      var d1 = _.difference(this.columnsHiddenIndexes, newColumnsToHide).length;
      var d2 = _.difference(newColumnsToHide, this.columnsHiddenIndexes).length;
      columnShowHide = d1 + d2 > 0;
    }
  }

  if (columnShowHide) {
    // Showing/hiding a column at breakpoint may cause a windows width
    // change.  Let's flag to skip the column show/hide that may be
    // caused by the next windows width change.
    this.skipNextWindowsWidthChange = true;
    this.columnsHiddenIndexes = newColumnsToHide;
    this.columnsShownIndexes = _.difference(this.columnIndexes, this.columnsHiddenIndexes);
    this.showHideColumns();
    updatedHiddenColumnsCount = this.columnsHiddenIndexes.length;
    this.skipNextWindowsWidthChange = false;
  }


  // We don't skip this part.
  // If one or more columns have been hidden, add the has-columns-hidden class to table.
  // This class will show what state the table is in.
  if (this.columnsHiddenIndexes.length) {
    this.tableElement.addClass('has-columns-hidden');
    var that = this;

    // Show details for each row that is tagged with the class .detail-show.
    $('tr.detail-show', this.tableElement).each(function (index, element) {
      var tr = $(element);
      if (tr.next('.row-detail').length === 0) {
        ResponsiveDatatablesHelper.prototype.showRowDetail(that, tr);
      }
    });
  } else {
    this.tableElement.removeClass('has-columns-hidden');
    $('tr.row-detail').remove();
  }
};

/**
 * Show/hide datatables columns.
 */
ResponsiveDatatablesHelper.prototype.showHideColumns = function () {
  // Calculate the columns to show
  // Show columns that may have been previously hidden.
  this.columnsShownIndexes.forEach(function (element) {
    this.tableElement.fnSetColumnVis(element, true, false);
  }, this);

  // Hide columns that may have been previously shown.
  this.columnsHiddenIndexes.forEach(function (element) {
    this.tableElement.fnSetColumnVis(element, false, false);
  }, this);

  // Rebuild details to reflect shown/hidden column changes.
  var that = this;
  $('tr.row-detail').remove();
  if (this.tableElement.hasClass('has-columns-hidden')) {
    $('tr.detail-show', this.tableElement).each(function (index, element) {
      ResponsiveDatatablesHelper.prototype.showRowDetail(that, $(element));
    });
  }
};

/**
 * Create the expand icon on the column with the data-class="expand" attribute
 * defined for it's header.
 *
 * @param {Object} tr table row object
 */
ResponsiveDatatablesHelper.prototype.createExpandIcon = function (tr) {
  if (this.disabled) {
    return;
  }

  // Get the td for tr with the same index as the th in the header tr
  // that has the data-class="expand" attribute defined.
  var tds = $('td', tr);
  if (this.expandColumn !== undefined && this.expandColumn < tds.length) {
    var td = $(tds[this.expandColumn]);
    // Create expand icon if there isn't one already.
    if ($('.btn-expander', td).length == 0) {
      td.addClass('expander').prepend(this.expandIconTemplate);

      // Respond to click event on expander icon.
      td.on('click.expander', '.btn-expander', {responsiveDatatablesHelperInstance: this}, this.showRowDetailEventHandler);
    }
  }
};

/**
 * Show row detail event handler.
 *
 * This handler is used to handle the click event of the expand icon defined in
 * the table row data element.
 *
 * @param {Object} event jQuery event object
 */
ResponsiveDatatablesHelper.prototype.showRowDetailEventHandler = function (event) {
  if (this.disabled) {
    return;
  }

  // Get the parent tr of which this td belongs to.
  var tr = $(this).closest('tr');

  // Show/hide row details
  if (tr.hasClass('detail-show')) {
    ResponsiveDatatablesHelper.prototype.hideRowDetail(event.data.responsiveDatatablesHelperInstance, tr);
  } else {
    ResponsiveDatatablesHelper.prototype.showRowDetail(event.data.responsiveDatatablesHelperInstance, tr);
  }

  tr.toggleClass('detail-show');
  tr.find('.btn-expander').find('[class*="icon-"]').toggleClass('icon-plus').toggleClass('icon-minus');

  // Prevent click event from bubbling up to higher-level DOM elements.
  event.stopPropagation();
};

/**
 * Show row details
 *
 * @param {ResponsiveDatatablesHelper} responsiveDatatablesHelperInstance instance of ResponsiveDatatablesHelper
 * @param {Object}                     tr                                 jQuery wrapped set
 */
ResponsiveDatatablesHelper.prototype.showRowDetail = function (responsiveDatatablesHelperInstance, tr) {
  // Get column because we need their titles.
  var tableContainer = responsiveDatatablesHelperInstance.tableElement;
  var columns = tableContainer.fnSettings().aoColumns;

  var items = _.map(responsiveDatatablesHelperInstance.columnsHiddenIndexes, function (index) {
    var title = columns[index].sTitle,
      value = tableContainer.fnGetData(tr[0], index);

    return responsiveDatatablesHelperInstance.rowItemTemplate({ title: title, value: value });
  });

  var colspan = responsiveDatatablesHelperInstance.columnIndexes.length - responsiveDatatablesHelperInstance.columnsHiddenIndexes.length,
    newTr = responsiveDatatablesHelperInstance.rowTemplate({ items: items, colspan: colspan });

  // Append the new tr after the current tr.
  tr.after(newTr);
};

/**
 * Hide row details
 *
 * @param {ResponsiveDatatablesHelper} responsiveDatatablesHelperInstance instance of ResponsiveDatatablesHelper
 * @param {Object}                     tr                                 jQuery wrapped set
 */
ResponsiveDatatablesHelper.prototype.hideRowDetail = function (responsiveDatatablesHelperInstance, tr) {
  tr.next('.row-detail').remove();
};

/**
 * Disable responsive behavior and restores changes made.
 *
 * @param {Boolean} disable, default is true
 */
ResponsiveDatatablesHelper.prototype.disable = function (disable) {
  this.disabled = (disable === undefined) || true;

  if (this.disabled) {
    // Remove all trs that have row details.
    $('tbody tr.row-detail', this.tableElement).remove();

    // Remove all trs that are marked to have row details shown.
    $('tbody tr', this.tableElement).removeClass('detail-show');

    // Remove all expander icons
    $('tbody tr .btn-expander', this.tableElement).remove();

    this.columnsHiddenIndexes = [];
    this.columnsShownIndexes = this.columnIndexes;
    this.showHideColumns();
    this.tableElement.removeClass('has-columns-hidden');

    this.tableElement.off('click.expander', '.btn-expander', this.showRowDetailEventHandler);
  }
};

window.ResponsiveDatatablesHelper = ResponsiveDatatablesHelper;

})(jQuery, this);
