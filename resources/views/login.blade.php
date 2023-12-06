<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Berkah Kost</title>

  @livewireStyles
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

  <link rel="icon" href="{{ asset('images/favico.png') }}">

  <style>
    .theTitle::before, .theTitle::after
    {
      content: ' \2015';
    }

    .login
    {
      background: url('{{ asset('img/Desktop_BG_@.png') }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      height: 80vh;
    }

    .loginTabs .nav-link
    {
      color: #d75452 !important;
    }

    .loginTabs .nav-link.active
    {
      background-color: #d75452 !important;
      color: #ffffff !important;
    }

    .theTitle
    {
      font-size: 32px;
    }

    .theLogo
    {
      height: 130px;
      width: auto;
    }

    @media (max-width: 767px)
    {
      .login
      {
        background: url('{{ asset('img/Mobile_BG.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
      }

      .theTitle
      {
        font-size: 20px;
      }

      .theLogo
      {
        height: 100px;
        width: auto;
      }
    }
  </style>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit(token) {
      document.getElementById("login").submit();
    }
  </script>
</head>

<body class="login">
  <div class="d-flex justify-content-center justify-content-md-end mt-3 pe-md-3 mb-4 loginTabs">
  </div>

  <div class="tab-content" id="pills-tabContent">
    {{-- Login --}}
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
      <div class="container d-flex justify-content-center">
        <div class="bg-white rounded-4 dark-shadow-r3 col-12 col-md-4" style=" border-bottom: 5px solid #0E3665;">
          <div style="background: url('{{ asset('img/b1.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;" class="p-3 border-bottom border-dark">
            <div class="py-2 d-flex justify-content-center">
              <img src="{{ asset('img/Ombudsman.png') }}" class="theLogo">
            </div>
          </div>

          <div class="px-3 pt-3 pb-5">
            <div class="text-center font-poppins theTitle" style=" color: #BA0B2F;"><i>Login</i></div>
            <div class="login-form">
              <form action="{{ route('signin') }}" id="login" method="POST"> @csrf
                <div class="form-group mb-3">
                  <label >Email</label>
                  <input id="email" name="email" type="email" class="form-control border border-dark" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group mb-3">
                  <label>Password</label>
                  {{-- <a href="#" class="link float-right">Forget Password ?</a> --}}
                  <div class="position-relative">
                    <input id="password" name="password" type="password" class="form-control border border-dark" placeholder="Masukkan Password" required>
                    <div class="show-password">
                      <i class="flaticon-interface"></i>
                    </div>
                  </div>
                </div>
                @if (session()->has('status-failed'))
                <div class="alert alert-danger block d-flex justify-content-between align-items-center">
                  <span>{{ session('status-failed') }}</span>
                  <button type="button" class="close ml-auto" data-bs-dismiss="alert" aria-label="Close" style="background: none; border: none; box-shadow: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                @endif

                <!-- chatcha-->
                <div class="d-flex justify-content-center">
                  <div class="g-recaptcha" data-sitekey="6LcbyLEoAAAAACH2eZVvgbyle444clJqtA38rW3c"></div>
                </div>

                @error('g-recaptcha-response') <small class="text-danger"> {{$message}} </small> @enderror

                <input type="submit" value="Login" class="btn float-right mt-3 fw-bold w-100 text-white" style="background: #0E3665;">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- End --}}
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>
