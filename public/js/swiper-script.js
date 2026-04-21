$(function () {
    $('.swiper.swiperPartner').each(function () {
        new Swiper(this, {
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
                pauseOnMouseEnter: false,
            },
            speed: 1000,
            slidesPerView: 6,
            spaceBetween: 20,
            loop: true,
            hasNavigation: true,
            grabCursor: true,
            breakpoints: {
                1025: {
                    slidesPerView: 6
                },
                767: {
                    slidesPerView: 4
                },
                230: {
                    slidesPerView: 3
                }
            }
        });
    });
});

$(function () {
    var swiperTestimonial = new Swiper('.swiper.swiperTestimonial', {
        autoplay: {
            delay: 1000,
        },
        speed: 1000,
        slidesPerView: 3,
        spaceBetween: 50,
        loop: true,
        hasNavigation: true,
        grabCursor: true,
        breakpoints: {
            1025: {
                slidesPerView: 3,
            },
            769: {
                slidesPerView: 2
            },
            319: {
                slidesPerView: 1,
            },
        },
    });
});
