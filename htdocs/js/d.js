ANIMATE_MIN_WIDTH = 1000;
ANIMATE_DURATION = 5000;
HEADER_OFFSET = 80;

var animate_timeout = null;
var auto_play = true;

var hashtags = ["why", "parameters", "who", "community", "social", "support"];

function switch_slide(i, settimer) {
	var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");
    var active = navigation_dots.find("li a:eq("+i+")");
	
	$("div.ab").hide();
    $("div.ab:eq("+i+")").show();
    if($(window).width() < ANIMATE_MIN_WIDTH) { //pouze na mobilnich zarizeni kde slider neni aktivni
        $(".page2").height($("div.ab:eq("+i+")").outerHeight()); //uprvit veliost jednotlivych slideru
    }
    anchors.removeClass("yes").addClass("no");
    active.removeClass("no").addClass("yes");
	
	navigation_dots.data("active", i);
	
	if (settimer && auto_play) {
        animate_timeout = setTimeout(function() {
            var next = (navigation_dots.data("active") + 1) % anchors.length;
            show_slide(next, true);

            navigation_dots.data("active", next);
        }, ANIMATE_DURATION);
    }
}

function show_slide(i, settimer) {

    var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");
    var active = navigation_dots.find("li a:eq("+i+")");

    if (history.pushState)
        history.replaceState(null, null, "#slide-" + hashtags[i]);

    $("div.ab").fadeOut({easing:'linear'});
    $("div.ab:eq("+i+")").fadeIn({easing:'linear'});
    if($(window).width() < ANIMATE_MIN_WIDTH) { //pouze na mobilnich zarizeni kde slider neni aktivni
        $(".page2").height($("div.ab:eq("+i+")").outerHeight()); //uprvit veliost jednotlivych slideru
    }
    anchors.removeClass("yes").addClass("no");
    active.removeClass("no").addClass("yes");

    navigation_dots.data("active", i);

    if(settimer && auto_play) {
        animate_timeout = setTimeout(function() {
            var next = (navigation_dots.data("active") + 1) % anchors.length;
            show_slide(next, true);

            navigation_dots.data("active", next);
        }, ANIMATE_DURATION);
    }
}

function resume_slide() {
    var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");

    if(auto_play) {
        animate_timeout = setTimeout(function() {

            var next = (navigation_dots.data("active") + 1) % anchors.length;
            show_slide(next, auto_play);

            navigation_dots.data("active", next);
        }, ANIMATE_DURATION);
    }
}

function signup() {
	$("#send").attr("value", "Prosím, čekej...");
	var nick			= $("#nick").val();
	var name			= $("#name").val();
	var surname			= $("#surname").val();
	var birth			= $("#birth").val();
	var address			= $("#address").val();
	var city			= $("#city").val();
	var zip				= $("#zip").val();
	var country			= $("#country").val();
	var email			= $("#email").val();
	var how				= $("#how").val();
	var note			= $("#note").val();
	var distribution	= $("#distribution").val();
	var location		= $("#location").val();
	var currency		= $("#currency").val();
        var mock                        = $('#_mock').val();

        data = {
            'nick'			:nick,
            'name'			:name,
            'surname'		:surname,
            'birth'			:birth,
            'address'		:address,
            'city'			:city,
            'zip'			:zip,
            'country'		:country,
            'email'			:email,
            'how'			:how,
            'note'			:note,
            'distribution'	:distribution,
            'location'		:location,
            'currency'		:currency,
            'js'  			:true
        };

        if (mock)
            data['_mock'] = mock;
	
	$.ajax({
		type : "POST",
		url : "/prihlaska.php",
		data : data,
		success: function(data, status, jqxhr) {
			if(data.length == 0) {
				$('section.pg.page4 > div.in').hide().html('<h2>Děkujeme - Odesláno</h2>Měl bys obdržet e-mail potvrzující přijetí přihlášky - pokud se tak nestane do deseti minut, pošli přihlášku prosím znova.<br />Pokud ani přes to nic nepřichází, obrať se prosím na podporu - podpora @ vpsfree.cz<br /><br/>Děkujeme za Tvůj zájem přidat se k nám.').fadeIn('slow');
			} else {
				$('input[type=text]').removeClass("error");
				var errors = jQuery.parseJSON(data);
				$("#send").attr("value", "Odeslat");
				
				$("#order form *").removeClass("error");
				
				for (var i in errors) {
					$('#' + errors[i]).addClass("error");
				}		
			}
		},
		error: function(jqxhr, status, error) {
			alert("Error during POST request,  status:" + status + ", message:" + error);
		}
	});	
	
	return false;
}



