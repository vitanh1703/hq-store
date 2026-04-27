jQuery(document).ready(function ($) {
    "use strict";
    var isMobile = false;
    if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
    } else {
        $('html').addClass('no-touch');
        isMobile = false;
    }

    // Scroll To
    $(".scroll-content").click(function () {
        $('html, body').animate({
            scrollTop: $("#site-content").offset().top
        }, 500);
    });
    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });
    $('.skip-link-menu-start').focus(function () {
        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }
    });
    // Toggle Menu
    $('.navbar-control-offcanvas').click(function () {
        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();
    });
    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        setTimeout(function () {
            $('.navbar-control-offcanvas').focus();
        }, 300);
    });
    $('#offcanvas-menu').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
    });
    $(".offcanvas-wraper").click(function (e) {
        e.stopPropagation(); //stops click event from reaching document
    });
    $('.skip-link-menu-end').on('focus', function () {
        $('.button-offcanvas-close').focus();
    });
    // Data Background
    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });
    // Scroll to Top on Click
    $('.to-the-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.header-navbar').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.header-navbar').addClass("stick_head");
    } else {
      jQuery('.header-navbar').removeClass("stick_head");
    }
  }
});

jQuery(document).ready(function($){
    jQuery('a[href="#search"]').on('click', function(event) {                    
        jQuery('#search').addClass('open');
        jQuery('#search > form > input[type="search"]').focus();
    });            
    jQuery('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            jQuery(this).removeClass('open');
        }
    });   

    $('.ht-product').each(function(){
        let productId = $(this).find('.woolentorquickview').data('product_id');
        let $productBox = $(this);

        $.ajax({
            url: ajax_obj.ajaxurl, 
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_product_rating',
                product_id: productId
            },
            success: function(response){
                if(response.success){

                    let rating = response.data.average;
                    let reviewCount = response.data.review_count;
                    let ratingText = '<div class="ht-product-rating-number">'+ rating +'/5 ('+ reviewCount +' Reviews)</div>';
                    $productBox.find('.ht-product-ratting-wrap').append(ratingText);
                }
            }
        });
    });         
});

//Loader
jQuery(window).on('load', function() {
  jQuery(".preloader").delay(1000).fadeOut("fast");
});

jQuery(function(jQuery) {

   var owl = jQuery('.theme-videos-block .owl-carousel');
        owl.owlCarousel({
            margin: 0,
            nav: true,
            autoplay:false,
            dots: false,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            loop: true,
            navText : ['<span class="dashicons dashicons-arrow-left-alt2"></span>','<span class="dashicons dashicons-arrow-right-alt2"></span>'],
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1100: {
                items: 1
            }
        }
    })
});