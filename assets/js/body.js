$(document).ready(() => {
    //header settings
    var st = $(this).scrollTop();
   if (st == 0){
        $('#header-1').css('height', '144px');
        $('#header-2').css('height', '0px');
   } else {
        $('#header-1').css('height', '0px');
        $('#header-2').css('height', '92px');
   }

   $("#s").attr("placeholder","SEARCH HERE");
    $("#searchsubmit").hide();

   //beranda content2 carousel settings
    $('.odb_beranda-content2-container .owl-nav.disabled').each((i, v) => {
        $(v).removeClass('disabled');
        $(v).children().css('padding', 30).click(() => $(v).removeClass('disabled'));
    }); 
    
    $('.odb_beranda-content2-container .owl-nav').each((i, v) => {
        $(v).removeClass('disabled');
        $(v).children().click(() => $(v).removeClass('disabled'));
    }); 

    //beranda content3 carousel settings
    $('.odb_beranda-content3-container .owl-nav.disabled').each((i, v) => {
        $(v).removeClass('disabled');
        $(v).children().css('padding', 30).click(() => $(v).removeClass('disabled'));
    }); 
    
    $('.odb_beranda-content3-container .owl-nav.disabled').each((i, v) => {
        $(v).removeClass('disabled');
        $(v).children().click(() => $(v).removeClass('disabled'));
    }); 
});

var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st == 0){
       $('#header-1').css('height', '144px');
       $('#header-2').css('height', '0px');
   } else {
        $('#header-1').css('height', '0px');
       $('#header-2').css('height', '92px');
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