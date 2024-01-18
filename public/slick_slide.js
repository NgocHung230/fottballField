
$(document).ready(function(){
    $('.image-slider').slick({
        slidesToShow:4,
        Infinity:true,
        autoplay:true,
        autoplayspeed:2000,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
  });
