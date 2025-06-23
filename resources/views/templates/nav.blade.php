@if (isset($data->name))
    <link rel="stylesheet" href="../css/navbar.css">
@else
    <link rel="stylesheet" href="css/navbar.css">
@endif

@if (isset($user->username) || isset(auth()->user()->username)) 
    <link rel="stylesheet" href="../../css/navbar.css">
@else
    <link rel="stylesheet" href="css/navbar.css">
@endif  




    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 mb-5  bg-white rounded">
        <div class="container mt-2 mb-2">
            <div class="brand">
                @if (isset($data->name) || isset($user->username))
                    <img style="margin-left: 0px; margin-top:-15px; {{ (isset($user->username)) ? 'display: none;':'' }}" src="../img/logo.png" width="80">
                    <img style="margin-left: 0px; margin-top:-15px; {{ (isset($data->name)) ? 'display: none;':'' }}" src="../../img/logo.png" width="80">
                @else
                    <img style="margin-left: 0px; margin-top:-15px;" src="img/logo.png" width="80">
                @endif  

                <a class="navbar-brand mt-1" href="/"><div style="display: inline-block; color:#3D37F1;"><h4 class="fw-bold mt-2">Galka</h4></div><div style="display: inline-block;"><h4 class="fw-bold">Rent</h4></div></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mt-3 flex-row justify-content-center" style="font-family: Roboto; font-weight: bold; font-size:11px;" >
                    <li class="nav-item me-3">
                        <a class="nav-link strip {{ ($title === "Home") ? 'active' : '' }}" href="/" >HOME</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link strip  {{ ($title === "RentScooter") ? 'active' : '' }}" href="/rent">RENT SCOOTER</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link strip {{ ($title === "Contact") ? 'active' : '' }}" href="/contact" >CONTACT</a>
                    </li>
                    <li class="nav-item  me-5">
                        <a class="nav-link strip {{ ($title === "About") ? 'active' : '' }}" href="/about" >ABOUT US</a>
                    </li>
                    @auth
                        <li class="nav-item" style="margin-top: -5px;">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle text-white" style="background-image: linear-gradient(to right, #3D37F1 , #A5A2F6);" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                    @if(auth()->user()->image == "")
                                    <i class="fas fa-user-check"></i>
                                        &nbsp;{{ auth()->user()->username }}
                                    @else
                                        @if (isset($data->name) || isset($user->username))
                                            <img src="../storage/{{ auth()->user()->image }}" alt="" width="30" height="30" style="border-radius:50%; {{ (isset($user->username)) ? 'display:none':''}}" class="me-3">
                                            {{ (isset($user->username)) ? '' : auth()->user()->username }}
                                            <img src="../../storage/{{ auth()->user()->image }}" alt="" width="30" height="30" style="border-radius:50%; {{ (isset($data->name)) ? 'display:none;':'' }}" class="me-3">
                                            {{ (isset($data->name)) ? '' : auth()->user()->username }}
                                        @else
                                            <img src="storage/{{ auth()->user()->image }}" alt="" width="30" height="30" style="border-radius:50%;" class="me-3">
                                            {{ auth()->user()->username }}
                                        @endif
                                    @endif
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/user/{{ auth()->user()->username }}/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/user/{{ auth()->user()->username }}"> <i class="fas fa-address-card"></i> Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/logout" class="dropdown-item" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit" class="btn" style="padding: 0;">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link strip {{ ($title === "Login") ? 'active' : '' }}" href="/signin">LOG IN</a>
                        </li>
                        <li class="nav-item register ms-3">
                            <a class="nav-link " href="/signup" style="width:85px; background-image: linear-gradient(to right, #3D37F1 , #A5A2F6  ); border-radius:50px; padding:7px 20px; color:white;">SIGN UP</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

 