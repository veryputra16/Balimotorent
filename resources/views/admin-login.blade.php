<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />



    <title>GalkaRENT || Admin Login</title>
</head>

<body>

    <div class="container">

        {{-- //Title Form --}}
        <div class="title-form animate__fadeInDown animate__delay-1s" id="title-form">
            <img class="mb-3" src="/img/logo.png" alt="Logo GalkaRent" width="80">
            <h4>GalkaRent_<span class="text">admin</span></h4>
        </div>
        <div class="container-form ">
            <div class="wrapper animate__fadeInDown" id="wrapper">

                {{-- //Button Click Form Login And Form Register --}}
                <div class="slide-click" id="">
                    <div class="item-click" id="">
                        <a href="" class="" id="">LOGIN</a>
                    </div>
                </div>

                {{-- <div class="form-container">
                    <form class="login-form">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="input-login1"><box-icon name='user'
                                    color='#738b9b'></box-icon></span>
                            <input type="text" name="usernameLogin"
                                class="form-control @error('usernameLogin') is-invalid @enderror"
                                placeholder="username" aria-label="Username" aria-describedby="input-login1">
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="input-login2"><box-icon name='lock-alt'
                                    color='#738b9b'></box-icon></span>
                            <input type="password" name="passwordLogin"
                                class="form-control @error('passwordLogin') is-invalid @enderror"
                                placeholder="password" aria-label="Password" aria-describedby="input-login2">
                            @error('passwordLogin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                </div> --}}

                <div class="" style="margin: 100px 30px 0 30px" id="form-body">

                    {{-- //Form Login --}}
                    <div class="form-login" id="login">
                        <form action="{{ route('admin.login.post') }}" method="POST" class="login-body" id="login-body">
                            @csrf
                            <div class="input-group mb-2" >
                                <span class="input-group-text" id="input-login1"><box-icon name='user'
                                        color='#738b9b'></box-icon></span>
                                <input type="text" name="username"
                                    class="form-control @error('usernameLogin') is-invalid @enderror"
                                    placeholder="username" aria-label="Username" aria-describedby="input-login1">
                                
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-login2"><box-icon name='lock-alt'
                                        color='#738b9b'></box-icon></span>
                                <input type="password" name="password"
                                    class="form-control @error('passwordLogin') is-invalid @enderror"
                                    placeholder="password" aria-label="Password" aria-describedby="input-login2">
                                @error('passwordLogin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="check-forgot">
                                <div class="form-check">
                                    <input class="form-check-input" name="password" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Ingatkan Saya
                                    </label>
                                </div>
                                <div class="pass-link">
                                    <p class="text-center"><a href="#">Lupa Password?</a></p>
                                </div>
                            </div>
                            <div class="btn-submit">
                                {{-- <button type="submit" class="btn text-white button"><b>LOGIN</b></button> --}}
                                <button type="submit" class="btn text-white button"><b>LOGIN</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="/js/login.js"></script>
</body>

{{-- <style>
    .form-container {
        width: 300px;
        margin: 0 auto;
    }

    .login-form {
        margin-bottom: 1rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
    }

    .btn {
        width: 100%;
        padding: 0.5rem;
    }

    .form-check {
        margin-top: 1rem;
    }

    .register-link {
        text-align: center;
    }
</style> --}}

</html>
