(function($) 
{
  //* Isotope Js
  function portfolio_isotope() {
    if ( $('.project-item, .project-menu .tabs-menu').length )
    {
      // Add isotope click function
      $(".project-menu .tabs-menu").on('click',function() {
        $(".project-menu .tabs-menu").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr("data-filter");
        $(".project-item").isotope({
            filter: selector,
            animationOptions: {
                duration: 450,
                easing: "linear",
                queue: false,
            }
        });
        
        return false;
      });

      // Activate isotope in container
      $(".project-item").imagesLoaded( function() {
        $(".project-item").isotope({
            itemSelector: ".isotopeContainer",
            filter: '.propertyTabs',
        });
      });
    }
  };  

  /*Function Calls*/
  portfolio_isotope ();

})(jQuery);

$(document).ready(function() 
{
  var popup_btn = $('.popup-btn');
  popup_btn.magnificPopup({
    type : 'image',
    gallery : 
    {
      enabled : true
    }
  });
});