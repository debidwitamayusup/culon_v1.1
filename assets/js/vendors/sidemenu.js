(function () {
	"use strict";

	var slideMenu = $('.side-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').on("click", function(event) {
		event.preventDefault();
		// $('.app').removeClass('sidenav-toggled');
		$('.app').toggleClass('sidenav-toggled');
	});
	

	// if ( $(window).width() > 739) {     
	// 	$('.app-sidebar').on("mouseover", function(event) {
	// 		event.preventDefault();
	// 		$('.app').removeClass('sidenav-toggled');
	// 	});
	// } 

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
