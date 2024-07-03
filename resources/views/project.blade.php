@extends('Templates/headerStruct')

@section('content')
    
    <!--style>
    .a-box {
        position: relative;
        display: inline-block;
        text-align: center;
        margin: 0 auto;
        width: 500px;
        max-width: 100%;
        min-height: 500px;
    }

    .img-container {
        position: relative;
        height: 200px;
        width: 200px;
        overflow: hidden;
        border-radius: 0px 0px 20px 20px;
        display: inline-block;
    }

    .img-container img {
        transform: skew(0deg, -10deg);
        height: 250px;
        margin: -25px 0px 0px -50px;
    }

    .inner-skew {
        display: inline-block;
        border-radius: 20px;
        overflow: hidden;
        padding: 0px;
        transform: skew(0deg, 13deg);
        font-size: 0px;
        margin: 30px 0px 0px 0px;
        background-color: #000000;
        border-width: 0px 0px 3px 0px;
        border-color: #0de4fe;
        height: 250px;
        width: 200px;
    }

    .text-container {
        border-radius: 20px;
        background-color: #000000;
        border-width: 0px 0px 3px 0px;
        border-color: #0de4fe;
        padding: 120px 20px 20px 20px;
        margin: -120px 0px 0px 0px;
        font-size: 14px;
    }

    .text-container h3 {
        margin: 20px 0px 10px 0px;
        color: snow;
        font-size: 19px;
    }
    </style--->
   
    <script>
        if(`{{ session()->get('userStatus') }}` == "Contraseña o clave incorrecta") {
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    iconColor:'#a70202',
                    title: `{{ session()->get('userStatus') }}`,
                    showConfirmButton: false,
                    timer: 1500
                })

            });
        }
    </script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="" style="width: 100%; min-height: auto;">

        <div style="display: flex">
            <div>                
                <div>
                    <img src="{{asset('images/LMAD_BLOOM.png')}}" class="img-proj-lmad"  onclick="window.location.href = '{{ url('/') }}'">
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
            </div>
           
        </div>
        
       <!--  <div class="row mx-auto mb-3  d-flex align-items-center justify-content-center" style="width: 100%; height: 10%;">
            Div de la imagen (siempre a la izquierda)
            <div class="col-sm-1 mb-5 d-flex align-items-center justify-content-center" style="" id="img-lmad">
                <img src="{{asset('images/LMAD_BLOOM.png')}}" class="img-proj-lmad"  onclick="window.location.href = '{{ url('/') }}'">
            </div>

             Div de espacio (puede ajustarse según sea necesario)
            <div class="col-sm-3"></div>

            Div de los botones (siempre a la derecha)
            <div class="col-sm-8 mb-1 d-flex align-items-center justify-content-end" style="">
                <div class="row align-items-center">

                 <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" id="arrowShow" onclick="showButtons()" alt="" class="arrow-header notDisplay"/>

                    <div class="col-sm-2 mb-2  text-center" style="">
                        <button class="header-btn-eventMap notDisplay" id="mapButton"  onclick="">Mapa del Evento</button>
                    </div>
                    <div class="col-sm-2 text-center" style="">
                        <button class="header-btn-assistance notDisplay" id="assistanceButton" onclick="">Asistencia</button>
                    </div> 

                    <div class="col-sm-5 text-center">
                        <button class="header-btn-portfolio" onclick="window.location.href = '{{route('Portfolio.index')}}'">Portafolio</button>
                    </div>
                    <div class="col-sm-5 text-center">
                        <button class="header-btn-Login" onclick="window.location.href = '{{route('inicioSesion.index')}}'">Iniciar Sesión</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row justify-content-center align-items-center mx-auto" style="width: 100%; height:35%; position: relative;">
            
            <video autoplay loop muted class="header-gif-expo-proj img-fluid" id="" style="position: absolute; width: 100%; height: 100%; object-fit: cover;">
                <source src="{{asset('images/expolmad.mp4')}}" type="video/mp4" class="header-gif-expo-proj img-fluid">
                Tu navegador no admite el elemento de video.
            </video>

            <div class="text-center" style="position: relative; z-index: 1; margin-bottom: 35px;">
                <p class="title-expositor fs-1" style="text-transform: uppercase;">{{$projectdata[0]->subject}}</p>
                <input type="text" disabled class="hr-gradient-proj">
                <p class="title-name-project fs-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="39" viewBox="0 0 19 39" fill="none">
                <g filter="url(#filter0_d_769_705)">
                    <path d="M14.5 5H5V34H14.5" stroke="#368BE6" stroke-width="2"/>
                </g>
                <defs>
                    <filter id="filter0_d_769_705" x="0" y="0" width="18.5" height="39" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.211765 0 0 0 0 0.545098 0 0 0 0 0.901961 0 0 0 1 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_769_705"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_769_705" result="shape"/>
                    </filter>
                </defs>
                </svg>
                    {{$projectdata[0]->nameProject}}
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="39" viewBox="0 0 19 39" fill="none">
                <g filter="url(#filter0_d_769_706)">
                    <path d="M4 34H13.5L13.5 5H4" stroke="#368BE6" stroke-width="2"/>
                </g>
                <defs>
                    <filter id="filter0_d_769_706" x="0" y="0" width="18.5" height="39" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.211765 0 0 0 0 0.545098 0 0 0 0 0.901961 0 0 0 1 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_769_706"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_769_706" result="shape"/>
                    </filter>
                </defs>
                </svg>
                </p>
            </div>
        </div>

        <div class="row justify-content-center mx-auto mt-5 mb-5 mx-n5" style=" width: 100%;">
            
            <div class="col-sm-4 d-flex align-items-center justify-content-center mx-auto mb-4" style="">
                <div class="card-inputs borderContainer" style="width: 100%">
                    <div class="borderBody">
                        <center>
                            <img src="{{ asset('storage/eventImages/'.$projectdata[0]->imagen_url) }}" alt="Img-proyecto" class="img-proj">
                        </center>
                        <p class="desc-proj fs-3" style="">{{$projectdata[0]->description}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-7 d-flex align-items-center justify-content-center" style="">
                @php
                    $youtube_embed_link = str_replace('watch?v=', 'embed/', $projectdata[0]->video_url);
                @endphp
                <iframe src="{{$youtube_embed_link}}" class="video-project img-fluid" frameborder="0" allow="accelerometer; autoplay=true; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay=true>
                </iframe>
            </div>
        </div>

        <div class="row justify-content-center mx-auto mt-5" style=" width: 100%">
            <p class="team-tittle-proj fs-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="39" viewBox="0 0 19 39" fill="none">
                <g filter="url(#filter0_d_769_720)">
                    <path d="M14.5 5H5V34H14.5" stroke="#E522BC" stroke-width="2"/>
                </g>
                <defs>
                    <filter id="filter0_d_769_720" x="0" y="0" width="18.5" height="39" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.898039 0 0 0 0 0.133333 0 0 0 0 0.737255 0 0 0 1 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_769_720"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_769_720" result="shape"/>
                    </filter>
                </defs>
                </svg>

                Equipo

                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="39" viewBox="0 0 19 39" fill="none">
                <g filter="url(#filter0_d_769_721)">
                    <path d="M4.5 34H14L14 5H4.5" stroke="#E522BC" stroke-width="2"/>
                </g>
                <defs>
                    <filter id="filter0_d_769_721" x="0.5" y="0" width="18.5" height="39" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.898039 0 0 0 0 0.133333 0 0 0 0 0.737255 0 0 0 1 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_769_721"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_769_721" result="shape"/>
                    </filter>
                </defs>
                </svg>
            </p>
                @for ($i = 0; $i < count($studentsdata); $i++)
                    <p class="team-members-proj fs-3" style="">{{$studentsdata[$i]->fullName}} {{$studentsdata[$i]->enrollment}}</p>
                @endfor
        </div>

        <div class="row mx-auto mt-5 mb-5 pb-5" style="width: 100%">
            <div class="col-sm-1 mb-5 pb-5">
            </div>
            <div class="col-sm-1 mb-5 pb-5">
            </div>
            <div class="col-sm-1 mb-5 pb-5">
            </div>
        </div>

        <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
            <p class="footer-card-text" >EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
            <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
        </div>
    </div>

    
    
@endsection