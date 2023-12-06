<div>
  <input type="checkbox" class="peer absolute z-10 w-10 h-10 opacity-0" id="menu_search" />
  <form class="peer-checked:translate-y-0 -translate-y-[300px] absolute left-0 top-0 w-full h-[100px] z-50 transition-all duration-500 ease-in-out" wire:submit="searchNow">
    <input type="search" class="w-full h-[100px] px-10 pr-32 bg-no-repeat bg-left bg-origin-content placeholder:p-10 bg-[url('{{ asset('img/navigation/search_grey.svg') }}')] p-4 focus:bg-none focus:outline-none focus:placeholder-transparent" placeholder="cari barang.." id="search" wire:model="search">
    <button class="absolute top-0 right-0 w-20 h-full bg-[#0E3665] text-white">
      Cari
    </button>
  </form>

  <input type="submit" id="submitSearch" hidden />

  <div class="w-8 h-8">
    <img src={{ asset('img/navigation/search_black.svg') }} alt="person" class="w-full h-auto">
  </div>

  <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-20 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_search"></div>
</div>
 