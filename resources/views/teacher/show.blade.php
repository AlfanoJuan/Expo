@extends('Templates/headerStruct')

@section('content')
    
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="col-sm-auto bg-dark sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                <a href="/" class="d-block py-3 px-1 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <img class="logo-img" src="{{ asset('images/LOGO.png') }}" height="30">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    <li>
                        <a href="{{ route('teacherRegistroExpositor.index') }}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="iconNav">
                                <img src="{{ asset('images/reg_exp.png') }}" alt="Inicio Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Registrar Expositores</p>
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('teacherRegistroExpositor.show', ['teacherRegistroExpositor' => 'show'])}}" class="nav-link py-3 px-md-2 px-1" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="iconNav">
                                <img src="{{ asset('images/m_proyectos.png') }}" alt="Eventos Expo LMAD"/>
                                <p class="d-none d-sm-block nav-txt">Mostrar Proyectos</p>
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

    <div style="width: 100%;">
        <header class="header-proyecto">
            <center><p class="title-expositor">LISTA DE PROYECTOS</p></center>
        </header>


        <div class="body-container-teachershow">
            <div class="row justify-content-center mx-auto" style="width: 100%;">
            @for ($i = 0; $i < count($final_data); $i++)
                <div class="d-flex col-sm-4  justify-content-center align-items-center mb-3"  style="">
                    <div class="class-subject-teacher-container d-flex align-items-center">
                        <div class="class-subject-teacher justify-content-center">
                            <center>
                                <div style="width: 80%"><h2 class="title-card-show-subject fs-2">{{$final_data[$i]['subject']}}</h2></div>
                                <div style="width: 40%"><h4 class="sub-title-card-show-subject fs-3">{{$final_data[$i]['subject']}}</h4></div>
                            </center>
                            <center>
                                <div class="data-card-show">
                                    <p class="text-card-show-subject fs-5" align="left" style="font-weight: 700;-">Token: {{$final_data[$i]['token']}}</p>
                                    @for($j = 0; $j < count($final_data[$i]['data']); $j++)
                                        <p class="text-card-show-subject fs-5" align="left">Matrícula: {{$final_data[$i]['data'][$j]['matricula']}}</p>
                                        <p class="text-card-show-subject fs-5" align="left">Alumno: {{$final_data[$i]['data'][$j]['fullname']}}</p>
                                    @endfor
                                </div>
                            </center>
                            
                            <center><input type="checkbox" onclick="return false;" class="checkbox-data-subject" @if ($final_data[$i]['active']) checked @endif ><span class="text-card-show-subject fs-5"> Datos Entregados</span></center>
                            <br>
                        </div>
                    </div>
                </div>
            @endfor
            </div>
        </div>

</div>

<!--div class="footer-card " style="left: 54%;">
    <p class="footer-card-text">Expo LMAD 8-Junio-2024</p>
    <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
</div-->

@endsection