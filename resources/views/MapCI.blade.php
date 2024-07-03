@extends('Templates/headerStruct')

@section('content')
    

        <header class="header-index row justify-content-center mx-auto" id="header-index" style="">
            <div style="position: relative; width: 100%; height:70%;">
                <video autoplay loop muted  class="header-gif-expo img-fluid" id="video-header">
                    <source src="{{asset('images/expolmad.mp4')}}" type="video/mp4">
                    Tu navegador no admite el elemento de video.
                </video>
            </div>
            <div class="row mx-auto  d-flex align-items-center"style="position: relative; top: -50%;">
              <div class="col-sm-3 mb-1 text-left" style="">
                    <img src="{{asset('images/LOGOEXPO2.png')}}" class="header-logo-lmad-expo img-fluid">
              </div>
              <div class="MapCI-header col-sm-9 mb-1 text-right">
                    <p>Mapa del Centro de Internacionalización</p>
              </div>
            </div>
        </header>

    <div class="BodyContainer">
    <div class="row" style="margin-top:50px">
        <div class="container vh-80 div-colorfull my-4 column-list-form col">
            <div class="container py-5">
                    <div class="d-flex justify-content-center my-4">
                        <div class="d-flex" style="flex-direction: column;">
                            <div class="MapCI-List">
                                <p>Áreas de exposición</p>
                            </div>
                            <div class="radio-button-event form-check-inline MapCI-List">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio1"
                                value="option1"
                                checked
                                onclick=studentCheck()
                                />
                                <label class="form-check-label" for="inlineRadio1">Programación</label>
                            </div>
                            <div class="radio-button-event form-check-inline MapCI-List">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="option2"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" for="inlineRadio2">Arte</label>
                            </div>
                            <div class="radio-button-event form-check-inline MapCI-List">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio3"
                                value="option3"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" for="inlineRadio3">Video</label>
                            </div>
                            <div class="radio-button-event form-check-inline MapCI-List">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio4"
                                value="option4"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" for="inlineRadio4">Realidad Virtual</label>
                            </div>
                        </div>
                    </div>
                    <div class="footer-card"  onclick="window.location.href = '{{route('expo.index')}}'">
                <p class="footer-card-text" >EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
            </div>
        </div>
            </div>
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