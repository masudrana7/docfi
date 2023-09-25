jQuery(document).ready(function ($) {
    "use strict";
    // Menu expand on scroll and active/remove class on scroll content height
    var sections = $('.rt-group-single-list .rt-single-sidebar-list');
    var parentLayout = $(".rt-group-single-list .rt-single-sidebar-list .rt-single-content-wrapper");
    $(window).on('scroll', function () {
        var current_position = $(this).scrollTop();
        //add active or remove class according content height
        sections.each(function () {
            var top = $(this).offset().top - 160;
            var bottom = top + $(this).outerHeight();
            var sectionId = $(this).attr('id');
            if (current_position >= top && current_position <= bottom) {
                $(".explore-topics-header a[href*=" + sectionId + "]").parents('.rt-single-sidebar-list').addClass("active");
            } else {
                $(".explore-topics-header a[href*=" + sectionId + "]").parents('.rt-single-sidebar-list').removeClass("active");
            }
        })
        //line on scroll
        parentLayout.each(function () {
            var divHeight = $(this).outerHeight();
            var widgetTop = $(this).offset().top - 160;
            var widgetBottom = widgetTop + divHeight;
            var widthPercentage = 0;
            var widgetId = $(this).attr('id');
            if (current_position >= widgetTop && current_position <= widgetBottom) {
                var storeY = current_position - widgetTop;
                widthPercentage = (storeY / divHeight) * 100;
                $(".explore-topics-list li a[href*=" + widgetId + "]").addClass("active").css("backgroundImage", "linear-gradient( to right, #15C590 " + widthPercentage + "%, #6B707F " + 0 + "% )");
                $(".active .progress-indicator").width(widthPercentage + "%");
            } else {
                $(".explore-topics-list li a[href*=" + widgetId + "]").removeClass("active").css("backgroundImage", "unset");
            }
        })
    });
    // Single Docs p tags Font-size controller
    if ($(".rt-docs-single-content").length) {
        var minusFont = $(".font-size-minus");
        var plusFont = $(".font-size-plus");
        var normalFont = $(".font-size-normal");
        $(plusFont).on("click", function () {
            $(".rt-docs-single-content p").css({ "font-size": "+=2", "line-height": "+=1px" });
        });
        $(normalFont).on("click", function () {
            $(".rt-docs-single-content p").css({ "font-size": "16px" });
        });
        $(minusFont).on("click", function () {
            $(".rt-docs-single-content p").css({ "font-size": "-=2", "line-height": "-=1px" });
        });
    }

    //Search Focusin & Focusout Add Class
    
    if ($(".rt-hero-section-content-wrapper").length) {
        $('.rt-hero-section-content-wrapper').focusin(function () {
            $('body').addClass('rt-search-active');
            $(this).css('z-index', '100')
        });
        $('.rt-hero-section-content-wrapper').focusout(function () {
            $('body').removeClass('rt-search-active');
            $(this).attr('style', '')
        });
    }

    // Search ajax 
    if ($("#rt_datafetch").length) {

        $('#searchInput').on('keyup', function () {
            fetchResults();
        });
        $(document).on('docfi_search_input_change', function () {
            fetchResults();
            $('#searchInput').focus();
        });
        function fetchResults() {
            var keyword = $('#searchInput').val();
            var meta = $('#categories').val();
            var searchkey = $('.rt-addon-search .keyword a').val();
            var searchTerm = $('#searchInput').val();
            $('#cleanText').on('click', function () {
                $('#searchInput').val('');
                $('.rt-searchbox-container').removeClass('rt-search-container');
            });
            if (searchTerm.length > 0) {
                $('.rt-searchbox-container').addClass('rt-search-container');
                
            } else {
                $('.rt-searchbox-container').removeClass('rt-search-container');
            }

            if (keyword.length < 3) {
                $('#rt_datafetch').html("<span class='letters'>Minimum 3 Latters</span>");
                return;
            }
            $.ajax({
                url: docfiObj.ajaxURL,
                type: 'post',
                data: {
                    action: 'data_fetch',
                    keyword: keyword,
                    meta: meta,
                    searchkey: searchkey,
                },
                success: function (data) {
                    $('#rt_datafetch').html(data);
                }
            });
        }
        //Search Keyword
        $(".rt-addon-search .keyword").on("click", function () {
            var keyword = $(this).text();
            $('.rt-input-wrap #searchInput').val(keyword);
            $(document).trigger('docfi_search_input_change');
        });

        // Banner Search Ajax
        $('#rtsearchInput').on('keyup', function () {
            bannerFetchResults();
        });
        $(document).on('docfi_banner_search_change', function () {
            bannerFetchResults();
            $('#rtsearchInput').focus();
        });

        function bannerFetchResults() {
            var keyword = $('#rtsearchInput').val();
            var meta = $('#categories').val();
            var searchkey = $('.rt-banner-search-key .keyword a').val();
            var searchTerm = $('#rtsearchInput').val();
            $('#cleanText').on('click', function () {
                $('#rtsearchInput').val('');
                $('.rt-searchbox-container').removeClass('rt-search-container');
            });
            if (searchTerm.length > 0) {
                $('.rt-searchbox-container').addClass('rt-search-container');

            } else {
                $('.rt-searchbox-container').removeClass('rt-search-container');
            }

            if (keyword.length < 3) {
                $('#rt_datafetch').html("<span class='letters'>Minimum 3 Latter</span>");
                return;
            }
            $.ajax({
                url: docfiObj.ajaxURL,
                type: 'post',
                data: {
                    action: 'banner_data_fetch',
                    keyword: keyword,
                    meta: meta,
                    searchkey: searchkey,
                },
                success: function (data) {
                    $('#rt_datafetch').html(data);
                }
            });
        }

        //Banner Search Keyword
        $(".rt-banner-search-key .keyword").on("click", function() {
            var keyword = $(this).text();
            $('.rt-input-wrap #rtsearchInput').val(keyword);
            $(document).trigger('docfi_banner_search_change');
        });
    }
    

    //nice-select
    if ($(".rt-searchbox-form").length) {
        $('select').niceSelect();
    }

    // Docs Single Sidebar Click add fuction
    if ($(".rs-docs-click").length) {
        $(".rs-docs-click").on("click", function () {
            $(".rs-docs-click").each(function (index, element) {
                $(element).removeClass("active");
            });
            $(this).addClass("active");
        }); 
    }

    // Docs search category select
    $('.rt-docs-search .rt-dropdown').on('click', 'ul li a', function (e) {
        e.preventDefault();
        var text = $(this).text(),
            cat = $(this).data('cat'),
            $parent = $(this).closest('.rt-docs-search');
        $parent.find('.rt-cat').text(text);
        $parent.find('input[name="docfi_docs_group"]').val(cat);
    });



    $('a[href=\\#]').on('click', function (e) {
        e.preventDefault();
    })

    $('#myTab a').on('click', function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	/* Page scroll Bottom To Top */
    if ($(".scroll-wrap").length) {
        var progressPath = document.querySelector('.scroll-wrap path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        var updateProgress = function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 50;
        var duration = 10;
        jQuery(window).on('scroll', function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.scroll-wrap').addClass('active-scroll');
            } else {
                jQuery('.scroll-wrap').removeClass('active-scroll');
            }
        });
        jQuery('.scroll-wrap').on('click', function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    }

    /* Theia Side Bar */
    if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
        $('.has-sidebar .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 80});
        $('.fixed-sidebar-addon .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 160});
    }


    if (typeof $.fn.theiaStickySidebar !== "undefined") {
    $(".sticky-coloum-wrap .sticky-coloum-item").theiaStickySidebar({
      additionalMarginTop: 130,
    });
  }

    /* Header Search */
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (event) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });

    /* masonary */
    var galleryIsoContainer = $(".rt-masonry-grid");
    if (galleryIsoContainer.length) {
        var imageGallerIso = galleryIsoContainer.imagesLoaded(function () {
            imageGallerIso.isotope({
                itemSelector: ".rt-grid-item",
                percentPosition: true,
                isAnimated: true,
                masonry: {
                    columnWidth: ".rt-grid-item",
                },
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
        });
    }

    //mouse-parallax
    var parallaxInstances = [];
    $('.rt-mouse-parallax').each(function (index, element) {
        var $this = $(this);
        $this.attr('id', "rt-parallax-instance-" + index);
        parallaxInstances[index] = new Parallax($("#rt-parallax-instance-" + index).get(0), {
            // hoverOnly: true,
            // relativeInput: true,
        });
    })
    // End JS

    /* Isotope */
    if (typeof $.fn.isotope == 'function') {
        var $parent = $('.rt-isotope-wrapper'),
            $isotope;
        var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
            $isotope = $(".rt-isotope-content", $parent).isotope({
                filter: "*",
                transitionDuration: "1s",
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(0.001)"
                },
                visibleStyle: {
                    transform: "scale(1)",
                    opacity: 1
                }
            });
            $('.rt-isotope-tab a').on('click', function () {
                console.log('click');
                var $parent = $(this).closest('.rt-isotope-wrapper'),
                    selector = $(this).attr('data-filter');
                console.log($parent);
                $parent.find('.rt-isotope-tab .current').removeClass('current');
                $(this).addClass('current');
                $isotope.isotope({
                    filter: selector
                });

                return false;
            });

            $(".hide-all .rt-docs-tab a").first().trigger('click');
        });
    }
    
    /* Mobile menu */
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $("body").addClass("not-top");
            $("body").removeClass("top");
        } else {
            $("body").addClass("top");
            $("body").removeClass("not-top");
        }
    });

    /*Social print*/
    $(document).on('click', '.print-share-button', function (e) {
        console.log();
        e.preventDefault();
        window.print();
        return false;
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });

    // Advanced Search Revel
    $(".advanced-btn").on("click", function () {
        $(this).toggleClass("collapsed");
        $("#advanced-search").toggleClass("show");

    });

    /* Header Right Menu */
    var menuArea = $('.additional-menu-area');
    menuArea.on('click', '.side-menu-trigger', function (e) {
        e.preventDefault();
        var self = $(this);
        if (self.hasClass('side-menu-open')) {
            if( docfiObj.rtl =='rtl'  ) {
                $('.sidenav').css('transform', 'translateY(0%)');
            }else {
                $('.sidenav').css('transform', 'translateY(0%)');
            }
            if (!menuArea.find('> .rt-cover').length) {
                menuArea.append("<div class='rt-cover'></div>");
            }
            self.removeClass('side-menu-open').addClass('side-menu-close');
        }
    });
	
	/*-------------------------------------
	Offcanvas Menu activation code
	-------------------------------------*/
    function closeMenuArea() {
        var trigger = $('.side-menu-trigger', menuArea);
        trigger.removeClass('side-menu-close').addClass('side-menu-open');
        if (menuArea.find('> .rt-cover').length) {
            menuArea.find('> .rt-cover').remove();
        }

        if( docfiObj.rtl =='rtl'  ) {
            $('.sidenav').css('transform', 'translateY(100%)');
        }else {
            $('.sidenav').css('transform', 'translateY(-120%)');
        }
    }

    menuArea.on('click', '.closebtn', function (e) {
        e.preventDefault();
        closeMenuArea();
    });

    $(document).on('click', '.rt-cover', function () {
        closeMenuArea();
    });
	
    /*-------------------------------------
    MeanMenu activation code
    --------------------------------------*/
    var a = $('.offscreen-navigation .menu');
    if (a.length) {
        $(".menu-item-has-children").append("<span></span>");
        $(".page_item_has_children").append("<span></span>");

        a.children("li").addClass("menu-item-parent");

        $('.menu-item-has-children > span').on('click', function () {
            var _self = $(this),
                sub_menu = _self.parent().find('>.sub-menu');
            if (_self.hasClass('open')) {
                sub_menu.slideUp();
                _self.removeClass('open');
            } else {
                sub_menu.slideDown();
                _self.addClass('open');
            }
        });
        $('.page_item_has_children > span').on('click', function () {
            var _self = $(this),
                sub_menu = _self.parent().find('>.children');
            if (_self.hasClass('open')) {
                sub_menu.slideUp();
                _self.removeClass('open');
            } else {
                sub_menu.slideDown();
                _self.addClass('open');
            }
        });
    }

    $('.mean-bar .sidebarBtn').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('slidemenuon');
    });

    /*Header and mobile menu stick*/
    $(window).on('scroll', function () {
        if ($('body').hasClass('sticky-header')) {
            // Sticky header
            var stickyPlaceHolder = $("#sticky-placeholder"),
                menu = $("#header-menu"),
                menuH = menu.outerHeight(),
                topHeaderH = $('#tophead').outerHeight() || 0,
                middleHeaderH = $('#header-middlebar').outerHeight() || 0,
                targrtScroll = topHeaderH + middleHeaderH;
            if ($(window).scrollTop() > targrtScroll) {
                menu.addClass('rt-sticky');
                stickyPlaceHolder.height(menuH);
            } else {
                menu.removeClass('rt-sticky');
                stickyPlaceHolder.height(0);
            }

            // Sticky mobile header
            var stickyPlaceHolder = $("#mobile-sticky-placeholder"),
                menu = $(".mobile-mene-bar"),
                menuH = menu.outerHeight(),
                topHeaderH = $('#mobile-top-fix').outerHeight() || 0,
                topAdminH = $('#wpadminbar').outerHeight() || 0,
                targrtScroll = topHeaderH + topAdminH;
            if ($(window).scrollTop() > targrtScroll) {
                menu.addClass('mobile-sticky');
               stickyPlaceHolder.height(menuH);
            } else {
                menu.removeClass('mobile-sticky');
                stickyPlaceHolder.height(0);
            }
        }
    });

    // Popup - Used in video
    if (typeof $.fn.magnificPopup == 'function') {
        $('.rt-video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $('.open-popup-link').magnificPopup({
            type: 'inline',
            midClick: true,
            mainClass: 'mfp-fade'
        });
    }
    if (typeof $.fn.magnificPopup == 'function') {
        if ($('.zoom-gallery').length) {
            $('.zoom-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a.docfi-popup-zoom', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }
    }
});

