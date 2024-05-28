
// jQuery Togglle for the TOP-SECTION div
// jQuery Simple Active State

$(document).ready(function (){
							
	$("a#show-hide").click(function (){
		$("#top-section").slideToggle("slow");	
	});
	// active state
	$("ul#navbar li a").click(function (){
	    $("ul#navbar li a.liactive").removeClass("liactive");
		$(this).addClass("liactive");
	});
	// tipsy plugin
	$("a#show-hide").tipsy({fade: true});	
	$("a#rss").tipsy({gravity: "w", fade: true});
	$("a#twitter").tipsy({gravity: "e", fade: true});

});

// All this js is hand coded by Ossama