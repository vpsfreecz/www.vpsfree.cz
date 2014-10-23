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


function signup() {
	var nick			= $("#nick").val();
	var name			= $("#name").val();
	var surname			= $("#surname").val();
	var birth			= $("#birth").val();
	var address			= $("#address").val();
	var city			= $("#city").val();
	var zip				= $("#zip").val();
	var country			= $("#country").val();
	var email			= $("#email").val();
	var jabber			= $("#jabber").val();
	var how				= $("#how").val();
	var notes			= $("#notes").val();
	var distribution	= $("#distribution").val();
	var location		= $("#location").val();
	var currency		= $("#currency").val();
	
	$.ajax({
		type : "POST",
		url : "/prihlaska.php",
		data : {
			'nick'			:nick,
			'name'			:name,
			'surname'		:surname,
			'birth'			:birth,
			'address'		:address,
			'city'			:city,
			'zip'			:zip,
			'country'		:country,
			'email'			:email,
			'jabber'		:jabber,
			'how'			:how,
			'notes'			:notes,
			'distribution'	:distribution,
			'location'		:location,
			'currency'		:currency
			
		},
		success: function(data, status, jqxhr) {
			if(data.length == 0) {
				console.log("DONE");
		//		$('#support').hide().html('<div class="inside"><h2><Strong>Thank you for contacting us.</strong> <br/> We will do our best to write you back in a few moments.</h2></div>').fadeIn('slow');
			} else {
				var errors = jQuery.parseJSON(data);

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