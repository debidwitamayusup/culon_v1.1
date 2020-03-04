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

	// $(document).on("click", "a .slide-item ", function(event) {
	// 	event.preventDefault();
	// 	console.log('aku');
	// 	$(this).parent().parent().parent().hasClass("resp-tab-content").prop("class","resp-tab-content-active");
	// });

	// $(document).on('click','div a.slide-item', function(){
	// 	$(this).parents('div').hasClass('resp-tab-content-active').removeClass('resp-tab-content-active');
	// 	$(this).parents('div:first').addClass('resp-tab-content-active');
	// });

	// $(document).on("click","a .slide-item", function(){
	// 	$(this).parent().parent().parent().hasClass("resp-tab-content").prop("class","resp-tab-content-active");
	// 	console.log("cape akutuh");
	// });

	// $('div div div a .slide-item').on('click',function(){
	// 	$(this).addClass('active');
	// });

	// $("a .slide-item").on("click", function(event){
	// 	event.preventDefault();
	// 	if($(this).parent().parent().parent().hasClass('resp-tab-content-active')){
	// 		$("a").find(" .slide-item .active").removeClass("active");
			
	// 		$("div").find(".resp-tab-content-active").prop("class","resp-tab-content");
			
	// 	}
	// 	$("a").find(".slide-item").addClass("active");
	// 	$("div").find(".resp-tab-content").prop("class","resp-tab-content-active");
	// });

	// $("a .slide-item").on("click", function(event){
	// 	event.preventDefault();
	// 	("a .slide-item").removeClass("active").addClass("active");
	// 	("div .first-sidemenu li").remove("resp-tab-active").addClass("resp-tab-active");
	// 	("div .second-sidemenu div.active.resp-tab-content").removeClass("active").prop("resp-tab-content-active");
	// });
	
	   
})();
