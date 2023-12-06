<!DOCTYPE html>
<html lang="en">

{{-- Header --}}
@include('includes.dashboard.header')
{{-- End --}}

<body style="background: #f8f8f8;">
  {{-- Sidebar --}}
  @include('includes.dashboard.sidebar')
  {{-- End --}}

  <main>
    {{-- Navbar --}}
    @include('includes.dashboard.navbar')
    {{-- End --}}

    <div id="main">
      <div class="mx-4 pt-3 mb-5" style="min-height: 59vh;">
        {{-- Toaster --}}

        {{-- End --}}

        {{-- Breadcrumb & Profile & Toogler --}}
        @include('includes.dashboard.breadcrumb-toogler')
        {{-- End --}}

        @yield('content')
        {{isset($slot) ? $slot : null}}
      </div>
    </div>
  </main>

  @include('includes.dashboard.js')

</body>

</html>
