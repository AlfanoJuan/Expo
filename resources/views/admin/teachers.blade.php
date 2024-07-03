@extends('admin.struct')

@section('Content')
@if(session()->has('status'))

        <script type="text/javascript">
            @if(session()->get('status') == "Maestro registrado")
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
        </script>

    @php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    @endphp
@endif

@if(session()->has('update'))

    <script type="text/javascript">
        @if(session()->get('update') == "Edición en maestro exitosa")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                iconColor: '#0de4fe',
                title: `{{ session()->get('update') }}`,
                showConfirmButton: false,
                timer: 1500
            })

        });
        @endif

        @if(session()->get('update') == "Hubo un error, intente de nuevo")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor:'#a70202',
                title: `{{ session()->get('update') }}`,
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

@if(session()->has('delete'))

    <script type="text/javascript">

    @if(session()->get('delete') == "Hubo un error, intente de nuevo")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor:'#a70202',
            title: `{{ session()->get('delete') }}`,
            showConfirmButton: false,
            timer: 1500
        })

    });
    @else
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            iconColor: '#0de4fe',
            title: `{{ session()->get('delete') }}`,
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

@if(session()->has('email'))

    <script type="text/javascript">

    @if(session()->get('email') == "Hubo un problema en el envio del correo")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor:'#a70202',
            title: `{{ session()->get('email') }}`,
            showConfirmButton: false,
            timer: 1500
        })

    });
    @else
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            iconColor: '#0de4fe',
            title: `{{ session()->get('email') }}`,
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

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/adminEvent.css') }}">


<script>

    function confirmDialog(triggerBtnId) {
        Swal.fire({
            title: '¿Confirmar cambios?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(triggerBtnId).click();
            }
        })
    }

</script>

<!-- --------------- -->
<!-- ADMIN MAESTROS  -->
<div class="col p-3 min-vh-100 w-50 backgroundImg tab-pane">
    <div class="container-fluid">
        <div class="row">
            <div class="tab-pane fade show" id="register-teacher" aria-labelledby="register-teacher-tab">

                <form class="row align-items-center p-5" id="registroMaestro" action="{{route('adminRegistroMaestros.store')}}" method="post">
                @csrf
                    <h1 style="text-align: center;"> Maestros </h1>

                    <div class="borderContainer col-10" style="margin-left: 50%; transform: translateX(-50%);">
                        <div class="borderBody col-12">
                            <div class="col-md-3"></div>
                                <div class="col-md-12 col-sm-12 my-5">
                                    <div class="border col-12 form-floating">
                                        <input type="text" class="form-control" name="regTeacherName"  id="regTeacherName" placeholder="Nombre del Maestro" required>
                                        
                                    </div>
                                </div>
                            <div class="col-md-3"></div>
        
                            <div class="col-md-3"></div>
        
                            <div class="col-md-12 col-sm-12 mt-3">
                                <div class="border col-12  form-floating">
                                    <input type="email" class="form-control" name="regTeacherCorreo" id="regTeacherCorreo" placeholder="Correo del Maestro" required>
                                    
                                </div>
                            </div>
        
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="col-12 my-5" style="text-align:center;">
                        <button id="regTeacher" type="submit" class="col-md-4 col-sm-12 btn btn-primary">REGISTRAR</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="carouselContainer col-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner d-flex justify-content-start align-items-center">
                
                <!-- Pantallas grandes -->
                <div class="carousel-item active d-none d-md-block">
                    @foreach ($teachers->chunk(1) as $chunk)
                        <div class="carouselExampleControls carousel-item @if($loop->first) active @endif">
                            <div class="row gapCarousel">
                            @foreach($chunk as $teacher)
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-4 row justify-content-between eventCard"> <!--col-lg-6 mb-4 row justify-content-between--> 
                                <img src="{{asset('images/eventCardBorder.png')}}" width="300" height="300"  alt="{{$teacher->fullName}} image" >
                                <!-- Contenido del evento -->
                                <h5>{{$teacher->fullName}}</h5>
                                <div class="eventInfo">
                                    <b>Correo:</b>
                                    
                                    <span>{{$teacher->email}}</span>
                                    
                                    <span>Usuario: {{$teacher->user()->first()->key}}</span>
                                    
                                    
                                </div>
                                <a href="{{ route('editarMaestro', $teacher->id) }}" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                <form action="{{route('adminRegistroMaestros.destroy', [$teacher->id])}}" method="POST" hidden>
                                @method('DELETE')
                                @csrf
                                    <button id="deleteTeacher_{{$teacher->id}}" type="submit"> DESTROY </button>
                                </form>
    
                                <a onclick="confirmDialog(`deleteTeacher_{{$teacher->id}}`)" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                    @if(count($teachers) == 0)
                        <h6 style="text-align: center;"> No hay maestros registrados </h6>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                </button>
            </div>
        </div>


        
    </div>
</div>
<!-- ADMIN MAESTROS  CORREGIDO-->
<!-- --------------- -->


@endsection
