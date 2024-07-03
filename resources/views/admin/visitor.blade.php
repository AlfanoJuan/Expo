@extends('Templates/headerStruct')

@section('content')

<script src="{{ asset('js/staffAttendanceEvent.js') }}"></script>
<script src="{{ asset('js/staffAttendanceCompany.js') }}"></script>

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Registro exitoso")
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

        @if(session()->get('status') == "Hubo un problema. Verifique los datos" || session()->get('status') == "La persona ya asistió")
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

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        <div class="col-sm-auto bg-dark sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                <a href="/" class="d-block py-3 px-1 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    
                    <li>
                        <a href="{{ route('adminInicio.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavHome.png') }}" alt="Inicio Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Inicio</p>
                            </i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('staffEvento.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavCalendar.png') }}" alt="Eventos Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Evento</p>
                            </i>
                        </a>
                    </li>

                    <li>
                        <a href="./adminVisitorExpo" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavVist.png') }}" alt="Visitantes Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Visitantes</p>
                            </i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('staffEmpresa.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavEmpresas.png') }}" alt="Empresas Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Empresas</p>
                            </i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('staffExpositor.index')}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/NavExpositor.png') }}" alt="Expositor Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Expositor</p>
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


    <div style="width: 100%;" class="body-container-div">
        <header class="header-proyecto">
            <center><p class="title-expositor">VISITANTES</p></center>
        </header>

        <div class="body-container-expositor">
            <div class="row justify-content-center mx-auto" style="width: 100%;">
                <div class="col-sm-7 justify-content-center d-flex align-items-center" style="">
                    <div class="row justify-content-center mx-auto" style="width: 100%; gap:20px">
                        <div class="col-sm-4 justify-content-center d-flex align-items-center" style="">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" class="radio-input-proyecto" value="option1" checked onclick=studentCheck()><label  for="inlineRadio1"></label>
                            <span class="radio-reg-proyecto" style="">Alumno</span>
                        </div>
                        <div class="col-sm-5 justify-content-center d-flex align-items-center" style="">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" class="radio-input-proyecto" value="option2" onclick=externalCheck()><label for="inlineRadio2"></label>
                            <span class="radio-reg-proyecto">Externo</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7" style="">
                    <!---Form Alumno ---->
                    <form class="my-4 form-student" id="studentEventAttendance" method="put" action="{{route('adminRegistroVisitor.create')}}">
                        @method('put')
                        @csrf
                        <div class="card-inputs borderContainer" style="">
                            <div class="borderBody">
                                <label class="label-reg-proyecto">Matrícula:</label><br>
                                <center><input type="text" class="input-reg-proyecto"  name="enrollmentStudentEvent" id="enrollmentStudentEvent" placeholder="Matrícula" required><br></center>
                                <label class="label-reg-proyecto">Nombre Completo:</label><br>
                                <center><input type="text" class="input-reg-proyecto"  name="fullNameStudentEvent" id="fullNameStudentEvent" required onkeyup="this.value = this.value.toUpperCase()" placeholder="Nombre completo"><br></center>
                            </div>
                        </div>
                        <center><button id="regGuest" type="submit" class="btn_regProj">Registrar entrada</button></center>
                    </form>
                    
                    <!---Form Externo ---->
                    <form class="my-4 form-external" id="externalPeopleEventAttendance" method="put" action="{{route('adminRegistroVisitor.create')}}" style="display: none;">
                        @method('put')
                        @csrf
                        <div class="card-inputs borderContainer" style="">
                            <div class="borderBody">
                                <label class="label-reg-proyecto" for="genre">Género:</label><br>
                                <center>
                                <select class="input-reg-proyecto" id="genre" name="genre">
                                    <option value="Female" style="text-align: center;">Femenino</option>
                                    <option value="Male" style="text-align: center;">Masculino</option>
                                    <option value="They" style="text-align: center;">No binario</option>
                                </select><br>
                                </center>
                                <label class="label-reg-proyecto">Nombre Completo:</label><br>
                                <center><input type="text" class="input-reg-proyecto"  name="regEventExternal" id="regEventExternal" placeholder="Nombre completo" onkeyup="this.value = this.value.toUpperCase()" required><br></center>
                            </div>
                        </div>
                        <center><button id="regGuest" type="submit" class="btn_regProj">Registrar entrada</button></center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- <div class="footer-card " style="left: 53%;">
        <p class="footer-card-text">Networking</p>
        <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
    </div> -->
@endsection