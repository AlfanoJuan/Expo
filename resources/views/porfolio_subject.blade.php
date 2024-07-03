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



<div class="portfolio-body" id="portfolio-body">

    <div class="title-portfolio">
        <p class="porfolio-text">{{$title}}</p>
        <!--hr class="hr-gradient" /-->
        <center><input type="text" disabled class="hr-gradient"></center>
    </div>

    @php
        $style_card = "";
        $style_card_text = "";
        $style_card_text_shadow = "";
        $style_card_img = "";
        switch ($title) {
            case 'Programación':
                $style_card = "card-progra-portfolio";
                $style_card_text = "card-progra-text-portfolio";
                $style_card_text_shadow = "card-progra-shadow-text-portfolio";
                $style_card_img = "card-progra-portfolio-img img-fluid";
                break;
            case 'Arte':
                $style_card = "card-arte-portfolio";
                $style_card_text = "card-arte-text-portfolio";
                $style_card_text_shadow = "card-arte-shadow-text-portfolio";
                $style_card_img = "card-arte-portfolio-img img-fluid";
                break;
            case 'Realidad virtual':
                $style_card = "card-rv-portfolio";
                $style_card_text = "card-rv-text-portfolio";
                $style_card_text_shadow = "card-rv-shadow-text-portfolio";
                $style_card_img = "card-rv-portfolio-img img-fluid";
                break;
            case 'Videojuegos':
                $style_card = "card-videojuegos-portfolio";
                $style_card_text = "card-vid-text-portfolio";
                $style_card_text_shadow = "card-vid-shadow-text-portfolio";
                $style_card_img = "card-videojuegos-portfolio-img img-fluid";
                break;
        }
       
    @endphp

<div class="row justify-content-center mx-auto" style="width: 100%;">
    @if ($projectdataFinal != null)
        @for ($i = 0; $i < count($projectdataFinal); $i++)
            <div class="col-sm-5 mb-5 d-flex align-items-center justify-content-center" style="">  
                <div class="card-subject-port-container" onclick="window.location.href='{{ route('Portfolio.show', ['Portfolio' => $projectdataFinal[$i]->id]) }}'">
                    <div class="{{$style_card}}"  >
                        <div class="{{$style_card_text_shadow}}">
                        </div>
                        <p class="{{$style_card_text}}" style=" ">{{$projectdataFinal[$i]->nameProject}}</p>
                        <img src="{{asset('storage/eventImages/'.$projectdataFinal[$i]->imagen_url)}}" class="{{$style_card_img}}" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);">
                    </div>
                </div>
            </div>
        @endfor
    @endif
</div>

            <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
                <p class="footer-card-text" >EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
            </div>

</div>

     <!--script>
        const image = document.querySelector('.card-proyect-portfolio');
        const shadowBox = document.querySelector('.card-subject-portfolio');
        const shadowText = document.querySelector('.card-proyect-portfolio-text');

        image.onload = function () {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = image.width;
            canvas.height = image.height;
            context.drawImage(image, 0, 0, canvas.width, canvas.height);

            const imageData = context.getImageData(0, 0, canvas.width, canvas.height).data;

            let maxColor = 0;
            for (let i = 0; i < imageData.length; i += 4) {
                const brightness = (imageData[i] + imageData[i + 1] + imageData[i + 2]) / 3;
                maxColor = Math.max(maxColor, brightness);
            }

            const shadowColor = `rgba(${maxColor}, ${maxColor}, ${maxColor}, 0.5)`;
            shadowBox.style.boxShadow = `0 0 20px ${shadowColor}`;
            shadowText.style.boxShadow = `0 0 20px ${shadowColor}`;
            shadowText.style.color = `0 0 20px ${shadowColor}`;
        };
    </script--->

    
@endsection