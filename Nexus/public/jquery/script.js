/*!
 * jQuery based Carousel 2.0
 * https://github.com/flamboyanz/jquery-carousel-2.0
 * Version 1.0: 05-04-2014
 */

(function ($) {

    $.fn.Slider = function (params) {

        var defaults = {
            width    : $(this).width(),
            height   : $(this).height(),
            styleNav : true,
            navColor : "#555555",
            direction: "left",
            speed    : 300
            },

        params = $.extend({}, defaults, params);

        // add some css
        $(this).css({
            "position": "relative",
            "overflow": "hidden"
        });

        $(this).html($("<div class='member_list clearfix'>", { id : 'slides-container'}).css('position', 'absolute').html($(this).html()));


       //$(this).html('<div style="position:absolute;" id="slides-container">' + $(this).html() + '</div>');
        var count = $(this).find('.slide').length;

        // this div
        var thisDiv = $(this).attr("id");

        // check direction
        if (params.direction === "up") {
            var slidesWidth = params.width;
            var slidesHeigh = count * params.height;
        } else {
            var slidesWidth = count * params.width;
            var slidesHeigh = params.height;
        }


        $(this).find('#slides-container').css({
            'width': slidesWidth,
            'height': slidesHeigh
        });

        // create navs
        $(this).append('<div class="member_head"><a href="#"><h3>new members</h3></a><a class="forward_arrow sprite" id="next"></a><a class="backward_arrow sprite" id="prev"></a></div>');

        // some css to navigation
        $(this).find("#navigation").css({
            "position": "absolute",
            "top"     : "46%",
            "width"   : "100%",
        });

        // some styles to slider items
        $(this).find(".slide").each(function () {
            $(this).css({
                "width"  : params.width,
                "height" : params.height,
                "display": "block-inline",
                "float"  : "left",
            });
        });

        // if stylenav is true then add some styles
        if (params.styleNav == true) {

            $(this).find(".slider-nav").each(function () {
                $(this).css({
                    "background-color":  params.navColor,
                    "cursor"          : "pointer",
                    "color"           : "#FFFFFF",
                    "cursor"          : "pointer",
                    "font-family"     : "arial",
                    "font-size"       : "14px",
                    "font-weight"     : "bold",
                    "padding"         : "10px 15px",
                    "text-transform"  : "uppercase",
                    "position"        : "absolute",
                    "display"         : "block",
                });
            });

            $(this).find(".prev").css("right", "0");
        };

        // some properties
        var pix = 0;

        // bind events
        $(this).find(".prev").on("click", function () {

            if (params.direction !== "up") {

                if (pix === slidesWidth || pix === (slidesWidth - params.width)) {
                    return;
                }

                pix = pix + params.width;

                // slide left
                slideLeft(pix);

            } else {

                // slide up
                if (pix === slidesHeigh || pix === (slidesHeigh - params.height)) {
                    return;
                }

                pix = pix + params.height;

                // slide left
                slideUp(pix);

            }
        });

        $(this).find(".next").on("click", function () {
            if (pix === 0) {
                return;
            }

            if (params.direction !== "up") {

                pix = pix - params.width;
                // slide left
                slideLeft(pix);

            } else {

                pix = pix - params.height;

                // slide left
                slideUp(pix);

            }

        });

        // function to do sliding left/right
        function slideLeft(pixels) {
            $("#"+thisDiv+" #slides-container").animate({
                "left": '-' + pixels + 'px'
            }, params.speed);
        }

        // function to do sliding up/down
        function slideUp(pixels) {
            $("#"+thisDiv+" #slides-container").animate({
                "top": '-' + pixels + 'px'
            }, params.speed);
        }

        // allow jQuery chaining
        return this;
    };

})(jQuery);