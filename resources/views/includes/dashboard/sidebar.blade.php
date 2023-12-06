  <!-- Sidebar Desktop -->
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left position-relative" style="width: 18%; left: 0; overflow: hidden;" id="mySidebar">
    {{-- Header Image --}}
    <div class="px-3 py-2 mb-3 d-flex justify-content-center sideHeader" style=" border-bottom: 1px solid #888;">
      <img src="{{ asset('img/Ombudsman-2.png') }}" style="height: 130px; width: auto;">
    </div>
    {{-- End --}}

    <div class="d-flex flex-column sideBar mt-3 pt-3 position-absolutee w-100" style="height: 310px; overflow-y: scroll; z-index: 2;">
      {{-- Menu --}}

      <div class="font-poppins text-grey ms-3"> Data Master </div>

      @if (Auth::user()->hasRole('superadmin'))
      <a href="{{ route('unit-kerja') }}" class="side-menu border-0 btn position-relative @yield('unit-kerja-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
            </svg>
            <span class="ms-2"> Unit Kerja </span>
          </div>
        </div>
      </a>

      <a href="{{ route('register', ['slug' => 'semua']) }}" class="side-menu border-0 btn position-relative @yield('user-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
            </svg>
            <span class="ms-2"> User </span>
          </div>
        </div>
      </a>
      @endif

      <a href="{{ route('supplier') }}" class="side-menu border-0 btn position-relative @yield('supplier-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center ">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="20px" height="20px" viewBox="0 0 64.000000 64.000000"
            preserveAspectRatio="xMidYMid meet">
              <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
              fill="currentColor" stroke="none">
              <path d="M250 622 c0 -4 -20 -18 -45 -30 -35 -17 -50 -32 -68 -69 -12 -27 -25
              -49 -29 -51 -5 -2 -8 -32 -8 -68 0 -57 3 -65 25 -80 14 -9 25 -22 25 -28 0 -7
              14 -25 30 -41 40 -39 38 -52 -12 -65 -125 -31 -158 -61 -158 -139 l0 -41 310
              0 310 0 0 130 0 130 -110 0 -110 0 0 -40 c0 -41 -9 -47 -44 -34 -24 9 -19 27
              14 59 17 16 30 34 30 41 0 6 11 19 25 28 22 15 25 23 25 80 0 36 -3 66 -7 68
              -5 2 -18 24 -30 51 -18 37 -33 52 -68 69 -25 12 -45 26 -45 30 0 4 -13 8 -30
              8 -16 0 -30 -4 -30 -8z m40 -57 c0 -25 -4 -45 -10 -45 -5 0 -10 20 -10 45 0
              25 5 45 10 45 6 0 10 -20 10 -45z m-9 -65 c28 0 29 2 29 45 l0 45 32 -13 c33
              -14 62 -47 73 -84 l6 -23 -140 0 c-106 0 -141 3 -141 13 0 26 42 79 73 92 l32
              13 3 -44 c3 -41 5 -44 33 -44z m82 -57 c-46 -2 -120 -2 -165 0 -46 1 -9 3 82
              3 91 0 128 -2 83 -3z m-223 -63 c0 -22 -4 -40 -10 -40 -5 0 -10 18 -10 40 0
              22 5 40 10 40 6 0 10 -18 10 -40z m260 -10 c0 -63 -19 -102 -63 -129 -43 -26
              -71 -26 -114 0 -44 27 -63 66 -63 129 l0 50 120 0 120 0 0 -50z m40 10 c0 -22
              -4 -40 -10 -40 -5 0 -10 18 -10 40 0 22 5 40 10 40 6 0 10 -18 10 -40z m18
              -137 c-16 -4 -18 -18 -18 -104 l0 -99 80 0 80 0 0 99 c0 86 -2 100 -17 104
              -14 4 -12 5 5 6 22 1 22 -1 22 -109 l0 -110 -90 0 -90 0 0 110 c0 108 0 110
              23 109 16 -1 18 -2 5 -6z m92 -8 c0 -10 -10 -15 -30 -15 -20 0 -30 5 -30 15 0
              10 10 15 30 15 20 0 30 -5 30 -15z m-30 -35 c29 0 50 5 53 13 3 6 6 -25 6 -70
              l1 -83 -60 0 -60 0 1 83 c0 45 3 76 6 70 3 -8 24 -13 53 -13z m-190 -2 c0 -12
              -48 -21 -75 -14 -41 10 -28 21 25 21 28 0 50 -3 50 -7z m-95 -28 c8 -13 78
              -13 91 0 5 5 26 7 47 3 l37 -6 0 -68 0 -69 -155 0 c-131 0 -155 2 -155 15 0 8
              -4 15 -10 15 -5 0 -10 -7 -10 -15 0 -9 -9 -15 -25 -15 -20 0 -25 5 -25 25 0
              52 26 83 83 99 98 28 114 30 122 16z"/>
              <path d="M204 399 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16
              -11z"/>
              <path d="M324 399 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16
              -11z"/>
              <path d="M230 288 c0 -12 48 -21 75 -14 42 11 28 23 -25 22 -27 -1 -50 -4 -50
              -8z"/>
              </g>
            </svg>
            <span class="ms-2"> Supplier </span>
          </div>
        </div>
      </a>

      <a href="{{ route('satuan-barang') }}" class="side-menu border-0 btn position-relative @yield('satuan-barang-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
            </svg>

            <span class="ms-2"> Satuan Barang </span>
          </div>
        </div>
      </a>

      {{-- @if (Auth::user()->hasRole('admin gudang') or Auth::user()->hasRole('superadmin')) --}}
      <a href="{{ route('barang') }}" class="side-menu border-0 btn position-relative @yield('barang-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
            </svg>

            <span class="ms-2"> Barang </span>
          </div>
        </div>
      </a>
      {{-- @endif --}}

      <div class="font-poppins text-grey ms-3 mt-3"> Data Transaksi </div>

      {{-- @if (Auth::user()->hasRole('admin gudang')) --}}
      <a href="{{ route('pesanan') }}" class="side-menu border-0 btn position-relative @yield('pesanan-active')">
        <div class="d-flex align-items-center">
          <div class="side-menu-indicator bg-blue"></div>

          <div class="d-flex justify-content-center align-items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
            </svg>

            <span class="ms-2"> Pesanan </span>
          </div>
        </div>
      </a>
      {{-- @endif --}}
      {{-- End --}}
    </div>

    {{-- Logout --}}
    <div class="container mt-5 position-absolute" >
      <div class="d-flex justify-content-center">
        <a class="btn btn-outline-danger rounded-pill" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="d-flex justify-content-center align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 25px; width: 25px;">
              <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
            </svg>
            <span class="ms-2 font-poppins" style="font-size: 13px;">Log Out</span>
          </div>
        </a>
      </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    {{-- End --}}

    <div class="w-100 position-absolute" style="bottom: 0; right: 0; z-index: 1;">
      {{-- <div class="footer-bottom-bg" style="padding: 4.5em"></div> --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-full" viewBox="0 0 325 174" fill="none">
            <path d="M325 173.5C142.6 147.5 16 44 -1.5 0.5C-20.5 42.6667 -57.3001 143.8 -60.5001 179C-63.7001 214.2 65.1666 208.667 130 201.5C160.333 201 277 196.3 325 173.5Z" fill="#0E3665"/>
        </svg>
    </div>
  </div>
  <!-- End Sidebar Desktop -->

  <!-- Sidebar Mobile -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">

    <div style="position: absolute; top: .8em; right: 1em;">
      <div class="border border-dark rounded-circle p-1">
        <button data-bs-dismiss="offcanvas" class="d-none" id="canvasDismiss"></button>
        <div onclick="document.getElementById('canvasDismiss').click()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-dark" style="height: 35px; width: 35px;">
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>

    <div class="px-3 py-2 mb-3 d-flex justify-content-center" style="background: #0d0d0d15; border-bottom: 1px solid #888;">
      <img src="{{ asset('img/logos.png') }}" style="height: 130px; width: auto;">
    </div>

    <div class="d-flex flex-column sideBar mt-3 pt-3">
      <a href="" class="side-menu btn radius-none" @yield('rumah-active')>
        <div class="d-flex justify-content-center align-items-center ">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
          </svg>
          <span class="ms-2"> Daftar Rumah </span>
        </div>
      </a>

      <div class="container mt-5">
        <div class="d-flex justify-content-center">
          <a class="btn btn-outline-danger rounded-pill" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="d-flex justify-content-center align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 25px; width: 25px;">
                <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
              </svg>
              <span class="ms-2 font-poppins" style="font-size: 13px;">Log Out</span>
            </div>
          </a>
        </div>
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
  <!-- End Sidebar Mobile -->
