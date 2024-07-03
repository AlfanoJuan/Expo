@extends('Templates/headerStruct')
@section('content')
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
<p class="header-title" style="margin-bottom:20px; margin-top:20px">REGISTRO DE ENTRADA A EVENTO</p> 
    <div class="container-fluid">
    <div class="row" style="margin-top:50px">
        <div class="container vh-80 div-colorfull my-4 column-list-form col">
            <div class="container py-5">
                    <div class="d-flex justify-content-center my-4">
                        <div>
                            <div class="radio-button-event form-check-inline">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio1"
                                value="option1"
                                checked
                                onclick=studentCheck()
                                />
                                <label class="form-check-label" style="font-family: Kodchasan; color:white;" for="inlineRadio1">Alumno</label>
                            </div>
                            <div class="radio-button-event form-check-inline">
                                <input
                                class="radio-button-event-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="option2"
                                onclick=externalCheck()
                                />
                                <label class="form-check-label" style="font-family: Kodchasan; color:white;" for="inlineRadio2">Externo</label>
                            </div>
                        </div>
                    </div>
                    <form class="my-4 form-student" id="studentEventAttendance" method="post" action="{{route('staffEvento.update', [$events->id ])}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5 border ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enrollmentStudentEvent" name="enrollmentStudentEvent" placeholder="Matricula" required>
                                    <label style="font-family: Kodchasan;color:white;" for="enrollmentStudentEvent">Matricula</label>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5 border ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fullNameStudentEvent" name="fullNameStudentEvent" placeholder="Nombre completo" onkeyup="this.value = this.value.toUpperCase()" required>
                                    <label style="font-family: Kodchasan;color:white;" for="fullNameStudentEvent">Nombre completo</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" style="font-family: Kodchasan;color:white;" class="btn btn-event col-md-6">Registrar entrada</button>
                        </div>
                    </form>
                    <form class="my-4 form-external d-none" id="externalPeopleEventAttendance" method="post" action="{{route('staffEvento.update', [$events->id ])}}">
                        @method('put')
                        @csrf
                        <div class="d-md-flex justify-content-center align-items-center">
                            <div class="col-md-3 col-lg-3 col-xl-2 my-2 mx-3 mx-xl-5 border">
                                <div class="form-floating">
                                    <select class="form-select" id="genre" name="genre" style="font-family: Kodchasan;">
                                        <option  style="background-color: black"  value="Female">Femenino</option>
                                        <option  style="background-color: black"  value="Male">Masculino</option>
                                        <option  style="background-color: black"  value="They">No binario</option>
                                    </select>
                                    <label style="font-family: Kodchasan;color:white;" for="genre">Género</label>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5 border">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="regEventExternal" id="regEventExternal"  onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre completo" required>
                                    <label style="font-family: Kodchasan;color:white;" for="regEventExternal">Nombre completo</label> 
                                </div>
                            </div>
                        </div>
                   
                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-event col-md-6">Registrar entrada</button>
                        </div>
                    </form>
                    <div class="footer-card">
                <p class="footer-card-text">EXPO LMAD 10-Junio-2023</p>
                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
            </div>
        </div>
            </div>
        <div class="container vh-80 div-colorfull my-4 column-list col" style="margin-left:30px;margin-right:30px">
            <div class="form-floating"> 
                    <p class="text-event">Evento:</p>
                    <p class="title-event">{{$events->eventName}}</p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
