@extends('Templates/headerStruct')

@section('content')
    

        <header class="header-index row justify-content-center mx-auto" id="header-index" style="">
            <div style="position: relative; width: 100%; height:70%;">
                <video autoplay loop muted  class="header-gif-expo img-fluid" id="video-header">
                    <source src="{{asset('images/expolmad.mp4')}}" type="video/mp4">
                    Tu navegador no admite el elemento de video.
                </video>
            </div>

            <div style="width: 50%; height: 70%;">
                <img src="{{asset('images/LMAD_BLOOM.png')}}" class="header-logo-lmad img-fluid" height="270" width="522">
            </div>

            <div class="header-buttons-div row justify-content-end mx-auto">


                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" id="arrowShow" onclick="showButtons()" alt="" class="arrow-header notDisplay"/>

                

                <div class="col-sm-2 mb-2  text-center" style="">
                    <button class="header-btn-eventMap notDisplay" id="mapButton"  onclick="">Mapa del Evento</button>
                </div>
                <div class="col-sm-2 text-center" style="">
                    <button class="header-btn-assistance notDisplay" id="assistanceButton" onclick="">Asistencia</button>
                </div>


                <div class="col-sm-2 mb-2  text-center" style="">
                    <button class="header-btn-portfolio"  onclick="window.location.href = '{{route('Portfolio.index')}}'">Portafolio</button>
                </div>

                <div class="col-sm-2 text-center" style="">
                    <button class="header-btn-Login " onclick="window.location.href = '{{route('inicioSesion.index')}}'">Iniciar Sesión</button>
                </div>

            </div>
        </header>

    <div class="BodyContainer">

            <div class="container Container-carrera-section" >
                
                <div class="row mb-5 pb-5" >
                    <div class="carrera-section col-md-5 col-sm-12">
                        <p class="carrea-title">ACERCA DE</p>
                        <p class="carrera-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Aenean dapibus orci ut enim facilisis tristique. 
                            Vestibulum non elit suscipit dolor sodales dignissim. 
                            Sed eu quam sit amet nulla mattis venenatis et id nisi. 
                            Nullam commodo, ante et porttitor lobortis, nibh mi 
                            porta nisl, et fermentum sapien velit ac tellus. Ut 
                            facilisis vel dui quis hendrerit. Integer nec consequat
                            massa. Pellentesque mattis rhoncus ex et dapibus. 
                            Praesent erat purus, interdum in metus sed, interdum 
                            placerat quam. Curabitur rutrum pellentesque arcu, eu 
                            accumsan velit fermentum et. In eu nibh sed massa congue 
                            fringilla nec nec lectus. Nulla facilisi. Duis quis diam 
                            et enim ultricies ultricies.
                        </p>
                    </div>
                </div>

                <div class="row mb-5 pb-5">
                </div>

                <div class="row mb-5 pb-5">
                </div>

                <div class="row mb-5 pb-5">
                </div>
                
                <div class="row mb-5 pb-5">
                    <div class="card-videojuegos row justify-content-center mx-auto col-md-12">
                            <div class="card-videojuegos-text row justify-content-center col-md-4 d-flex align-items-center">
                                    <div class="mt-4"></div>
                                    <div class="card-videojuegos-title mt-5 fs-1">Videojuegos</div>
                                    <div class="card-videojuegos-desc fs-4">
                                        Lorem ipsum dolor sit amet, 
                                        consectetur adipiscing elit, sed do eiusmod tempor 
                                        incididunt ut labore et dolore magna aliqua. 
                                        <br><br>
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                                        laboris nisi ut aliquip ex ea commodo consequat.
                                        <br><br>
                                        Duis aute irure dolor in reprehenderit in voluptate 
                                        velit esse cillum dolore eu fugiat nulla pariatur.
                                    </div>
                                    <a class="card-videojuegos-link mb-5 fs-4" href="{{route('Portfolio.subject', ['name' => 'videojuegos'])}}">Ver proyectos <i class="gg-arrow-right" style="display: inline; 
                                    position: relative; left: 10%; top: 44%;  transform: translate(0%, -50%);"></i></a>
                                    <div class="mb-5"></div>
                            </div>
                            <div class="row justify-content-center col-md-8 d-flex align-items-center" style="padding: 0px;">
                                <img src="{{asset('images/ExpoLmadVid.jpg')}}" class="card-videojuegos-img-i" >
                            </div>
                           
                    </div>
                </div>

                <div class="row mb-5 pb-5">
                    <div class="card-arte row  justify-content-center mx-auto col-md-12">
                        <div class="row col-md-8 art-container-img" style="">
                            <img src="{{asset('images/ExpoLmadArte.jpeg')}}" class="card-arte-img-i">
                        </div>
                        <div class="card-arte-text row justify-content-center col-md-4 d-flex align-items-center">
                                <div class="mt-4"></div>
                                <div class="card-arte-title mt-5 fs-1">Arte</div>
                                <div class="card-arte-desc fs-4">
                                    Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit, sed do eiusmod tempor 
                                    incididunt ut labore et dolore magna aliqua. 
                                    <br><br>
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                    <br><br>
                                    Duis aute irure dolor in reprehenderit in voluptate 
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </div>
                                <a class="card-arte-link mb-5 fs-4" href="{{route('Portfolio.subject', ['name' => 'arte'])}}">Ver proyectos <i class="gg-arrow-right" style="display: inline; 
                                position: relative; left: 10%; top: 44%;  transform: translate(0%, -50%);"></i></a>
                                <div class="mb-5"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="card-progra row justify-content-center mx-auto col-md-12">
                        <div class="card-progra-text row justify-content-center col-md-4 d-flex align-items-center">
                                <div class="mt-4"></div>
                                <p class="card-progra-title mt-5 fs-1">Programación</p>
                                <p class="card-progra-desc fs-4">
                                    Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit, sed do eiusmod tempor 
                                    incididunt ut labore et dolore magna aliqua. 
                                    <br><br>
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                    <br><br>
                                    Duis aute irure dolor in reprehenderit in voluptate 
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                <a class="card-progra-link mb-5 fs-4" href="{{route('Portfolio.subject', ['name' => 'programacion'])}}">Ver proyectos <i class="gg-arrow-right" style="display: inline; 
                                position: relative; left: 10%; top: 44%;  transform: translate(0%, -50%);"></i></a>
                                <div class="mb-5"></div>
                        </div>
                        <div class="row justify-content-center col-md-8 d-flex align-items-center" style="padding: 0px;">
                            <img src="{{asset('images/ExpoLmadProgra.jpg')}}" class="card-progra-img-i">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
                <p class="footer-card-text" >EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
            </div>
    </div>

    <!--Intro>
    <section id="loading-screen">
        <video autoplay muted class="video-intro" id="videoIntro">
            <source src="{{asset('images/INTRO.mp4')}}" type="video/mp4" class="video-intro" >
            Tu navegador no admite el elemento de video.
        </video>
    </section>

    <script>

    </script-->
    @endsection