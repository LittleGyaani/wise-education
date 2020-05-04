(function($){
	'use strict';

	$(window).load(function(){

		// masonry layout
		$('.mungu-card-masonry').each(function(){
			var _masonry = $(this);
			var _col_width = _masonry.data('col-width') + '';

			_masonry.isotope({
				itemSelector: '.masonry-item',
				masonry: {
                    columnWidth: 1
                }
			});

		});

	});

})(jQuery);