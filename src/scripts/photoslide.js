const $simpleCarousel = document.querySelector(".main__slider");

new Glider($simpleCarousel, {
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    dots: ".main__slider--simpledot",
    //   arrows: {
    //     prev: ".js-carousel--simple-prev",
    //     next: ".js-carousel--simple-next",
    //   },
    scrollLock: true,
    // scrollLockDelay: 100,
    // rewind: true,
    responsive: [
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        },
        {
            breakpoint: 300,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        }
    ]
});