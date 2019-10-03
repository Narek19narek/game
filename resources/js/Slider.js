import Swiper from 'swiper'

export default class Slider {
    constructor() {
    }

    initBoostsAmountSlider(selector) {
        this.boosts_amount_slider = new Swiper (`${selector} .swiper-container`, {
            direction: 'vertical',
            mousewheelControl: false,
            slidesPerView: 1,
            freeMode: false,
            freeModeSticky: false,
            nextButton: '.swiper-button-prev',
            prevButton: '.swiper-button-next',
        })
    }

}
