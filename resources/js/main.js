import Slider from "./Slider";
window.Slider = Slider;

$(document).ready(function () {
    $('#shareBtn').parent().on('click', () => {
        $('#share-buttons').toggleClass('active');
    });
});



