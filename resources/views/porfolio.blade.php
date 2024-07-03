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
                <img src="{{asset('images/LMAD_BLOOM.png')}}" class="header-logo-lmad img-fluid" height="270" width="522"  onclick="window.location.href = '{{ url('/') }}'">
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

    

    <div class="portfolio-body" id="portfolio-body" style="">

        <div class="title-portfolio" style="">
            <p class="porfolio-text">Portafolio</p>
            <!--hr class="hr-gradient" /-->
            <center><input type="text" disabled class="hr-gradient"></center>
        </div>

        <div class="row justify-content-center mx-auto" style="width: 100%;">
            <div class="col-sm-5 mb-5 d-flex align-items-center justify-content-center" style="">
                <div class="card-arte-port-container" id="card-arte-port-container" onclick="window.location.href='{{route('Portfolio.subject', ['name' => 'arte'])}}'">
                    <div class="card-arte-portfolio" id="Card_rot_arte">
                        <div class="card-arte-shadow-text-portfolio">
                        </div>
                        <p class="card-arte-text-portfolio">Arte</p>
                        <img src="{{asset('images/arte_card.png')}}" class="card-arte-portfolio-img img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mb-5 d-flex align-items-center justify-content-center" style="">
                <div class="card-arte-port-container" id="card-arte-port-container" onclick="window.location.href='{{route('Portfolio.subject', ['name' => 'videojuegos'])}}'">
                    <div class="card-videojuegos-portfolio" id="Card_rot">
                        <div class="card-vid-shadow-text-portfolio">
                        </div>
                        <p class="card-vid-text-portfolio">Videojuegos</p>
                        <img src="{{asset('images/vid_card_2.png')}}" class="card-videojuegos-portfolio-img img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mb-5 mt-4 d-flex align-items-center justify-content-center" style="">
                <div class="card-arte-port-container" id="card-arte-port-container" onclick="window.location.href='{{route('Portfolio.subject', ['name' => 'rv'])}}'">
                    <div class="card-rv-portfolio" id="Card_rot">
                        <div class="card-rv-shadow-text-portfolio">
                        </div>
                        <p class="card-rv-text-portfolio">Realidad <br>Virtual</p>
                        <img src="{{asset('images/rv_card.png')}}" class="card-rv-portfolio-img img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mb-5 mt-4 d-flex align-items-center justify-content-center" style="">
                <div class="card-arte-port-container" id="card-arte-port-container" onclick="window.location.href='{{route('Portfolio.subject', ['name' => 'programacion'])}}'">
                    <div class="card-progra-portfolio" id="Card_rot">
                        <div class="card-progra-shadow-text-portfolio">
                        </div>
                        <p class="card-progra-text-portfolio">Programación</p>
                        <img src="{{asset('images/progra_card.png')}}" class="card-progra-portfolio-img img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
            <p class="footer-card-text" >EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
            <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
        </div>

    </div>

<script>
/*
function Start3D(contenedor) {
    
    const elemento = contenedor.children[0]; // Supongo que solo tienes un hijo dentro del contenedor
    elemento.addEventListener('mouseenter', () => {
        contenedor.addEventListener('mousemove', (e) => {
            const ancho = contenedor.offsetWidth;
            const alto = contenedor.offsetHeight;
            const x = (e.clientX - contenedor.getBoundingClientRect().left) / ancho;
            const y = (e.clientY - contenedor.getBoundingClientRect().top) / alto;
            const rotacionX = (y - 0.5) * 30; // Ajusta el valor según tus necesidades
            const rotacionY = (x - 0.5) * 30; // Ajusta el valor según tus necesidades
            elemento.style.transform = `rotateX(${-rotacionX}deg) rotateY(${rotacionY}deg)`;
        });
    });

    const IMG = elemento.children[0];

   

        elemento.addEventListener('mouseleave', () => {
        // Restablece la rotación cuando el mouse sale del área
        IMG.style.mix-blend-mode = 'normal';
    });
}
    

    const contenedor = document.getElementById('card-arte-port-container');
    const elemento = contenedor.querySelector('.card-arte-portfolio');

    contenedor.addEventListener('mousemove', (e) => {
    const ancho = contenedor.offsetWidth;
    const alto = contenedor.offsetHeight;
    const x = (e.clientX - contenedor.getBoundingClientRect().left) / ancho;
    const y = (e.clientY - contenedor.getBoundingClientRect().top) / alto;

    // Calcula la rotación en función de la posición del mouse
    const rotacionX = (y - 0.5) * 40; // Ajusta el valor según tus necesidades
    const rotacionY = (x - 0.5) * 40; // Ajusta el valor según tus necesidades

    // Aplica la rotación al elemento
    elemento.style.transform = `rotateX(${-rotacionX}deg) rotateY(${rotacionY}deg)`;
    });

    contenedor.addEventListener('mouseleave', () => {
    // Restablece la rotación cuando el mouse sale del área
    elemento.style.transform = 'rotateX(0deg) rotateY(0deg)';
    });*/
</script>

@endsection
