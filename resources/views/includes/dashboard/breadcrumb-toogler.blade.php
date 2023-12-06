{{-- Breadcrumb & Profile & Toogler --}}
<div class="d-flex mb-3 justify-content-between align-items-center">
  <div class="d-flex align-items-center">
    {{-- Toggle close sidebar desktop --}}
    <div class="d-none d-md-flex">
      <div class="rounded-circle w-fit cursor-pointer border border-dark p-1" style="opacity: 0.7; background: #48484830; padding: 1px;" onclick="w3_close()" id="closeNav">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 30px; width: 30px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
    </div>
    {{-- end --}}

    {{-- Toggle open sidebar desktop --}}
    <div class="rounded-circle w-fit cursor-pointer border border-dark p-1" style="opacity: 0.7; background: #48484830; padding: 1px; display: none;" onclick="w3_open()" id="openNav">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 30px; width: 30px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
      </svg>
    </div>
    {{-- End --}}

    {{-- Breadcrumb --}}
    @yield('breadcrumb')
    {{-- End --}}
  </div>

  {{-- Profile Desktop --}}
  <div class="dropdown d-none d-md-block">
    <div class="d-flex align-items-center me-3">
      <div class="rounded-circle me-2 dark-shadow-r4 btn-profile" id="dropdownMenuButton" data-mdb-toggle="dropdown"
      style="height: 65px; width: 65px; padding: 3px;">
        @if (Auth::user()->foto)
          <img src="{{ asset('storage') }}/{{ Auth::user()->path }}/{{ Auth::user()->foto }}" class="w-100 h-100 object-fit-cover rounded-circle">
        @else
          <img src="{{ asset('img/profile.jpg') }}" class="w-100 h-100 object-fit-cover rounded-circle">
        @endif
      </div>
      <div class="d-flex flex-column font-poppins">
        <div class="text-main" style="font-size: 16px;"> {{ Auth::user()->name }} </div>
        <div class="text-grey" style="font-size: 13px;"> {{ Auth::user()->email }} </div>
      </div>
    </div>
    <ul class="dropdown-menu font-poppins" aria-labelledby="dropdownMenuButton">
      <li class="">
        <a class="dropdown-item" style="color: #48484896;" href="">
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
            <div class="ms-1">Profile Saya</div>
          </div>
        </a>
      </li>
      <li class="border-top">
        <a class="dropdown-item" style="color: #48484896; cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="height: 20px; width: 20px; transform: scaleX(-1);">
            <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
          </svg>
          <span class="ms-1">Log Out</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
  {{-- End --}}
</div>
{{-- End --}}
