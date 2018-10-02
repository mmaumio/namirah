"use strict";
var jq = jQuery.noConflict();
(function (jq) {
    "use strict";
    jq(document).ready(function () {

        jq('.search-icon').on('click', function () {
            jq(this).parents('.nav-container').children('.search-form').fadeIn();
            jq('.search-input').focus();
        });
        jq('.search-close').on('click', function () {
            jq(this).parents('.search-form').fadeOut();
        });

        jq('.n-slide').each(function () {
            var slideBgImg = jq(this).data('src')
            if (slideBgImg) {
                jq(this).css({

                    'background-image': 'url(' + slideBgImg + ')'
                });
            }

        });


        jq('.post-share-btn').on('click', function (ev) {
            ev.preventDefault();
            var slideDown = jq(this).parents('.post-action').parents('.post-content').children('.post-share').slideDown();
            jq(this).fadeOut("fast");

        });

        jq('.post-share-close').on('click', function (ev) {
            ev.preventDefault();
            var slideUp = jq(this).parents('.post-share').slideUp("fast");
            jq(this).parents('.post-share').parents('.post-content').children('.post-action').children('.post-share-btn').fadeIn("fast");

        });

        /**================
         SUPERFISH DROPDOWN
         * ================*/

        if (jq.fn.superfish) {
            jq('.top-nav').superfish({
                hoverClass: 'sfHover', // the class applied to hovered list items
                delay: 100, // the delay in milliseconds that the mouse can remain outside a submenu without it closing
                speed: 'normal', // speed of the opening animation. Equivalent to second parameter of jQuery’s .animate() method
                speedOut: 'fast', // speed of the closing animation. Equivalent to second parameter of jQuery’s .animate() method
                cssArrows: true // set to false if you want to remove the CSS-based arrow triangles
            });

        }


        try {
            jq('.sf-menu').slicknav({
                label: '',
                duration: 200,
                prependTo: '#mobile-menu',
                closedSymbol: '&#xf067;',
                openedSymbol: '&#xf00d;'
            });
        } catch (err) {
            console.log('slicknav is not found')
        }


        jq(".justified-post-grid").justifiedGallery({
            rowHeight: 230,
            lastRow: 'justify',
            margins: 2
        });


        jq('.post-featured-img').on('mouseenter', function () {
            jq(this).children('.post-featured-overlay').fadeIn();
        });
        jq('.post-featured-img').on('mouseleave', function () {
            jq(this).children('.post-featured-overlay').fadeOut();
        });

        jq(".instagram").jqinstapics({
            "user_id": "9416756",
            "access_token": "9416756.674061d.521b855d4489414a83eac19a5c376078",
            "count": 4
        });

        jq(".page-wrapper").fitVids();
        jq('.list-select-box').selectivity();
        jq('.post-featured-overlay').magnificPopup({
            type: 'image',
//            gallery: {
//                // options for gallery
//                enabled: true,
//                preload: [0, 2], // read about this option in next Lazy-loading section
//
//                navigateByImgClick: true,
//
//                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
//
//                tPrev: 'Previous (Left arrow key)', // title for left button
//                tNext: 'Next (Right arrow key)', // title for right button
//                tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
//            },
//            image: {
//                markup: '<div class="mfp-figure">' +
//                    '<div class="mfp-close"></div>' +
//                    '<div class="mfp-img"></div>' +
//                    '<div class="mfp-bottom-bar">' +
//                    '<div class="mfp-title"></div>' +
//                    '<div class="mfp-counter"></div>' +
//                    '</div>' +
//                    '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button
//
//                cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor. 
//
//                titleSrc: 'title', // Attribute of the target element that contains caption for the slide.
//                // Or the function that should return the title. For example:
//                // titleSrc: function(item) {
//                //   return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
//                // }
//
//                verticalFit: true, // Fits image in area vertically
//
//                tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
//            }
        });
       
        
        
        
        jq('.post-slider').magnificPopup({
		delegate: '.post-slide-item a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
        
        jq('.justified-post-grid').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
        
        
        
        jq('.pin-layout').pinterest_grid({
            no_columns: 2,
            padding_x: 24,
            padding_y: 24,
            margin_bottom: 50,
            single_column_breakpoint: 700
        });



        /*==Social Share==*/
        jq('.s-facebook').each(function () {
            var BlogTitle = jq(this).attr('data-url');
            var fb = 'https://www.facebook.com/sharer.php?u=' + BlogTitle;
            jq(this).attr("href", fb)
        });
        jq('.s-twitter').each(function () {
            var BlogTitle = jq(this).attr('data-url');
            var twitter = 'https://twitter.com/home?status=' + BlogTitle;
            jq(this).attr("href", twitter)
        });
        jq('.s-gplus').each(function () {
            var BlogTitle = jq(this).attr('data-url');
            var gplus = 'https://plus.google.com/share?url=' + BlogTitle;
            jq(this).attr("href", gplus)
        });
        jq('.s-pinterest').each(function () {
            var BlogTitle = jq(this).attr('data-url');
            var dataImg = jq(this).attr('data-src');
            var pint = 'https://pinterest.com/pin/create/button/?url=' + BlogTitle + '&media=' + dataImg
            jq(this).attr("href", pint)
        });
        jq('.s-linkedin').each(function () {
            var BlogTitle = jq(this).attr('data-url');
            var ln = 'https://www.linkedin.com/shareArticle?mini=true&url=' + BlogTitle
            jq(this).attr("href", ln)
        });



    });
})(jq);