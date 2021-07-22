/*
 * All Scripts and Custom Scripts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* ************* SOME FUNTION INIT INDEX ******************
1.SERCH BOX FOCUS FUNCTION
2.OFF CANVES TOGGLE CLASS CUSTOM FUNCTION
3.CLASSIC HEADER MENU CUSTOM FUNCTION
4.HEIGHT FOR FULL SCREEN SLIDER CUSTOM FUNCTION
5.SPECIAL DISHES SECTION OWL CAROUSEL INIT FUNCTION
6.TESTIMONIAL  OWL CAROUSEL INIT INIT FUNCTION
7.CLASSIC TESTIMONIAL  OWL CAROUSEL INIT INIT FUNCTION
8.LIGHT GALLERY  INIT FUNCTION
9.FOOTER COLUM AUTO ADJUST FUNCTION
10.DROPDOWN MENU A CLICK FALSE FUNTION CALL
11.CUSTOM SLIDEDOWN MENU FUNCTION
12.PARALLAX INIT FUNCTION
13.ONE PAGE SMOOTH SCROLL INIT FUNCTION
14.INLINE FORM RESPOSIVE CLASS INIT FUNCTION
15.COUNTER UP  INIT FUNCTION
16.SERVICES PAGE SERVICE COLUM FIX INIT FUNCTION
17.SOME CUSTOM  STYLE FOR CONTACT FORM  FUNCTION
18.GOOGLE MAP INIT FUNCTION
19.SIDEBAR SERCH FORM FOCUS FUNCTION
20.ISOTOPE FILTER INIT FUNCTION
21.WOOCOMMERCE SPINNER INIT FUNCTION
22.WOOCOMMERCE CHCKBOX AND RADIO INPUT STYLE INIT FUNCTION
23.WOOCOMMERCE CART LIST HOVER INIT FUNCTION
24.CUSTOM DEFAULT HTML TABLE CLASS FUNCTION
25.CUSTOM  MOBIL HOVER TRIGGER FUNCTION
26.CUSTOM  BLOG SINGLE ICON EXPAND FUNCTION
--------------------
->DOCUMENT READY ALL FUNCTION  CALL
->WINDOW LOAD RESIZE ALL FUNCTION  CALL
->ONLY WINDOW LOAD FUNTION CALL

************************************* */

