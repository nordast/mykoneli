import $ from './jquery.js';
import 'bootstrap'
import WOW from 'wow.js'
import HcOffcanvasNav from 'hc-offcanvas-nav'
import 'owl.carousel'
import './jquery.scrollUp.min.js'


// -------------------- APP -----------------------

const App = (() => {
    'use strict'

    // Init modules
    const init = () => {
        if (!$) {
            console.log('JQuery not found')
            return false
        }

        initWowAnimation()
        initMobileNav()
        initStickyHeader()
        initMegaMenu()
        initCarousel()
        initScrollToTop()
        initLoadingOnSubmit()
    }

    const initWowAnimation = () => {
        new WOW().init()
    }
    const initMobileNav = () => {
        new HcOffcanvasNav('#main-nav', {
            disableAt: false,
            customToggle: $('.toggle'),
            levelSpacing: 10,
            navTitle: 'Menu',
            levelTitles: true,
            labelClose: false,
            levelTitleAsBack: true,
            levelOpen: 'expand',
            closeOnClick: true,
            insertClose: true,
            closeActiveLevel: true,
            insertBack: true
        })
    }

    const initStickyHeader = () => {
        function updateScroll() {
            if ($(window).scrollTop() >= 80) {
                $(".navfix").addClass('sticky')
            } else {
                $(".navfix").removeClass("sticky")
            }
        }

        $(window).scroll(updateScroll);
        updateScroll();
    }

    const initMegaMenu = () => {
        $('li.sbmenu').hover(
            function () {
                $(this).addClass('hover');
            },
            function () {
                $(this).removeClass('hover');
            }
        );
    }

    const initCarousel = () => {
        $('.service-card-prb').owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1
                },
                520: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1400: {
                    items: 3
                },
                1600: {
                    items: 3
                },
            }
        })
    }

    const initScrollToTop = () => {
        $.scrollUp({
            animation: 'fade',
            scrollImg: {
                active: true,
                type: 'background'
            }
        });
    }

    // Show loading on form submit
    const initLoadingOnSubmit = () => {
        $('form').on('submit', function (e) {
            const btn = $(this).find('button[type="submit"]')
            $(btn).addClass('disabled').attr('disabled', 'disabled').html('<i class="fa fa-solid fa-circle-notch fa-spin"></i> Loading... <span class="circle"></span>')
        });
    }

    return {
        init: init
    }

})()

$(() => {
    App.init()
})
