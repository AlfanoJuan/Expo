@extends('teacher.struct')

@section('Content')
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
                        $('#imgProjectsrc').attr('src', e.target.result).width(400).height(400);
                        $('#form-student').attr('onsubmit', true);
                        $('#regGuest').attr('disabled', false);
                    };
    
                    reader.readAsDataURL(input.files[0]);
                }
            });
            
            
            
        }
    </script>

<div class="col-sm p-3">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Registro de proyecto</h5>

            </div>

            <div class="" style="">
                <form class="my-4 form-student" id="form-student" action="{{route('RegisterTeam.store')}}" enctype="multipart/form-data"  method=post onsubmit="false">

                @csrf

                    <div class="mb-4 d-flex justify-content-center">
                        <img onclick="document.getElementById('imgProject').click();" name="imgProjectsrc" id="imgProjectsrc" src="https://placehold.co/400x400?text=Imagen+del+proyecto&amp;font=roboto" alt="example placeholder" style="object-fit: contain" width="400" height="400">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded" onclick="document.getElementById('imgProject').click();">
                            <label class="form-label text-white m-1" for="imgProject"><i class="bi bi-image-fill"></i></label>
                            <input accept="image/*" type="file" class="form-control d-none" name="imgProject" id="imgProject" onchange="readURL(this);" required="">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                            <input type="text" class="form-control" name="nameProject" id="nameProject" placeholder="Nombre del proyecto"  required>
                            <label for="nameProject">Nombre del proyecto</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                            <textarea class="form-control" name="descProject" id="descProject" placeholder="Nombre del proyecto" rows="4" cols="50" maxlength="500" required style="background-color: black; color: white;"></textarea>
                            <label for="nameProject">Descripcion del proyecto</label>
                        </div>
                    </div>

                    <!--div class="col-12 d-md-flex justify-content-center align-items-center">
                        <hr class="colorfull col-md-8 col-12 mt-4">
                    </div-->

                    <!--div class="d-flex justify-content-center flex-wrap m-t10"--->

                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                                <input type="text" class="form-control" name="videoProject" id="videoProject" placeholder="Vídeo promocional" required>
                                <label for="nameProject">Vídeo promocional</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                                <input type="text" class="form-control" name="DriveProject" id="DriveProject" placeholder="Enlace al proyecto (Drive, github, dropbox...)">
                                <label for="nameProject">Enlace al proyecto (Drive, github, dropbox...)</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                                <input type="text" class="form-control" name="codeProject" id="codeProject" placeholder="Código de Autorización" required>
                                <label for="nameProject">Código de Autorización</label>
                            </div>
                        </div>

                    <!--/div-->

                    <div class="mt-3" id="dynamicInputs">


                        <!--INPUTS DINAMICOS-->

                    </div>

                    <!--                       key      |      password         -->
                    <!-- User Student ->    matrícula   | apellidos_matrícula   -->

                    <div class="col-12 my-2" style="text-align:center;">
                        <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary" disabled=true>Registrar proyecto</button>
                    </div>

                    <div id="duplicatedAlert" class="col-12 my-2" style="text-align:center;" hidden>
                        <h5 style="color: #39f6e4; text-shadow:0px 0px 20px grey; font-weight:normal;"> Comprueba que no se repitan matrículas </h5>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>

    <script>
        function cambiaMayuscula (){
            $("#name0").val($("#name0").val().toUpperCase());
        }
    </script>
@endsection
