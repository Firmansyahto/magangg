$(document).ready(function(){
  $('.your-class').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 2,
    variableWidth: true
  });
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('.your-class').slick('setPosition');
})


