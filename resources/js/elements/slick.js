
import $ from "jquery";
require('slick-carousel');

export const initSlick = () => {
    window.onload = () => {
        if(document.querySelector('.product-slider')) {
            $(".product-slider").slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: '<button class="next slick-next"></button>',

                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 668,
                    settings: {
                        slidesToShow: 2,
                        dots: true
                    }
                }]
            });
            Array.from(document.querySelectorAll('.product-slider')).forEach(element => {
                element.style.display = 'block';
            })
        }
    }
}
