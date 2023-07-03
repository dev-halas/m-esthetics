const header = document.querySelector('.header');
const hamburger = document.querySelector('.hamburger');
const headerLinks = document.querySelectorAll('.headerNav--links a');
const pageHeight = window.innerHeight * 0.01;

hamburger.addEventListener('click', () => {
    header.classList.toggle('--active');
});

headerLinks.forEach(link => {
    link.addEventListener('click', () => {
        header.classList.remove('--active')
    })
})

window.onscroll = () => {
    let top = window.scrollY;
    top >= pageHeight ? header.classList.add('scrolled') : header.classList.remove('scrolled');
};