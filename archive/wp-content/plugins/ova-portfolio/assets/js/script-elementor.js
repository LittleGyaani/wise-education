(function($){
	"use strict";

	$(window).on('elementor/frontend/init', function () {

      /* Element */
      elementorFrontend.hooks.addAction('frontend/element_ready/ovapo_portfolio.default', function(){

         var $grid = $('.grid');
         if($().imagesLoaded) {

            $grid.imagesLoaded(function(){
               
               var iso = $grid.isotope({
                  itemSelector: '.grid-item',
                  percentPosition: true,
                  masonry: {
                     /* use outer width of grid-sizer for columnWidth */
                     columnWidth: 1
                  }
               });

               /* filter items on button click */
               $('.filter-button-group').on( 'click', 'button', function() {
                  var filterValue = $(this).attr('data-filter');
                  iso.isotope({ filter: filterValue });
               });

            });

         };

         /* change is-checked class on buttons */
         $('.filter-button-group').each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
               $buttonGroup.find('.is-checked').removeClass('is-checked');
               $(this).addClass('is-checked');
            });
         });

      });

   });
})(jQuery);
