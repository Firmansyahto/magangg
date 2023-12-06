@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>s

<script src="{{ asset('js/produk-filter.js') }}"></script>

<script src="{{ asset('js/lightslider.js') }}"></script>
<script src="{{ asset('js/lightslider_custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('js/slickslider_custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
  // Change Nav Color On Scroll
  $(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });
  // End

  // W3 Sidebar
  function w3_open()
  {
    document.getElementById("main").style.marginLeft = "18%";
    document.getElementById("mySidebar").style.width = "18%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
    document.getElementById("closeNav").style.display = 'block';
  }

  function w3_close()
  {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
    document.getElementById("openNav").style.display = 'block';
    document.getElementById("closeNav").style.display = 'none';
  }
  // End
</script>

<script>
  window.livewire.on('dataAdded',()=>{
    // $('#addData').modal('hide');
    $('#tambahData').modal('hide');
  });
  window.livewire.on('dataAdded',()=>{
  $('#addKamar').modal('hide');
  });
  window.livewire.on('dataAdded',()=>{
  $('#addVideo').modal('hide');
  });
  window.livewire.on('dataEdited',()=>{
  $('#editData').modal('hide');
  });
  window.livewire.on('dataDeleted',()=>{
  $('#deleteData').modal('hide');
  });
</script>

{{-- Toaster --}}
@if ( session()->has('info-success') or session()->has('info-failed') )
<script>
  window.onload = function()
  {
    document.getElementById("liveToastBtn").click();
  }
</script>
@endif

<script>
  const toastTriggerSuccess = document.getElementById('successToastBtn')
  const toastLiveExampleSuccess = document.getElementById('successToast')

  if (toastTriggerSuccess) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExampleSuccess)
    toastTriggerSuccess.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }

  const toastTriggerFailed = document.getElementById('failedToastBtn')
  const toastLiveExampleFailed = document.getElementById('failedToast')

  if (toastTriggerFailed) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExampleFailed)
    toastTriggerFailed.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script>
{{-- End --}}

@yield('js')

@stack('scripts')
