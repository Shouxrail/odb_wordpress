$(document).ready(() => {
    var st = $(this).scrollTop();
   if (st == 0){
        $('#header-1').css('height', 'auto');
        $('#header-2').css('height', '0px');
   } else {
        $('#header-1').css('height', '0px');
        $('#header-2').css('height', 'auto');
   }

   $("#s").attr("placeholder","SEARCH HERE");
    $("#searchsubmit").hide();
});

var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st == 0){
       $('#header-1').css('height', 'auto');
       $('#header-2').css('height', '0px');
   } else {
        $('#header-1').css('height', '0px');
       $('#header-2').css('height', 'auto');
   }
});

function backToTop() {
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    
    $("html, body").animate({scrollTop: 0}, 1000);
}