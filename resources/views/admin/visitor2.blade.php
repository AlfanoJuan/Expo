<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>EXPO LMAD 2023</title>
    <link rel="icon" href="{{asset('images/ICON.png')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/staffEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceEvent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staffAttendanceExpositor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="{{ asset('js/staffAttendanceEvent.js') }}"></script>
    <script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">


    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>


</head>
<body style="background-image: url('../images/backgroundimg.png');  background-repeat: no-repeat; background-size: cover; background-position:center; background-attachment: fixed;">

@extends('staff.struct')

@section('Content')

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Asistencia registrada")
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

        @if(session()->get('status') == "Hubo un problema en la asistencia" || session()->get('status') == "La persona ya asistió")
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

        @if(session()->get('status') == "La persona ya asistió")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'info',
                iconColor:'#0de4fe',
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

<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Registro de visitante</h5>
            <div class="container vh-80">

                <div class="container py-5">

                    <div class="d-flex justify-content-center my-4">
                        <div>
                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio1"
                                value="option1"
                                checked
                                onclick=studentCheck()
                                />
                                <label class="form-check-label" for="inlineRadio1">Alumno</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="option2"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" for="inlineRadio2">Externo</label>
                            </div>
                        </div>
                    </div>


                    <form class="my-4 form-student" id="studentEventAttendance" method="put" action="{{route('adminRegistroVisitor.create')}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enrollmentStudentEvent" name="enrollmentStudentEvent" placeholder="Matricula" required>
                                    <label for="enrollmentStudentEvent">Matricula</label>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fullNameStudentEvent" name="fullNameStudentEvent" placeholder="Nombre completo" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <label for="fullNameStudentEvent">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                        </div>
                    </form>

                    <form class="my-4 form-external" id="externalPeopleEventAttendance" method="put" action="{{route('adminRegistroVisitor.create')}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <select class="form-select" id="genre" name="genre">
                                        <option value="Female">Femenino</option>
                                        <option value="Male">Masculino</option>
                                        <option value="They">No binario</option>
                                    </select>
                                    <label for="genre">Género</label>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="regEventExternal" id="regEventExternal"  onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre completo" required>
                                    <label for="regEventExternal">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary col-md-6">Registrar entrada</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection

    
</body>
</html>