(function($){
'use strict';

  // Sticky Script
	$('.roch-sticky').sticky ({
	    topSpacing: 0,
	    zIndex: 4
	  });
	$('.roch-sticky').on('sticky-start', function() {  $(this).addClass('header-classic'); });
	$('.roch-sticky').on('sticky-end', function() { $(this).removeClass('header-classic'); });

/*============  1.SERCH BOX FOCUS FUNCTION ===========*/
function roch_search_box(){
	$(".roch-search-icon").on("click",function(){
		$("#roch-search-form").toggleClass('roch-search-active');
	});
}
/*============  2.OFF CANVES TOGGLE CLASS CUSTOM FUNCTION ===========*/
function roch_off_canves(){
	$(".roch-off-canves-nav-icon, .roch-off-canves-close-btn").on("click",function(e){
		e.preventDefault();
		$("#roch_full_layout").toggleClass('off-canves-open');
		return false;
	});
	$(".roch-off-canves-overly").on("click",function(e){
		if("roch-off-canves-overly" === e.target.className){
			$("#roch_full_layout")
			.removeClass('off-canves-open');
		}
		return;
	});

}


/*============  3.CLASSIC HEADER MENU CUSTOM FUNCTION ===========*/
function roch_header_classic(){
	// header area condition without Banner
	var $conHeaderCla = $("body").has(".roch-slider-area, .wpb_revslider_element").length;
	if(true != $conHeaderCla){
		$(".roch-header-area")
		.after('<div class="roch-header-space"></div>')
		.addClass("roch-header-active");
	}

	// onpage nave hash link animation
	var topMenu = $("#roch-main-menu,#roch-off-canves-menu"),
	offset = 40,
	topMenuHeight = topMenu.outerHeight()+offset,
	// All list items
	menuItems = topMenu.find('a[href*="#"]'),
	// Anchors corresponding to menu items
	scrollItems = menuItems.map(function(){
	  var href = $(this).attr("href"),
	  id = href.substring(href.indexOf('#')),
	  item = $(id);
	  //console.log(item)
	  if (item.length) { return item; }
	});

	// so we can get a fancy scroll animation
	menuItems.click(function(e){
	  var href = $(this).attr("href"),
		id = href.substring(href.indexOf('#'));
		var offsetTop = href === "#" ? 0 : $(id).offset().top-78;
	  $('html, body').stop().animate({
		  scrollTop: offsetTop
	  }, 1000);
	  e.preventDefault();
	});

	// Bind to scroll
	$(window).scroll(function(){
	   // Get container scroll position
	   var fromTop = $(this).scrollTop()+topMenuHeight;

	   // Get id of current scroll item
	   var cur = scrollItems.map(function(){
		 if ($(this).offset().top < fromTop)
		   return this;
	   });

	   // Get the id of the current element
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";

	   menuItems.parent().removeClass("active");
	   if(id){
			menuItems.parent().end().filter("[href*='#"+id+"']").parent().addClass("active");
	   }

	});

}

/*============  4.HEIGHT FOR FULL SCREEN SLIDER CUSTOM FUNCTION ===========*/
function roch_slider_full_screen_height(){
	var $ContentFullHeight = $("body").has(".roch-full-screen-window-height").length;
	if(true == $ContentFullHeight){
		$(".roch-full-screen-window-height").height($(window).height());
	}
	return;
}

/*============  5.SPECIAL DISHES SECTION OWL CAROUSEL INIT FUNCTION ===========*/
function roch_special_dishes_init(){
	var $Content = $("body").has("#roch-special-dishes-cuarosel").length;
	if(true == $Content){

		// blog post carousel
		var spDiCaroselet = $("#roch-special-dishes-cuarosel");
		spDiCaroselet.owlCarousel({
			autoplay:true,
			loop: true,
	        items: 3,
			dots:true,
	        nav: false,
	        margin:30,
		    responsive:{
		        0:{
		            items:1,
		        },
		        750:{
		            items:2,
		        },
		        970:{
		            items:3,
		        },
		        1170:{
		            items:3,

		        }
		    }

		});
	}
	return;
}
/*============  6.TESTIMONIAL  OWL CAROUSEL INIT INIT FUNCTION ===========*/
function roch_testimonial_caro(){
	var $testicontent = $("body").has(".roch-testimonial-carousel").length;
	if(true == $testicontent){
		var loopItem = $(".roch-testimonial-carousel  .roch-testimonial-single-item");
			loopItem = (loopItem.length > 1) ? true : false;
		$(".roch-testimonial-carousel").owlCarousel({
			autoplay:false,
			loop: loopItem,
	        items:1,
			dots:false,
	        nav: true,
	        navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
		});
	}
	return;
}

/*============  7.CLASSIC TESTIMONIAL  OWL CAROUSEL INIT INIT FUNCTION ===========*/
function roch_classic_testimonial_caro(){
	var $testicontent = $("body").has(".roch-classic-testimonial-curosel").length;
	if(true == $testicontent){
		var loopItem = $(".roch-classic-testimonial-curosel  .roch-clas-tes-single-item");
			loopItem = (loopItem.length > 1) ? true : false;
		$(".roch-classic-testimonial-curosel").owlCarousel({
			autoplay:false,
			loop: loopItem,
	        items:1,
			dots:true,
	        nav: false,

		});
	}
	return;
}

/*============  8.LIGHT GALLERY  INIT FUNCTION ===========*/
function roch_lightbox_g(){
	var $popupGroup = $("body").has(".roch-light-popup-group").length;
	if(true == $popupGroup){
		$(".roch-light-popup-group").each(function(){
			var $this = $(this);
			$this.lightGallery({
				selector: "[data-lg-popup*='"+$this.find('[data-lg-popup]').attr('data-lg-popup')+"']",
				download: false,
				thumbnail:false
			});
		});
	}
}

function roch_bootstrap_time_date_rating_picker(){
	$('.roch-text-date-fi').children('input').addClass('datepicker_fil');
	$('.roch-text-time-fi').addClass('bootstrap-timepicker timepicker');
	$('.roch-text-time-fi').children('input').addClass('timepicker_fil');
	$('.datepicker_fil').datepicker({
	    format: 'yyyy/mm/dd',
	    startDate: '-3d'
	});
	$(".datepicker_btn").on("click",function(){
		$(".datepicker_fil").trigger("focus");
	});

	// time picker
	$('.timepicker_fil').timepicker();

	// rating
	 $('.roch-rating-tooltip-manual').rating();
}

$( "#tbDate" ).datepicker({dateFormat:"yy/mm/dd"}).datepicker("setDate",new Date());

$('#tbDate, #tbTime').bind('keypress blur', function() {
	$('#tbDateTime').val($('#tbDate').val() + ' ' + $('#tbTime').val());
});

/*============  9.FOOTER COLUM AUTO ADJUST FUNCTION ===========*/
function roch_footer_colum_auto_adjust(){
	var $Content = $("body").has(".roch-footer-widgets >  .col-sm-6").length;
	if(true == $Content){
		$(".roch-footer-widgets .col-sm-6").eq(1).after('<div class="clearfix visible-sm-block"></div>');
	}
	return;
}

/*============= 10.DROPDOWN MENU A CLICK FALSE FUNTION CALL ===========*/
function roch_mainmenu_dropdown_click_false(){
	var $Content,$searchIcon;
		$Content = $("body").has(".menu-item-has-children").length;
		$searchIcon = $("body").has("a.roch-search-icon").length;
	if(true == $Content){
		$(".menu-item-has-children > a, .roch-food-menu-nav > li > a").on("click",function(e){
			e.preventDefault();
		});
	}if(true == $searchIcon){
		$("a.roch-search-icon").on("click",function(e){
			e.preventDefault();
		});
	}
	return;
}
/*============ 11.CUSTOM SLIDEDOWN MENU FUNCTION ===========*/
function roch_offCanves_Dropdown_menu(){
	$.sidebarMenu($('#roch-off-canves-menu'));
}

/*============ 12.PARALLAX INIT FUNCTION ===========*/
function roch_pralax_helium_init(){
	var $Content,$searchIcon;
	$Content = $("body").has(".roch-distance-parallax").length;
	if(true == $Content){
		$('#roch-parax-1').heliumParallax({
			paraStart:400,
			paraEnd: 1200,
		    minVal: ['-30px'],
		    maxVal: ['30px'],
		    relate: ['swing']
	    });

		$('#roch-parax-2').heliumParallax({
			paraStart:400,
			paraEnd: 1200,
		    minVal: ['30px'],
		    maxVal: ['-30px'],
		    relate: ['swing']
	    });

    }
    return;

}

/*============ 13.ONE PAGE SMOOTH SCROLL INIT FUNCTION ===========*/
// function roch_onepage_smooth_hash_link(){
// 	var  $Content = $("body").has(".roch-smooth-hash-link").length;
// 	if(true == $Content){
// 		$('.roch-smooth-hash-link').onePageNav({
// 			currentClass: 'current_page_item',
// 			offsetHeight: 100,
//  		});
// 	}
// 	return;
// }

/*============ 14.INLINE FORM RESPOSIVE CLASS INIT FUNCTION ===========*/
function  roch_onepage_table_form(){
	var  $Content = $("body").has(".roch-inline-online-reser-from").length;
	if(true == $Content){
		var cseckSelect = $(".roch-slider-area");
		if($(window).width()<=767){
			 cseckSelect
			.has(".roch-inline-online-reser-from")
			.next()
			.addClass("reser-from-respons");
		}
		else{
			 cseckSelect
			.has(".roch-inline-online-reser-from")
			.next()
			.removeClass("reser-from-respons");
		}
	}
	return;
}
/*============ 15.COUNTER UP  INIT FUNCTION ===========*/
function roch_counter_up_init(){
	var $Content = $("body").has(".roch-counter").length;
	if(true == $Content){
		$('.roch-counter').counterUp({
		    delay: 10,
		    time: 1000
		});
	}
	return;
}

/*============ 16.SERVICES PAGE SERVICE COLUM FIX INIT FUNCTION ===========*/
function roch_service_page_area_fix(){
	var $Content = $("body").has(".roch-services-page-service-row  .col-md-3.roch-custom-col").length;
	if(true == $Content){
		$(".roch-services-page-service-row  .roch-custom-col").each(function(i){
			if($(window).width() > 991){
				$(this).next(".clearfix").remove();
				var check = (i==3 || i==7 || i==11 || i==15 || i == 19 || i == 23 || i==27 || i==31);
				if(check){
					$(this).after('<div class="clearfix"></div>');
				}
			}else if($(window).width() <992){
				$(this).next(".clearfix").remove();
				var check = (i==2 || i==5 || i==8 || i==11 || i == 15 || i == 18 || i==21 || i==24);
				if(check){
					$(this).after('<div class="clearfix visible-sm-block"></div>');
				}
			}else{
				$(this).next(".clearfix").remove();
			}
		});
	}
	return;
}

/*============= 17.SOME CUSTOM  STYLE FOR CONTACT FORM  FUNCTION ===========*/
function roch_contact_form_input(){
	// input range and number filed
		var $rangeSelect,$numberFi;
		$rangeSelect = $(".roch-stylest-contact-form input[type='range'], .wpcf7-form-control-wrap input[type='range']");
		$numberFi = $(".roch-stylest-contact-form input[type='number'] , .wpcf7-form-control-wrap input[type='number']");

		$numberFi.on("change",function(){
			var max = parseInt($(this).attr('max'));
			var min = parseInt($(this).attr('min'));

		    if ($(this).val() > max)
		    {
		          $(this).attr("disabled","disabled");
		          $(this).val(max);
		    }
		    if($(this).val() < min){
		    	$(this).attr("disabled","disabled");
		        $(this).val(min);
		    }

			$rangeSelect.val($(this).val());

		});

		$rangeSelect.on("change",function(){
			var $rangeVal = $(this).val();
			$numberFi.removeAttr("disabled");
			$numberFi.val($rangeVal);
		});

	// input file upload
	var fileSelec = $(".roch-stylest-contact-form input[type='file'], .wpcf7-form-control-wrap input[type='file']");
	fileSelec.parent().addClass("roch-file-upload");
	fileSelec.before("<span class='roch-file-btn'>Upload</span>");
	fileSelec.after("<span class='roch-file-name'>No file selected</span>");
	fileSelec.on("change",function(){
		var fileName = $(this).val();
		$(this).next(".roch-file-name").text(fileName);
	});

  // input checkbox
  var $checkBoxSelector = $(".roch-stylest-contact-form input[type='checkbox'], .wpcf7-checkbox label input[type='checkbox']");
  $checkBoxSelector.after("<span class='roch-checkbox-btn'></span>");

  // input radio
  var $radioSelector = $(".roch-stylest-contact-form input[type='radio'], .wpcf7-radio label input[type='radio']");
  $radioSelector.after("<span class='roch-radio-btn'></span>");
}


 /*============= 18.GOOGLE MAP INIT FUNCTION ===========*/
function roch_google_map_api(){
	  var $contentGoogleMap = $("body").has("#roch_google_map").length;
	  if(true == $contentGoogleMap){
		$("#roch_google_map").googleMap({
		  zoom: 14,
		  type: "ROADMAP",
		  streetViewControl: false,
		  scrollwheel: false,
		  mapTypeControl: false,
		  coords: ['40.712784', '-74.005941'],
		  styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}],
		});
		$("#roch_google_map").addMarker({
		  coords: ['40.712784', '-74.005941'],
		  icon: 'http://garrybuckland.com/wp-content/uploads/2015/12/map-marker-icon.png',
		  title: 'My Own Heading!!!',
		  text: 'And Some of my Own Texts'
		});
	}
	return;

}

