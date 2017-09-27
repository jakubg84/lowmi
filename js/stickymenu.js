jQuery("document").ready(function($){

  var nav = $('#main-menu-container');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 143) {
      nav.addClass("fix-search");
    } else {
      nav.removeClass("fix-search");
    }
  });

});