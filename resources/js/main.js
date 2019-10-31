import Slider from "./Slider";
window.Slider = Slider;

$(document).ready(function () {
    // $('#shareBtn').parent().on('click', function () {
    //     $('#share-buttons').toggleClass('active');
    // });
    showBtn('#shareBtn', '#share-buttons');
    showBtn('#supportBtn', '#support-buttons');

    function showBtn (selector1, selector2) {
        $(selector1).parent().on('click', function () {
            if ($(selector2).hasClass('activeMenu')) {
                $(selector2).toggleClass('activeMenu');
            } else {
                $('.activeMenu').removeClass('activeMenu');
                $(selector2).toggleClass('activeMenu');
            }

        });
    }
});