/*============= 19.SIDEBAR SERCH FORM FOCUS FUNCTION ===========*/
function roch_sidebar_search_focus(){
	var $content = $("body").has(".roch-side-widget .search-form  input.search-field").length;
	if(true == $content){
		var $selector = $(".roch-side-widget .search-form  input.search-field");
		$selector.on("focusin",function(e){
			$(this)
			.parents(".search-form")
			.children('.search-submit')
			.addClass("roch-sideserch-active");
		});
		$selector.on("focusout",function(e){
			$(this)
			.parents(".search-form")
			.children('.search-submit')
			.removeClass("roch-sideserch-active");
		});
	}
	return;
}

/*============ 20.ISOTOPE FILTER INIT FUNCTION ===========*/
function roch_filter_function(){
	var $content = $("body").has(".roch-shop-filter-list-warp").length;
	if(true == $content){
		$('.roch-filter-btn-group').on( 'click', 'li', function() {
			$("#roch_sorters.roch-filter-btn-group ul > li").removeClass('is-checked');
			$(this).addClass('is-checked');
		});
	}
	return;
}

/*============ 22.WOOCOMMERCE CHCKBOX AND RADIO INPUT STYLE INIT FUNCTION ===========*/
function roch_input_chckbox_radio_style(){
	$(".woocommerce-checkout, .woocommerce-page, .woocommerce").find("input[type='checkbox']")
	.after("<span class='roch-woo-check-style'></span>");
	$(".woocommerce-checkout, .woocommerce-page, .woocommerce").find("input[type='radio']")
	.after("<span class='roch-woo-radio-style'></span>");
}
/*============ 23.WOOCOMMERCE CART LIST HOVER INIT FUNCTION ===========*/
function roch_cart_list_hover(){
	var $content = $("body").has(".roch-cart-count").length;

	if($(".roch-cart-count").text() == 0){
		$(".roch-cart-count").css("padding","0");
	}

	$(".add_to_cart_button").on("click",function(){
		if($(".roch-cart-count").text() > 0){
			$(".roch-cart-count").css("padding","0 5px");
		}
	});

	var itemWarp = $(".roch-shop-btn-main");
	if(itemWarp.has(".mini_cart_item").length == 0){
		itemWarp.addClass("item-has-no");
	}
	itemWarp.hover(function(){
		var $this = $(this);
		if($this.has(".mini_cart_item").length == 0){
			$this.addClass("item-has-no");
		}else{
			$this.removeClass("item-has-no");
		}
		return false;
	});
}

  // Rodich hover script
  $('.roch-single-service').hover (
    function() {
      $(this).find(".roch-sin-ser-capt-title").delay("fast").hide();
      $(this).find(".roch-sin-ser-caption-hover-warp").slideDown('fast');
    },
    function() {
      $(this).find(".roch-sin-ser-caption-hover-warp").slideUp('fast');
      $(this).find(".roch-sin-ser-capt-title").show(140);
    }
  );


