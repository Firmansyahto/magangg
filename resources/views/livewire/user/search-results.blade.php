<div>
  {{-- <section class="relative flex flex-col justify-center items-center w-full h-[461px] bg-[url({{ asset('img/user/home/hero_bg.png') }})] bg-no-repeat bg-cover bg-center text-white text-center">
      <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-20"></div>
      <h1 class="text-white uppercase text-[24px] sm:text-[40px] z-10 font-normal font-['Righteous']">Stock ATK</h1>
      <p class="text-[18px] sm:text-[30px] z-10 font-['Righteous']">Cari Barang di Gudang Dengan Cepat</p>
  </section> --}}

  <div class="flex flex-col gap-6 mt-[7em] mb-10 mx-5 md:mx-10 rounded-md" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
    <div class="w-full border-grey-200 border-b-2">
      <p class="p-4 text-[#A8A8A8] text-[20px] font-semibold">Kata Kunci <span class="text-[#0058A8] text-[20px] text-semibold">"{{ $keyword }}"</span></p>
    </div>
    <div class="gap-6 px-4 pb-8 flex flex-wrap justify-center">
      @if($barangs->isEmpty())
      <div class="flex flex-col items-center text-center"> 
        <img src="{{ asset('img/not-found.PNG') }}" class="w-[auto] h-[200px] md:h-[350px]">
        <div class="font-bold text-[18px] md:text-[28px]"> Hasil Tidak Ditemukan </div>
        <div class="font-semibold text-[#48484896] text-[15px] md:text-[20px]"> Barang Dengan Kata Kunci "{{ $keyword }}" Tidak Ditemukan </div>

        <a href="{{{ route('home') }}}" class="mx-auto text-white bg-[#5B7696] flex gap-2 justify-center items-center py-2 px-4 rounded-full mt-[2em]">
          Beranda
        </a>
      </div>
      @else
        @foreach ($barangs as $new)
        <div href="{{ route('product-detail', ['slug' => $new->slug]) }}" class="itemContainer swiper-slide flex flex-col justify-center items-center">
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

              <div class="w-full h-full">
                @if ($new->thumbnail)
                <img src="{{ asset('storage') }}/{{ $new->path }}/{{ $new->thumbnail }}" class="w-full h-full object-cover">
                @else
                <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
                @endif
              </div>
            </div>

            <p class="mx-3 mt-3 text-[#0058A8] text-[16px]">
              {{ Illuminate\Support\Str::limit($new->nama_barang, 20, ' ...') }}
            </p>
            <p class="line-through text-[#BA0B2F] mx-3 my-1 pb-3 text-[13px]">RP.{{ number_format($new->harga , 0, ',', '.') }}</p>
            <a href="{{ route('product-detail', ['slug' => $new->slug]) }}" style="background: #0E3665ae;" class="px-3 py-1 text-white">
              <div class="flex justify-center items-center">
                <div> Lihat Detail </div>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                  </svg>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      @endif


    </div>
  </div>
</div>
