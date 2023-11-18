
$('.post-carousel').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      infinite:false,
      autoplaySpeed: 2000,
      nextArrow: $('.carousel-slider .next-arrow'),
      prevArrow: $('.carousel-slider .prev-arrow'),
      responsive: [
          {
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
            }
          },
          {
            breakpoint: 550,
            settings: {
               slidesToShow: 1,
            }
          }
      ]
});
                