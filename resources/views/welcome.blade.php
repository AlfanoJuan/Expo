@extends('Templates/headerStruct')

@section('content')
<body>

    <header class="header-index row justify-content-center mx-auto" id="header-index">
        
        <div style="position: relative; width: 100%; height:70%;">
            <video autoplay loop muted  class="header-gif-expo-2 img-fluid" id="video-header">
                <source src="{{asset('images/expolmad.mp4')}}" type="video/mp4" class="header-gif-expo-2" >
                Tu navegador no admite el elemento de video.
            </video>
        </div>

        <div class="row mx-auto  d-flex align-items-center" style="position: relative;
        top: -50%; ">
            <div class="col-sm-3 mb-1 text-left" style="">
                <img src="{{asset('images/LOGOEXPO2.png')}}" class="header-logo-lmad-expo img-fluid" onclick="window.location.href = '{{ url('/') }}'">
            </div>
            
            <div class="timer-expo col-sm-9 text-right" id="timer-expo"  style="">
                <div class="Timer-days-style" id="Timer-days">
                    <p id="dias-left" class="">200 DÍAS</p>
                </div>
                <div class="Timer-clock-style" id="Timer-clock">
                    <p id="horas-left" class="">19:06:49</p>
                </div>
            </div>
        </div>

        <div class="header-buttons-div row justify-content-end mx-auto" style=" width:50%;">

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

    <div class="body-container-expo">
        <center>
            <div class="schedules-container-expo">
                <h2 class="schedules-title-expo fs-1">HORARIOS</h2>
                <!--hr class="hr-title-expo"-->
                <input type="text" disabled class="hr-title-expo">

                <div class="schedulesImages-container">
                    <div class="schedulesImages">
                        <div>
                            <img  id="ImageSchedule1" src="{{asset('images/ChancellorsSchedules.jpg')}}" class="img-card-taller-expo img-fluid" onclick="ampliarImagen('ImageSchedule1')">
                            <div id="bigImageSchedule1" onclick="cerrarImagenAmpliada('bigImageSchedule1')">
                              <img src="" alt="Imagen Ampliada">
                            </div>
                        </div>

                        <div>
                            <img id="ImageSchedule2" src="{{asset('images/AmbassadorSchedules.jpg')}}" class="img-card-taller-expo img-fluid" onclick="ampliarImagen('ImageSchedule2')">
                            <div id="bigImageSchedule2" onclick="cerrarImagenAmpliada('bigImageSchedule2')">
                              <img src="" alt="Imagen Ampliada">
                            </div>                            
                        </div>

                        <div>
                            <img id="ImageSchedule3" src="{{asset('images/Room1.jpg')}}" class="img-card-taller-expo img-fluid" onclick="ampliarImagen('ImageSchedule3')">
                            <div id="bigImageSchedule3" onclick="cerrarImagenAmpliada('bigImageSchedule3')">
                              <img src="" alt="Imagen Ampliada">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>

        <center style="display: none;">
            <div class="events-container-expo">
                <h2 class="eventos-title-expo fs-1">TALLERES</h2>
                <!--hr class="hr-title-expo"-->
                <input type="text" disabled class="hr-title-expo">

                @if(count($allEvents) > 0)
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    @php
                        $counter = 0;
                    @endphp
                    
                    <div class="carousel-inner carousel-container mx-auto" style="width:60%;">
                        @foreach ($allEvents as $event)
                            @if($event->typeEvent != "Master Class" && $event->typeEvent != "Conferencia")
                                <div class="item @if($counter < 1) active @endif" style="width:100%;">
                                    <img src="{{ asset('storage/eventImages/'.$event->image) }}" class="img-card-taller-expo carousel-image img-fluid">
                                    <p class="text-card-taller-expo-text fs-2">{{$event->eventName}}</p> 
                                </div>
                                @php
                                    $counter++;
                                @endphp
                            @endif
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="62" viewBox="0 0 26 62" fill="none">
                            <path d="M0 31L25.5 0.68911L25.5 61.3109L0 31Z" fill="url(#paint0_linear_281_53)"/>
                            <defs>
                                <linearGradient id="paint0_linear_281_53" x1="0" y1="31" x2="34" y2="31" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#A748CA"/>
                                <stop offset="1" stop-color="#A748CA" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="62" viewBox="0 0 26 62" fill="none">
                            <path d="M26 31L0.5 0.68911L0.5 61.3109L26 31Z" fill="url(#paint0_linear_281_54)"/>
                            <defs>
                                <linearGradient id="paint0_linear_281_54" x1="26" y1="31" x2="-8" y2="31" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#18E4ED"/>
                                <stop offset="1" stop-color="#18E4ED" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>

                @endif
            </div>
        </center>

        <div class="conferencias-expo-container" style="display: none;">
            <center>
                <p class="conferencias-title-expo">CONFERENCIAS Y MASTERCLASSES</p>
                <!--hr class="hr-title-expo"-->
                <input type="text" disabled class="hr-title-expo">
            </center>
 
                <div class="card-img-conferencias multiple-items">
                    @foreach ($allEvents as $event)
                        @if($event->typeEvent == "Master Class" || $event->typeEvent == "Conferencia")
                            
                            <div class="card-a" style="width:40%; height: 80%;">
                                <center>
                                    <img src="{{asset('storage/eventImages/'.$event->image)}}" class="img-card-taller-expo img-fluid" style="height: auto;">
                                    <p class="text-card-conferencias-expo-text fs-2">{{$event->eventName}}</p>
                                    <p class="text-card-conferencias-hor fs-4">{{$event->date}}</p>
                                    <p class="text-card-conferencias-hor fs-4">Hora Inicio: {{$event->startTime}}</p>
                                    <p class="text-card-conferencias-hor fs-4">Hora Final: {{$event->endTime}}</p>
                                </center>
                            </div>

                        @endif
                    @endforeach
                </div>
            
                <div class="circles-imgs-conferencias"></div>    
        </div>

        <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
            <p class="footer-card-text" >EXPO LMAD 2024 - <i>CRONOGRAMA</i></p>
            <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('.multiple-items').slick({
                slidesToShow: 3,
                responsive: [
                    {
                    breakpoint: 992, // Cambia a 2 slides cuando el ancho de la pantalla es 992px o menos (pantalla más pequeña)
                    settings: {
                        slidesToShow: 2,
                    },
                    },
                    {
                    breakpoint: 768, // Cambia a 1 slide cuando el ancho de la pantalla es 768px o menos (pantalla más pequeña)
                    settings: {
                        slidesToShow: 1,
                    },
                    },
                ],
                slidesToScroll: 1,
                draggable: true,
                arrows: true,
                prevArrow: '<button class="slick-prev custom-prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></button>',
                nextArrow: '<button class="slick-next custom-next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></button>',
                dots: true,
                appendDots: $('.circles-imgs-conferencias'),
                customPaging: function(slider, i) {
                    return '<button class="custom-dot"></button>';
                },
            });
        });

        function ampliarImagen(_id){
            // Obtener la referencia de la imagen original y la imagen ampliada
            var imagenOriginal = document.getElementById(_id);
            var imagenAmpliada = document.getElementById('big' + _id);

            // Cambiar el src de la imagen ampliada por el src de la imagen original
            imagenAmpliada.getElementsByTagName("img")[0].src = imagenOriginal.src;

            // Mostrar la imagen ampliada
            imagenAmpliada.style.display = "block";
        }
        function cerrarImagenAmpliada(_id) {
          document.getElementById(_id).style.display = "none";
        }
    </script>

    <script>

    function calcularTiempoRestante() {

        const fechaObjetivo = new Date(2024, 5, 8); // Meses en JavaScript son de 0 a 11, así que 8 representa septiembre.

        // Obtiene la fecha actual
        const fechaActual = new Date();

        // Calcula la diferencia en milisegundos
        const diferenciaMilisegundos = fechaObjetivo - fechaActual;

        // Convierte la diferencia en días
        const diasFaltantes = Math.ceil(diferenciaMilisegundos / (1000 * 60 * 60 * 24));
        const fechaObjetivoHoras = new Date(2024, 5, 8, 8, 0, 0);

        // Calcula los días, horas, minutos y segundos
        const dias = Math.floor(diferenciaMilisegundos / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diferenciaMilisegundos % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutos = Math.floor((diferenciaMilisegundos % (1000 * 60 * 60)) / (1000 * 60));
        const segundos = Math.floor((diferenciaMilisegundos % (1000 * 60)) / 1000);

        const diasFormateados = dias.toString().padStart(2, '0');
        const horasFormateadas = horas.toString().padStart(2, '0');
        const minutosFormateados = minutos.toString().padStart(2, '0');
        const segundosFormateados = segundos.toString().padStart(2, '0');
        
        if(diasFaltantes <= 0 && horas <= 0 && minutos <= 0 && segundos <= 0)
        {
            var timerA = document.getElementById('timer-expo');
            timerA.innerHTML = "<div class='Timer-clock-style' id='Timer-clock'><p>¡LA EXPO HA COMENZADO!</p></div>";
            console.log("aaa");
        }
        else
        {
            var daysl = document.getElementById('dias-left');
            daysl.innerHTML = dias + " DÍAS";
            var horasl = document.getElementById('horas-left');
            horasl.innerHTML = horasFormateadas + ":" + minutosFormateados + ":" + segundosFormateados;
        }
    }

        // Actualiza el tiempo restante cada segundo
        setInterval(calcularTiempoRestante, 1000);

        // Llama a la función inicialmente para mostrar el tiempo restante
        calcularTiempoRestante();

    </script>
@endsection