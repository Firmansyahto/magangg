<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ART Ombudsman</title>

  @livewireStyles
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"> --}}

  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" /> --}}

  {{-- <link rel="stylesheet" href="{{ asset('css/lightslider.css') }}">
  <link rel="stylesheet" href="{{ asset('css/lightslider_custom.css') }}"> --}}

  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">
  <link rel="stylesheet" href="{{ asset('css/slickslider_custom.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <link rel="icon" href="{{ asset('img/logos.png') }}">

  <style>
    .dropdown:hover:hover .btn-profile
    {
      border: 1px solid #427ed9a0 !important;
    }

    .dropdown:hover>.dropdown-menu
    {
      display: block;
    }

    .dropdown>.dropdown-toggle:active
    {
        pointer-events: none;
    }

    .sideHeader
    {
      background: url('{{ asset("img/sidebar (2).png") }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 20px;
    }

    .sideBar .side-menu:hover
    {
      transition: .5s ease-in-out
    }

    .side-menu-indicator
    {
      margin-left: -1.5em;
      height: 20px;
      width: 20px;
      rotate: 45deg;
      opacity: 0;
      transition: .3s ease-in-out;
      border-radius: 2px;
    }

    .sideBar .side-menu:hover, .sideBar .side-menu.active
    {
      color: #1066c9;
    }

    .sideBar .side-menu:hover .side-menu-indicator, .sideBar .side-menu.active .side-menu-indicator
    {
      opacity: 1;
    }

    .sideBar
    {
      overflow: hidden;
      transition: .5s ease-in-out
    }

    .sideBar:hover
    {
      overflow-y: scroll;
      transition: .5s ease-in-out
    }

    /* width */
    .sideBar::-webkit-scrollbar {
      width: 5px;
      height: 5px;
    }

    /* Track */
    .sideBar::-webkit-scrollbar-track {
      /* box-shadow: inset 0 0 5px grey; */
      border-radius: 10px;
    }

    /* Handle */
    .sideBar::-webkit-scrollbar-thumb {
      background: #3D5D82;
      border-radius: 10px;
    }

    /* Handle on hover */
    .sideBar::-webkit-scrollbar-thumb:hover {
      background: #0058A8;
    }

    .footer-bottom-bg
    {
      background: url('{{ asset("img/shape bawah.png") }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    @media (max-width: 768px)
    {
      #main
      {
        margin-left: 0;
        margin-right: 0 !important;
      }
    }

    @media (min-width: 768px) and (max-width: 991px)
    {
      #main
      {
        margin-left: 18%;
        margin-right: 0 !important;
      }

      .side-menu-indicator
      {
        margin-right: 1em;
      }
    }

    @media (min-width: 992px)
    {
      #main
      {
        margin-left: 18%;
        margin-right: 0 !important;
      }

      .side-menu-indicator
      {
        margin-right: 2.5em;
      }
    }
  </style>

  @yield('css')
</head>
