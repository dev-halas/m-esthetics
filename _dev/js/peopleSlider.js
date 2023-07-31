const peopleSlider = document.querySelector('#people');
const initPeopleSlide = () => {
    //check if slide dont exist return
    if(!peopleSlider) return;
    
    const slides = document.querySelectorAll('.people-image');
    const prevBtn = document.querySelector('.people-slider--left');
    const nextBtn = document.querySelector('.people-slider--right');
    const left = 'left';
    const right = 'right';

    // default active slide
    const baseIndex = 1;

    let curSlide = baseIndex;
    let lastCurrentSlide;
    let maxSlide = slides.length - 1;
    let clickDirection;
    let screenWidth;

    const removeActiveClass = () => {
        slides.forEach(slide => {
            slide.classList.remove('active');
        });
    }

    const addActiveClass = () => {
        slides[curSlide].classList.add('active');
    }

    const resetSlidersPosition = () => {
        slides.forEach(slide => {
            slide.style.transform = 'translateX(0%)';
        });
    }

    const resetSliderOnChangeDirection = () => {
        resetSlidersPosition();
        if (curSlide < baseIndex) {
            slides[curSlide].style.transform = `translateX(${(baseIndex - curSlide) * 100}%)`
            slides[baseIndex].style.transform = `translateX(-${baseIndex * 100}%)`
        } else if (curSlide > baseIndex) {
            slides[curSlide].style.transform = `translateX(-${(curSlide - baseIndex) * 100}%)`
            slides[baseIndex].style.transform = `translateX(${(curSlide - baseIndex) * 100}%)`
        }
    }

    const translateSlidersOnClickNext = () => {
        if (curSlide < baseIndex) {
            slides[curSlide].style.transform = `translateX(${(baseIndex - curSlide) * 100}%)`
            slides[lastCurrentSlide].style.transform = `translateX(${(curSlide - lastCurrentSlide) * 100}%)`
        } else if (curSlide > baseIndex) {
            slides[curSlide].style.transform = `translateX(-${(curSlide - baseIndex) * 100}%)`
            slides[lastCurrentSlide].style.transform = `translateX(${(curSlide - lastCurrentSlide) * 100}%)`
        } else {
            resetSlidersPosition();
        }
    }

    const translateSlidersOnClickPrevious = () => {
        if (curSlide < baseIndex) {
            slides[curSlide].style.transform = `translateX(${(baseIndex - curSlide) * 100}%)`
            slides[lastCurrentSlide].style.transform = 'translateX(-100%)'
        } else if (curSlide > baseIndex) {
            slides[curSlide].style.transform = `translateX(-${(curSlide - baseIndex) * 100}%)`
            slides[lastCurrentSlide].style.transform = `translateX(${(curSlide - lastCurrentSlide) * 100}%)`
        } else {
            resetSlidersPosition();
        }
    }

    const translateSliders = (direction, callback) => {
        if (screenWidth <= 768) {
            addActiveClass();
            return;
        }
        if (clickDirection !== direction) {
            resetSliderOnChangeDirection();        
        } else {
            callback();
        }

        addActiveClass();
        clickDirection = direction;
    }

    const debounce = callback => {
        let timer;
        return function(event){
        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(callback, 100, event);
        };
    }

    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            lastCurrentSlide = curSlide;
            removeActiveClass();
        
            if (curSlide === maxSlide) {
                curSlide = 0;
            } else {
                curSlide++;
            }
        
            translateSliders(right, translateSlidersOnClickNext);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            lastCurrentSlide = curSlide;
            removeActiveClass();
        
            if (curSlide === 0) {
                curSlide = maxSlide;
            } else {
                curSlide--;
            }
        
            translateSliders(left, translateSlidersOnClickPrevious);
        });
    }

    window.addEventListener('load', () => {
        if (!slides) {
            return;
        }
        screenWidth = window.innerWidth;
        addActiveClass();
    });

    window.addEventListener('resize', debounce(function(e) {
        if (!slides) {
            return;
        }
        screenWidth = e.target.innerWidth;
        if (screenWidth <= 768) {
            resetSlidersPosition();
        } else {
            resetSliderOnChangeDirection(); 
        }
    }));
}

initPeopleSlide()