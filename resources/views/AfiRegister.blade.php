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
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "No se admiten más de 80 caracteres para el Nombre completo")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "El nombre debe contener al menos dos palabras y sin caracteres especiales")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
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
                timer: 2500
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
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "El correo ingresado no es válido o institucional")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "No se admiten más de 50 caracteres para la dependencia")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "La dependencia no debe tener caracteres especiales")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
                title: `{{ session()->get('status') }}`,
                showConfirmButton: false,
                timer: 2500
            })
        });
        @endif
        @if(session()->get('status') == "Ya estás registrado en este evento")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
                position: 'center',
                icon: 'error',
                iconColor: '#a70202',
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



<!--
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = test_input($_POST["regAFIname"]);
        $nameErr = "";
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Solo letras y espacios permitidos";
        }

        $email = test_input($_POST["regAFIemail"]);
        $emailErr = "";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "El correo escrito no es válido";
        }

        if ($nameErr != "" || $emailErr != ""){
            echo "<b>Error:</b>";
            echo "<br>".$nameErr;
            echo "<br>".$emailErr;
        } else {
            //Aquí Pinkus y el back
            echo "AFI registrada";
        }
    }
*/



<script>
    const form = document.getElementById('AfiInfo');
    const errorMsg = document.getElementById("MsgError");


</script>
-->

    

<script type="text/javascript">

    //Facultades
    var FA = 'Facultad de Agronomía';
    var FARQ = 'Facultad de Arquitectura';
    var FAV = 'Facultad de Artes Visuales';
    var FCB = 'Facultad de Ciencias Biológicas';
    var FC = 'Facultad de Ciencias de la Comunicación';
    var FCT = 'Facultad de Ciencias de la Tierra';
    var FCFM = 'Facultad de Ciencias Físico Matemáticas';
    var FCF = 'Facultad de Ciencias Forestales';
    var FCPRI = 'Facultad de Ciencias Politicas y Relaciones Internacionales'
    var FCQ = 'Facultad de Ciencias Químicas';
    var FCPA = 'Facultad de Contaduría Pública y Administrativa';
    var FDC = 'Facultad de Derecho y Criminología';
    var FE = 'Facultad de Economía';
    var FAEN = 'Facultad de Enfermería';
    var FFL = 'Facultad de Filosofía y Letras';
    var FIC = 'Facultad de Ingeniería Civil';
    var FIME = 'Facultad de Ingeniería Mecánica y Eléctrica';
    var FACMED = 'Facultad de Medicina';
    var FACVE = 'Facultad de Medicina Veterinaria y Zootecnia';
    var FMU = 'Facultad de Música';
    var FO = 'Facultad de Odontología';
    var FOD = 'Facultad de Organización Deportiva';
    var FP = 'Facultad de Psicología';
    var FSPN = 'Facultad de Salud Pública y Nutrición';
    var FTSDH = 'Facultad de Social y Desarrollo Humano';

    //FCFM
    var LA = 'Licenciatura en Acturía';
    var LCC = 'Licenciatura en Ciencias Computacionales';
    var LF = 'Licenciatura en Física';
    var LM = 'Licenciatura en Matemáticas';
    var LMAD = 'Licenciatura en Multimedia y Animación Digital';
    var LSTI = 'Licenciatura en Seguridad de Tecnologías de Información';
    var NP = 'Otro(s)';
    
    $(document).ready(function(){
        var options={
            '10': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '11': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '12': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '13': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '14': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '15': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '16': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '17': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '18': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '19': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '20': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '21': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH],
            '22': [FCFM, NP, FA, FARQ, FAV, FCB, FC, FCT, FCF, FCPRI, FCQ, FCPA, FDC, FE, FAEN, FFL, FIC, FIME, FACMED, FACVE, FMU, FO, FOD, FP, FSPN, FTSDH]
        };
        var options1={
            'Facultad de Ciencias Físico Matemáticas': [LA, LCC, LF, LM, LMAD, LSTI]
        };

        $('#selectConferencia').change(function(){
            var Selection=$(this).val();
            var NewOptions = options[Selection];
            var NewOptions1 = options1[FCFM];

            $('#selectFacultad').empty();
            $('#selectCarrera').empty();
            $.each(NewOptions, function(index, options){
                $('#selectFacultad').append($('<option>').text(options).attr('value', options));
            });


                $('#selectFCFM').show();
                $('#selectCarrera').prop('required', true);
                $('#selectCarrera').empty();
                $('#editPrepa').hide();
                $('#regAFIdep').prop('required', false);
                $.each(NewOptions1, function(index, options1){
                    $('#selectCarrera').append($('<option>').text(options1).attr('value', options1));
                });

        });

        $('#selectConferencia').change();
        
    });

    $(document).ready(function(){
        var options={
            'Facultad de Ciencias Físico Matemáticas': [LA, LCC, LF, LM, LMAD, LSTI]
        };

        $('#selectFacultad').change(function(){
            var Selection = $(this).val();
            var NewOptions = options[Selection];

            
            if (Selection == FCFM){
                $('#selectFCFM').show();
                $('#selectCarrera').prop('required', true);
            } else {
                $('#selectFCFM').hide();
                $('#selectCarrera').prop('required', false);
            }

            if (Selection == NP){
                $('#editPrepa').show();
                $('#regAFIdep').prop('required', true);
            } else {
                $('#editPrepa').hide();
                $('#regAFIdep').prop('required', false);
            }
            

            $('#selectCarrera').empty();
            $.each(NewOptions, function(index, options){
                $('#selectCarrera').append($('<option>').text(options).attr('value', options));
            });
        });

        $('#selectFacultad').change();
    });
    
