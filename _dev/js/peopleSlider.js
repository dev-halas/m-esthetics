const slides = document.querySelectorAll('.people-image');
const prevBtn = document.querySelector('.people-slider--left');
const nextBtn = document.querySelector('.people-slider--right');
let curSlide = 1;
let maxSlide = slides.length - 1;

const removeActiveClass = () => {
    slides.forEach((slide, indx) => {
        slide.classList.remove('active');
    });
}

const addActiveClass = () => {
    slides[curSlide].classList.add('active');
}

nextBtn.addEventListener("click", () => {
    removeActiveClass();
    if (curSlide === maxSlide) {
        curSlide = 0;
    } else {
        curSlide++;
    }

    addActiveClass();
});

prevBtn.addEventListener("click", () => {
    removeActiveClass();
    if (curSlide === 0) {
        curSlide = maxSlide;
    } else {
        curSlide--;
    }

    addActiveClass();
});

window.addEventListener('load', () => {
    addActiveClass();
})