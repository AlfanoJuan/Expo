@extends('Templates/headerStruct')

@section('content')
    @if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Registro expositor exitoso")
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
        

        <div class="body-container-reg-proyecto" style="">
            <header class="header-proyecto">
                <center><p class="title-expositor">REGISTRO DE EXPOSITORES</p></center>
            </header>
            
            <form id="form-student" action="{{route('teacherRegistroExpositor.store')}}" method=post>
                @csrf
                <div class="row justify-content-center mx-auto" style="width: 100%;">
                    <div class="col-sm-6" style="">
                        <div class="card-inputs borderContainer">
                            <div class="borderBody">
                                <div class="row justify-content-center">
                                    <div class="col-sm-2 justify-content-center" style="">
                                        
                                        <label class="label-reg-proyecto fs-3">Plan:</label><br>
                                        <select class="input-reg-proyecto" id="planCmb" onchange=updateInputSemesterCmb() style="text-aling: center;"></select>
                                        
                                    </div>
                                    <div class="col-sm-2 justify-content-center" style="">
                                        
                                        <label class="label-reg-proyecto fs-3">Semestre:</label><br>
                                        <select class="input-reg-proyecto" id="semesterCmb" onchange=updateInputSemesterCmb()></select>
                                        
                                    </div>
                                    <div class="col-sm-6" style="">
                                        
                                    <label class="label-reg-proyecto">Numero de integrantes:</label><br>
                                    <center><select class="input-reg-proyecto" id="membersCmb" onchange=setDynamicInputs()>
                                            <option value="1" style="text-align: center;">1</option>
                                            <option value="2" style="text-align: center;">2</option>
                                            <option value="3" style="text-align: center;">3</option>
                                            <option value="4" style="text-align: center;">4</option>
                                            <option value="5" style="text-align: center;">5</option>
                                            <option value="6" style="text-align: center;">6</option>
                                            <option value="7" style="text-align: center;">7</option>
                                            <option value="8" style="text-align: center;">8</option>
                                        </select></center>

                                    </div>
                                </div>
                                <div class="row justify-content-center" style="margin-bottom: 10px;">
                                    <div class="col-sm-11" style="">
                                    
                                        <label class="label-reg-proyecto fs-3">Materia:</label><br>
                                        <center><select class="input-reg-proyecto" id="UACmb" onchange="document.getElementById('UA').value = document.getElementById('UACmb').value;"></select>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" style="">
                        <div class="card-inputs borderContainer">
                            <div class="borderBody">
                                <input type="text" name="semester" id="semester" hidden value="document.getElementById('semesterCmb').value;"> 
                                <input type="text" name="UA" id="UA" hidden>
                                <input type="text" id="inputCount" name="inputCount" value=1 hidden>
                                <input type="text" name="plan" id="plan" hidden>

                                <div class="row justify-content-center">
                                    <div class="col-sm-11" style="">
                                        
                                        <label class="label-reg-proyecto">Matrícula:</label><br>
                                        <center><input type="number" class="input-reg-proyecto"  name="enrollment0" id="enrollment0" placeholder="Matrícula" required onchange="checkNum(this)"  min=1000000 max=9999999><br>
                                        </center>
                                    </div>
                                </div>

                                <div class="form-check mt-2" hidden>
                                        <input class="form-check-input" type="checkbox" name="attendance0" id="attendance0" >
                                        <label class="form-check-label text-light" for="attendance0">
                                            Comprobar
                                        </label>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-sm-11" style="">

                                        <label class="label-reg-proyecto">Nombre Completo:</label><br>
                                        <center><input type="text" class="input-reg-proyecto"  name="name0" id="name0" onkeyup="cambiaMayuscula()" placeholder="Nombre completo" required><br>
                                        </center>
                                    </div>
                                </div>

                                <div class="mt-3" id="dynamicInputs">
                                    <!--INPUTS DINAMICOS-->
                                </div>

                                <!--                       key      |      password         -->
                                <!-- User Student ->    matrícula   | apellidos_matrícula   -->
                            </div>
                        </div>
                        
                    </div>
                        <button id="regGuest" type="submit" class="btn_regProj" onclick="checkDuplicated()">Registrar equipo</button>

                        <div id="duplicatedAlert" class="col-12 my-2" style="text-align:center;" hidden>
                            <h5 style="color: #39f6e4; text-shadow:0px 0px 20px grey; font-weight:normal;"> Comprueba que no se repitan matrículas </h5>
                        </div>
                </div>
            </form>

            <!--div class="footer-card fixed-bottom position-fixed text-center" style="left: 54%;">
                <p class="footer-card-text">Networking</p>
                <img width="17" height="17" src="{{asset('images/icon-arrow-down.png')}}" alt="expand-arrow--v2" class="arrow-footer"/>
            </div-->

        </div>
    </div>

    