function docfi_load_content_area_scripts($) {
    /* progress circle */
    $('.rt-progress-circle').each(function () {
        var startcolor = $(this).data('rtstartcolor'),
            endcolor = $(this).data('rtendcolor'),
            num = $(this).data('rtnum'),
            speed = $(this).data('rtspeed'),
            suffix = $(this).data('rtsuffix');
        $(this).circleProgress({
            value: 1,
            fill: endcolor,
            emptyFill: startcolor,
            thickness: 5,
            size: 140,
            animation: {duration: speed, easing: "circleProgressEasing"},
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('.rtin-num').html(Math.round(num * progress) + suffix);
        });
    });
}

//function Load
function docfi_content_load_scripts() {
    var $ = jQuery;
    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    var windowWidth = $(window).width();

    imageFunction();
    function imageFunction() {
        $("[data-bg-image]").each(function () {
        let img = $(this).data("bg-image");
            $(this).css({
                backgroundImage: "url(" + img + ")",
            });
        });
    }

    /* Counter */
    var counterContainer = $('.counter');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: counterContainer.data('rtsteps'),
            time: counterContainer.data('rtspeed')
        });
    }

    // pricing table
    const pricingWrapper = $(".rt-pricing-tab");
    if (pricingWrapper) {
        $(".rt-pricing-tab").each(function() {
            $(".pricing-switch-container").on("click", function() {
                $(".pricing-switch")
                    .parents(".price-switch-box")
                    .toggleClass("price-switch-box--active"),
                    $(".pricing-switch").toggleClass("pricing-switch-active"),
                    $(".rt-tab-content").toggleClass("rt-active");
            });
        });
    }

    //Intersection Observer
    if (!!window.IntersectionObserver) {
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active-animation");
                observer.unobserve(entry.target);
            }
        });
    }, {
        rootMargin: "0px 0px -100px 0px"
    });
    document.querySelectorAll('.has-animation').forEach(block => {
        observer.observe(block)
    });
    } else {
        document.querySelectorAll('.has-animation').forEach(block => {
            block.classList.remove('has-animation')
        });
    }
	
    /* Wow Js Init */
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true,
        scrollContainer: null,
    });
    new WOW().init();

    /* Swiper slider */
    $('.rt-swiper-slider').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiper = new Swiper( this, {
                autoplay: autoplayconditon,
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                0: {
                    slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                },
                576: {
                    slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                },
                768: {
                    slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                },
                992: {
                    slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                },
                1200: {
                    slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                },
                1600: {
                    slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                },
            },
        });
        swiper.init();
    });

    /* Horizontal Thumbnail slider */
    $('.docfi-horizontal-slider').each(function(){
        var slider_wrap = $(this);
        var $pagination = slider_wrap.find('.swiper-pagination')[0];
        var $next = slider_wrap.find('.swiper-button-next')[0];
        var $prev = slider_wrap.find('.swiper-button-prev')[0];
        var target_thumb_slider = slider_wrap.find('.horizontal-thumb-slider');
        var thumb_slider = null;
        if(target_thumb_slider.length){
            var settings = target_thumb_slider.data('xld');
            var autoplayconditon= settings['auto'];
            thumb_slider = new Swiper(target_thumb_slider[0],
                {
                autoplay:   autoplayconditon,
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                spaceBetween:  settings['spaceBetween'],
                breakpoints: {
                    0: {
                        slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                    },
                    576: {
                        slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                    },
                    768: {
                        slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                    },
                    992: {
                        slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                    },
                    1200: {
                        slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                    },            
                },
                pagination: {
                    el: $pagination,
                    type: "progressbar",
                },
                
            });
        }

        var target_slider = slider_wrap.find('.horizontal-slider');
        if(target_slider.length){
            var settings = target_slider.data('xld');
            new Swiper(target_slider[0], {
                autoplay:  settings && settings['auto'],
                speed: settings && settings['speed'],
                loop:  settings && settings['loop'],
                effect: settings && settings['effect'],
                thumbs: {
                  swiper: thumb_slider,
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
            });
        }
    });   
}

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {
        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    docfi_content_load_scripts();
                });
            }
        });

    });

    // Window Load
    $(window).on('load', function () {
        docfi_content_load_scripts();
        // select first isotope data-filter
        var first_filter = $(".rt-docs-tab a:first").attr('data-filter');
        //isotop default filter
        $('.rt-isotope-content').isotope({
            filter: first_filter
        });
    });

    //docfi_single_scroll_post
    if ($(".ajax-scroll-post").length > 0) {
        var onScrollPagi = true;
        var current_post = 1;
        $(window).scroll(function () {
            if (!onScrollPagi) return;
            var bottomOffset = 1900; // the distance (in px) from the page bottom when you want to load more posts 

            if (current_post >= docfiObj.post_scroll_limit) {
                onScrollPagi = false;
                return;
            }

            if ($(document).scrollTop() > ($(document).height() - bottomOffset) && onScrollPagi == true) {
                let cat_ids = $('input#docfi-cat-ids').val();
                $.ajax({
                    url: docfiObj.ajaxURL,
                    data: {
                        action: 'docfi_single_scroll_post',
                        current_post: current_post,
                        cat_ids
                    },
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        onScrollPagi = false;
                    },
                    success: function (resp) {
                        if (resp.success) {
                            $('.ajax-scroll-post').append(resp.data.nextContent);
                            history.pushState({}, null, resp.data.nextUrl);
                            current_post++;
                            onScrollPagi = true;
                        }
                    }
                });
            }
        });
    }


    $(window).on('scroll', scrollFunction);
    function scrollFunction() {
        var target = $('#contentHolder');
        
        if ( target.length > 0 ) {
            var contentHeight = target.outerHeight();
            var documentScrollTop = $(document).scrollTop();
            var targetScrollTop = target.offset().top;
            var scrolled = documentScrollTop - targetScrollTop;
            
            if (0 <= scrolled) {
                var scrolledPercentage = (scrolled / contentHeight) * 100;
                if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
                    scrolledPercentage = scrolledPercentage >= 90 ? 100 : scrolledPercentage;
                    $("#docfiBar").css({
                        width: scrolledPercentage + "%"
                    });
                }
            } else {
                $("#docfiBar").css({
                    width: "0%"
                });
            }
        }
    }

    function revealPosts(){
        var posts = $('.single-grid-item:not(.reveal)');
        var i = 0;
        setInterval( function(){
          if ( i >= posts.length) return false;
          var el = posts[i];
          $(el).addClass('reveal');
          i++
        }, 100);
    }

    // Ajax Blog archive layout 1 Loadmore Function
    var page = 2;
    $(document).on( 'click', '#loadMore', function( event ) {
        event.preventDefault();

        jQuery('#loadMore').addClass('loading-lazy');

        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : docfiObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore").html("No More Blog Post"); 
                jQuery('#loadMore').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })

    // Hover animation
    $(".hover-animation").hover(function () {
        $(".hover-animation").removeClass("hover-animation-active");
        $(this).addClass("hover-animation-active");
    });

    $(".rt-service-tab [data-list-hover]").hover(function () {
        var t = $(this).attr("data-list-hover");
        $(".rt-service-tab [data-list-hover]").removeClass("active"), $('.rt-service-tab [data-list-hover="'.concat(t, '"]')).addClass("active");
        $(".rt-service-tab [data-list-img]").removeClass("active"), $('.rt-service-tab [data-list-img="'.concat(t, '"]')).addClass("active");
    });

    /*Portfolio move title with cursor*/
    function mousemove_docs_hover_effect() {
        if (jQuery( window ).width() > 0 ) {
            if ( jQuery('#content').find(".rt-docs-default").length > 0 ) {
                jQuery(".rt-docs-default .docs-item").each(function() {
                    let $Purpose = jQuery(this);
                    let $PurposeInner = $Purpose.find('.port-hover-effect');
                    $Purpose.mousemove(function(event){
                        let y = event.pageY - $Purpose.offset().top + 10;
                        let x = event.pageX - $Purpose.offset().left + 10;
                        $PurposeInner.css({'top': y,'left': x,'bottom': "auto",'right': "auto",'opacity': 1});
                    })
                    .mouseleave(function() {
                        $PurposeInner.css({'top': 'auto','left': 10,'bottom': 10,'right': "auto",'opacity': 0});
                    });
                });
            }
        }
    }

    /*Button*/
    $(function() {
        mousemove_docs_hover_effect();
    });

    // Tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)) 

    
})(jQuery);


