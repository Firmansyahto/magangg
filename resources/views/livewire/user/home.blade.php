@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

<style>
  .eachItem
  {
    transition: .5s ease-in-out;
    height: 100%;
  }

  .eachItem:hover
  {
    transform: scale(.95);
    box-shadow: -2px 2px 10px 2px rgba(14, 106, 210, 0.20);
    border: 1px solid rgba(14, 106, 210, 0.55);
  }

  .itemContainer
  {
    padding-bottom: .5em;
  }

  /* .owl-nav
  {
    display: none;
  } */

  .owl-dots
  {
    margin-top: -1em;
  }

</style>
@endsection

<div>
  <section class="relative flex flex-col justify-center items-center w-full h-[321px] bg-[url({{ asset('img/user/home/hero_bg.png') }})] bg-no-repeat bg-cover bg-center text-white text-center">
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-40"></div>
    <h1 class="text-white uppercase text-[24px] sm:text-[40px] z-10 font-normal font-['Righteous'] mt-10">Stock ATK</h1>
    <p class="text-[18px] sm:text-[30px] z-10 font-['Righteous']">Cari Barang di Gudang Dengan Cepat</p>
  </section>

  <section class="py-10 px-5 md:px-10">
    <button onclick="handleNotification('success', 'ok')" class="bg-[#0E3665] text-white px-3 py-1 rounded-[10px] mb-5">Inject Notification</button>
    <button onclick="handleNotification('error', 'gagal')" class="bg-[#0E3665] text-white px-3 py-1 rounded-[10px] mb-5">Inject Notification</button>

    <button
      onclick="handleModal('Hapus Data Unit Kerja?', 'Dengan menghapus data unit kerja, data berikut juga akan terhapus:', ['Data Barang', 'Data User', 'Data Peminjaman', 'Data Pengembalian'])"
      class="bg-[#0E3665] text-white px-3 py-1 rounded-[10px] mb-5">
      Open Modal
    </button>


    <div class="relative w-full h-full overflow-hidden ">
      @if ($new_barang->count() > 0)
      <p class="text-[#0E3665] text-[24px] font-semibold mb-3 text-center md:text-left md:ml-10">Terbaru</p>
      {{-- Cards --}}
      <div wire:ignore id="daftar-rumah-slider" class="owl-carousel owl-theme  pt-2 pb-10 mb-10 group !z-0">
        @foreach ($new_barang as $new)
        <div href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="itemContainer h-[375px] swiper-slide flex flex-col justify-center items-center ">
          <div class="eachItem relative flex flex-col h-full w-[235px] shadow-[1px_3px_4px_1px_rgba(0,0,0,0.3)] rounded-[10px] overflow-hidden">
            <p class="absolute top-0 right-0 px-3 py-1 text-sm text-[#0058A8] bg-[#0E3665] text-white rounded-bl-[10px] rounded-tr-[10px] z-10">
              stok: {{ $new->stok }}
            </p>
            <div class="relative w-[235px] h-[235px]">
              @if ($new->stok < 1)
                <div class="absolute flex justify-center items-center top-0 left-0 w-full h-full bg-black bg-opacity-20 rounded-t-[10px]">
                    <p class="text-white text-[20px] py-2 px-6 bg-[#0e3665b3] rounded-full">Habis</p>
                </div>
              @endif

              <div class="w-[235px] h-[235px]">
                @if ($new->thumbnail)
                <img src="{{ asset('storage') }}/{{ $new->path }}/{{ $new->thumbnail }}" class="w-full h-full object-cover">
                @else
                <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
                @endif
              </div>
            </div>
            <div class="flex flex-col justify-between h-full">
              <div class="py-3 px-3">
                <p class="text-[#0058A8] text-[16px] line-clamp-2 overflow-ellipsis overflow-hidden">
                  {{ Illuminate\Support\Str::limit($new->nama_barang, ) }}
                </p>
                <p class="line-through text-[#BA0B2F] text-[15px]">RP.{{ number_format($new->harga , 0, ',', '.') }}</p>
              </div>
              <div class="bg-[#0E3665ae]">
                <a href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="text-white ">
                  <div class="flex justify-center items-center py-1">
                    <div class="text-center"> Lihat Detail </div>
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                      </svg>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- End --}}

      <a href="{{ route('all-product', ['slug' => 'terbaru']) }}" class="absolute botom-0 right-1/2 transform translate-x-1/2 mx-auto w-fit text-white bg-[#0E3665] flex gap-2 justify-center items-center p-2 rounded-[10px] !z-10 mt-[-60px] transition-transform duration-500 ease-in-out hover:scale hover:scale-[0.9]">
        <p class="text-[16px] font-medium">Lihat Semua</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="19" viewBox="0 0 11 19" fill="none">
          <path d="M1.5 1.5L9.5 9.5L1.5 17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      @else
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('img/empty-cart.PNG') }}" class="w-[400px] h-[400px]">
        <div class="font-bold text-[24px] md:text-[28px]"> Daftar Barang Kosong </div>
        <div class="font-semibold text-[#48484896] text-[16px] md:text-[20px]"> Admin Akan Segera Menambahkan Barang,  <br> Mohon Ditunggu Atau Anda Dapat Menghubungi Admin </div>
      </div>
      @endif
    </div>


    <div class="relative swiper-container w-full h-full overflow-hidden mt-10">
      @if($popular_barang->count() > 0)
      <p class="text-[#0E3665] text-[24px] font-semibold mb-3 text-center md:text-left md:ml-10">Populer</p>

      {{-- Cards --}}
      <div wire:ignore id="popular-slider" class="owl-carousel owl-theme pt-2 pb-10 mb-10 group z-0">
        @foreach ($popular_barang as $new)
        <div href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="itemContainer h-[400px] swiper-slide flex flex-col justify-center items-center">
          <div class="eachItem relative flex flex-col h-full w-[235px] shadow-[1px_3px_4px_1px_rgba(0,0,0,0.3)] rounded-[10px] overflow-hidden">
            <p class="absolute top-0 right-0 px-3 py-1 text-sm text-[#0058A8] bg-[#0E3665] text-white rounded-bl-[10px] rounded-tr-[10px] z-10">
              stok: {{ $new->stok }}
            </p>
            <div class="relative w-[235px] h-[235px]">
              @if ($new->stok < 1)
                <div class="absolute flex justify-center items-center top-0 left-0 w-full h-full bg-black bg-opacity-20 rounded-t-[10px]">
                  <p class="text-white text-[20px] py-2 px-6 bg-[#0e3665b3] rounded-full">Habis</p>
                </div>
              @endif

              <div class="w-[235px] h-[235px]">
                @if ($new->thumbnail)
                <img src="{{ asset('storage') }}/{{ $new->path }}/{{ $new->thumbnail }}" class="w-full h-full object-cover">
                @else
                <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
                @endif
              </div>
            </div>
            <div class="flex flex-col justify-between">
              <div class="py-3 px-3"
                <p class="text-[#0058A8] text-[16px] line-clamp-2 overflow-ellipsis overflow-hidden">
                  {{ Illuminate\Support\Str::limit($new->nama_barang, ) }}
                </p>
                <p class="line-through text-[#BA0B2F] text-[15px]">RP.{{ number_format($new->harga , 0, ',', '.') }}</p>
              </div>
              <div class="bg-[#0E3665ae]">
                <a href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="text-white ">
                  <div class="flex justify-center items-center h-10">
                    <div class="text-center"> Lihat Detail </div>
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                      </svg>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- End --}}

      <a href="{{ route('all-product', ['slug' => 'populer']) }}" class="absolute botom-0 right-1/2 transform translate-x-1/2  mx-auto w-fit text-white bg-[#0E3665] flex gap-2 justify-center items-center p-2 rounded-[10px] mt-[-60px] z-20 transition-transform duration-500 ease-in-out hover:scale hover:scale-[0.9]">
        <p class="text-[16px] font-medium">Lihat Semua</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="19" viewBox="0 0 11 19" fill="none">
          <path d="M1.5 1.5L9.5 9.5L1.5 17.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      @endif
    </div>


  </section>
