import Swiper from 'swiper';
export default class Slider {
    constructor() {}

    initSkinSlider(selector, index = 0) {
        this.skin_slider = new Swiper(selector, {
        // new Swiper(selector, {
            direction: 'horizontal',
            loop: false,
            keyboard:
                {
                    enabled: true,
                    onlyInViewport: false,
                },
            mousewheel:
                {
                    invert: true,
                },
            mousewheelControl: true,
            slidesPerView: 4,
            freeMode: false,
            freeModeSticky: false,
            centeredSlides: true,
            initialSlide: index,
        });
    }

    initBoostAmountSlider(selector, x, changeCoins) {
        this.boost_slider = new Swiper(selector, {
            direction: 'vertical',
            initialSlide: x,
            loop: false,
            spaceBetween: 0,
            // keyboard: {
            //     enabled: true,
            //     onlyInViewport: true,
            // },
            mousewheel: {
                invert: true,
            },
            mousewheelControl: true,
            slidesPerView: 3,
            freeMode: false,
            freeModeSticky: false,
            centeredSlides: true,
            on: {
                'slideChangeTransitionEnd': changeCoins,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev' ,
            },
        });
    }

    initBoostCoinSlider(selector, x) {
        this.coins_slider = new Swiper(selector, {
            init: true,
            direction: 'vertical',
            initialSlide: x,
            loop: false,
            spaceBetween: 20,
            mousewheelControl: false,
            touchRatio: false,
            touchAngle: false,
            allowTouchMove: false,
            slidesPerView: 3,
            freeMode: false,
            freeModeSticky: false,
            centeredSlides: true,
        });
    }
}
