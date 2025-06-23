<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    


    <title>GalkaRENT || {{ $title }}</title>
</head>
<body>

  <div class="container">

    {{-- Modal Register Success --}}
    @if(session()->has('success'))
      <div id="modal" class="modal-dialog fade show animate__animated animate__fadeInRightBig" style="width: 25%; position:absolute; right:4%; top:70px; z-index: 2;">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 class="modal-title text-white">Success</h5>
            <button type="button" id="closeButton" class="btn-close btn-close-white" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="space-icon" style="width:70px;height:70px;margin:auto;">
              <lord-icon
                  src="https://cdn.lordicon.com/jvihlqtw.json"
                  trigger="loop"
                  colors="primary:#16c72e,secondary:#08a88a"
                  style="width:70px;height:70px; border:3px solid #16c72e; border-radius:50%;">
              </lord-icon>
            </div>
            <p class="mt-3" style="text-align: center"><strong>{{ session('success') }}</strong> you can <span id="loginHref" style="color:#5800FF; font-weight: bold; cursor:pointer"> Login </span> now</p>
          </div>
        </div>
      </div>
    @endif

    {{-- //Modal Login Failed --}}
    @if(session()->has('errorLogin'))
      <div id="modal" class="modal-dialog fade show animate__animated animate__fadeInRightBig" style="width: 25%; position:absolute; right:4%; top:70px; z-index: 2;">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title text-white">Failed</h5>
            <button type="button" id="closeButton" class="btn-close btn-close-white" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="space-icon" style="width:70px;height:70px;margin:auto;">
              <lord-icon
                  src="https://cdn.lordicon.com/hrqwmuhr.json"
                  trigger="loop"
                  colors="primary:#e83a30,secondary:#e83a30"
                  style="width:70px;height:70px; border:3px solid #e83a30; border-radius:50%;">
              </lord-icon>
            </div>
            <p class="mt-3" style="text-align: center"><strong>{{ session('errorLogin') }}</strong> <span id="loginHref" style="color:#5800FF; font-weight: bold; cursor:pointer"> </span>  username or password non valid</p>
          </div>
        </div>
      </div>
    @endif

    {{-- //Title Form --}}
    <div class="title-form animate__fadeInDown animate__delay-1s" id="title-form">
      <img class="mb-3" src="img/logo.png" alt="Logo GalkaRent" width="80">
      <h4>GalkaRent<span class="text">company</span></h4>
    </div>
    <div class="container-form ">
      <div class="wrapper animate__fadeInDown" id="wrapper">
        
        {{-- //Button Click Form Login And Form Register --}}
        <div class="slide-click" id="slide-click">
          <div class="item-click {{ ($slug == "login-page") ? "active" : '' }}" id="item-click-login">
            <a href="#" class="click-login" id="click-login">LOGIN</a>
          </div>
          <div class="item-click {{ ($slug == "register-page") ? "active" : '' }}" id="item-click-register">
            <a href="#" class="click-register" id="click-register">REGISTER</a>
          </div>
        </div>
        <div class="{{ ($slug == "register-page") ? "form-body-second" : "form-body" }}" id="form-body">
          
          {{-- //Form Login --}}
          <div class="form-login" id="login">
            <form action="/signin" method="POST" class="login-body" id="login-body">
              @csrf
              <div class="input-group mb-2">
                <span class="input-group-text" id="input-login1"><box-icon name='user' color='#738b9b' ></box-icon></span>
                <input type="text" name="usernameLogin" class="form-control @error('usernameLogin') is-invalid @enderror" placeholder="username" aria-label="Username" aria-describedby="input-login1">
                @error('usernameLogin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="input-group mb-2">
                <span class="input-group-text" id="input-login2"><box-icon name='lock-alt' color='#738b9b'></box-icon></span>
                <input type="password" name="passwordLogin" class="form-control @error('passwordLogin') is-invalid @enderror" placeholder="password" aria-label="Password" aria-describedby="input-login2">
                @error('passwordLogin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="check-forgot">
                <div class="form-check">
                  <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Ingatkan Saya
                  </label>
                </div>
                <div class="pass-link">
                  <p class="text-center"><a href="#">Lupa Password?</a></p>
                </div>
              </div>
              <div class="btn-submit">
                <button type="submit" class="btn text-white button"><b>LOGIN</b></button>
              </div>
            </form>
          </div>

          {{-- //Form Register --}}
          <div class="form-register" id="register">
            <form action="/signup" method="POST" class="register-body" id="register-body">
              @csrf
              <div class="input-group mb-2">
                <span class="input-group-text" id="input-register1"><box-icon name="user" color='#738b9b'></box-icon></span>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="username" aria-label="Username" aria-describedby="input-register1" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="input-group mb-2">
                <span class="input-group-text" id="input-register2"><box-icon name='lock-alt' color='#738b9b'></box-icon></span>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" aria-label="Password" aria-describedby="input-register2">
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-2">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" aria-label="Email" aria-describedby="input-register3" value="{{ old('email') }}">
                <span class="input-group-text"  id="input-register3"><box-icon name='envelope' color='#738b9b'></box-icon></span>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="btn-submit-register">
                <button type="submit" name="submit" class="btn text-white button" id="button-register"><b>REGISTER</b></button>
              </div>
            </form>
          </div>
        </div>
        <div class="btn-back d-flex justify-content-center">
          <a href="/" class="btn" style=" margin-top: 3px; font-weight:bold; margin-left:-5px"> BACK</a>
        </div>  
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/login.js"></script>
</body>
</html>

