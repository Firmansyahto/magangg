// $(document).ready(function() {
//   $('#autoWidth').lightSlider({
//       autoWidth:true,
//       loop:false,
//       onSliderLoad: function() {
//           $('#autoWidth').removeClass('cs-hidden');
//       } 
//   });  
// });

// $('.cs-hidden').each(function(i, e){
//   var id = 'autoWidth';
//   $(e).attr('id', id+i);
//   var selector = '#'+id+i;
//    $(selector).lightSlider({
//     autoWidth:true,
//     loop:true
//    });
// });

function initSlider(sliderId) {
  $('#' + sliderId).lightSlider({
    autoWidth:true,
    loop: true,
    slideMove: 1
  }).refresh();
}

initSlider('slider-1');
initSlider('slider-2');
initSlider('slider-3');
initSlider('slider-4');

