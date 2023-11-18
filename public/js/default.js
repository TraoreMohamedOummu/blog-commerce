
// search input
const searchIcon = $('#search-icon');
const closeIcon= $('#close-icon');
const searchForm = $('.search-form');
// header Scrool

const header = $('header');
const blogSpan = $('.nav-logo b');

document.addEventListener('scroll', function() {
    if(window.scrollY > 370) {
        header.addClass('header-background');
        blogSpan.addClass('black');
        $('nav .nav-div .nav-icon').addClass('black');
    } else {
        header.removeClass('header-background'); 
        blogSpan.removeClass('black');
        $('nav .nav-div .nav-icon').removeClass('black');
    }
})


// nav mobile
const navOverflow = $('.nav-overflow');
const navMenu = $('.nav-menu');
const menuIcon = $('.menu-icon');

const UserItem = $('#user');
const productItem = $('#best-product');

menuIcon.on('click', () => {
   navOverflow.toggleClass('open')
   navMenu.toggleClass('open')
})

navOverflow.on('click', () => {
    navOverflow.removeClass('open')
    navMenu.removeClass('open')
})



searchIcon.on('click', () => {

    searchForm.addClass('show-input');
    closeIcon.removeClass('hide');
    searchIcon.addClass('hide');

    if (searchIcon.hasClass('hide')) {

        closeIcon.on('click', () => {
            closeIcon.addClass('hide');
            searchForm.removeClass('show-input');
            searchIcon.removeClass('hide');
        });

    }
});


getValueScrollReveal('.home .home-text', 'top', '70px');
getValueScrollReveal('.filter-category', 'top', '80px');
getValueScrollReveal('.carousel-header', 'top', '80px');
getValueScrollReveal('#post-six', 'top', '120px');
getValueScrollReveal('.post-carousel', 'top', '120px');
getValueScrollReveal('#contact', 'top', '100px');
getValueScrollReveal('.contact-text', 'top', '110px');
getValueScrollReveal('.form-group', 'top', '110px');
getValueScrollReveal('section .btn-primary', 'top', '110px');
getValueScrollReveal('footer .nav-logo', 'top', '300px');
getValueScrollReveal('footer .col-md-5', 'top', '110px');
getValueScrollReveal('footer .border-top', 'top', '110px');
getValueScrollReveal('footer .border-top .col-md-6 ', 'top', '110px');


// Detail post  Scroll
getValueScrollReveal('#post-detail', 'top', '110px');
getValueScrollReveal('#post-detail img', 'top', '110px');
getValueScrollReveal('#post-detail card-body', 'top', '110px');

function getValueScrollReveal(selector, origin, distance, delay = 2000) {
    // initiation de scroll Reveal
    const sr = ScrollReveal({
        origin: origin,
        distance: distance,
        duration: delay,
        reset: true
    });
    // appel de sroll
    sr.reveal(selector, {}) // aucun delai
    sr.reveal(selector, {delay: 200})
}












