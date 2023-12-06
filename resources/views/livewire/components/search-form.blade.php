<form class="relative flex flex-1 w-full" wire:submit="searchNow">
  <svg class="absolute top-3 left-5 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="none">
    <path d="M15.0086 13.2075H14.06L13.7238 12.8834C14.9005 11.5146 15.6089 9.73756 15.6089 7.80446C15.6089 3.494 12.1149 0 7.80446 0C3.494 0 0 3.494 0 7.80446C0 12.1149 3.494 15.6089 7.80446 15.6089C9.73756 15.6089 11.5146 14.9005 12.8834 13.7238L13.2075 14.06V15.0086L19.211 21L21 19.211L15.0086 13.2075ZM7.80446 13.2075C4.81475 13.2075 2.40137 10.7942 2.40137 7.80446C2.40137 4.81475 4.81475 2.40137 7.80446 2.40137C10.7942 2.40137 13.2075 4.81475 13.2075 7.80446C13.2075 10.7942 10.7942 13.2075 7.80446 13.2075Z" fill="#D7D7D7"/>
  </svg>

  <input  class="p-2 px-12 border-2 w-full rounded-full border-[#D7D7D7] text-black focus:outline-none focus:border-[#0E3665] transition-all duration-500 ease-in-out" type="search" placeholder="Cari Barang..."
  wire:model="search">
  <input type="submit" id="submitSearch" hidden />

  {{-- <div class="absolute">

  </div> --}}
</form> 
