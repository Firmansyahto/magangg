<nav class="min-[800px]:flex bg-white hidden border-[#0E3665] justify-between items-center rounded-b-[20px] pr-10 fixed top-0 left-0 right-0 z-20 border-b-4 !border-[#0E3665] transition-all duration-1000 ease-in-out" id="navbar">
  <a class="h-fit rounded-lb-md" href="{{ route('home') }}">
    <img src={{ asset('img/user/navbar/logo-ori-sm.png') }} alt="logo" class="w-[250px] h-auto object-cover rounded-bl-[20px]">
  </a>
  <ul class="flex gap-6 whitespace-nowrap text-[20px] mr-4">
    <li class="hover:border-opacity-100 border-opacity-0 transition-all duration-1000 ease-in-out border-[#0E3665] border-b-2" id="nav_text_beranda"><a href="{{ route('home') }}">Beranda</a></li>
    <li class="hover:border-opacity-100 border-opacity-0 transition-all duration-1000 ease-in-out border-[#0E3665] border-b-2" id="nav_text_status"><a href="{{ route('status-pesanan') }}">Pesanan Saya</a></li>
      {{-- <li class="hover:border-opacity-100 border-opacity-0 transition-all duration-500 ease-in-out border-[#0E3665] border-b-2"><a href="{{ route('contact') }}">Hubungi Kami</a></li> --}}
  </ul>

  {{-- Desktop Search --}}
  <livewire:components.search-form />
  {{-- End --}}

  <div class="flex min-w-[100px] justify-between ml-10">
    {{-- Cart --}}
    @php
      $cart = App\Models\Cart::where('user_id', Auth::user()->id)->get();
      // dd($cart);
    @endphp

    <a href="{{ route('cart') }}" class="relative w-8 h-8 cursor-pointer">
      @if ($cart->count() > 0)
        <div class="absolute -top-2 -right-4 rounded-full bg-[#FF1F1F] text-white h-[auto] w-[25px] text-center">
          <span class="mt-[10px]">{{ $cart->count() }}</span>
        </div>
      @endif
      <div class="w-full h-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 35px; width: 35px;">
          <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
        </svg>
      </div>
    </a>
      {{-- End --}}

    {{-- Status --}}
    <a class="z-0 ">
      <input type="checkbox" class="peer absolute z-40 w-8 h-8 opacity-0 cursor-pointer" id="menu_status"/>
      <div class="relative cursor-pointer">
        <div class="mt-[1px]">
          <svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="0 0 24 24" fill="currentColor" style="height: 35px; width: 35px;">
            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
          </svg>

        </div>
        <p class="absolute bg-red-500 text-white rounded-full -top-2 -right-3 w-6 h-6 text-center">12</p>
      </div>
      <div class="relative peer-checked:block hidden peer-checked:opacity-100 absolute -left-10 top-0 z-20 transition-all duration-500 ease-in-out">
        <div class="absolute bg-white m-4 -mx-10 rounded-lg shadow-md w-[300px] top-2 right-0 z-30 text-black">
          <div class="border-b-2 border-black">
            <p class="mx-4 my-2">History Pesanan test</p>
          </div>
          <div class="p-4">
          <div class="flex justify-between">
            <div class="flex gap-4 items-center">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" fill="none">
                  <path d="M12.458 6.91065L11.1271 5.31636L11.3126 3.20779L9.34346 2.73922L8.31255 0.910645L6.45801 1.74493L4.60346 0.910645L3.57255 2.7335L1.60346 3.19636L1.78892 5.31064L0.458008 6.91065L1.78892 8.50493L1.60346 10.6192L3.57255 11.0878L4.60346 12.9106L6.45801 12.0706L8.31255 12.9049L9.34346 11.0821L11.3126 10.6135L11.1271 8.50493L12.458 6.91065ZM5.41619 9.60779L3.34346 7.43064L4.15074 6.58493L5.41619 7.91636L8.6071 4.56207L9.41437 5.40779L5.41619 9.60779Z" fill="black"/>
                </svg>
                <p>Disetujui</p>
            </div>
            <p>1</p>
          </div>

            <div class="flex justify-between group">
              <div class="flex gap-4 items-center">
                <svg class="w-4 h-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" fill="none">
                  <path d="M12.458 6.91064L11.1271 5.31636L11.3126 3.20779L9.34346 2.73922L8.31255 0.910645L6.45801 1.74493L4.60346 0.910645L3.57255 2.7335L1.60346 3.19636L1.78892 5.31064L0.458008 6.91064L1.78892 8.50493L1.60346 10.6192L3.57255 11.0878L4.60346 12.9106L6.45801 12.0706L8.31255 12.9049L9.34346 11.0821L11.3126 10.6135L11.1271 8.50493L12.458 6.91064Z" fill="black" class="group-hover:fill-[#0E3665]"/>
                  <rect x="4.2666" y="5.05762" width="0.94975" height="6.21948" rx="0.474875" transform="rotate(-40.1108 4.2666 5.05762)" fill="white"/>
                  <rect x="8.27344" y="4.4458" width="0.94975" height="6.21948" rx="0.474875" transform="rotate(40.11 8.27344 4.4458)" fill="white"/>
                </svg>
                <p>Ditolak</p>
              </div>
                <p>1</p>
            </div>

            <div class="flex justify-between">
              <div class="flex gap-4 items-center">
                <div class="w-4 h-4">
                  <img class="w-full h-full" src={{ asset('img/user/home/arrow_cycle.png') }} alt="barang" class="w-10 h-10">
                </div>
                <p>Diproses</p>
              </div>
              <p>1</p>
            </div>
          </div>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-10 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_status"></div>
      </a>
      {{-- End --}}
  </div>
  {{-- Profile --}}
  @auth
  @if (Auth::user()->role == 'staf')
  <div class=" ml-10 cursor-pointer">

      <div class="w-8 h-8 cursor-pointer">
        <input type="checkbox" class="peer absolute 0 w-10 h-10 opacity-0 z-20 cursor-pointer" id="menu_profile"/>
        <div class="mt-[-7px] ">
          <svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="0 0 24 24" fill="currentColor" style="height: 40px; width: 40px;">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="relative top-0 -left-20 z-10 text-black peer-checked:block hidden peer-checked:opacity-100 transition-all duration-500 ease-in-out">
          <div class="absolute rounded-md bg-white">
            <div class="flex items-center gap-2 px-2 py-2 rounded-t-md hover:bg-gray-300 px-3" onclick="document.getElementById('profileButton').click()">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 16" fill="none">
                <path d="M7.5 0C11.64 0 15 3.416 15 7.625C15 11.834 11.64 15.25 7.5 15.25C3.36 15.25 0 11.834 0 7.625C0 3.416 3.36 0 7.5 0ZM3.01725 10.2297C4.11825 11.8996 5.77125 12.9625 7.62 12.9625C9.468 12.9625 11.1217 11.9003 12.222 10.2297C10.9738 9.0437 9.32846 8.38507 7.62 8.3875C5.91128 8.38487 4.26563 9.04352 3.01725 10.2297ZM7.5 6.8625C8.09674 6.8625 8.66903 6.6215 9.09099 6.19251C9.51295 5.76352 9.75 5.18168 9.75 4.575C9.75 3.96832 9.51295 3.38648 9.09099 2.95749C8.66903 2.5285 8.09674 2.2875 7.5 2.2875C6.90326 2.2875 6.33097 2.5285 5.90901 2.95749C5.48705 3.38648 5.25 3.96832 5.25 4.575C5.25 5.18168 5.48705 5.76352 5.90901 6.19251C6.33097 6.6215 6.90326 6.8625 7.5 6.8625Z" fill="black"/>
              </svg>
              <p>Profil</p>
            </div>
            <hr class="border-[#0E3665]">
            <div class="flex items-center gap-2 px-2 py-2 rounded-b-md hover:bg-gray-300 px-3" onclick="document.getElementById('logoutButton').click()">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 19" fill="none">
                <path d="M15.7085 4.29167L14.2397 5.76042L16.9272 8.45833H6.3335V10.5417H16.9272L14.2397 13.2292L15.7085 14.7083L20.9168 9.5L15.7085 4.29167ZM2.16683 2.20833H10.5002V0.125H2.16683C1.021 0.125 0.0834961 1.0625 0.0834961 2.20833V16.7917C0.0834961 17.9375 1.021 18.875 2.16683 18.875H10.5002V16.7917H2.16683V2.20833Z" fill="black"/>
              </svg>
              <p>Logout</p>
            </div>
          </div>
        </div>
          <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-0 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_profile"></div>
      </div>
  </div>
    @endif
    @endauth

    @guest
    <a href="{{ route('login') }}" class="border-2 border-sky-500 text-white py-1 px-5 rounded-lg bg-sky-500"> Login </a>
    @endguest
    {{-- End --}}
