(function () {
	"use strict";

	var slideMenu = $('.side-menu');
	$('.app').addClass('sidebar-mini');
	// $('.app').addClass('sidebar-mini sidenav-toggled');

	// Toggle Sidebar
	$(document).on("click", "[data-toggle='sidebar']", function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
		$('.app').removeClass('sidenav-toggled4');
	});
	$(document).on("click", ".sidenav-toggled .app-sidebar__toggle", function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled1');
	});
	$(document).on("click", ".sidenav-toggled .resp-tab-item", function(event) {
		event.preventDefault();
		$('.app').addClass('sidenav-toggled4');
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
			$('.app').toggleClass('sidenav-toggled1');
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

	// $(document).on("click","div div div a.slide-item", function(event){
	// 	event.preventDefault();
	// 	$('a.slide-item.active').removeClass('active');
	// 	$('a.slide-item').addClass('active');
	// 	$('div.resp-tab-content-active').removeClass('resp-tab-content-active')
	// 	$('div.resp-tab-content').prop('class','resp-tab-content-active');
		

	// 	console.log('aku pengen bisa js');
	// });

	// $(document).ready(function(){
	// 	$("button").click(function(){
	// 	  $("p:first").addClass("intro");
	// 	});
	//   });

	$(document).ready(function(){
		$("div div div a.slide-item").click(function(){
			$('div .resp-tab-content').prop('resp-tab-content-active').css('display','block');
		});

		console.log('Ya ALLAH pengen sidemenu nya sesuai menu yang diklik');
	});

	// $(document).on("click","div div div a.slide-item.active", function(event){
	// 	event.preventDefault();
	// 	$('div').hasClass('resp-tab-content-active').prop("class","resp-tab-content");
	// 	$('div').hasClass('resp-tab-content').prop("class","resp-tab-content-active");
	// })
	
	   
})();
