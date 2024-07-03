@extends('Templates/headerStruct')

@section('content')

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Registro de proyecto exitoso")
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

        @if(session()->get('status') == "Hubo un problema en el registro")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "Código de autorización invalido")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "La imagen no tiene las características permitidas")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "No se permiten más de 500 caracteres en la descripción")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "No se ingreso un link de video valido")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 1500
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
        function readURL(input) {
            validarImagen().then((value) => {
                if (input.files && input.files[0] && value) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        $('#imgProjectsrc').attr('src', e.target.result).width(260).height(260);
                        $('#form-student').attr('onsubmit', true);
                        $('#regGuest').attr('disabled', false);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }
    </script>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@if (session()->has('id') && session()->has('rol') == 'expositor')
    

    <div class="col-sm-auto bg-dark sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                <a href="/" class="d-block py-3 px-1 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    <li>
                        <a href="{{ route('RegisterTeam.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="iconNav">
                                <img src="{{ asset('images/up_proj.png') }}" alt="Inicio Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Registro de Proyecto</p>
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expositorQR.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/qr.png') }}" alt="Eventos Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">QR</p>
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
@endif

<div style="width: 100%;">
    <header class="header-proyecto">
        <center><p class="title-register-team">Registro del proyecto</p></center>
    </header>

    <div class="body-container-reg-proyecto" style="">
        
        <form id="form-student" action="{{route('RegisterTeam.store')}}" enctype="multipart/form-data"  method=post onsubmit="false" style="min-height: 100%;">
        @csrf
            <div class="row justify-content-center  mx-auto" style="width: 100%;">
            
                <div class="col-sm-7 mb-4" style="">

                    <div class="card-inputs borderContainer" style="">
                        <div class="borderBody">
                            <label class="label-reg-proyecto">Nombre del proyecto:</label><br>
                            <center><input type="text" class="input-reg-proyecto"  name="nameProject" id="nameProject" required><br></center>

                            <label class="label-reg-proyecto">Descripción del proyecto:</label><br>
                            <center><textarea class="input-reg-proyecto-area" name="descProject" id="descProject" required></textarea><br></center>
                            
                            <label class="label-reg-proyecto">Enlace a video promocional:</label><br>
                            <center><input type="text" class="input-reg-proyecto" name="videoProject" id="videoProject" required><br></center>
                            
                            <label class="label-reg-proyecto">Enlace a proyecto (opcional):</label><br>
                            <center><input type="text" class="input-reg-proyecto" placeholder="drive, github, dropbox..." name="DriveProject" id="DriveProject" required><br></center>
                            
                            <label class="label-reg-proyecto">Código de autorización:</label><br>
                            <center><input type="text" class="input-reg-proyecto" name="codeProject" id="codeProject" required><br></center>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="card-inputs borderContainer">
                        <div class="borderBody">
                            <center>
                                <p class="text-img-title-reg">Foto del proyecto:</p><br>
                                <img src="{{asset('images/img-reg-proj.png')}}" alt="Imagen ingrese su proyecto" class="img-reg-proj img-fluid" onclick="document.getElementById('imgProject').click();" name="imgProjectsrc" id="imgProjectsrc"><br>
                                <label for="imgProject" class="label-file"><img src="{{asset('images/subir_1.png')}}"></label>
                                <input type="file" class="file-img-proyectoc"  accept="image/*" name="imgProject" id="imgProject" onchange="readURL(this);">
                                <p class="text-img-reg">El tamaño máximo para la foto es de 1024x1024</p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 d-flex align-items-center justify-content-center">
                    <button id="regGuest" type="submit" class="btn_regProj">Registrar proyecto</button>
                </div>
            </div>

        </form>
        <div class="footer-card" onclick="window.location.href = '{{route('expo.index')}}'" @if (session()->has('id') && session()->has('rol') == 'expositor') style="left: 54%;" @endif>
            <p class="footer-card-text">EXPO LMAD <i>EXPANDIENDO LA REALIDAD</p>
            <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
     </div>

       
    </div>

    <!--div class="footer-card-networking">
            <center>
                <p class="footer-card-text-networking-title" onclick="window.location.href='https://networking.sistemaregistrofcfm.com'">REGISTRO EN NETWORKING</p><br>
                <p class="footer-card-text-networking">Al registrarse usted acepta oficialmente que su información personal será de visualización pública</p>
            </center>
    </div--->
     

</div>

       

@endsection
