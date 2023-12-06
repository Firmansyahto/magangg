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

<div class="bg-[#F1F1F1] flex gap-4 flex-col md:flex-row justify-center px-5 pb-5 pt-24 px-md-10 pb-md-10 min-h-[73vh]">
  @if ($carts->count() > 0)
  <section class=" flex flex-col items-center mx-auto w-full ">
    @foreach ($carts as $cart)
    <div class="flex sm:flex-nowrap items-center min-w-[200px] w-full sm:min-w-[500px] bg-[#fff] rounded-[10px] border-2 border-[#F5F5F5] py-4 mb-5" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
      <div class="inline-flex items-cente sm:mx-0 mx-auto">
        <label
          class="relative flex items-center p-3 rounded-full cursor-pointer"
          for="checkbox-8"
          data-ripple-dark="true"
        >
          <input
            type="checkbox"
            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-800 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-blue-500 hover:before:opacity-10"
            wire:model.live="myOrder" value="{{ $cart->id }}"
          />
          <div class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-3.5 w-3.5"
              viewBox="0 0 20 20"
              fill="currentColor"
              stroke="currentColor"
              stroke-width="1"
            >
              <path
                fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
        </label>
      </div>
      <div class="sm:ml-6 w-[155px] sm:mr-2 mr-2 ml-2 flex justify-center sm:w-[200px] w-full">
        @if ($cart->barang->thumbnail)
        <img src="{{ asset('storage') }}/{{ $cart->barang->path }}/{{ $cart->barang->thumbnail }}" class="w-full h-full object-cover">
        @else
        <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="sm:max-w-[calc(100%-125px)] w-full sm:mx-0 mx-auto ml-2 mr-6 mt-2 w-full">
        <p class="text-[16px] sm:text-[24px] font-bold line-clamp-2">{{ $cart->barang->nama_barang }}</p>
        <p class="line-through text-[#FF1F1F] sm:text-[18px] text-[12px]">RP.{{ number_format($cart->barang->harga , 0, ',', '.') }}</p>
        <div class="flex flex-wrap gap-2 mt-4 justify-end items-center sm:mr-4 mr-0">
          <p class="text-[#0E3665] sm:text-[16px] text-[12px] font-medium">Jumlah yang dipesan</p>
          <div class="flex gap-3 justify-center">
            <button class="w-6 h-9 my-auto" wire:click="deleteCartItem({{ $cart->id }})">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 27" fill="none">
                <path d="M1.42857 23.3333C1.42857 24.9375 2.71429 26.25 4.28571 26.25H15.7143C17.2857 26.25 18.5714 24.9375 18.5714 23.3333V5.83333H1.42857V23.3333ZM20 1.45833H15L13.5714 0H6.42857L5 1.45833H0V4.375H20V1.45833Z" fill="#DF0000"/>
              </svg>
            </button>
            <button class="px-3 text-[18px] text-[#C7C7C7] border-2 border-[#C7C7C7] rounded-[4px] active:bg-[#0E3665] active:text-white" wire:click="decreaseQuantity({{ $cart->id }})">-</button>
            <input class="border-2 border-[#C7C7C7] w-[50px] h-[39px] rounded-[4px] text-center" type="number" wire:model="quantity.{{ $cart->id }}" value="{{ $cart->quantity }}" wire:change="updateQuantity({{ $cart->id }}, $event.target.value)" >
            <button class="px-3 text-[18px] text-[#C7C7C7] border-2 border-[#C7C7C7] rounded-[4px] active:bg-[#C7C7C7] active:text-white bg-[#0E3665]" wire:click="increaseQuantity({{ $cart->id }})">+</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </section>

  {{-- desktop --}}
  <aside class="sm:w-[345px] w-full shrink-0 md:mt-0 mt-8 mx-auto hidden sm:block">
    <div class="border-2 bg-white border-[#C7C7C7] rounded-[10px] p-2">
      <p class="text-[20px] font-semibold">Ringkasan pesanan</p>
      <div class="flex justify-between items-center text-[#A2A2A2] text-[18px] mt-4">
        <p>Total Jenis Barang</p>
        <p>{{ $total_jenis ? $total_jenis : '0' }} Jenis</p>
      </div>
      <div class="flex justify-between items-center text-[#A2A2A2] text-[18px]">
        <p>Total Barang</p>
        <p>{{ $total_barang ? $total_barang : '0' }} Barang</p>
      </div>

      <hr class="border-[#A2A2A2] my-2">

      <div class="flex justify-between text-black text-[20px] font-semibold">
        <p>Total Harga</p>
        <p class="line-through">Rp. {{ $total_harga ? number_format($total_harga , 0, ',', '.') : '0' }}</p>
      </div>

      <button class="bg-[#0E9078] flex justify-center items-center gap-2 px-4 py-2 mb-3 mt-6 w-[calc(100%-3rem)] rounded-[10px] text-white mt-4 w-full" wire:click.prevent="orderNow">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
            <path d="M0.509524 19.3334L20.5 10.0001L0.509524 0.666748L0.5 7.92601L14.7857 10.0001L0.5 12.0742L0.509524 19.3334Z" fill="white"/>
          </svg>
          <p>Ajukan Pesanan</p>
      </button>
    </div>
  </aside>
  {{-- end desktop --}}
  {{-- mobile --}}
  <div id="open-aside-card" class="flex flex-col justify-center w-fit fixed bottom-6 mx-auto inset-x-0 bg-sky-500 rounded-md p-2 sm:hidden block transition-opacity duration-500 hidden opacity-0">
    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-bar-up mx-auto w-10 h-10 fill-white" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
    </svg>

    <p class="font-bold text-white">Buka Pesanan</p>
  </div>
  <aside id="aside-card" class="fixed bg-white bottom-0 left-0 right-0 w-full shrink-0 md:mt-0 mt-8 mx-auto sm:hidden block transform translate-y-0 transition-all duration-500">
    <div id="close-aside-card" class="w-14 h-14 absolute -top-16 mx-auto inset-x-0 bg-sky-500 rounded-md p-2 transition-all opacity-100">
      <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-bar-down fill-white" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
      </svg>
    </div>
    <div class="border-2 border-[#C7C7C7] rounded-[10px] p-2">
      <p class="text-[20px] font-semibold">Ringkasan pesanan</p>
      <div class="flex justify-between items-center text-[#A2A2A2] text-[18px] mt-4">
        <p>Total Jenis Barang</p>
        <p>{{ $total_jenis ? $total_jenis : '0' }} Jenis</p>
      </div>
      <div class="flex justify-between items-center text-[#A2A2A2] text-[18px]">
        <p>Total Barang</p>
        <p>{{ $total_barang ? $total_barang : '0' }} Barang</p>
      </div>

      <hr class="border-[#A2A2A2] my-2">

      <div class="flex justify-between text-black text-[20px] font-semibold"> 
        <p class="">Total Harga</p>

        <p class="line-through">Rp. {{ $total_harga ? number_format($total_harga , 0, ',', '.') : '0' }}</p>
      </div>

      <button class="bg-rose-500 flex justify-center items-ce nter gap-2 px-4 py-2 mb-3 mt-6 w-[calc(100%-3rem)] rounded-[10px] text-white mt-4 w-full" wire:click.prevent="orderNow">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
            <path d="M0.509524 19.3334L20.5 10.0001L0.509524 0.666748L0.5 7.92601L14.7857 10.0001L0.5 12.0742L0.509524 19.3334Z" fill="white"/>
          </svg>
          <p>Ajukan Pesanan</p>
      </button>
    </div>
  </aside>
  {{-- end mobile --}}
  @else
  <div class="flex flex-col items-center text-center">
    <img src="{{ asset('img/empty-cart-2.PNG') }}" class="w-[450px] h-[450px] mt-[-10em] md:mt-[-3em]">
    <div class="font-bold text-[24px] md:text-[28px]"> Keranjang Anda Kosong </div>
    <div class="font-semibold text-[#48484896] text-[16px] md:text-[20px]"> Silahkan Pilih Barang Yang Ingin Anda Pesan </div>

    <a href="{{{ route('home') }}}" class="mx-auto text-white bg-[#5B7696] flex gap-2 justify-center items-center py-2 px-4 rounded-full mt-[2em]">
      Beranda
    </a>
  </div>
  @endif
</div>
