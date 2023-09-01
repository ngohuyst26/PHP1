// code slider slick
$(document).ready(function () {
    $(".slider-new").slick({
      infinite: true,
      slidesToShow: 3,
      prevArrow: `<button type='button' class='slick-prev pull-left'><i class="fa-solid fa-backward"></i></button>`,
      nextArrow: `<button type='button' class='slick-next pull-right'><i class="fa-solid fa-forward"></i></button>`,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  });
  
  // code slider 2
  $(document).ready(function () {
    $(".slider-location").slick({
      infinite: true,
      slidesToShow: 3,
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  });
  
  $(document).ready(function () {
    $(".slider-product").slick({
      infinite: true,
      slidesToShow: 3,
      prevArrow: `<button type='button' class='slick-prev pull-left'><i class="fa-solid fa-backward"></i></button>`,
      nextArrow: `<button type='button' class='slick-next pull-right'><i class="fa-solid fa-forward"></i></button>`,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  });