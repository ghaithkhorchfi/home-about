;jQuery(document).ready(function($) {

	/***************************************
		ajax product feature
	***************************************/
	$(window).load(function() {
		ajax_pagenav();
	});

	$("#roch_sorters").on( 'click', 'a', function(e){
		e.preventDefault();
		var cat_slug = $(this).data("cat");
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: rodich_product_admin.ajaxurl,
			data: {
				'cat': cat_slug,
				'action': 'ruchis_more_product_ajax'
			},
			beforeSend : function () {
				$(".products").append('<div class="products-loading"><div class="la-timer la-dark la-3x"><div></div></div></div>');
				$(".ajax-page-numbers").hide();
			},
			success: function (data) {
				$(".product-data").html(data);
				setTimeout(ajax_pagenav, 100);
			},
		});
	});

	function ajax_pagenav() {
		$(".ajax-page-numbers").on( 'click', 'a', function(e){
			e.preventDefault();
			
			var page_no = $(this).data("page"),
				cat_slug = $("#roch_sorters li.is-checked a").data("cat");
				
			$('.ajax-page-numbers a').removeClass('current disabled-click');
			$('.ajax-page-numbers a[data-page = '+ page_no +']').addClass('current disabled-click');
			
			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: rodich_product_admin.ajaxurl,
				data: {
					'cat': cat_slug,
					'offset': page_no,
					'action': 'ruchis_more_product_ajax_pagi'
				},
				beforeSend : function () {
					$(".products").append('<div class="products-loading"><div class="la-timer la-dark la-3x"><div></div></div></div>');
				},
				success: function (data) {
					$(".products").html(data);
				},
				complete: function (data) {
					// Pagination data link update
					$(".ajax-page-numbers .last").remove();
					$(".ajax-page-numbers .first").remove();
					if (page_no > 1) {
						$(".ajax-page-numbers").prepend('<li class="first update-item"><a class="prev page-numbers" data-page="'+(page_no - 1)+'" href="#"><i class="fa fa-angle-left"> '+ rodich_product_admin.olderpost +'</i></a></li>');
					}
					var navcount = $(".ajax-page-numbers > li").not('.update-item').length;
					if (navcount >= (page_no+1)) {
						$(".ajax-page-numbers").append('<li class="last update-item"><a class="next page-numbers" data-page="'+(page_no + 1)+'" href="#">'+ rodich_product_admin.newerpost +' <i class="fa fa-angle-right"></i></a></li>');						
					}
				}				
			});

		});		
	}

});