;
(function($) {

    "use strict";

    var $doc = $(document),
        $win = $(window),
        $body = $('body'),
        $header = $('header'),
        $cdNavicon = $('.cd-nav-icon'),
        $modal = $('#modal-login'),
        $loginModal = $('#login'),
        $rangeSlider = $('#slider-range'),
        $amount = $('#amount'),
        $amount1 = $('#amount1'),
        $amount2 = $('#amount2'),
        $quickView = $('#quick-view'),
        $accordion = $('#accordion'),
        $mainSlide = $('#banner-slider'),
        $mainBanner = $('.main-banner'),
        $modalTrigger = $('.trigger-modal'),
        $productSlide = $('.product-slide'),
        $instaSlide = $('.instaslide'),
        $thumbSlide = $('.thumb-slider'),
        $thumbSlideModal = $('.thumb-slider-modal'),

        $flashCount = $('.flash-count'),
        $scrollUp = $('.scrollup'),
        $add = $('.add'),
        $minus = $('.minus'),
        $group1 = $('.group1'),
        $gridWrap = $('.grid-wrap'),
        $grid = $('.grid'),
        $featurePostList = $('.feature-post-list'),
        $absoluteWrap = $('.absolute-wrap'),
        $supportAccordion = $('.support-accordion'),
        $navTigger = $('.cd-nav-trigger'),
        $dlMenu = $('#dl-menu'),
        $newsletter = $('#newsletter'),
        $cdNavWrap = $('.cd-navigation-wrapper'),
        $carousel = $('.carousel'),
        $searchIcon = $('.searchbox-icon'),
        $loadmore = $('.load-more'),
        $parallaxSection = $('.rab-section.parallax');

    // normal JS selector
    var newEl;

    // bxSliders
    var bxSlider1, bxSlider2, bxSlider3, bxSlider4;

    //thumb slider
    var thumbSlider = {
        pagerCustom: '#thumb-pager',
        auto: true,
        controls: false
    };

    // feature post list
    var featurePostList = {
        auto: true,
        controls: false,
        pager: true,
    };

    /**
     * Parameters for Product Slide
     */
    function rabGetProductSlideParams() {
        var params;
        // get the window width
        var winWidth = $win.width();

        if (winWidth < 767) {
            params = {
                auto: true,
                minSlides: 1,
                maxSlides: 1,
                slideMargin: 0,
                controls: false,
                autoHover: true,
                moveSlides: 4
            };
        } else if (winWidth < 991) {
            params = {
                auto: true,
                minSlides: 2,
                maxSlides: 2,
                slideMargin: 30,
                slideWidth: 350,
                autoHover: true,
                controls: false,
                moveSlides: 2
            };
        } else {
            params = {
                auto: true,
                minSlides: 4,
                maxSlides: 4,
                slideWidth: 270,
                slideMargin: 30,
                autoHover: true,
                moveSlides: 4,
                controls: false,
                pager: true
            };
        }

        return params;
    }

    /**
     * Parameters for Instagram Slider
     */
    function rabGetInstagramSliderParams() {
        var params;
        // get the window width
        var winWidth = $win.width();
        params = {
            auto: true,
            minSlides: 4,
            maxSlides: 8,
            slideWidth: 270,
            slideMargin: 30,
            moveSlides: 4,
            controls: true,
            pager: false,
            nextText: '<i class=" fa fa-angle-right"></i>',
            prevText: '<i class=" fa fa-angle-left"></i>'
        };
        return params;
    }

    $('.dropdown').on('click', 'a', function(e) {

        var $this = $(this);
        var collapseThis = false;
        if ($('.dropdown-menu').hasClass('dropdown-open') &&
            !$this.next('.dropdown-menu').hasClass('dropdown-open')) {
            $('.dropdown-menu').slideUp().removeClass('dropdown-open');
            collapseThis = false;
        } else if ($(this).next('.dropdown-menu').hasClass('dropdown-open')) {
            collapseThis = true;
            $(this).next('.dropdown-menu').slideUp().removeClass('dropdown-open');
        }

        if (!collapseThis) {
            $(this).next('.dropdown-menu').slideDown().addClass('dropdown-open');
        }

    });

    /**
     * Initialize the bxSlider
     * 
     * @param selector
     * @param bxSlider objects
     */
    function rabInitBxSlider($el, params) {
        return $el.bxSlider(params);
    }

    /**
     * Reload BxSlider
     * @param {*} sliderObj BxSlider Object
     * @param {*} params 
     */
    function rabReloadBxSlider(sliderObj, params) {
        // return sliderObj.reloadSlider(params);
    }


    /**
     * Modal
     * Toggles between login, register & forgot password
     * with the same instance without actually loading for 3 modals
     */
    $modalTrigger.on('click', function(e) {
        e.preventDefault();
        var isModal = false;
        var currentEl = e.currentTarget;
        var target = $(currentEl).data('show');
        var $el = $(this);

        if (!isModal) {
            $modal.modal('show');
            $(newEl).addClass('hidden');
            $(target).removeClass('hidden');
            newEl = '';
            isModal = false;
        }
        newEl = target;

        // after the modal is displayed
        $modal.on('shown.bs.modal', function() {
            isModal = true;
            newEl = target;
            $(target).removeClass('hidden');

            // form validation
            $('#loginform').validate({
                rules: {
                    log: "required",
                    pwd: "required"
                },
                messages: {
                    log: rabStrings.username,
                    pwd: rabStrings.password
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $('#rab-reg-form').validate({
                rules: {
                    useremail: {
                        required: true,
                        email: true
                    },
                    original: "required",
                    confirm: {
                        required: true,
                        equals: '#original'
                    }
                },
                messages: {
                    useremail: {
                        required: rabStrings.email,
                        email: rabStrings.valid_email
                    },
                    original: rabStrings.password,
                    confirm: {
                        required: rabStrings.confirm,
                        equals: rabStrings.equals
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        // before actually hiding the modal
        $modal.on('hide.bs.modal', function() {
            target = '';
            isModal = false;
            $(newEl).removeClass('hidden');
            $modal.find('.modal-dialog').children('div').addClass('hidden');
        });

    });

    /**
     * END Login, Register & Forgot Password Modal 
     */

    //set screen height
    function rabSetHeight() {
        var windowHeight = $win.innerHeight();
        $absoluteWrap.css('height', windowHeight + "px");
    }

    function rabInit() {
        rabSetHeight();

        $carousel.carousel({
            interval: 5000,
            pause: "false"
        });



        /**
         * BxSliders
         */
        var productSlideparams = rabGetProductSlideParams();
        var instaSliderParams = rabGetInstagramSliderParams();

        bxSlider1 = rabInitBxSlider($productSlide, productSlideparams);
        bxSlider2 = rabInitBxSlider($instaSlide, instaSliderParams);
        bxSlider3 = rabInitBxSlider($thumbSlide, thumbSlider);
        bxSlider4 = rabInitBxSlider($featurePostList, featurePostList);

    }
    rabInit();

    /**
     * When the window resizes
     */
    $win.bind('resize', function(e) {
        window.resizeEvt;
        $win.resize(function() {
            clearTimeout(window.resizeEvt);
            window.resizeEvt = setTimeout(function() {
                var productSlideparams = rabGetProductSlideParams();
                var instaSliderParams = rabGetInstagramSliderParams();

                rabReloadBxSlider(bxSlider1, productSlideparams);
                rabReloadBxSlider(bxSlider2, instaSliderParams);

                rabSetHeight();
            }, 250);
        });
    });


    /**
     * WOW animation
     */
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 100,
    });
    wow.init();
    /**
     * END WOW animation
     */

    //price range
    $rangeSlider.slider({
        range: true,
        min: 0,
        max: 300,
        values: [35, 219],
        slide: function(event, ui) {
            $amount.html("$" + ui.values[0] + " - $" + ui.values[1]);
            $amount1.val(ui.values[0]);
            $amount2.val(ui.values[1]);
        }
    });

    $amount.html("$" + $rangeSlider.slider("values", 0) +
        " - $" + $rangeSlider.slider("values", 1));


    $doc.on('click', '.add', function(e) {
        var $qty = $(this).closest('div').find('.qty');
        var maxVal = parseInt($qty.attr('max'));
        var step = parseInt($qty.attr('step'));
        var currentVal = parseInt($qty.val());
        if (!step) {
            step = 1;
        }
        $qty.val(currentVal + step);
        $qty.trigger('change');
    });

    $doc.on('click', '.minus', function(e) {
        var $qty = $(this).closest('div').find('.qty');
        var minVal = parseInt($qty.attr('min'));
        var step = parseInt($qty.attr('step'));
        var currentVal = parseInt($qty.val());
        if (!step) {
            step = 1;
        }

        if (currentVal > 0 && currentVal !== minVal) {
            $qty.val(currentVal - step);
        }
        $qty.trigger('change');
    });


    //support accordion 
    $supportAccordion.accordion({
        heightStyle: "content"
    });

    //light box
    $group1.colorbox({
        rel: 'group1'
    });

    //count down
    if ($flashCount.length) {
        var endDate = new Date($flashCount.data("end-date"));
        var options = {
            date: endDate,
            render: function(data) {
                $(this.el).html(
                    '<div>' + this.leadingZeros(data.days, 2) + ' </div>' +
                    '<div>' + this.leadingZeros(data.hours, 2) + ' </div>' +
                    '<div>' + this.leadingZeros(data.min, 2) + ' </div>' +
                    '<div>' + this.leadingZeros(data.sec, 2) + ' </div>'
                );
            }
        }
        Countdown($flashCount[0], options);
    }



    //Back to top
    $win.on('scroll', function() {
        // shrink the navbar
        if ($(this).scrollTop() > 10) { //Adjust 150
            $header.addClass('shrinked');
            $cdNavicon.addClass('icon-blk');
        } else {
            $header.removeClass('shrinked');
            $cdNavicon.removeClass('icon-blk');
        }

        // toggles the display of scroll to top button
        if ($(this).scrollTop() > 400) {
            $scrollUp.fadeIn();
        } else {
            $scrollUp.fadeOut();
        }

    });

    // scroll to top
    $scrollUp.on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });

    // expandable search form
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;

    submitIcon.on('click', function() {
        var input_val = inputBox.val();
        var input_val_length = input_val.length;
        if (isOpen == false) {
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            if (input_val_length > 0) {
                $(this).closest('form').submit();
            } else {
                searchBox.removeClass('searchbox-open');
                inputBox.focusout();
                isOpen = false;
            }
        }
    });

    submitIcon.on('mouseup', function() {
        return false;
    });

    searchBox.on('mouseup', function() {
        return false;
    });

    $win.on('mouseup', function() {
        if (isOpen == true) {
            submitIcon.css('display', 'block');
            submitIcon.click();
        }
    });

    //product description accordion 
    $accordion.accordion({
        heightStyle: "content"
    });

    // Initialize masonry after everything is loaded 
    $win.on('load', function(e) {
        // masonry

        $grid.masonry({
            itemSelector: '.grid-item'
        });

        //culture masonary 
        $gridWrap.masonry({
            itemSelector: '.item'
        });
    });

    $dlMenu.dlmenu({
        animationClasses: { in: 'dl-animate-in-2', out: 'dl-animate-out-2' }
    });


    // Header top bar toggle
    var $toggleTopBar = $('.toggle-top-bar');
    $toggleTopBar.on('click', function(e) {
        var $parent = $(this).parents('.top-bar');
        if ($parent.find('.top-bar-wrap').hasClass('bar-visible')) {
            $parent.find('.top-bar-wrap').slideUp().removeClass('bar-visible');
            $(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        } else {
            $parent.find('.top-bar-wrap').slideDown().addClass('bar-visible');
            $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });


    //open/close lateral navigation
    var isLateralNavAnimating = false;

    $navTigger.on('click', function(event) {
        event.preventDefault();
        //stop if nav animation is running 
        if (!isLateralNavAnimating) {
            if ($(this).parents('.csstransitions').length > 0) isLateralNavAnimating = true;

            $body.toggleClass('navigation-is-open');
            $cdNavWrap.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                //animation is over
                isLateralNavAnimating = false;
            });
        }
    });

    // newletter
    $newsletter.modal('show');

    /**
     * Visual Composer Elements
     *
     * Tabs & tours
     */


    $('.vc_tta-container .vc_tta-tabs .vc_tta-tabs-list a').addClass('no_djax').on('click', function(e) {
        e.preventDefault();

        var $current_tab = $(this),
            $container = $current_tab.closest('.vc_tta-container'),
            $currentPanelID = $($current_tab.attr('href')),
            $previous_tab_id = $($current_tab.closest('.vc_tta-tabs-list').find('.vc_active a').attr('href'));

        if ($current_tab.closest('li').hasClass('vc_active'))
            return;

        //activate new tab
        $container.find('.vc_tta-tabs-list li.vc_active').removeClass('vc_active');
        $current_tab.closest('li').addClass('vc_active');
        $previous_tab_id.removeClass('vc_active');

        setTimeout(function() {
            $previous_tab_id.removeClass('show');
            $currentPanelID.addClass('show');
        }, 300);
        setTimeout(function() {
            $currentPanelID.addClass('vc_active');

        }, 350);

    });

    // Accordion
    $('.vc_tta-accordion .vc_tta-panel-heading a').on('click', function(e) {
        e.preventDefault();

        var $current_tab = $(this),
            $container = $current_tab.closest('.vc_tta-accordion'),
            $active_tab_id = $($current_tab.attr('href')),
            $previous_tab_id = $($current_tab.closest('.vc_tta-panels').find('.vc_active a').attr('href'));

        //activate new tab
        if ($container.hasClass('vc_tta-o-all-clickable')) {
            $active_tab_id.toggleClass('vc_active');
            $active_tab_id.find('.vc_tta-panel-body').slideToggle();
        } else {
            if ($active_tab_id.hasClass('vc_active'))
                return;

            $container.find('.vc_tta-panel.vc_active').removeClass('vc_active');
            $active_tab_id.addClass('vc_active');

            $previous_tab_id.find('.vc_tta-panel-body').slideUp();
            $active_tab_id.find('.vc_tta-panel-body').slideDown();
        }
    });

    var $faqContainers = $('.toggle_wrap');

    // if (!$faqContainers.length) {
    //     return;
    // }

    $faqContainers.each(function() {
        var $container = $(this),
            $titles = $container.find('.wpb_toggle'),
            $contents = $container.find('.toggle_content_wrap');

        if ($container.hasClass('wpb_toggle_open')) {
            $contents.slideDown();

        } else {
            $contents.slideUp();

        }

        $titles.click(function(e) {
            var $this = $(this);

            $this.toggleClass('wpb_toggle_title_active');
            var $parent = $this.parent()

            $parent.toggleClass('wpb_toggle_open');

            if ($parent.hasClass('wpb_toggle_open')) {
                $parent.find('.toggle_content_wrap').slideDown();

            } else {
                $parent.find('.toggle_content_wrap').slideUp();

            }
        });
    });

    // Login & Registration form validations
    $('.woocommerce-form-login').validate({
        rules: {
            username: "required",
            password: "required"
        },
        messages: {
            username: rabStrings.username,
            password: rabStrings.password
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('.register').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: rabStrings.email,
                email: rabStrings.valid_email
            },
            password: rabStrings.password
        },
        submitHandler: function(form) {
            form.submit();
        }
    });


    /**
     * AJAX Handler
     */
    $loadmore.on('click', function(e) {
        e.preventDefault();
        var mySelf = $(this);
        var page = $(this).attr('data-page');
        var layout = $(this).attr('data-layout');
        var nonce = $(this).attr('data-nonce');
        var el = $(this).attr('data-container');
        mySelf.hide();

        var data = {
            'action': 'load_more_posts',
            'paged': page,
            'layout': layout,
            '_wpnonce': nonce
        };

        $.post(rab.ajaxurl, data, function(response) {
            if (response.content) {
                $(el).append(response.content);
            }

            if (response.page) {
                mySelf.attr('data-page', response.page);
                mySelf.show();
            } else {
                mySelf.remove();
            }
        });
    });

    // parallax effect
    if ($parallaxSection.length > 0) {
        $parallaxSection.each(function() {
            var $bgobj = $(this); // assigning the object

            $win.scroll(function() {
                var yPos = -($win.scrollTop() / $bgobj.data('speed'));
                var coords = '50% ' + yPos + 'px';
                // Move the background
                $bgobj.find('.parallax-img').css({ backgroundPosition: coords });
            });
        });
    }

    var $countWrap = $('.cont-wrap');
    var el = document.querySelector('.cont-wrap');
    //count down
    if ($countWrap.length) {
        var endDate = new Date($countWrap.data("date"));
        var rabCountdown = new Countdown(el, {
            date: endDate,
            render: function(data) {
                $(this.el).html(
                    '<div><span class="no rounded-crcl">' + this.leadingZeros(data.days, 2) + '</span> DAYS</div>' +
                    '<div><span class="no rounded-crcl">' + this.leadingZeros(data.hours, 2) + '</span> HOURS</div>' +
                    '<div><span class="no rounded-crcl">' + this.leadingZeros(data.min, 2) + '</span> MINUTES</div>' +
                    '<div><span class="no rounded-crcl">' + this.leadingZeros(data.sec, 2) + '</span> SEC</div>'
                );
            }
        });
    }

    // responsive menu
    if ($(window).width() < 768) {
        $('li.menu-item-has-children>a').on('click', function(event) {
            event.preventDefault();
            $(this).next().slideToggle();
        });
    }

})(jQuery);