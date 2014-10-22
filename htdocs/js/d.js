ANIMATE_MIN_WIDTH = 1000;
ANIMATE_DURATION = 5000;

var animate_timeout = null;

function show_slide(i, settimer) {

    var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");
    var active = navigation_dots.find("li a:eq("+i+")");


    $("div.ab").fadeOut({easing:'linear'});
    $("div.ab:eq("+i+")").fadeIn({easing:'linear'});
    anchors.removeClass("yes").addClass("no");
    active.removeClass("no").addClass("yes");

    navigation_dots.data("active", i);

    if(settimer) {
        animate_timeout = setTimeout(function() {
            var next = (navigation_dots.data("active") + 1) % anchors.length;
            show_slide(next, true);

            navigation_dots.data("active", next);
        }, ANIMATE_DURATION);
    }
}


$(document).ready(function() {
    var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");

    navigation_dots.data("active", 0);

    if($(window).width() > ANIMATE_MIN_WIDTH) {
        show_slide(0, true);
    }

    anchors.each(function(i, el) {
        $(this).click(function() {

            clearTimeout(animate_timeout);
            show_slide(i, false);

            return false;
        });
    });

    var max_height = 0;

    var pages = $("div.ab");
    pages.each(function() {
        max_height = Math.max(max_height, $(this).height());
    });

    $("section.page2").height(max_height + 100);
    pages.height(max_height);

    $('a.menu-btn').click(function() {
        $('header section nav').slideToogle();
        return false;
    });

});