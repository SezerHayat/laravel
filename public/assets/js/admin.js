var resizefunc = [];


$(document).on('ready',function() {
    $(function() {  
    $(".nicescroll").niceScroll({cursorcolor:"#858586"});
	});	
});

        // START CODE FOR BASIC DATA TABLE 
        $(document).ready(function () {
          $('#example1').DataTable();
      });
      // END CODE FOR BASIC DATA TABLE 


      // START CODE FOR Child rows (show extra / detailed information) DATA TABLE 
      function format(d) {
          // `d` is the original data object for the row
          return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
              '<tr>' +
              '<td>Full name:</td>' +
              '<td>' + d.name + '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Extension number:</td>' +
              '<td>' + d.extn + '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Extra info:</td>' +
              '<td>And any further details here (images etc)...</td>' +
              '</tr>' +
              '</table>';
      }

      $(document).ready(function () {
          var table = $('#example2').DataTable({
              "ajax": "assets/data/dataTablesObjects.txt",
              "columns": [
                  {
                      "className": 'details-control',
                      "orderable": false,
                      "data": null,
                      "defaultContent": ''
                  },
                  { "data": "name" },
                  { "data": "position" },
                  { "data": "office" },
                  { "data": "salary" }
              ],
              "order": [[1, 'asc']]
          });

          // Add event listener for opening and closing details
          $('#example2 tbody').on('click', 'td.details-control', function () {
              var tr = $(this).closest('tr');
              var row = table.row(tr);

              if (row.child.isShown()) {
                  // This row is already open - close it
                  row.child.hide();
                  tr.removeClass('shown');
              }
              else {
                  // Open this row
                  row.child(format(row.data())).show();
                  tr.addClass('shown');
              }
          });
      });
      // END CODE FOR Child rows (show extra / detailed information) DATA TABLE 		



      // START CODE Show / hide columns dynamically DATA TABLE 		
      $(document).ready(function () {
          var table = $('#example3').DataTable({
              "scrollY": "350px",
              "paging": false
          });

          $('a.toggle-vis').on('click', function (e) {
              e.preventDefault();

              // Get the column API object
              var column = table.column($(this).attr('data-column'));

              // Toggle the visibility
              column.visible(!column.visible());
          });
      });
      // END CODE Show / hide columns dynamically DATA TABLE 	


      // START CODE Individual column searching (text inputs) DATA TABLE 		
      $(document).ready(function () {
          // Setup - add a text input to each footer cell
          $('#example4 thead th').each(function () {
              var title = $(this).text();
              $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          });

          // DataTable
          var table = $('#example4').DataTable();

          // Apply the search
          table.columns().every(function () {
              var that = this;

              $('input', this.header()).on('keyup change', function () {
                  if (that.search() !== this.value) {
                      that
                          .search(this.value)
                          .draw();
                  }
              });
          });
      });
  // END CODE Individual column searching (text inputs) DATA TABLE


!function($) {
    "use strict";
	
    var Sidemenu = function() {
        this.$body = $("body"),
        this.$openLeftBtn = $(".open-left"),
        this.$menuItem = $("#sidebar-menu a")
    };
    Sidemenu.prototype.openLeftBar = function() {
      $("#main").toggleClass("enlarged");
      $("#main").addClass("forced");

      if($("#main").hasClass("enlarged") && $("body").hasClass("adminbody")) {
        $("body").removeClass("adminbody").addClass("adminbody-void");
      } else if(!$("#main").hasClass("enlarged") && $("body").hasClass("adminbody-void")) {
        $("body").removeClass("adminbody-void").addClass("adminbody");
      }

      if($("#main").hasClass("enlarged")) {
        $(".left ul").removeAttr("style");
      } else {
        $(".subdrop").siblings("ul:first").show();
      }

    },
    //menu item click
    Sidemenu.prototype.menuItemClick = function(e) {
       if(!$("#main").hasClass("enlarged")){
        if($(this).parent().hasClass("submenu")) {

        }
        if(!$(this).hasClass("subdrop")) {
          // hide any open menus and remove all other classes
          $("ul",$(this).parents("ul:first")).slideUp(350);
          $("a",$(this).parents("ul:first")).removeClass("subdrop");
          $("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add");

          // open our new menu and add the open class
          $(this).next("ul").slideDown(350);
          $(this).addClass("subdrop");
          $(".pull-right i",$(this).parents(".submenu:last")).removeClass("md-add").addClass("md-remove");
          $(".pull-right i",$(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
        }else if($(this).hasClass("subdrop")) {
          $(this).removeClass("subdrop");
          $(this).next("ul").slideUp(350);
          $(".pull-right i",$(this).parent()).removeClass("md-remove").addClass("md-add");
        }
      }
    },

    //init sidemenu
    Sidemenu.prototype.init = function() {
      var $this  = this;

      var ua = navigator.userAgent,
        event = (ua.match(/iP/i)) ? "touchstart" : "click";

      //bind on click
      this.$openLeftBtn.on(event, function(e) {
        e.stopPropagation();
        $this.openLeftBar();
      });

      // LEFT SIDE MAIN NAVIGATION
      $this.$menuItem.on(event, $this.menuItemClick);

      // NAVIGATION HIGHLIGHT & OPEN PARENT
      $("#sidebar-menu ul li.submenu a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
    },

    //init Sidemenu
    $.Sidemenu = new Sidemenu, $.Sidemenu.Constructor = Sidemenu

}(window.jQuery),


//main app module
 function($) {
    "use strict";

    var App = function() {        
        this.pageScrollElement = "html, body",
        this.$body = $("body")
    };

     //on doc load
    App.prototype.onDocReady = function(e) {
      FastClick.attach(document.body);
      resizefunc.push("changeptype");

      $('.animate-number').each(function(){
        $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration")));
      });

      //RUN RESIZE ITEMS
      $(window).resize(debounce(resizeitems,100));
      $("body").trigger("resize");


    },
    //initilizing
    App.prototype.init = function() {
        var $this = this;
        $(document).ready($this.onDocReady);
        $.Sidemenu.init();
    },

    $.App = new App, $.App.Constructor = App

}(window.jQuery),

//initializing main application module
function($) {
    "use strict";
    $.App.init();
}(window.jQuery);


function executeFunctionByName(functionName, context) {
  var args = [].slice.call(arguments).splice(2);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  for(var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  return context[func].apply(this, args);
}
var w,h,dw,dh;
var changeptype = function(){
    w = $(window).width();
    h = $(window).height();
    dw = $(document).width();
    dh = $(document).height();

    if(jQuery.browser.mobile === true){
        $("body").addClass("mobile").removeClass("adminbody");
    }

    if(!$("#main").hasClass("forced")){
      if(w > 990){
        $("body").removeClass("smallscreen").addClass("widescreen");
          $("#main").removeClass("enlarged");
      }else{
        $("body").removeClass("widescreen").addClass("smallscreen");
        $("#main").addClass("enlarged");
        $(".left ul").removeAttr("style");
      }
      if($("#main").hasClass("enlarged") && $("body").hasClass("adminbody")){
        $("body").removeClass("adminbody").addClass("adminbody-void");
      }else if(!$("#main").hasClass("enlarged") && $("body").hasClass("adminbody-void")){
        $("body").removeClass("adminbody-void").addClass("adminbody");
      }

  }
  
}


var debounce = function(func, wait, immediate) {
  var timeout, result;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) result = func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) result = func.apply(context, args);
    return result;
  };
}

function resizeitems(){
  if($.isArray(resizefunc)){
    for (i = 0; i < resizefunc.length; i++) {
        window[resizefunc[i]]();
    }
  }
}
