jQuery(document).ready(function($) {
    
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    $(".testimonial-tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".testimonial-tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    $('#responsive-menu-button').sidr({
	    name: 'sidr-main',
	    source: '#site-navigation',
	    side: 'right'
    });

    $('html').click(function() {
        $('.site-header .header-b .btn-search .search-form').hide();
    });

    $('.site-header .header-b .btn-search .search-form').click(function(event){
        event.stopPropagation();
    });
    $(".site-header .header-b .btn-search .search").click(function(){
        $(".search-form").slideToggle();
        return false;
    });

    $(".testimonial-tabs-menu").owlCarousel({ 
        // Most important owl features
        items : 3,
        // Navigation
        navigation : true,
        mouseDrag : false,
        rewindNav : false,
        pagination : false,
        itemsTablet: [768,3],
        itemsMobile : [767,1],
    });

    var wsize = $(window).width();
    if(wsize > 767){
        $(".testimonial .testimonial-tabs-menu .owl-wrapper div:nth-child(2)").addClass("current");
    } else {
        $(".testimonial .testimonial-tabs-menu .owl-wrapper div:first-child").addClass("current");
    }
});