$(document).ready(function() {
	// Apply JS-specific stylesheet
	var style = $("<style type='text/css'>").appendTo('head');
	
	style.html("\
		.km { \
			height: 430px; \
		} \
		section.page2 { \
			height: 780px; \
		} \
		section.page2 .ab { \
			position: absolute; \
		} \
	");
	
	$("section.page2 div.ab:gt(0)").addClass("n");
	
	// Show dots above slides
	$("section.page2 div.dots").removeClass("n");
	
    var navigation_dots = $("section.page2 div.dots");
    var anchors = navigation_dots.find("li a");
    var arrows = $("section.page2 a.arrow");
    var runSlides = true;

    navigation_dots.data("active", 0);

    // Set initial hash tag to the top, so that changing hash
    // when switching slides does not scroll to the tag.
    if (!window.location.hash) {
        window.location.hash = "";
        
    } else if (window.location.hash.indexOf("slide-")) {
        // Hash tag is present, show appropriate slide
        var index = hashtags.indexOf( window.location.hash.substr(7) );
        
        if (index != -1) {
            switch_slide(index, false);
            runSlides = false;
        }
        
    }

    if (runSlides && $(window).width() > ANIMATE_MIN_WIDTH) {
        setTimeout(function (){
            show_slide(1, true);
        }, ANIMATE_DURATION);

        //Pause and resume animation on mouse hover event
        $("#about").on({
            mouseenter: function() {
                clearTimeout(animate_timeout);
            },
            mouseleave: function() {
                resume_slide();
            }
        });
    } else {
        $(".page2").height($("div.ab:eq("+navigation_dots.data("active")+")").outerHeight());
    }
    
    anchors.each(function(i, el) {
        $(this).attr("href", "#slide-" + hashtags[i]);
        $(this).click(function() {

			auto_play = false;

            clearTimeout(animate_timeout);
            show_slide(i, false);

            return false;
        });
    });

    arrows.each(function() {
        $(this).click(function() {

            auto_play = true;
            var go_to = navigation_dots.data("active");

            if($(this).hasClass("right")) {
                go_to = (go_to + 1) % anchors.length;
                if(go_to > 5) { //fixing "index" -> fixing hashtag
                    go_to = 0;
                }
            } else if($(this).hasClass("left")) {
                go_to = (go_to - 1) % anchors.length;
                if(go_to < 0) { //fixing "index" -> fixing hashtag
                    go_to = anchors.length-1;
                }
            }

            clearTimeout(animate_timeout);
            show_slide(go_to, false);

            return false;
        });
    });

    if($(window).width() > ANIMATE_MIN_WIDTH) {
        var max_height = 0;

        var pages = $("div.ab");
        pages.each(function() {
            max_this = $(this).height();
            if (max_this > 700) {
                max_this = 700;
            }
            max_height = Math.max(max_height, max_this);
        });

        $("section.page2").height(max_height + 100);
        pages.height(max_height);
    }

    $('a.menu-btn').click(function() {
        $('header section nav').slideToggle();
        return false;
    });

    $('header a[href^="#"]').on("click", function(event) {

        event.preventDefault();
        clearTimeout(animate_timeout);

        var scroll_to = $(this).attr("href");
        if(scroll_to == "#slide-parameters") {
            scroll_to = "#about";
            show_slide(1, false);
        } else if(scroll_to == "#about") {
            show_slide(0, false);
        }

        $('html, body').animate({scrollTop:$(scroll_to).offset().top-HEADER_OFFSET}, 1500);

    });

    $('.js-show-form').click(function () {
        $('.page4 form').slideDown();
        $(this).slideUp();
    });

    //fix initial anchor move
    if (window.location.hash) {
        $('html, body').animate({scrollTop:$(window.location.hash).offset().top-HEADER_OFFSET}, 1500);
    }

});
