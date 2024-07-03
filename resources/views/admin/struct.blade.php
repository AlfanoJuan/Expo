<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>EXPO LMAD 2023</title>
    <link rel="icon" href="{{asset('images/ICON.png')}}">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>

    <!--Fuentes de letras-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600&family=Barlow+Condensed&family=Be+Vietnam+Pro:wght@400;500;700&family=Bruno+Ace&family=Comfortaa:wght@400;444&family=Domine:wght@400;500;700&family=Inter:wght@400;700;800&family=Kaushan+Script&family=Montserrat:wght@600;700&family=Nanum+Myeongjo:wght@700;800&family=Nunito&family=Oswald:wght@700&family=Permanent+Marker&family=Shantell+Sans:wght@300&family=Space+Mono:wght@400;700&family=Tilt+Warp&display=swap" rel="stylesheet"> 
    
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-left.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-right.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="{{ asset('js/adminEvents.js') }}"></script>
    <script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>

    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>

</head>
<body>
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
                        <a href="{{ route('adminRegistroEventos.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavCalendar.png') }}" alt="Eventos Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Evento</p>
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroInvitados.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavInvitados.png') }}" alt="Invitados Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Invitados</p>
                            </i>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroEmpresas.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavEmpresas.png') }}" alt="Empresas Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Empresas</p>
                            </i>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRegistroMaestros.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavMaestros.png') }}" alt="Maestros Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Maestros</p>
                            </i>

                        </a>
                    </li>
                    <li>
                    <a href="{{ route('adminStaffPage.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavStaff.png') }}" alt="Maestros Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Staff</p>
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
        @yield('Navbar')
        @livewireScripts
        @yield('Content')
    </div>
</div>
</body>
</html>

