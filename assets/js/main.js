(function($) {
    "use strict";
    jQuery(document).on('ready', function() {
        $('.owl-carousel').owlCarousel({
            items: 1,
            thumbs: true,
            dots: false,
            touchDrag: false,
            mouseDrag: false,
            smartSpeed: 1000,
            thumbsPrerendered: true,
            autoplay: true,
            loop: true,
            nav: true,
            navText: ["<i class='icofont-rounded-left'></i>", "<i class='icofont-rounded-right'></i>"]
        });
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 120) {
                $('.navbar-light').addClass("is-sticky");
            } else {
                $('.navbar-light').removeClass("is-sticky");
            }
        });
        $(".home-slides").on("translate.owl.carousel", function() {
            $(".home-slides .banner-image").removeClass("animated fadeInDown").css("opacity", "0");
            $(".home-slides h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".home-slides p").removeClass("animated zoomIn").css("opacity", "0");
            $(".home-slides .btn").removeClass("animated fadeInDown").css("opacity", "0");
            $(".home-slides .video-btn").removeClass("animated fadeInDown").css("opacity", "0");
        });
        $(".home-slides").on("translated.owl.carousel", function() {
            $(".home-slides .banner-image").addClass("animated fadeInDown").css("opacity", "1");
            $(".home-slides h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".home-slides p").addClass("animated zoomIn").css("opacity", "1");
            $(".home-slides .btn").addClass("animated fadeInDown").css("opacity", "1");
            $(".home-slides .video-btn").addClass("animated fadeInDown").css("opacity", "1");
        });
        $(".tab-slider-body").hide();
        $(".tab-slider-body:first").show();
        $(".tab-slider-nav li").on('click', function() {
            $(".tab-slider-body").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();
            if ($(this).attr("rel") == "yearly") {
                $('.tab-slider-tabs').addClass('slide');
            } else {
                $('.tab-slider-tabs').removeClass('slide');
            }
            $(".tab-slider-nav li").removeClass("active");
            $(this).addClass("active");
        });
        $(function() {
            $('.accordion').find('.accordion-title').on('click', function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle('fast');
                $('.accordion-content').not($(this).next()).slideUp('fast');
                $('.accordion-title').not($(this)).removeClass('active');
            });
        });
        $(".count").counterUp({
            delay: 20,
            time: 1500
        });
        $(function() {
            $('.shorting').mixItUp();
        });
        $('.popup-btn').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
        $('.video-btn').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $('.feedback-slides').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
        $('.repair-content-slides').owlCarousel({
            loop: false,
            autoplay: true,
            nav: false,
            items: 1,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
        });
        $('.repair-feedback-slides').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 2,
                }
            }
        });
        $('.partner-slider').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                1200: {
                    items: 6,
                }
            }
        });
        $('.repair-partner-slider').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: false,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                1200: {
                    items: 6,
                }
            }
        });
        $('.blog-slider').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
        $('.repair-services-slides').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
        $('.products-image-slides').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplayHoverPause: true,
            autoplay: true,
            items: 1,
            navText: ["<i class='icofont-simple-left'></i>", "<i class='icofont-simple-right'></i>"],
        });
        $("#tabs li").on("click", function() {
            var tab = $(this).attr("id");
            if ($(this).hasClass("inactive")) {
                $(this).removeClass("inactive");
                $(this).addClass("active");
                $(this).siblings().removeClass("active").addClass("inactive");
                $("#" + tab + "_content").addClass("show");
                $("#" + tab + "_content").siblings("div").removeClass("show");
            }
        });
        $('.project-slides').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        });
        $(function() {
            $(window).on('scroll', function() {
                var scrolled = $(window).scrollTop();
                if (scrolled > 300) $('.go-top').fadeIn('slow');
                if (scrolled < 300) $('.go-top').fadeOut('slow');
            });
            $('.go-top').on('click', function() {
                $("html, body").animate({
                    scrollTop: "0"
                }, 500);
            });
        });
        $(".newsletter-form").validator().on("submit", function(event) {
            if (event.isDefaultPrevented()) {
                formErrorSub();
                submitMSGSub(false, "Please enter your email correctly.");
            } else {
                event.preventDefault();
            }
        });

        function callbackFunction(resp) {
            if (resp.result === "success") {
                formSuccessSub();
            } else {
                formErrorSub();
            }
        }

        function formSuccessSub() {
            $(".newsletter-form")[0].reset();
            submitMSGSub(true, "Thank you for subscribing!");
            setTimeout(function() {
                $("#validator-newsletter").addClass('hide');
            }, 4000)
        }

        function formErrorSub() {
            $(".newsletter-form").addClass("animated shake");
            setTimeout(function() {
                $(".newsletter-form").removeClass("animated shake");
            }, 1000)
        }

        function submitMSGSub(valid, msg) {
            if (valid) {
                var msgClasses = "validation-success";
            } else {
                var msgClasses = "validation-danger";
            }
            $("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
        }
        $(".newsletter-form").ajaxChimp({
            url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9",
            callback: callbackFunction
        });
        $('.testimonials-slider').owlCarousel({
            loop: false,
            autoplay: true,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: true,
            margin: 30,
            navText: ["<i class='icofont-double-left'></i>", "<i class='icofont-double-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                1200: {
                    items: 1,
                }
            }
        });
    });
    jQuery(window).on('load', function() {
        $('.preloader-area').fadeOut();
    });
}(jQuery));