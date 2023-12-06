@section('css')
<style>
@layer base
{
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }
  input[type="number"] {
      -moz-appearance: textfield;
  }
}
</style>
@endsection


<section class="flex sm:flex-row gap-4 flex-col w-full mb-60 mt-32 justify-center">
  <div class="w-[400px] sm:mx-0 mx-auto mb-10">
    <div class="w-fit h-auto mx-auto">
      @if ($barang->thumbnail)
      <img class="w-[400px] h-[400px] object-cover rounded-md" data-image="{{ asset('img/user/home/barang_rautan.png') }}"
      src="{{ asset('storage') }}/{{ $barang->path }}/{{ $barang->thumbnail }}" alt="Hero Image" id="hero-image">
      @else
      <img class="w-[400px] h-[400px] object-cover rounded-md" data-image="{{ asset('img/user/home/barang_rautan.png') }}"
      src="{{ asset('img/non.png') }}" alt="Hero Image" id="hero-image">
      @endif
    </div>
    <div class="flex justify-center gap-4 mt-6">
      <img class="w-20 h-20 rounded-md" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" data-image="{{ asset('img/user/home/barang_rautan.png') }}" src="{{ asset('img/user/home/barang_rautan.png') }}" alt="Thumbnail 1" id="thumbnails-detail">
      <img class="w-20 h-20 rounded-md" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" data-image="{{ asset('img/404.PNG') }}" src="{{ asset('img/404.PNG') }}" alt="Thumbnail 2" id="thumbnails-detail">
    </div>
  </div>
  <div class="sm:m-0 m-4 sm:mx-4 mx-8">
    <p class="text-[32px] text-[#0058A8] font-semibold">{{ $barang->nama_barang }}</p>
    <p class="text-[#0E3665] text-[16px] ">Dipesan: {{ $barang->terjual ? $barang->terjual : '0'  }}</p>
    <p class="text-[24px] text-[#FF1F1F] line-through">RP.{{ number_format($barang->harga , 0, ',', '.') }}</p>
    <p class="text-[18px] max-w-[700px] break-words">
      {{ $barang->deskripsi }}
    </p>
    <p class="text-[18px] font-bold mt-4">Jumlah pesan</p>
    <div class="flex flex-wrap gap-10 mb-3">
      <div class="flex gap-3 justify-center items-center">
        <input class="border-2 border-[#C7C7C7] w-[50px] h-[39px] rounded-[4px] text-center" type="number" wire:model="jumlah_pesan">
        <button wire:click="decrease" class="px-3 text-[18px] text-[#454545] border-2 border-[#C7C7C7] rounded-[4px] active:bg-[#0E3665] active:text-white">-</button>
        <button wire:click="increase" class="px-3 text-[18px] text-[#C7C7C7] border-2 border-[#C7C7C7] rounded-[4px] bg-[#0E3665] active:bg-[#C7C7C7] active:text-white">+</button>

      </div>
      <div class="shadow-[1px_3px_4px_1px_rgba(0,0,0,0.3)] rounded-[20px] pt-1 px-1">
        <div class="flex text-white items-center">
          <span class="pt-2 pb-2 mb-1 px-3 bg-[#0E3665] rounded-[20px]">Stock Tersedia</span>
          <span class="pt-2 pb-2 mb-1 pl-8 pr-4 -ml-7 -z-10 text-[#0E3665] bg-[#C7C7C7] flex justify-center items-center rounded-[20px]">
            {{ $barang->stok }}
          </span>
        </div>
      </div>
      <button class="flex gap-3 justify-center items-center border-2 border-[#0E3665]  rounded-[10px] px-2 py-2 hover:bg-[#0E3665] active:bg-[#0E3665] hover:text-white active:text-white hover:fill-white fill-[#0E3665]" wire:click="toChart">
        <div>
        <svg height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" xml:space="preserve" class="cartSVG">
          <g>
            <path d="M25.856,10.641C21.673,19.5,20.312,19.5,19.5,19.5h-8c-2.802,0-4.949-1.648-5.47-4.2
              c-0.016-0.078-1.6-7.853-2.005-10.025C3.826,4.21,3.32,3.5,1.5,3.5C0.671,3.5,0,2.829,0,2s0.671-1.5,1.5-1.5
              c3.02,0,4.964,1.5,5.474,4.224c0.401,2.149,1.98,9.898,1.996,9.977c0.319,1.566,1.722,1.8,2.53,1.8h7.605
              c0.817-0.878,2.679-4.261,4.038-7.141c0.354-0.749,1.249-1.068,1.997-0.716C25.89,8.997,26.21,9.891,25.856,10.641z M10.5,20.5
              C9.119,20.5,8,21.619,8,23s1.119,2.5,2.5,2.5S13,24.381,13,23S11.881,20.5,10.5,20.5z M19.5,20.5c-1.381,0-2.5,1.119-2.5,2.5
              s1.119,2.5,2.5,2.5S22,24.381,22,23S20.881,20.5,19.5,20.5z M14.663,12.344c0.1,0.081,0.223,0.12,0.346,0.12
              s0.244-0.039,0.346-0.12c0.1-0.079,2.828-2.74,4.316-4.954c0.115-0.172,0.126-0.392,0.028-0.574
              c-0.095-0.181-0.285-0.295-0.49-0.295h-2.226c0,0-0.217-4.291-0.359-4.49c-0.206-0.294-1.057-0.494-1.616-0.494
              c-0.561,0-1.427,0.2-1.634,0.494c-0.141,0.198-0.328,4.49-0.328,4.49h-2.255c-0.206,0-0.395,0.114-0.492,0.295
              c-0.097,0.182-0.086,0.403,0.028,0.574C11.816,9.605,14.564,12.265,14.663,12.344z"/>
          </g>
        </svg>
        </div>
        <p>Masuk Keranjang</p>
      </button>
    </div>
    @error('jumlah_pesan') <small class="text-[14px] text-red-400 mt-5">{{$message}}</small> @enderror
  </div>
</section>
