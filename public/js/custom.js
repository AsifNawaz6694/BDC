$(document).ready(function () {
    $(window).scroll(function () {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });


    $('#myCarousel').carousel({
        interval: 3000,
        cycle: true
    });

// Feature Slider
    var owl = $("#owl-demo");
    owl.owlCarousel({
        items: 3, //10 items above 1000px browser width
        itemsDesktop: [1000, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        pagination: false
    });

    // Custom Navigation Events
    $(".next").click(function () {
        owl.trigger('owl.next');
    });
    $(".prev").click(function () {
        owl.trigger('owl.prev');
    });

});


//masonry function
$(function(){
    $('#masonry_listing').masonry({
        // options
        itemSelector : '.listing_item',
        columnWidth : '.listing_item',
        percentPosition: true
    });
});