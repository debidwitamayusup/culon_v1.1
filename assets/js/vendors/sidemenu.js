(function () {
	"use strict";

	// var delay = function (elem, callback) {
	// 	var timeout = null;
	// 	elem.onmouseover = function() {
	// 		// Set timeout to be a timer which will invoke callback after 1s
	// 		timeout = setTimeout(callback, 1000);
	// 	};
	
	// 	elem.onmouseout = function() {
	// 		// Clear any timers set to timeout
	// 		clearTimeout(timeout);
	// 	}
	// };

	// if ($('body').hasClass('.sidebar__overlay')){
	// 	$('.app .sidebar-mini').removeClass('.sidebar__overlay').addClass('sidenav-toggled');
	// }

	var slideMenu = $('.side-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').on("click", function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
		// ('.app.sidebar-mini').removeClass('.sidebar__overlay');
		// $('.side-menu').on('mouseover mouseenter mouseleave mouseup mousedown', function() {
		// 	return false
		//  });
	});
	
	// delay($('.app-sidebar').(onmouseenter , function(event) {
	// 	event.preventDefault();
	// 	$('.app').toggleClass('sidenav-toggled');
	// });

	// if ( $(window).width() > 739) {     
	// 	$('.app-sidebar').on("mouseenter", function(event) { //"mouseover"
	// 		event.preventDefault();
	// 		$('.app').toggleClass('sidenav-toggled');
	// 	});
	// } 

	// if ( $(window).width() > 739) {     
	// 	$('.app-sidebar').on("mouseleave", function(event) { //"mouseover"
	// 		event.preventDefault();
	// 		$('.app').toggleClass('sidenav-toggled');
	// 	});
	// } 

	// $('.slide_item').on("click", function(event){
	// 	event.preventDefault();
	// 	$('.app-sidebar').toggleClass('sidebar__overlay');
	// })
	// $('.element').on('mouseover mouseenter mouseleave mouseup mousedown', function() {
	// 	return false
	//  });

	if ( $(window).width() > 739) {     
		$('.app-sidebar').on("mouseover", function(event) {
			event.preventDefault();
			$('.app').removeClass('sidenav-toggled');
		});
	} 

	// if ( $(window).width() > 739) {     
	// 		$('.app-sidebar').on("mouseout", function(event) { //"mouseover"
	// 			event.preventDefault();
	// 			$('.app').toggleClass('sidenav-toggled');
	// 		});
	// 	} 

	// $("#div-1").bind('mouseover',function(event){
    //   $('#div-2').stop(true,true).fadeIn(100);
    // });
    // $('#div-2').bind('mouseleave', function(e) {
    //   $(this).stop(true,true).fadeOut(100);
	// });
	
	// Activate sidebar slide toggle
	$("[data-toggle='slide']").on("click", function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-toggle='slide']").parent().removeClass('is-expanded');
			$('.app.sidebar-mini').removeClass('sidenav-toggled').addClass('sidebar__overlay');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// $("[data-toggle='collapse']").on("click", function(event){
	// 	event.preventDefault();
	// 	if(!$(this).parent().hasClass('active')){
	// 		$("#accordion").find("[data-toggle='collapse']").parent.removeClass('collapse');
	// 		$('slide-item').removeClass('collapse')
	// 	}
	// })
	// Set initial active toggle
	$("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();
