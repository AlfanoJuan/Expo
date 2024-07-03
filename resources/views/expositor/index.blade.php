@extends('Templates/headerStruct')

@section('content')
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Alumno registrado")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->get('status') == "Expo añadida al alumno")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->get('status') == "Alumno previamente registrado")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'info',
                iconColor:'#0de4fe',
                title: `{{ session()->get('status') }}`,
                html: `Correo: {{ session()->get('correo') }} <br><br>
                Contraseña: {{session()->get('contraseña')}}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @endif

        @if(session()->has('msg'))
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'red',
                title: `{{ session()->get('status') }}`,
                html: `{{ session()->get('msg') }}`,
                showConfirmButton: false,
                timer: 2500
            })

        });
        @else
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'red',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
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

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="col-sm-auto bg-dark sticky-top nav flex-column">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                <a href="/" class="d-block py-3 px-1 link-dark text-decoration-none nav-item" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center ">
                    <li class="nav-item">
                        <a href="{{ route('RegisterTeam.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="iconNav">
                                <img src="{{ asset('images/up_proj.png') }}" alt="Inicio Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Registro de Proyecto</p>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('expositorQR.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/qr.png') }}" alt="Eventos Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">QR</p>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
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

<div style="width: 100%;">
    <header class="header-proyecto">
        <center><p class="title-expositor">Código QR</p></center>
    </header>

    <div class="body-container-expositor">
        <div class="row justify-content-center " style="width: 100%;">
            <div class="col-sm-4 mb-3 justify-content-center" style="">
                <div class="qr-div">
                    
                    <p class="qr-info-text" align="center">El QR será escaneado durante la EXPO LMAD</p>
                    <!--qr--->
                    <div class="container"  style="display: flex; justify-content:center; width:50%; margin-bottom: 17px">
                        <div id="qrcode-2" style="padding: 15px; background: linear-gradient(to bottom,  #0de5ff 0%,#9564ff 50%,#c43afe 100%);"></div>
                            <img class="logo-img" src="{{ asset('images/LOGO.png') }}" style="
                            background: black;
                            position: absolute;
                            height: 17%;
                            margin: auto;
                            transform: translate(0%, 183%);
                            padding: 5px;">
                    </div>
                    <center><button class="btn-expositor"  onClick="window.location.reload();"><img class="logo-img" src="{{ asset('images/actualizar1.png') }}"></button></center>
                    

                </div>
            </div>
            <div class="col-sm-7">
                <div class="card-inputs borderContainer" style="margin-bottom: 70px;">
                    <div class="borderBody">
                        <div class="row justify-content-center" style="margin-bottom: 40px;">
                            <div class="col-sm-7 mb-2 d-inline-block text-truncate" style="">
                                <p class="title-expositor-input">Nombre</p>
                                <p class="data-expositor-input">{{$student->getFullName()}}</p>
                            </div>
                            <div class="col-sm-2 mb-1" style="">
                                <p class="title-expositor-input" align="center">Matrícula</p>
                                <p class="data-expositor-input" align="center">{{$student->enrollment}}</p>
                            </div>
                            <div class="col-sm-2" style="">
                                <p class="title-expositor-input" align="center">Asistió</p>
                                @foreach ($projects as $projectStudent)
                                    <center>       
                                        <div class="checkbox-expositor " id="attendance" name="attendance" @if($projectStudent->attended == 1) style="background-color: #E522BC; " @endif></div>
                                    </center>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-inputs borderContainer">
                    <div class="borderBody">
                        <div class="row justify-content-center" style="margin-bottom: 40px;">
                            <p class="title-exposiciones" align="center">EXPOSICIONES DEL ALUMNO</p>
                            @if(count($projects) > 0)
                                <div class="col-sm-5 d-inline-block text-truncate" style="">
                                    <p class="title-expositor-input">Proyecto</p>
                                    @foreach ($projects as $projectStudent)
                                        <p class="data-expositor-input">{{$projectStudent->project()->first()->nameProject}}</p>
                                    @endforeach
                                </div>
                                <div class="col-sm-5 d-inline-block text-truncate" style="">
                                    <p class="title-expositor-input">Materia</p>
                                    @foreach ($projects as $projectStudent)
                                        <p class="data-expositor-input ">{{$projectStudent->project()->first()->subject}}</p>
                                    @endforeach
                                </div>
                                <input type="text" disabled class="line-expositor">
                            @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

    <div class="footer-card " style="left: 54%;" onclick="window.location.href = '{{route('expo.index')}}'">
        <p class="footer-card-text">EXPO LMAD <i>EXPANDIENDO LA REALIDAD</i></p>
        <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
    </div>

<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode-2"), {
        text: '{{$student->enrollment}}',
        padding: 4,
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    var qrcode = new QRCode(document.getElementById("qrcode-3"), {
        text: '{{$student->enrollment}}',
        padding: 4,
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>


@endsection
