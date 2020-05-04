(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {

		
		/* Menu Shrink */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_menu.default', function(){

         $( '.ova_menu_clasic .ova_openNav' ).on( 'click', function(){
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).removeClass( 'hide' );
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).addClass( 'show' );
            $( '.ova_menu_clasic  .ova_closeCanvas' ).css( 'width', '100%' );


            $( 'body' ).css( 'background-color', 'rgba(0,0,0,0.4)' );

         });

         $( '.ova_menu_clasic  .ova_closeNav' ).on( 'click', function(){
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).removeClass( 'show' );
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).addClass( 'hide' );
            $( '.ova_closeCanvas' ).css( 'width', '0' );



            $( 'body' ).css( 'background-color', 'transparent' );

         });

			// Display in mobile
			$( '.ova_menu_clasic li.menu-item button.dropdown-toggle').off('click').on( 'click', function() {
            $(this).parent().toggleClass('active_sub');
         });

         $(window).scroll(function () {
            if( $('.ovamenu_shrink').length > 0 ){

               var header = $('.ovamenu_shrink');
               var scroll = $(window).scrollTop();

               if (scroll >= 200) {
                  header.addClass('ready_active');
               }else{
                  header.removeClass('ready_active');
               }
               if (scroll >= 250) {
                  header.addClass('active_fixed');
               } else{
                  header.removeClass('active_fixed');
               }

            }

         });
      });


      /* Menu Henbergar */
      elementorFrontend.hooks.addAction('frontend/element_ready/henbergar_menu.default', function(){

         $( '.ova_menu_canvas .ova_openNav' ).on( 'click', function(){
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).removeClass( 'hide' );
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).addClass( 'show' );
            $( '.ova_menu_canvas .ova_closeCanvas' ).css( 'width', '100%' );

            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).addClass('active');


            $( 'body' ).css( 'background-color', 'rgba(0,0,0,0.2)' );
            
         });

         $( '.ova_menu_canvas .ova_closeNav' ).on( 'click', function(){
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).removeClass( 'show' );
            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).addClass( 'hide' );
            $( '.ova_menu_canvas .ova_closeCanvas' ).css( 'width', '0' );

            $( this ).closest('.ova_wrap_nav').find( '.ova_nav_canvas' ).removeClass('active');


            
            $( 'body' ).css( 'background-color', 'transparent' );
            
         });

         // Display in mobile
         $( '.ova_menu_canvas li.menu-item button.dropdown-toggle').off('click').on( 'click', function() {
            $(this).parent().toggleClass('active_sub');
         });
         

         $(window).scroll(function () {
            if( $('.ovamenu_shrink').length > 0 ){

               var header = $('.ovamenu_shrink');
               var scroll = $(window).scrollTop();

               if (scroll >= 200) {
                  header.addClass('ready_active');
               }else{
                  header.removeClass('ready_active');
               }
               if (scroll >= 250) {
                  header.addClass('active_fixed');
               } else{
                  header.removeClass('active_fixed');
               }

            }
            
         });

      });
      /* end Menu Henbergar */

      /* Search Popup */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_search.default', function(){
         $( '.wrap_search_digitax_popup i' ).on( 'click', function(){
            $( this ).closest( '.wrap_search_digitax_popup' ).addClass( 'show' );
         });

         $( '.btn_close' ).on( 'click', function(){
            $( this ).closest( '.wrap_search_digitax_popup' ).removeClass( 'show' );
            
         });
      });
      /* end Search Popup */


      /* Mouse move */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_banner_3.default', function(){
         $('html').off('click').mousemove(function(e){

            var wx = $(window).width();
            var wy = $(window).height();

            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;

            var newx = x - wx/2;
            var newy = y - wy/2;

            $('#wrapper div').each(function(){
               var speed = $(this).attr('data-speed');
               if($(this).attr('data-revert')) speed *= -1;
               TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
            });

         });
      });
      /* End Mouse move */

      //Pricing Tabs
      if($('.pricing-table-dig').length){
         $('.pricing-table-dig .tab-btns .tab-btn').on('click', function(e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));
            
            if ($(target).hasClass('actve-tab')){
               return false;
            }else{
               $('.pricing-table-dig .tab-btns .tab-btn').removeClass('active-btn');
               $(this).addClass('active-btn');
               $('.pricing-table-dig .pr-content .pr-tab').removeClass('active-tab');
               $(target).addClass('active-tab');
            }
         });
      }

      /* Slide Testimonials */
      /* Testimonial ver 1 */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_testimonials.default', function(){
         $(".testimonial-slider-ver-1").each(function(){
            var owlsl = $(this) ;
            var owlsl_df = {
               margin: 0, 
               responsive: false, 
               smartSpeed:500,
               autoplay:false,
               autoplayTimeout: 6000,
               items:2,
               loop:true, 
               nav: true, 
               dots: false,
               center:false,
               autoWidth:false,
               thumbs:false, 
               autoplayHoverPause: true,
               slideBy: 1,
               prev:'<i class="arrow_carrot-left"></i>',
               next:'<i class="arrow_carrot-right"></i>',
            };
            var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};
            owlsl_ops = $.extend({}, owlsl_df, owlsl_ops);
            owlsl.owlCarousel({
               autoWidth: owlsl_ops.autoWidth,
               margin: owlsl_ops.margin,
               items: owlsl_ops.items,
               loop: owlsl_ops.loop,
               autoplay: owlsl_ops.autoplay,
               autoplayTimeout: owlsl_ops.autoplayTimeout,
               center: owlsl_ops.center,
               nav: owlsl_ops.nav,
               dots: owlsl_ops.dots,
               thumbs: owlsl_ops.thumbs,
               autoplayHoverPause: owlsl_ops.autoplayHoverPause,
               slideBy: owlsl_ops.slideBy,
               smartSpeed: owlsl_ops.smartSpeed,
               navText:[owlsl_ops.prev,owlsl_ops.next],
               responsive: {
                  0: {
                     items: 1,
                  },
                  600: {
                     items: 2,
                  },
               }
            });
         });

         /* Testimonial ver 2 */
         $(".testimonial-slider-ver-2").each(function(){
            var owlsl = $(this) ;
            var owlsl_df = {
               margin: 0, 
               responsive: false, 
               smartSpeed:500,
               autoplay:false,
               autoplayTimeout: 6000,
               items:1,
               loop:true, 
               nav: false, 
               dots: true,
               center:false,
               autoWidth:false,
               thumbs:false, 
               autoplayHoverPause: true,
               slideBy: 1,
            };
            var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};
            owlsl_ops = $.extend({}, owlsl_df, owlsl_ops);
            owlsl.owlCarousel({
               autoWidth: owlsl_ops.autoWidth,
               margin: owlsl_ops.margin,
               items: owlsl_ops.items,
               loop: owlsl_ops.loop,
               autoplay: owlsl_ops.autoplay,
               autoplayTimeout: owlsl_ops.autoplayTimeout,
               center: owlsl_ops.center,
               nav: owlsl_ops.nav,
               dots: owlsl_ops.dots,
               thumbs: owlsl_ops.thumbs,
               autoplayHoverPause: owlsl_ops.autoplayHoverPause,
               slideBy: owlsl_ops.slideBy,
               smartSpeed: owlsl_ops.smartSpeed,
               responsive: {
                  0: {
                     items: 1,
                  },
                  600: {
                     items: 2,
                  },
                  768: {
                     items: 3,
                  },
               }
            });
         });
      });
      /* End Slide Testimonials */

      /* Slide About Team */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_about_team.default', function(){

         if( $('.about_team_slider').length > 0 ){  
            $('.about_team_slider').each(function(){

               var data = $(this).data('option');
               $(this).owlCarousel(
                  data
                  );
            });
         };
      }); 
      /* End Slide About Team */

      /* Time Coundown */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_time_countdown.default', function(){

         var date = $('.due_date').data('day').split(' ');
         var day = date[0].split('-');
         var time = date[1].split(':');
         var date_countdown = new Date( day[0], day[1]-1, day[2], time[0], time[1] );
         $('.due_date').countdown({until: date_countdown, format: 'DHMS'});
         
      });
      /* End Time Countdown */

      /*video popup*/

      elementorFrontend.hooks.addAction('frontend/element_ready/video_popup.default', function(){

         $("#video").videoPopup({
               autoplay: 1,
               controlsColor: 'white',
               showVideoInformations: 0,
               width: 1000,
               customOptions: {
                   rel: 0,
                   end: 60
               }
         });
         
      });

   });
})(jQuery);