</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
  document.addEventListener('livewire:load', function () {
      window.livewire.hook('afterDomUpdate', () => {

      });
  });

  $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[1000])
  })
  $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
  })


  jQuery(document).ready(function($){
    $('#daftar-rumah-slider').owlCarousel({
      loop: false,
      margin: 35,
      stagePadding: 20,
      center: false,
      nav: true,
      dots: true,
      touchDrag  : true,
      mouseDrag  : true,
      responsive: {
        0: {
          items: 1.5,
          stagePadding: 35,
          margin: 35,
          center: true,
        },
        600: {
          items: 2,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1000: {
          items: 3,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1200: {
          items: 4,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1400: {
          items: 5,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1600: {
          items: 6,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
      },
      navText:
      [
        "<div class='absolute group-hover:opacity-100 opacity-0 text-[40px] left-0 top-1/4 hover:text-[#0E3665] ml-2 py-2 px-6 bg-white rounded-full shadow-lg z-10 transition-all duration-1000 ease-in-out'><</div>",
        "<div class='absolute group-hover:opacity-100 opacity-0 text-[40px] right-0 top-1/4 hover:text-[#0E3665] mr-2 py-2 px-6 bg-white rounded-full shadow-lg z-10 transition-all duration-1000 ease-in-out'>></div>"
      ],
    })

    $('.owl-nav')
  })

  jQuery(document).ready(function($){
    $('#popular-slider').owlCarousel({
      loop: false,
      margin: 35,
      stagePadding: 20,
      center: false,
      nav: true,
      dots: true,
      touchDrag  : true,
      mouseDrag  : true,
      responsive: {
        0: {
          items: 1.5,
          stagePadding: 35,
          margin: 35,
          center: true,
        },
        600: {
          items: 2,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1000: {
          items: 3,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1200: {
          items: 4,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1400: {
          items: 5,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
        1600: {
          items: 6,
          stagePadding: 0,
          margin: 0,
          center: false,
        },
      },
      navText:
      [
        "<div class='absolute group-hover:opacity-100 opacity-0 text-[40px] left-0 top-1/4 hover:text-[#0E3665] ml-2 py-2 px-6 bg-white rounded-full shadow-lg z-10 transition-all duration-1000 ease-in-out'><</div>",
        "<div class='absolute group-hover:opacity-100 opacity-0 text-[40px] right-0 top-1/4 hover:text-[#0E3665] mr-2 py-2 px-6 bg-white rounded-full shadow-lg z-10 transition-all duration-1000 ease-in-out'>></div>"
      ],
    })
  })
</script>
@endsection