/*============= 24.CUSTOM DEFAULT HTML TABLE CLASS FUNCTION ===========*/
function roch_default_table_addclass(){
	var tableclass = $(".roch-blog-single-strandard-entry-content table, .comment-content table").attr("class");
	if(undefined == tableclass || null == tableclass){
		$(".roch-blog-single-strandard-entry-content  table, .comment-content table").addClass("table");
	}
	return;
}

/*============= 25.CUSTOM  MOBIL HOVER TRIGGER FUNCTION ===========*/
function roch_mobil_touch(){
	$('.roch-food-menu-nav li a').on("click touchend",function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	$('.roch-great-service-single, .roch-home-gallery-single-item, .roch-single-service, .roch-single-staff')
	.on('click touchend', function(e) {
		$(this).trigger('hover');
	});
}

/*============= 26.CUSTOM  BLOG SINGLE ICON EXPAND FUNCTION ===========*/
function roch_blogSIngle_icon_expand(){
	$('.roch-blg-sin-scoial li.roch-bsSExpand_btn a').on("click",function (e) {
	  e.preventDefault();
	  $(".roch-blg-sin-scoial").toggleClass("roch-expand");
	});
}

/*============= xxxxxxxxxxxxxxxxxxxxxxxxx ===========*/

/*============= DOCUMENT READY ALL FUNCTION  CALL ===========*/
$(function(){
	if (typeof roch_search_box == 'function'){
			roch_search_box();
		}

	if (typeof roch_off_canves == 'function'){
			roch_off_canves();
		}

	if (typeof roch_header_classic == 'function'){
			roch_header_classic();
		}

	if (typeof roch_special_dishes_init == 'function'){
			roch_special_dishes_init();
		}

	if (typeof roch_testimonial_caro == 'function'){
			roch_testimonial_caro();
		}

 	if (typeof roch_classic_testimonial_caro == 'function'){
			roch_classic_testimonial_caro();
		}

	if (typeof roch_lightbox_g == 'function'){
			roch_lightbox_g();
		}

	if (typeof roch_bootstrap_time_date_rating_picker == 'function'){
			roch_bootstrap_time_date_rating_picker();
		}

	if (typeof roch_footer_colum_auto_adjust == 'function'){
			roch_footer_colum_auto_adjust();
		}

	if (typeof roch_mainmenu_dropdown_click_false == 'function'){
			roch_mainmenu_dropdown_click_false();
		}

	if (typeof roch_offCanves_Dropdown_menu == 'function'){
			roch_offCanves_Dropdown_menu();
		}

	// if (typeof roch_onepage_smooth_hash_link == 'function'){
	// 		roch_onepage_smooth_hash_link();
	// 	}
	if (typeof roch_counter_up_init == 'function'){
			roch_counter_up_init();
		}
	if (typeof roch_contact_form_input == 'function'){
			roch_contact_form_input();
		}
	if (typeof roch_sidebar_search_focus == 'function'){
			roch_sidebar_search_focus();
		}
	if (typeof roch_filter_function == 'function'){
			roch_filter_function();
		}
	if (typeof roch_input_chckbox_radio_style == 'function'){
			roch_input_chckbox_radio_style();
		}
	if (typeof roch_cart_list_hover == 'function'){
			roch_cart_list_hover();
		}
	if (typeof roch_default_table_addclass == 'function'){
			roch_default_table_addclass();
		}
	if (typeof roch_mobil_touch == 'function'){
			roch_mobil_touch();
		}
	if (typeof roch_blogSIngle_icon_expand == 'function'){
			roch_blogSIngle_icon_expand();
		}


});


/*============= WINDOW LOAD RESIZE FUNTION CALL ===========*/
$(window).on("load  resize",function(){
	if (typeof roch_pralax_helium_init == 'function'){
		roch_pralax_helium_init();
	}
	if (typeof roch_onepage_table_form == 'function'){
		roch_onepage_table_form();
	}
	if (typeof roch_service_page_area_fix == 'function'){
		roch_service_page_area_fix();
	}
	if (typeof roch_google_map_api == 'function'){
			roch_google_map_api();
		}
});
/*============= ONLY WINDOW LOAD FUNTION CALL ===========*/
$(window).load(function(){
	$("#roch-preloder-warp").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
	$("body").removeAttr("data-preloder");
});
/*============= Banner custom height fix ===========*/
$(document).ready(function(){
	var $targetClass = ".rodich-banner-custom-height",
		$target 	 = $($targetClass),
		$content 	 = $("body").has($targetClass).length;
	if(true == $content){
		var $height = $target.data("height");
		$target.parents('.vc_row').addClass("rodich-banner-custom").css({'height': $height});
	}

	var has_banner_form = $("body").has('.roch-find-table-form-area').length;
	if(true == has_banner_form){
		$('.roch-find-table-form-area').parents('#roch_full_layout').addClass('banner-form-active');
	}

	$('.roch-food-menu-row .onsale').addClass('roch-food-menu-item-highlight');
});

})(jQuery);
