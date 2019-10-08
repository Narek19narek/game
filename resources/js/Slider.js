import Swiper from 'swiper';
export default class Slider {
    constructor() {}

    initSkinSlider(selector) {
        this.skin_slider = new Swiper(selector, {
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
            slidesPerView: 3,
            freeMode: false,
            freeModeSticky: false,
        });
    }
}
