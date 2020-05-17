(function ($, elementor) {
	"use strict";

	var Agmycoo = {

		init: function () {

			var widgets = {
				'xs-portfolio-slider.default': Agmycoo.Portfolio_Slider,
				'xs-portfolio.default': Agmycoo.Portfolio,
				'xs-quote-carousel.default': Agmycoo.Quote_Carousel,
				'xs-testimonial.default': Agmycoo.Testimonial,
				'xs-blog.default': Agmycoo.Posts,
				'xs-delighter-parallax.default': Agmycoo.Delighter_Parallax,
				'xs-partner.default': Agmycoo.Logo_Carousel,
				'xs-slider.default': Agmycoo.Agmycoo_slider,
				'agmycoo-header-banner.default': Agmycoo.Xs_Header_Banner_Widget,
				// 'agmycoo-watermark.default': Agmycoo.Xs_Watermark_Widget,
			};
			$.each(widgets, function (widget, callback) {
				elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
			});
		},
		// Xs_Watermark_Widget: function ($scope) {
		// 	/*==========================================================
		// 					15. on screen function
		//  ======================================================================*/
		// 	$.fn.onScreen = function () {
		// 		var offset = this.offset();
		// 		var win = $(window);
		// 		var viewport = {
		// 			top: $(window).scrollTop(),
		// 			left: $(window).scrollLeft()
		// 		};
		// 		viewport.right = viewport.left + $(window).width();
		// 		viewport.bottom = viewport.top + $(window).height();
		// 		offset.right = offset.left + this.outerWidth();
		// 		offset.bottom = offset.top + this.outerHeight();
		// 		return !(viewport.right < offset.left || viewport.left > offset.right || viewport.bottom < offset.top || viewport.top > offset.bottom);
		// 	};
		// 	var $container = $scope.find('.shuffle-letter-title-wraper');
		// 	$container.each(function (e) {
		// 		if ($(this).onScreen() && !$(this).hasClass('shuffle-title')) {
		// 			setTimeout(function () {
		// 				$(this).find('.shuufle-letter-title').shuffleLetters();
		// 				$(this).addClass('shuffle-title');
		// 			}.bind(this), 400);
		// 		}
		// 	});
		// },
		Agmycoo_slider: function ($scope) {

			var $container = $scope.find('.agency-office-slider');
			$container.imagesLoaded(function () {
				$container.owlCarousel({
					items: 2,
					autoWidth: true,
					margin: 30,
					nav: true,
					navText: ['<i class="icon icon-arrow-left" />', '<i class="icon icon-arrow-right" />'],
					responsive: {
						0: {
							items: 1,
							autoWidth: false,
							nav: false,
							margin: 0
						},
						// breakpoint from 480 up
						480: {
							items: 1,
							autoWidth: false,
							nav: false,
							margin: 0
						},
						// breakpoint from 768 up
						768: {
							items: 2,
							autoWidth: false,
							nav: false
						},
						1024: {
							items: 3,
							autoWidth: true,
							nav: true
						}
					}
				});
			});
		},
		Xs_Header_Banner_Widget: function ($scope) {

			var $container = $scope.find('.typed');
			$container.imagesLoaded(function () {
				$container.each(function () {
					var typed = new Typed('.typed', {
						strings: JSON.parse($(this).attr("data-wordlist")),
						typeSpeed: 40,
						loop: true,
						backSpeed: 40,
						backDelay: 500,
						startDelay: 1000
					});
				});
			});
		},
		Logo_Carousel: function ($scope) {

			var $container = $scope.find('.client-slider');
			$container.imagesLoaded(function () {
				$container.each(function () {
					$container.owlCarousel({
						items: 5,
						responsive: {
							0: {
								items: 1
							},
							// breakpoint from 480 up
							480: {
								items: 2
							},
							// breakpoint from 768 up
							768: {
								items: 3
							},
							1024: {
								items: 5
							}
						}
					});
				});
			});
		},
		Delighter_Parallax: function ($scope) {

			var $container = $scope.find('.elementor-top-section');

			$container.each(function () {

				if ($(this).find('.content-over-img-wraper').length > 0) {
					$(this).attr('data-delighter', 'start:0.80');
				} else {
					$(this).removeAttr('data-delighter');
				}
				if ($(this).find('.pillow-image').length > 0) {
					$(this).attr('data-delighter', 'start:0.80');
				} else {
					$(this).removeAttr('data-delighter');
				}
			});
		},
		Posts: function ($scope) {

			var $container = $scope.find('.blog-grid');
			$container.imagesLoaded(function () {
				var colWidth = function colWidth() {
					var w = $container.width(),
						columnNum = 1,
						columnWidth = 0;
					if (w > 1200) {
						columnNum = 4;
					} else if (w > 600) {
						columnNum = 3;
					} else if (w > 450) {
						columnNum = 1;
					} else if (w > 385) {
						columnNum = 1;
					}
					columnWidth = Math.floor(w / columnNum);
					$container.find('.grid-item').each(function () {
						var $item = $(this),
							multiplier_w = $item.attr('class').match(/grid-item-w(\d)/),
							multiplier_h = $item.attr('class').match(/grid-item-h(\d)/),
							width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
							height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
						$item.css({
							width: width
						});
					});
					return columnWidth;
				},

					isotope = function isotope() {
						$container.isotope({
							resizable: false,
							itemSelector: '.grid-item',
							masonry: {
								columnWidth: colWidth(),
								gutterWidth: 3
							}
						});
					};
				isotope();
			});
		},
		Quote_Carousel: function ($scope) {
			var $container = $scope.find('.banner-slider, .quote-slider');
			$container.imagesLoaded(function () {
				$container.myOwl({
					nav: true,
					navText: ['<i class="icon icon-arrow-left"></i>', '<i class="icon icon-arrow-right"></i>'],
					responsive: {
						0: {
							nav: false
						},
						// breakpoint from 768 up
						768: {
							nav: true
						}
					}
				});
			});
		},
		Testimonial: function ($scope) {

			var $testimonialSlider = $scope.find('.portfolio-testimonial-slider');
			$testimonialSlider.imagesLoaded(function () {
				var sync1 = $scope.find('.bouble-slider-privew');
				var sync2 = $scope.find('.bouble-slider-thumb');
				var slidesPerPage = 5,
					syncedSecondary = true;

				sync1.owlCarousel({
					items: 1,
					slideSpeed: 2000,
					nav: true,
					autoplay: true,
					dots: false,
					loop: true,
					mouseDrag: false,
					touchDrag: false,
					responsiveRefreshRate: 200,
					responsive: {
						0: {
							touchDrag: true,
						},
						768: {
							touchDrag: true,
						},
						1024: {
							touchDrag: false,
						}
					},
					navText: ['<i class="icon icon-arrow-left"></i>', '<i class="icon icon-arrow-right"></i>'],
				}).on('changed.owl.carousel', syncPosition);

				sync2
					.on('initialized.owl.carousel', function () {
						sync2.find(".owl-item").eq(0).addClass("current");
					})
					.owlCarousel({
						items: slidesPerPage,
						dots: false,
						nav: false,
						smartSpeed: 200,
						slideSpeed: 500,
						autoWidth: true,
						mouseDrag: false,
						touchDrag: false,
						slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
						responsiveRefreshRate: 100,
					}).on('changed.owl.carousel', syncPosition2);

				function syncPosition(el) {
					//if you set loop to false, you have to restore this next line
					//var current = el.item.index;

					//if you disable loop you have to comment this block
					var count = el.item.count - 1;
					var current = Math.round(el.item.index - (el.item.count / 2) - .5);

					if (current < 0) {
						current = count;
					}
					if (current > count) {
						current = 0;
					}
					//end block

					sync2
						.find(".owl-item")
						.removeClass("current")
						.eq(current)
						.addClass("current");
					var onscreen = sync2.find('.owl-item.active').length - 1;
					var start = sync2.find('.owl-item.active').first().index();
					var end = sync2.find('.owl-item.active').last().index();

					if (current > end) {
						sync2.data('owl.carousel').to(current, 100, true);
					}
					if (current < start) {
						sync2.data('owl.carousel').to(current - onscreen, 100, true);
					}
				}

				function syncPosition2(el) {
					if (syncedSecondary) {
						var number = el.item.index;
						sync1.data('owl.carousel').to(number, 100, true);
					}
				}

				sync2.on("click", ".owl-item", function (e) {
					e.preventDefault();
					var number = $(this).index();
					sync1.data('owl.carousel').to(number, 300, true);
				});
			});

		},
		Portfolio_Slider: function ($scope) {

			var $container = $scope.find('.agency-portfolio-slider');
			$container.imagesLoaded(function () {
				$container.myOwl({
					items: 5,
					nav: false,
					responsive: {
						0: {
							items: 1,
							autoWidth: false
						},
						// breakpoint from 480 up
						480: {
							items: 1,
							autoWidth: false
						},
						// breakpoint from 768 up
						768: {
							items: 2,
							autoWidth: false
						},
						1024: {
							items: 5,
							autoWidth: true
						}
					}
				});
			});
		},
		Portfolio: function ($scope) {
			if ($('.cases-grid').length > 0) {
				var $container = $scope.find('.cases-grid'),
					colWidth = function colWidth() {
						var w = $container.width(),
							columnNum = 1,
							columnWidth = 0;
						if (w > 1200) {
							columnNum = 4;
						} else if (w > 600) {
							columnNum = 3;
						} else if (w > 450) {
							columnNum = 1;
						} else if (w > 385) {
							columnNum = 1;
						}
						columnWidth = Math.floor(w / columnNum);
						$container.find('.grid-item').each(function () {
							var $item = $(this),
								multiplier_w = $item.attr('class').match(/grid-item-w(\d)/),
								multiplier_h = $item.attr('class').match(/grid-item-h(\d)/),
								width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
								height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
							$item.css({
								width: width
							});
						});
						return columnWidth;
					},
					isotope = function isotope() {
						$container.isotope({
							resizable: false,
							itemSelector: '.grid-item',
							masonry: {
								columnWidth: colWidth(),
								gutterWidth: 3
							}
						});
					};
				isotope();
				$(window).on('resize load', isotope);
				var $optionSets = $('.filter-button-wraper .option-set'),
					$optionLinks = $optionSets.find('a');
				$optionLinks.on('click', function () {
					var $this = $(this);
					var $optionSet = $this.parents('.option-set');
					$optionSet.find('.selected').removeClass('selected');
					$this.addClass('selected');
					// make option object dynamically, i.e. { filter: '.my-filter-class' }
					var options = {},
						key = $optionSet.attr('data-option-key'),
						value = $this.attr('data-option-value');

					// parse 'false' as false boolean
					value = value === 'false' ? false : value;
					options[key] = value;
					if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
						// changes in layout modes need extra logic
						changeLayoutMode($this, options);
					} else {
						// creativewise, apply new options
						$container.isotope(options);
					}
					return false;
				});
			}


			if ($('.portfolio-grid').length > 0) {
				var $container2 = $scope.find('.portfolio-grid'),
					colWidth = function colWidth() {
						var w = $container2.width(),
							columnNum = 1,
							columnWidth = 0;
						if (w > 1200) {
							columnNum = 4;
						} else if (w > 900) {
							columnNum = 4;
						} else if (w > 600) {
							columnNum = 2;
						} else if (w > 450) {
							columnNum = 2;
						} else if (w > 385) {
							columnNum = 1;
						}
						columnWidth = Math.floor(w / columnNum);
						$container2.find('.portfolio-grid-item').each(function () {
							var $item = $(this),
								multiplier_w = $item.attr('class').match(/portfolio-grid-item-w(\d)/),
								multiplier_h = $item.attr('class').match(/portfolio-grid-item-h(\d)/),
								width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
								height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
							$item.css({
								width: width
							});
						});
						return columnWidth;
					},
					isotope = function isotope() {
						$container2.isotope({
							resizable: false,
							itemSelector: '.portfolio-grid-item',
							masonry: {
								columnWidth: colWidth(),
								gutterWidth: 3
							}
						});
					};
				isotope();
				$(window).on('resize load', isotope);
			}



			if ($('.portfolio-grid-loadmore').length > 0) {
				var $portfolioGridContainer = $scope.find('.portfolio-grid-loadmore'),
					colWidth = function colWidth() {
						var w = $portfolioGridContainer.width(),
							columnNum = 1,
							columnWidth = 0;
						if (w > 1200) {
							columnNum = 4;
						} else if (w > 900) {
							columnNum = 4;
						} else if (w > 600) {
							columnNum = 2;
						} else if (w > 450) {
							columnNum = 2;
						} else if (w > 385) {
							columnNum = 1;
						}
						columnWidth = Math.floor(w / columnNum);
						$portfolioGridContainer.find('.portfolio-grid-item').each(function () {
							var $item = $(this),
								multiplier_w = $item.attr('class').match(/portfolio-grid-item-w(\d)/),
								multiplier_h = $item.attr('class').match(/portfolio-grid-item-h(\d)/),
								width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
								height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
							$item.css({
								width: width
							});
						});
						return columnWidth;
					},
					isotope = function isotope() {
						$portfolioGridContainer.isotope({
							resizable: false,
							itemSelector: '.portfolio-grid-item',
							masonry: {
								columnWidth: colWidth(),
								gutterWidth: 3
							}
						});
					};
				isotope();
				$(window).on('resize load', isotope);

				// var portfolioGridContainer = document.getElementsByClassName("portfolio-grid-loadmore")[0];
				var load_more = $portfolioGridContainer.attr('data-is_loadmore');
				var initShow = $portfolioGridContainer.attr('data-postcount') ? $portfolioGridContainer.attr('data-postcount') : 1; //number of images loaded on init & onclick load more button
				var counter = initShow; //counter for load more button
				var iso2 = $portfolioGridContainer.data('isotope'); // get Isotope instance

				var loadMore = function loadMore(toShow) {
					$portfolioGridContainer.find(".hidden").removeClass("hidden");
					var hiddenElems2 = iso2.filteredItems.slice(toShow, iso2.filteredItems.length).map(function (item) {
						return item.element;
					});
					$(hiddenElems2).addClass('hidden');
					$portfolioGridContainer.isotope('layout');
					//when no more to load, hide show more button
					if (hiddenElems2.length == 0) {
						$("#load-more").fadeOut();
					} else {
						$("#load-more").fadeIn();
					};
				};
				//append load more button

				if (load_more == "yes") {
					loadMore(initShow); $portfolioGridContainer.after('<div class="text-center"><a href="#" id="load-more" class="loadmore-btn"><i class="icon icon-plus"></i> Load More</a></div>');
					//when load more button clicked
				}

				$("#load-more").on('click', function (e) {
					e.preventDefault();
					if ($('#filters').data('clicked')) {
						//when filter button clicked, set initial value for counter
						counter = initShow;
						j$('#filters').data('clicked', false);
					} else {
						counter = counter;
					};
					counter = counter + initShow;
					loadMore(counter);
				});
			}


			if ($('.portfolio-grid-loadmore-2').length > 0) {
				var $portfolioGridContainer2 = $scope.find('.portfolio-grid-loadmore-2'),
					colWidth = function colWidth() {
						var w = $portfolioGridContainer2.width(),
							columnNum = 1,
							columnWidth = 0;
						if (w > 1200) {
							columnNum = 3;
						} else if (w > 900) {
							columnNum = 3;
						} else if (w > 600) {
							columnNum = 2;
						} else if (w > 450) {
							columnNum = 2;
						} else if (w > 385) {
							columnNum = 1;
						}
						columnWidth = Math.floor(w / columnNum);
						$portfolioGridContainer2.find('.portfolio-grid-item').each(function () {
							var $item = $(this),
								multiplier_w = $item.attr('class').match(/portfolio-grid-item-w(\d)/),
								multiplier_h = $item.attr('class').match(/portfolio-grid-item-h(\d)/),
								width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
								height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.5;
							$item.css({
								width: width
							});
						});
						return columnWidth;
					},
					isotope = function isotope() {
						$portfolioGridContainer2.isotope({
							resizable: false,
							itemSelector: '.portfolio-grid-item',
							masonry: {
								columnWidth: colWidth(),
								gutterWidth: 3
							}
						});
					};
				isotope();
				$(window).on('resize load', isotope);

				var is_loadmore = $portfolioGridContainer2.attr('data-is_loadmore');

				var initShow = $portfolioGridContainer2.attr('data-postcount') ? $portfolioGridContainer2.attr('data-postcount') : 1;   //number of images loaded on init & onclick load more button
				var counter = initShow; //counter for load more button
				var iso = $portfolioGridContainer2.data('isotope'); // get Isotope instance

				var _loadMore = function _loadMore(toShow) {
					$portfolioGridContainer2.find(".hidden").removeClass("hidden");
					var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function (item) {
						return item.element;
					});
					$(hiddenElems).addClass('hidden');
					$portfolioGridContainer2.isotope('layout');
					//when no more to load, hide show more button
					if (hiddenElems.length == 0) {
						$("#load-more").fadeOut();
					} else {
						$("#load-more").fadeIn();
					};
				};
				//when load more button clicked

				if (is_loadmore == "yes") {

					$portfolioGridContainer2.after('<div class="text-center"><a href="#" id="load-more" class="loadmore-btn"><i class="icon icon-plus"></i> Load More</a></div>');
				}

				_loadMore(initShow); $("#load-more").on('click', function (e) {
					e.preventDefault();
					if ($('#filters').data('clicked')) {
						//when filter button clicked, set initial value for counter
						counter = initShow;
						j$('#filters').data('clicked', false);
					} else {
						counter = counter;
					};
					counter = counter + initShow;
					_loadMore(counter);
				});
			}
		},
	};
	$(window).on('elementor/frontend/init', Agmycoo.init);
}(jQuery, window.elementorFrontend));