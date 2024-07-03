<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>EXPO LMAD 2023</title>
    <link rel="icon" href="{{asset('images/ICON.png')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/staffEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceExpositor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/struct_base.css') }}">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="{{ asset('js/staffAttendanceEvent.js') }}"></script>
    <script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <!--Fuentes de letras-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Barlow+Condensed&family=Be+Vietnam+Pro:wght@400;500;700&family=Bruno+Ace&family=Comfortaa:wght@400;444&family=Domine:wght@400;500;700&family=Inter:wght@400;700;800&family=Kaushan+Script&family=Montserrat:wght@600;700&family=Nanum+Myeongjo:wght@700;800&family=Nunito&family=Oswald:wght@700&family=Permanent+Marker&family=Shantell+Sans:wght@300&family=Space+Mono:wght@400;700&family=Tilt+Warp&display=swap" rel="stylesheet"> 

    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>


</head>
<body style="background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-auto bg-dark sticky-top">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                    <a href="/" class="d-block py-3 px-1 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                    </a>
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center ov">
                        
                        <li>
                            <a href="{{ route('adminInicio.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavHome.png') }}" alt="Inicio Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Inicio</p>
                                </i>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('staffEvento.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavCalendar.png') }}" alt="Eventos Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Evento</p>
                                </i>
                            </a>
                        </li>

                        <li>
                            <a href="./adminVisitorExpo" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavVist.png') }}" alt="Visitantes Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Visitantes</p>
                                </i>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('staffEmpresa.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavEmpresas.png') }}" alt="Empresas Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Empresas</p>
                                </i>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('staffExpositor.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavExpositor.png') }}" alt="Expositor Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Expositor</p>
                                </i>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('cerrarSesion') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="iconNav">
                                    <img src="{{ asset('images/NavLogout.png') }}" alt="Staff Expo LMAD"/>
                                    <p class="d-none d-sm-block nav-txt">Salir</p>
                                </i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
    


    <!---nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="/"> <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        
            
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="nav navbar-nav navbar-left">

                    @php
                    if(session()->has('id')){
                        $id = session()->get('id');
                        $user = new App\Models\User();
                        $user = App\Models\User::where('id', '=', $id)->first();
                        if($user != null){
                            $rol = $user->rol;
                        }
                    }
                    @endphp

                    @if ($rol == 'admin')
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('adminInicio.index')}}">
                            <p class="m-0 nav-txt"> Administrar </p>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('staffEvento.index')}}">
                            <p class="m-0 nav-txt"> Eventos </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('staffEmpresa.index')}}">
                            <p class="m-0 nav-txt"> Empresas </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('staffExpositor.index')}}">
                            <p class="m-0 nav-txt"> Expositor </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./adminVisitorExpo">
                            <p class="m-0 nav-txt"> Visitante Expo </p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cerrarSesion') }}">
                            <p class="m-0 nav-txt"> Salir </p>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav--->
    
    @yield('Content')
        
    @livewireScripts
    </div>
    </div>
</body>
</html>
