// start handler banner slide

const bannerWrapper = document.querySelector('.banner-wrapper');
const bannerItems = document.querySelectorAll('.banner-item');
const bannerSlide = document.querySelector('.banner-slide');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

if (bannerWrapper) {
    let slideWidth = bannerItems[0].offsetWidth;

    window.addEventListener('resize', () => {
        slideWidth = bannerItems[0].offsetWidth;
    });
    let currentIndex = 0;

    const handlerNextSlide = () => {
        if (currentIndex < bannerItems.length - 1) {
            currentIndex++;
            bannerSlide.scrollLeft += slideWidth;
        } else {
            currentIndex = 0;
            bannerSlide.scrollLeft = 0;
        }
    };
    const handlerPrevSlide = () => {
        if (currentIndex > 0) {
            currentIndex--;
            bannerSlide.scrollLeft -= slideWidth;
        } else {
            currentIndex = bannerItems.length - 1;
            bannerSlide.scrollLeft = bannerItems.length * slideWidth;
        }
    };

    let timmer = setInterval(() => {
        handlerNextSlide();
    }, 4000);

    bannerWrapper.addEventListener('mouseover', () => {
        clearInterval(timmer);
    });
    bannerWrapper.addEventListener('mouseout', () => {
        timmer = setInterval(() => {
            handlerNextSlide();
        }, 4000);
    });
    nextBtn.addEventListener('click', handlerNextSlide);
    prevBtn.addEventListener('click', handlerPrevSlide);
}

// end handler banner slide

// start handler swipper
const swiperCategory = document.querySelector('.swipper-category');
const swiperProduct = document.querySelector('.swipper-product');

const swiperParams = {
    slidesPerView: 1,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        640: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
};

if (swiperCategory) {
    Object.assign(swiperCategory, swiperParams);
}
if (swiperProduct) {
    Object.assign(swiperProduct, swiperParams);
}

// end handler swipper

/// handle change product variant client side
