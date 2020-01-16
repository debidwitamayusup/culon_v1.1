(function () {
	"use strict";

	var delay = function (elem, callback) {
		var timeout = null;
		elem.onmouseover = function() {
			// Set timeout to be a timer which will invoke callback after 1s
			timeout = setTimeout(callback, 1000);
		};
	
		elem.onmouseout = function() {
			// Clear any timers set to timeout
			clearTimeout(timeout);
		}
	};

	var slideMenu = $('.side-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').on("click", function(event) {
		event.preventDefault();
		// $('.app').removeClass('sidenav-toggled');
		$('.app').toggleClass('sidenav-toggled');
	});
	
	// delay($('.app-sidebar').(onmouseenter , function(event) {
	// 	event.preventDefault();
	// 	$('.app').toggleClass('sidenav-toggled');
	// });

	if ( $(window).width() > 739) {     
		$('.app-sidebar').on("mouseenter", function(event) { //"mouseover"
			event.preventDefault();
			$('.app').toggleClass('sidenav-toggled');
		});
	} 

	if ( $(window).width() > 739) {     
		$('.app-sidebar').on("mouseleave", function(event) { //"mouseover"
			event.preventDefault();
			$('.app').toggleClass('sidenav-toggled');
		});
	} 

	// Activate sidebar slide toggle
	$("[data-toggle='slide']").on("click", function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-toggle='slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	// $("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();