</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/adminEvent.css') }}"> <!-- importante para poner el borderContainer -->

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

              <div class="AfiRegister-header col-sm-9 col-lg-3 mb-1 text-center">
              <h1 style="d-md-none; font-weight: bold;">Registro de AFI</h1>
                <!--<h1 style="font-size: 5em; font-weight: bold;">Registro de AFI</h1>-->
              </div>

        </header>

    <div class="BodyContainer col p-3 min-vh-100 w-50 backgroundImg tab-pan">

        <div class="col my-3 text-center">
            <div>
                <img src="{{asset('images/warning.png')}}" class="body-warning img-fluid" style="max-width: 350px">
            </div>
        </div>

    <form id="AfiInfo" action="{{route('AfiRegister.store')}}" method=post onsubmit="false">
        @csrf
        <div class="row align-items-center p-1">
            <div class="borderContainer col-11" style="margin-left: 50%; transform: translateX(-50%);">
                <div class="borderBody col-md-12 col-sm-12">
                            <h3 style="font-size: 15px;font-weight: bold"> AFI </h3>
                            <!-- select aquí -->
                            <select class="form-select" style="font-size: 12px" name="selectConferencia" id="selectConferencia" required>
                                @foreach ($events as $event)
                                <option value="{{$event->id}}" class="form-select":focus style="font-size: 13px">{{$event->eventName}}</option>
                                @endforeach
                            </select> 

                        <div  class="my-4">
                            <h3 style="font-size: 15px;font-weight: bold"> Dependencia </h3>
                            <!-- select aquí -->
                            <select class="form-select" style="font-size: 12px" id="selectFacultad" name="selectFacultad" onchange="specialDependece()" required>   
                            </select> 
                        </div>

                        <div  class="my-4" id="selectFCFM">
                            <h3 style="font-size: 15px; font-weight: bold"> Carrera </h3>
                            <!-- select aquí -->
                            <select class="form-select" style="font-size: 12px" id="selectCarrera" name="selectCarrera">   
                            </select> 
                        </div>

                        <div class="my-4" id="editPrepa">
                            <h3 style="font-size: 15px;font-weight: bold"> Nombre de la dependencia o prepa *</h3>
                            <!-- filtros aquí -->
                            <input type="text" class="form-control" name="regAFIdep"  id="regAFIdep" placeholder="Dependencia">
                        </div>
                    
                </div>
            </div>
        
            <div class="borderContainer col-11" style="margin-left: 50%; transform: translateX(-50%);">
                <div class="borderBody col-md-12 col-sm-12">

                        <div>
                            <h3 style="font-size: 15px;font-weight: bold"> Nombre completo * </h3>
                            <!-- filtros aquí -->
                            <input type="text" class="form-control" name="regAFIname"  id="regAFIname" placeholder="Jane Doe" required>
                        </div>

                        <div>
                            <h3 style="font-size: 15px;font-weight: bold"> Matrícula * </h3>
                            <!-- filtros aquí -->
                            <input type="text" class="form-control" name="regAFImatr"  id="regAFImatr" placeholder="1234567" required>
                        </div>

                        <div class="my-4">
                            <h3 style="font-size: 15px; font-weight: bold"> Correo universitario * </h3>
                            <!-- filtros aquí -->
                            <input type="text" class="form-control" name="regAFIemail"  id="regAFIemail" placeholder="jane.doed@uanl.edu.mx" required>
                        </div>
                </div>
            </div>

        <div id="MsgError" class="error-message"> </div>

        <div class="my-5 d-flex">
            <button id = "regAFI" type = "submit" class="col-md-4 col-sm-12 btn btn-primary mx-auto"> Registrar </button>
        </div>

    </form>


    </div>




@endsection