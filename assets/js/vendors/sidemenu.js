(function () {
	"use strict";
	var lock = false;
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
		lock = lock ? false : true;
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

	if ( $(window).width() > 739) {     
			$('.app-sidebar').on("mouseout", function(event) { //"mouseover"
				event.preventDefault();
				if(lock === false){
					$('.app').toggleClass('sidenav-toggled');
				}
			});
		} 

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
			// $('.slide').hasClass('is-expanded');
			// $('a .slide-item .active').parent('.slide').addClass('.is-expanded');
			$('.app.sidebar-mini').removeClass('sidenav-toggled').addClass('sidebar__overlay');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	$("[data-toggle='collapse']").on("click", function(event){
		event.preventDefault();
		if(!$(this).parent().hasClass('collapse')){
			// if($('a .slide-item').parent('li .slide')){
			// 	$('li .slide').addClass('is expanded').css('display','block');
			// }
			$('.slide-item.active.collapsed').removeClass('collapsed').parent('div .collapse.show');
			$('.app.sidebar-mini').removeClass('sidenav-toggled').addClass('sidebar__overlay');
			
		}
		
	});

	// $('slide-item').hasClass('active').parent("collapse").css("display","block");
	// Set initial active toggle
	$("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

	function activateMenu(prefixUrl) {
		let href = $("#ul-menu > div > a");
		let urlHref = window.location.href;		
		for(let i = 0;i < href.length;i++) {
			if(urlHref == href[i].href) {
				href[i].setAttribute('class','active');
				$("#ul-menu").attr('style','display: block');
			}
		}
	}	
})();
