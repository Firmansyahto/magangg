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

@if($slug == 'terbaru')
    <!-- Show terbaru products -->
@elseif($slug == 'populer')
    <!-- Show populer products -->
@endif
<div class="flex flex-col gap-6 mt-32 m-10 rounded-md max-w-[1600px]" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
  <div class="w-full border-grey-200 border-b-2">
    @if ($slug == 'populer')
      <p class="p-4 text-[#0E3665] font-[24px] font-semibold">populer</p>
    @elseif ($slug == 'terbaru')
      <p class="p-4 text-[#0E3665] font-[24px] font-semibold">terbaru</p>
    @else
      <p class="p-4 text-[#0E3665] font-[24px] font-semibold">semua barang</p>
    @endif
  </div>
  <div class="flex flex-wrap gap-4 px-4">
    <div class="flex items-center gap-1">
      <p class="font-[18px] font-semibold">Urutkan:</p>
      <select name="" id="" class="border-2 border-gray-400 rounded-md px-2 py-1">
        <option value="">Terbaru</option>
        <option value="">Terlama</option>
        <option value="">Termurah</option>
        <option value="">Termahal</option>
      </select>
    </div>
    <div class="flex items-center gap-1">
      <p class="font-[18px] font-semibold">Filter:</p>
      <select name="" id="" class="border-2 border-gray-400 rounded-md px-2 py-1">
        <option value="">Semua</option>
        <option value="">Terbaru</option>
        <option value="">Terlama</option>
        <option value="">Termurah</option>
        <option value="">Termahal</option>
      </select>
    </div>
  </div>
  <div class="gap-6 px-4 pb-8 grid grid-cols-[repeat(auto-fill,minmax(235px,1fr))] ">
    @if($slug == 'terbaru')
      <!-- Show terbaru products -->
      @foreach ($new_barang as $new)
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
          <div class="flex flex-col justify-between h-full">
            <div class="py-3 px-3">
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
    @elseif($slug == 'populer')
      <!-- Show populer products -->
      @foreach ($popular_barang as $new)
      <div href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="itemContainer h-[400px] swiper-slide flex flex-col justify-center items-center ">
        <div class="eachItem relative flex flex-col h-full w-[235px] shadow-[1px_3px_4px_1px_rgba(0,0,0,0.3)] rounded-[10px] overflow-hidden bg-white">
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
    @endif

  </div>
</div>
