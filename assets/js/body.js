$(document).ready(() => {
    //header settings
    headerToggle();

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

    $('.odb_nav-submenu-toggle').map((i, v) => {
        $(v).click(() => {
            if ($(v).children('ul.sub-menu').height() > 0) {
                $(v).children('ul.sub-menu').css('max-height', '0px');
            } else {
                $(v).children('ul.sub-menu').css('max-height', '100px');
            }
        });
    });
});

$(window).scroll(function(event){
   headerToggle();
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

function headerToggle() {
    var st = $(this).scrollTop();
    if (window.matchMedia('(max-width: 600px)').matches) {
        if (st == 0){
            $('#header-1').css({
                height: '0px',
                opacity: 0,
                display: 'none'
            });
            $('#header-2').css({
                height: '90px',
                opacity: 1
            });
       } else {
            $('#header-1').css({
                height: '0px',
                opacity: 0,
                display: 'none'
            });
            $('#header-2').css({
                height: '90px',
                opacity: 1
            });
       }
    } else {
        if (st == 0){
             $('#header-1').css({
                 height: '144px',
                 opacity: 1
             });
             $('#header-2').css({
                 height: '0px',
                 opacity: 0
             });
        } else {
             $('#header-1').css({
                 height: '0px',
                 opacity: 0
             });
             $('#header-2').css({
                 height: '92px',
                 opacity: 1
             });
        }
    }
}

function toggleMobileNavMenu() {
    if ($('#odb_mobile-nav').height() == 0) {
        $('#odb_mobile-nav').css('max-height', 500);
    } else {
        $('#odb_mobile-nav').css('max-height', 0);
    }
}