</nav>


{{-- mobile --}}
<nav class="fixed flex justify-between top-0 left-0 z-20 w-full min-[800px]:hidden block bg-white border-b-4 !border-[#0E3665] transition-all duration-1000 ease-in-out" id="navbar_mobile">
  <div class="">
    <input type="checkbox" class="peer absolute z-10 m-5 w-10 h-10 opacity-0" id="menu_burger"/>
    <button class="w-12 h-12 peer-checked:opacity-100 peer-checked:block hidden opacity-0 absolute left-[7rem] top-[80vh] z-40 m-5 min-[800px]:hidden block border-2 border-gray-200 p-2 rounded-full hover:bg-[#0E3665]" id="close_burger">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
      </svg>
    </button>
    <div class="w-8 h-8 peer-checked:opacity-0 opacity-100 absolute z-0 mx-5 mt-7 min-[1000px]:hidden block">
      <img src={{ asset('img/navigation/menu_black.svg') }} alt="person" class="w-full h-auto">
    </div>
      <div class="-translate-x-[300px] peer-checked:translate-x-0 z-20 transition-all duration-500 ease-in-out fixed top-0 left-0 z-10 w-[300px] h-screen bg-white shadow-md flex flex-col ">
        <a class="h-fit" href="{{ route('home') }}">
          <img src={{ asset('img/user/navbar/logo-ori-sm.png') }} alt="logo" class="w-full h-auto">
        </a>
        <div class="mt-10 flex flex-col list-none">
          <a href="{{ route('home') }}" id="home-link" class="hover:text-[#0E3665] border-opacity-0 transition-all duration-500 ease-in-out border-[#0E3665] text-[16px] font-semibold py-4 hover:bg-[#0E3665] hover:text-white">
            <p class="mx-10">Beranda</p>
          </a>
          <a href="{{ route('status-pesanan') }}" id="status-pesanan-link" class="hover:text-[#0E3665] border-opacity-0 transition-all duration-500 ease-in-out border-[#0E3665] text-[16px] font-semibold py-4 hover:bg-[#0E3665] hover:text-white">
            <p class="mx-10">Status Pesanan</p>
          </a>
        </div>
      </div>
      <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-10 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_burger"></div>
    </div>

    <div class="flex items-center gap-6 self-end m-5">
        {{-- Mobile Search --}}
        <livewire:components.mobile-search-form />

        <a href="{{ route('cart') }}" class="relative z-0">
          <div class="w-10 h-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 40px; width: 40px;">
              <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
            </svg>

          </div>
          <p class="absolute bg-red-500 text-white rounded-full -top-2 -right-3 w-6 h-6 text-center">5</p>
        </a>

      <a class="z-0">
        <input type="checkbox" class="peer absolute z-40 w-8 h-8 opacity-0" id="menu_status_mobile"/>
        <div class="relative">
          <div class="w-10 h-10">
            <img src={{ asset('img/navigation/notify_black.svg') }} alt="person" class="w-full h-full">
          </div>
          <p class="absolute bg-red-500 text-white rounded-full -top-2 -right-3 w-6 h-6 text-center">12</p>
        </div>
        <div class="relative peer-checked:block hidden peer-checked:opacity-100 absolute left-0 top-0 z-20 transition-all duration-500 ease-in-out">

          <div class="absolute bg-white m-4 -mx-10  rounded-lg shadow-md w-[300px] top-2 right-0 z-30">
            <p class="border-b-2 border-black p-4">History Pesanan</p>
            <div class="p-4">
              <div class="flex justify-between">
                <div class="flex gap-4 items-center">
                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" fill="none">
                      <path d="M12.458 6.91065L11.1271 5.31636L11.3126 3.20779L9.34346 2.73922L8.31255 0.910645L6.45801 1.74493L4.60346 0.910645L3.57255 2.7335L1.60346 3.19636L1.78892 5.31064L0.458008 6.91065L1.78892 8.50493L1.60346 10.6192L3.57255 11.0878L4.60346 12.9106L6.45801 12.0706L8.31255 12.9049L9.34346 11.0821L11.3126 10.6135L11.1271 8.50493L12.458 6.91065ZM5.41619 9.60779L3.34346 7.43064L4.15074 6.58493L5.41619 7.91636L8.6071 4.56207L9.41437 5.40779L5.41619 9.60779Z" fill="black"/>
                  </svg>
                  <p>Disetujui</p>
                </div>
                <p>1</p>
              </div>

              <div class="flex justify-between">
                <div class="flex gap-4 items-center">
                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" fill="none">
                    <path d="M12.458 6.91064L11.1271 5.31636L11.3126 3.20779L9.34346 2.73922L8.31255 0.910645L6.45801 1.74493L4.60346 0.910645L3.57255 2.7335L1.60346 3.19636L1.78892 5.31064L0.458008 6.91064L1.78892 8.50493L1.60346 10.6192L3.57255 11.0878L4.60346 12.9106L6.45801 12.0706L8.31255 12.9049L9.34346 11.0821L11.3126 10.6135L11.1271 8.50493L12.458 6.91064Z" fill="black"/>
                    <rect x="4.2666" y="5.05762" width="0.94975" height="6.21948" rx="0.474875" transform="rotate(-40.1108 4.2666 5.05762)" fill="white"/>
                    <rect x="8.27344" y="4.4458" width="0.94975" height="6.21948" rx="0.474875" transform="rotate(40.11 8.27344 4.4458)" fill="white"/>
                  </svg>
                  <p>Ditolak</p>
                </div>
                <p>1</p>
              </div>

              <div class="flex justify-between">
                <div class="flex gap-4 items-center">
                  <div class="w-4 h-4">
                    <img class="w-full h-full" src={{ asset('img/user/home/arrow_cycle.png') }} alt="barang" class="w-10 h-10">
                  </div>
                  <p>Diproses</p>
                </div>
                <p>1</p>
              </div>
            </div>

          </div>
        </div>
        <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-10 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_status_mobile"></div>
      </a>

      @auth
      @if (Auth::user()->role == 'staf')
      <div class="">
        <div class="w-8 h-8">
          <input type="checkbox" class="peer absolute 0 w-8 h-8 opacity-0 z-20" id="menu_profile_mobile"/>
          <div class="w-8 h-8">
            <img src={{ asset('img/navigation/person_black.svg') }} alt="person" class="w-full h-auto rounded-full">
          </div>
          <div class="relative top-0 -left-20 z-10 text-black peer-checked:block hidden peer-checked:opacity-100 transition-all duration-500 ease-in-out">
            <div class="absolute rounded-md bg-white">
              <a href="{{ route('user-profile', ['slug' => Auth::user()->slug]) }}">
                <div class="flex items-center gap-2 cursor-pointer rounded-t-md hover:bg-gray-300 px-3 py-2">

                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 16" fill="none">
                    <path d="M7.5 0C11.64 0 15 3.416 15 7.625C15 11.834 11.64 15.25 7.5 15.25C3.36 15.25 0 11.834 0 7.625C0 3.416 3.36 0 7.5 0ZM3.01725 10.2297C4.11825 11.8996 5.77125 12.9625 7.62 12.9625C9.468 12.9625 11.1217 11.9003 12.222 10.2297C10.9738 9.0437 9.32846 8.38507 7.62 8.3875C5.91128 8.38487 4.26563 9.04352 3.01725 10.2297ZM7.5 6.8625C8.09674 6.8625 8.66903 6.6215 9.09099 6.19251C9.51295 5.76352 9.75 5.18168 9.75 4.575C9.75 3.96832 9.51295 3.38648 9.09099 2.95749C8.66903 2.5285 8.09674 2.2875 7.5 2.2875C6.90326 2.2875 6.33097 2.5285 5.90901 2.95749C5.48705 3.38648 5.25 3.96832 5.25 4.575C5.25 5.18168 5.48705 5.76352 5.90901 6.19251C6.33097 6.6215 6.90326 6.8625 7.5 6.8625Z" fill="black"/>
                  </svg>
                  <p>Profil</p>
                </div>
              </a>
              <hr class="border-[#0E3665]">
              <div class="flex items-center gap-2 cursor-pointer rounded-b-md hover:bg-gray-300 px-3 py-2" onclick="document.getElementById('logoutButton').click()">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                  <path d="M7.5 0C11.64 0 15 3.416 15 7.625C15 11.834 11.64 15.25 7.5 15.25C3.36 15.25 0 11.834 0 7.625C0 3.416 3.36 0 7.5 0ZM3.01725 10.2297C4.11825 11.8996 5.77125 12.9625 7.62 12.9625C9.468 12.9625 11.1217 11.9003 12.222 10.2297C10.9738 9.0437 9.32846 8.38507 7.62 8.3875C5.91128 8.38487 4.26563 9.04352 3.01725 10.2297ZM7.5 6.8625C8.09674 6.8625 8.66903 6.6215 9.09099 6.19251C9.51295 5.76352 9.75 5.18168 9.75 4.575C9.75 3.96832 9.51295 3.38648 9.09099 2.95749C8.66903 2.5285 8.09674 2.2875 7.5 2.2875C6.90326 2.2875 6.33097 2.5285 5.90901 2.95749C5.48705 3.38648 5.25 3.96832 5.25 4.575C5.25 5.18168 5.48705 5.76352 5.90901 6.19251C6.33097 6.6215 6.90326 6.8625 7.5 6.8625Z" fill="black"/>
                </svg>
                <p>Logout</p>
              </div>
              </div>
          </div>
          <div class="absolute top-0 right-0 w-screen h-screen bg-black fixed z-0 peer-checked:block peer-checked:opacity-50 check hidden top-0 left-0 transition-all duration-500 ease-in-out" id="outside_profile"></div>
        </div>
      @endif
      @endauth

      @guest
      <a href="{{ route('login') }}" class="border-2 border-sky-500 text-white py-1 px-5 rounded-lg bg-sky-500"> Login </a>
      @endguest
    </div>
</nav>

<a class="btn btn-outline-danger rounded-pill" id="logoutButton" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>

<a id="profileButton" href="{{ route('user-profile', ['slug' => Auth::user()->slug]) }}" class="opacity-100 w-10 h-10 cursor-pointer">  </a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
