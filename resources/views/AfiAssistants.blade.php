@extends('Templates/headerStruct')
@section('content')



@if(session()->has('status'))


    <script type="text/javascript">
        @if(session()->get('status') == "El registro fue exitoso")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#0de4fe',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })
        });
        @endif
        @if(session()->get('status') == "Matrícula no válida, deben ser 7 caracteres")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })
        });
        @endif
        @if(session()->get('status') == "Matrícula no válida, ingrese solo números")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })
        });
        @endif
        @if(session()->get('status') == "La matrícula ya fue registrada en esta conferencia")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 3000
            })
        });
        @endif
    </script>
    

    @php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    @endphp
    @endif

    <script>
        $(document).ready(function(){
            $('.checkbox-group').change(function(){
                if (!this.checked){
                    const confirmed = confirm('Por favor, confirme la revocación de asistencia');
                    if(!confirmed){
                        this.checked=true;
                    }
                }
            });
        });
    </script>

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminEvent.css')}}">

        <header class="header-index row justify-content-center mx-auto" id="header-index" style="">
            <div style="position: relative; width: 100%; height:70%;">
                <video autoplay loop muted  class="header-gif-expo img-fluid" id="video-header">
                    <source src="{{asset('images/expolmad.mp4')}}" type="video/mp4">
                    Tu navegador no admite el elemento de video.
                </video>
            </div>
            
            <div class="row mx-auto d-flex align-items-center" style="position: relative; top: -60%;">
              <div class="col-sm-3 col-lg-5 mb-1 text-center">
                    <img src="{{asset('images/LOGOEXPO2.png')}}" class="header-logo-lmad-expo img-fluid">
              </div>

              <div class="AfiAssistants-header col-sm-9 col-lg-3 mb-1 text-center">
              <h1 style="d-md-none; font-weight: bold;">Asistencias de AFI</h1>
                <!--<h1 style="font-size: 5em; font-weight: bold;">Registro de AFI</h1>-->
              </div>

        </header>

    <div class="BodyContainer col p-3 min-vh-100 w-50 backgroundImg tab-pan">

        <form id="AfiInfo" method=post action="{{route('AfiAssistants.store')}}" onsubmit="false">
            @csrf
            <div class="row align-items-center p-1">
                <div class="borderContainer col-11" style="margin-left: 50%; transform: translateX(-50%)">
                <div class="borderBody col-md-12 col-sm-12">
                    <div class="col my-3 text-center">
                        <p style="font-size: 15px;font-weight: bold"> Matrícula </p>
                        <input type="text" type="submit" class="form-control" name="asisAFImatr" placeholder="1234567" required>
                    </div>

                    <div class="col my-3 text-center">
                            <p style="font-size: 15px;font-weight: bold"> AFI </p>
                            <!-- select aquí -->
                            <select class="form-select my-4" style="font-size: 12px" id="selectConferenciaAsis" required>
                                <option value="1" class="form-select":focus style="font-size: 13px">Cada momento cuenta: introducción al diseño de experiencias</option> 
                                <option value="2" class="form-select":focus style="font-size: 13px">De la idea a la palabra fin</option>
                                <option value="3" class="form-select":focus style="font-size: 13px">Vivir de hacer cómics y no morir en el intento</option>
                                <option value="4" class="form-select":focus style="font-size: 13px">Caracterización de personajes</option>
                                <option value="5" class="form-select":focus style="font-size: 13px">El universo de Epic Games, ¡más completo que nunca!</option>
                                <option value="6" class="form-select":focus style="font-size: 13px">Creando un Cómic... y luchando contra el "no puedo"</option>
                                <option value="7" class="form-select":focus style="font-size: 13px">Los videojuegos como deporte</option>
                                <option value="8" class="form-select":focus style="font-size: 13px">Navegando entre fronteras: trabajar como animador 3D en el extranjero</option>
                                <option value="9" class="form-select":focus style="font-size: 13px">Anatomía de una Boss Fight</option>
                                <option value="10" class="form-select":focus style="font-size: 13px">Inteligencia Artificial generativa aplicada a la educación: recursos multimedia con IA</option>
                                <option value="11" class="form-select":focus style="font-size: 13px">Screenwriting to the stars</option>
                                <option value="12" class="form-select":focus style="font-size: 13px">Descubre el mundo del rigging desde cero hasta la animación</option>
                                <option value="13" class="form-select":focus style="font-size: 13px">El extraordinario mundo de la colorimetría y el círculo cromático</option>|
                            </select> 
                    </div>

                    <div class="col my-6 d-flex">
                        <button id="asisAFI" type="submit" class="col-md-4 col-sm-12 btn btn-primary my-4 mx-auto">Registrar</button>
                    </div>

                </div>
                </div>
            </div>

        </form>

        <form id="AfiInfo" method=post onsubmit="false"> 
            <table class="table" style="text-align-last:center;" id="AfiTable" name="AfiTable">
                <thead>
                    <tr>
                        <th>Asistencia</th>
                        <th>Matrícula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriculas1 as $chuck)
                        <tr>
                            <td><input type="checkbox" class="checkbox-group" name="checkAfi" id="checkAfi" value='1'></td>
                            <td>{{ $chuck }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

    </div>

    </link>
    </link>

    @endsection