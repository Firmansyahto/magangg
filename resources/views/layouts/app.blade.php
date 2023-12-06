<!DOCTYPE html>
<html lang="en">

{{-- Header --}}
@include('includes.user.header')
{{-- End --}}

<body class="font-['poppins'] relative" style="overflow-x: hidden">
  {{-- Navbar --}}
  @include('includes.user.navbar')
  {{-- End --}}

  <div id="notification-container" class="fixed top-10 right-4 z-30 flex flex-col gap-4">

  </div>

  <div id="modal-container" class="hidden fixed top-0 left-0 flex items-center justify-center h-screen w-screen z-30 px-4">

  </div>


  @yield('content')
  {{isset($slot) ? $slot : null}}

  {{-- Footer --}}
  @include('includes.user.footer')
  {{-- End --}}

  {{-- JS --}}
  @include('includes.user.js')
  {{-- End --}}
</body>

</html>