<!--div class="col-sm p-3">
    <div class="container-fluid" >
        <div class="row">
            <h5 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">Registro expositores</h5>

            <!-DROP DOWNS->

            <div class="d-flex justify-content-center flex-wrap">
                <div class="col-12 col-md-3 col-lg-2 col-xl-1 m-2">
                    <div class="form-floating">
                        <select class="form-select" id="semesterCmb" onchange=updateInputSemesterCmb()>

                        </select>
                        <label for="semesterCmb">Semestre</label>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
                    <div class="form-floating">
                        <select class="form-select" id="UACmb" onchange="document.getElementById('UA').value = document.getElementById('UACmb').value;">

                        </select>
                        <label for="UACmb">Materia</label>
                    </div>
                </div>

                <!-<div class="col-12 col-md-3 col-lg-3 m-2 form-floating">
                    <input type="text" onkeypress='return event.charCode >= 49 && event.charCode <= 57' class="form-control" id="teamNum" placeholder="Num. Equipos">
                    <label for="teamNum">Num. Equipos</label>
                </div>->

            </div>

            <div class="p-3 my-4 div-colorfull" style="">
                <form class="my-4 form-student" id="form-student" action="{{route('teacherRegistroExpositor.store')}}" method=post>

                @csrf
                    <!-HIDDEN INPUTS->

                    <input type="text" name="semester" id="semester" hidden value="document.getElementById('semesterCmb').value;">
                    <input type="text" name="UA" id="UA" hidden>
                    <input type="text" id="inputCount" name="inputCount" value=1 hidden>

                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-12 col-md-6 col-lg-6 m-2 form-floating">
                            <input type="text" class="form-control" name="nameProject" id="nameProject" placeholder="Nombre del proyecto" required>
                            <label for="nameProject">Nombre del proyecto</label>
                        </div>

                        <div class="col-12 col-md-3 col-lg-2 m-2">
                            <div class="form-floating">
                                <select class="form-select" id="membersCmb" onchange=setDynamicInputs()>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <label for="membersCmb">Num. Intergantes</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 d-md-flex justify-content-center align-items-center">
                        <hr class="colorfull col-md-8 col-12 mt-4">
                    </div>

                    <div class="d-flex justify-content-center flex-wrap m-t3">

                        <div class="col-12 col-md-2 my-2 mx-3 mx-xl-5">
                            <div class="form-floating">
                                <input required onchange="checkNum(this)" type="number" class="form-control" name="enrollment0" id="enrollment0" placeholder="Matricula" value="" required>
                                <label for="enrollment0">Matricula</label>
                            </div>

                            <div class="form-check mt-2" hidden>
                                <input class="form-check-input" type="checkbox" name="attendance0" id="attendance0" >
                                <label class="form-check-label text-light" for="attendance0">
                                    Comprobar
                                </label>
                            </div>

                        </div>
                        <div class="col-12 col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name0" id="name0" required onkeyup="cambiaMayuscula()" placeholder="Nombre completo">
                                <label for="name0">Nombre completo</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="dynamicInputs">


                        <!-INPUTS DINAMICOS->

                    </div>

                    <!-                      key      |      password         ->
                    <!- User Student ->    matrícula   | apellidos_matrícula   ->

                    <div class="col-12 my-2" style="text-align:center;">
                        <a onclick="checkDuplicated()" class="col-md-4 col-sm-12 btn btn-primary">Registrar equipo</a>
                        <button id="regGuest" type="submit" class="col-md-4 col-sm-12 btn btn-primary" hidden>Registrar equipo</button>
                    </div>

                    <div id="duplicatedAlert" class="col-12 my-2" style="text-align:center;" hidden>
                        <h5 style="color: #39f6e4; text-shadow:0px 0px 20px grey; font-weight:normal;"> Comprueba que no se repitan matrículas </h5>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div--->

    <script type="text/javascript">

        function updateInputPlanCmb(){
                var sel=document.getElementById("planCmb");

                for(var planv in Plans){
                // Crear una nueva opción
                var opcion = document.createElement("option");
                opcion.classList.add("option-reg-class");
                opcion.value =Plans[planv];
                opcion.text =Plans[planv];
                opcion.style.textAlign = "center";

                // Agregar la opción al select
                sel.add(opcion);

                }
                //Se updatea el valor en los hidden inputs
                document.getElementById("plan").value = document.getElementById("planCmb").value;
            }
            var Plans = new Array('420','440');
            updateInputPlanCmb();


        function updateInputSemesterCmb(){
                document.getElementById('plan').value = document.getElementById('planCmb').value;
                var select = document.getElementById("UACmb");

                //Eliminar opciones
                document.getElementById("UACmb").innerHTML = "";

                var optionSelected = document.getElementById("semesterCmb").value;

            if (document.getElementById("planCmb").value=='420') {
                for(var subject in semestersSubjects[optionSelected]){
                    // Crear una nueva opción
                    var opcion = document.createElement("option");

                    opcion.value = semestersSubjects[optionSelected][subject];
                    opcion.text = semestersSubjects[optionSelected][subject];
                    opcion.classList.add("option-reg-class");
                    // Agregar la opción al select
                    select.add(opcion);

                }
            } else {
                for(var subject in semestersSubjects2[optionSelected]){
                    // Crear una nueva opción
                    var opcion = document.createElement("option");

                    opcion.value = semestersSubjects2[optionSelected][subject];
                    opcion.text = semestersSubjects2[optionSelected][subject];

                    // Agregar la opción al select
                    select.add(opcion);
                }

                }
                //Se updatea el valor en los hidden inputs
                document.getElementById("semester").value = document.getElementById("semesterCmb").value;
                document.getElementById("UA").value = document.getElementById("UACmb").value;

            }

            var semestersSubjects =
            {
            '2': ['Tecnologías multimedia', 'Dibujo de la anatomía humana'],
            '3': ['Producción multimedia', 'Modelado arquitectónico'],
            '4': ['Modelado orgánico'],
            '5': ['Administración de alto volumen de datos','Diseño de hápticos','Modelos de administración de datos','Animación básica','Fotografía digital','Gráficas computacionales I','Preproducción 2D','Preproducción de video'],
            '6': ['Efectos Visuales I','Escenarios de videojuegos','Gráficas computacionales II','Ilustración digital','Modelado en alto poligonaje'],
            '7': ['Base de datos multimedia','Actuación y dirección para animación','Animación tradicional de humanos y de animales','Efectos visuales II','Optimización de videojuegos','Programación de sistemas móviles'],
            '8': ['Iluminación y audio','Realidad virtual','Animación tradicional de escenarios','Diseños de videojuegos en linea','Esqueletos de personajes'],
            '9': ['Postproducción'],
            '10':[]
            }
            var semestersSubjects2 =
            {
            '2': ['Cultura de paz y derechos humanos','Ética, transparencia y cultura de la legalidad','Igualdad de género, diversidad sexual e inclusión','Tópicos de álgebra','Cálculo integral','Mecánica traslacional y rotacional','Programación básica'],
            '3': ['Programación estructurada','Relaciones espaciales para videojuegos','Producción multimedia','Fundamentos del dibujo artístico','Metodologías ágiles de trabajo','Proyección de negocios tecnológicos y animaciones','Modelado arquitectónico','Laboratorio de programación estructurada'],
            '4': ['Programación avanzada','Transformaciones gráficas para videojuegos','Fundamentos de los videojuegos','Tecnologías multimedia','Fotografía digital','Modelo de administración de datos'],
            '5': ['Interfaz y experiencia de usuario','Programación en entornos bidimensionales','Lógica digital','Producción de guiones','Iluminación y audio','Programación orientada a objetos','Laboratorio de programación orientada a objetos','Modelado en alto poligonaje','Preproducción para series animadas','Programación en Android'],
            '6': ['Programación en entornos tridimensionales','Diseño de hápticos','Redes computacionales','Escenarios de videojuegos','Fundamentos y producción cinematográfica','Laboratorio de redes computacionales','Esqueletos de personajes','Diseño de personajes para animación','Programación para sistema operativo de internet','Control de calidad en software','Modelado tridimensional','Ilustración digital'],
            '7': ['Gráficas computacionales','Procesamiento de imágenes','Optimización de videojuegos','Programación de sitios web','Introducción a efectos visuales','Administración de proyectos multimedia','Laboratorio de programación de sitios web','Animación por computadora','Principios de la animación tradicional','Ingeniería de software'],
            '8': ['Interfaces y aplicaciones web','Escenarios digitales','Gestión y producción de efectos visuales','Realidad virtual y aumentada','Diseño de videojuegos en línea','Propiedad intelectual','Laboratorio de interfaces y aplicaciones web','Actuación y dirección para animación','Animación tradicional avanzada','Ingeniería en la nube'],
            '9': ['Gráficas computacionales en web','Inglés para tecnologías','Investigación y desarrollo de proyectos','Mercadotecnia','Programación multiplataforma','Laboratorios de gráficas computaciones en web','Texturizado de la nueva generación','Animación por marionetas','Programación de algoritmos avanzados'],
            '10': ['Seminario para el desempeño profesional','Servicio social','Postproducción para series animadas','Postproducción para entornos virtuales','Inteligencia artificial y ciencia de datos']   
        }

            var select = document.getElementById("semesterCmb");

            for (var valor in semestersSubjects) {
                // Crear una nueva opción
                var opcion = document.createElement("option");

                // Asignar el valor y el texto de la opción
                opcion.value = valor;
                opcion.text = valor;
                opcion.style.textAlign = "center";

                // Agregar la opción al select
                select.add(opcion);
        }

        updateInputSemesterCmb();
    </script>

    <script>
        function cambiaMayuscula (){
            $("#name0").val($("#name0").val().toUpperCase());
        }

    </script>
@endsection
