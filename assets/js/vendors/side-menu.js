(function () {
	"use strict";
	var lock = false;

	var slideMenu = $('.side-menu');
	// $('.app').addClass('sidebar-mini');
	$('.app').addClass('sidebar-mini sidenav-toggled');

	// Toggle Sidebar
	$(document).on("click", "[data-toggle='sidebar']", function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
		$('.app').removeClass('sidenav-toggled4');
	});
	// $(document).on("click", ".sidenav-toggled .app-sidebar__toggle", function(event) {
	// 	event.preventDefault();
	// 	$('.app').toggleClass('sidenav-toggled1');
	// });
	$(document).on("click", ".sidenav-toggled .resp-tab-item", function(event) {
		event.preventDefault();
		$('.app').addClass('sidenav-toggled4');
		lock = lock ? false : true;
		// $('.app').removeClass('sidenav-toggled1');
		$('.app').removeClass('sidenav-toggled');
	});

	
	//mobile  Toggle Sidebar
	if ( $(window).width() < 767) { 
		$(document).on("click", "[data-toggle='sidebar']", function(event) {
			event.preventDefault();
			$('.app').toggleClass('sidenav-mobile');
		});
		
		$(document).on("click", ".sidenav-mobile .resp-tab-item", function(event) {
			event.preventDefault();
			// $('.app').toggleClass('sidenav-toggled1');
			$('.app').toggleClass('sidenav-toggled');
		});
	}
	
	// Activate sidebar slide toggle
	$(document).on("click", "[data-toggle='slide']", function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-toggle='slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

	// show sub menu per tab menu
	let url = window.location.href;
	$('#parent_menu div div a').each(function(){
		if(this.href === url){
			$('.app').removeClass('sidenav-toggled');
			$('.app').toggleClass('sidenav-toggled4');
			$(this).parent().parent().parent().removeClass("resp-tab-content");
			$(this).parent().parent().parent().prop("class","resp-tab-content-active");
		}
	});
	
	// show slide menu 
	$('#parent_menu #child_menu li a ').each(function(){
		if(this.href === url){
			$(this).closest("#parent_menu").removeClass("resp-tab-content-active");
			$(this).closest("#parent_menu").prop("class","resp-tab-content-active");
			$(this).parent().parent().parent().prop("class","slide submenu is-expanded");
			$(this).parent().parent().parent().removeClass("resp-tab-content-active active");		}
	});

	   
})();
