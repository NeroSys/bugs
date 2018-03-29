/**
 * Created by Admin on 12.10.2016.
 */
$(document).ready(function(){

    var $main_slider = new Swiper('.main-slider', {
        slidesPerView: 1,
        speed: 2000,
        autoplay: 3000,
        effect: 'fade',
        spaceBetween: 30,
        pagination: ".swiper-pagination",
        paginationClickable: "true"
    });
});
