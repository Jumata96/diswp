/* ////////////////////////////////    custom script /////////////////////////////////////////// */

'use strict';

$(function() {
    /*Pre Page Loader*/
    var timerStartPageLoading = Date.now();
    var pageLoadTime = (Date.now() - timerStartPageLoading) + 600;

    $("#pre-page-loader").show(0).delay(pageLoadTime).hide(0);

    /* mobile sidebar show and hide */
    $('.button-collapse').sideNav({
        menuWidth: 230, // Default is 300
        draggable: false // Choose whether you can drag to open on touch screens
    });

    /* initialize navbar dropdown*/
    $('.dropdown-button').dropdown({
        hover: true, // Activate on hover
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        belowOrigin: false // Displays dropdown below the button
    });

    /*FAQ Collapse*/
    $('.faq-card .card-title').on('click', function() {
        $(this).next('.card-body').slideToggle();
        if ($(this).children('.material-icons').text() == "add")
            $(this).children('.material-icons').text("remove")
        else
            $(this).children('.material-icons').text("add")
    });


    /*Scroll Bottom to Top */
    scrollTop();

    $('#scroll-top').on('click', function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    function scrollTop() {
        var refScroll = $(window).scrollTop();
        if (refScroll > 500) {
            $('#scroll-top').show();
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() > 500) {
                $('#scroll-top').show();

            }
            if ($(window).scrollTop() < 500) {
                $('#scroll-top').hide();
            }
        });
    }
});