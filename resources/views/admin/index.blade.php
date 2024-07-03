@extends('admin.struct')

@section('Content')

@if(session()->has('status'))

    <script type="text/javascript">
        @if(session()->get('status') == "Cuenta generada")
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

        @if(session()->get('status') == "Hubo un problema en la generación de la cuenta")
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

        @if(session()->get('status') == "Alumno eliminado correctamente")
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

        @if(session()->get('status') == "Campos incompletos.")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor: '#a70202',
            title: `{{ session()->get('status') }}`,
            showConfirmButton: false,
            timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "Las contraseñas no coinciden.")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor: '#a70202',
            title: `{{ session()->get('status') }}`,
            showConfirmButton: false,
            timer: 1500
            })

        });
        @endif

        @if(session()->get('status') == "Contraseña cambiada.")
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

        @if(session()->get('status') == "Hubo un problema en la edición")
        document.addEventListener("DOMContentLoaded", function(){
            Swal.fire({
            position: 'center',
            icon: 'error',
            iconColor: '#a70202',
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

@if(session()->has('update'))

        <script type="text/javascript">

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
        @else
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

        </script>
        @php
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        @endphp
@endif

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">


<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane dash-w">
    <div class="container-fluid">
        <div class="container-fluid justify-content-around">
            <div class="row Targets"> 
            <div class="card-body">
                <div class='progress-bar p1'>
                    <progress value="0" min="0" max="100" style="height:0px, width: 0px">80%</progress>
                    <div class='pb-data'>
                        <span>@if ($finalCount <= 0) — @else{{$finalCount}}@endif </span>
                        <p >TOTAL DE ASISTIDOS</p>
                    </div>
                </div>
                <!-- <div class="col-12 justify-content-center">
                        <h2 class="text-center" style="font-size:8em; font-weight:bold;"> @if ($finalCount <= 0) — @else{{$finalCount}}@endif </h2>
                        <h1 class="text-center" style="text-shadow:unset; font-size:1.5em;"> <b> TOTAL DE ASISTIDOS </b> </h1>
                </div> -->
            </div>
                <div class="card dashboard-t col-12 col-md-12 col-lg-5 my-3">
                    <div class="card-body row d-flex center-text-v flex-fill">
                        <!-- <div class="col-12 justify-content-center">
                            <h2 class="text-center" style="font-size:6em; font-weight:bold;"> @if ($studentsCount <= 0) — @else{{$studentsCount}}@endif  </h2>
                        </div>
                        <div class="col-12 justify-content-center">
                            <h1 class="text-center" style="text-shadow:unset; font-size:1.8em;"> <b> ALUMNOS </b> </h1>
                        </div> -->
                        <div class='progress-bar p2'>
                            <progress value="0" min="0" max="100" style="height:0px, width:0px">80%</progress>
                            <div class='sec pb-data'>
                                <span>@if ($studentsCount <= 0) — @else{{$studentsCount}}@endif </span>
                                <p>ALUMNOS</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card dashboard-t col-12 col-md-12 col-lg-5 my-3">
                    <div class="card-body flex-fill">
                        <!-- <div class="col-12 justify-content-center">
                            <h2 class="text-center" style="font-size:6em; font-weight:bold;"> @if ($externalCount <= 0) — @else{{$externalCount}}@endif </h2>
                            <h1 class="text-center" style="text-shadow:unset; font-size:1.8em;"> <b> EXTERNOS </b> </h1>
                        </div> -->
                        <div class='progress-bar p3'>
                            <progress value="0" min="0" max="100" style="height:0px, width:0px">80%</progress>
                            <div class='sec pb-data'>
                                <span>@if ($externalCount <= 0) — @else{{$externalCount}}@endif </span>
                                <p>EXTERNOS</p>
                            </div>
                        </div>

                        <div class="container col-12 d-md-flex mt-4 Padre">
                            <div class='progress-bar2 p4 col-12 col-md-4 justify-content-center Hijo'>
                                <progress value="0" min="0" max="100" style="height:0px, width:0px">80%</progress>
                                <div class='sec pb-data'>
                                    <span>@if ($femaleExternalCount <= 0) — @else{{$femaleExternalCount}}@endif</span>
                                    <p>FEMENINO</p>
                                </div>
                            </div>

                            <!--nop
                             <div class="col-12 container-stats col-md-4 ">
                                <h2 class="text-center" style="font-size:3em; font-weight:bold;"> @if ($femaleExternalCount <= 0) — @else{{$femaleExternalCount}}@endif </h2>
                                <h1 class="text-center" style="text-shadow:unset; font-size:1.0em;"> <b> FEMENINO </b> </h1>
                            </div> -->
                            

                            <div class="progress-bar2 p4 col-12 col-md-4 justify-content-center Hijo">
                                <!-- <h2 class="text-center" style="font-size:3em; font-weight:bold;"> @if ($maleExternalCount <= 0) — @else{{$maleExternalCount}}@endif </h2>
                                <h1 class="text-center" style="text-shadow:unset; font-size:1.0em;"> <b> MASCULINO </b> </h1> -->
                                
                                <progress value="0" min="0" max="100" style="height:0px, width:0px">80%</progress>
                                <div class='sec pb-data'>
                                    <span>@if ($maleExternalCount <= 0) — @else{{$maleExternalCount}}@endif</span>
                                    <p>MASCULINO</p>
                                </div>
                            </div>

                            <!-- <div class="col-12 col-md-4 justify-content-center">
                                <h2 class="text-center" style="font-size:3em; font-weight:bold;"> @if ($theyExternalCount <= 0) — @else{{$theyExternalCount}}@endif </h2>
                                <h1 class="text-center" style="text-shadow:unset; font-size:1.0em;"> <b> NO BINARIO </b> </h1>
                            </div> -->
                            <div class='progress-bar2 p4 col-12 col-md-4 justify-content-center Hijo'>
                                    <progress value="0" min="0" max="100" style="height:0px, width:0px">80%</progress>
                                    <div class='sec pb-data'>
                                        <span>@if ($theyExternalCount <= 0) — @else{{$theyExternalCount}}@endif</span>
                                        <p>NO BINARIO</p>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="my-3 card dashboard-t text-center text-white">
            <!-- <div class="row my-5">
                <div class="col-md-4 col-sm-12 justify-content-center cards">
                    <div class='target-wrapper'>
                        <div class='target-container'>
                            <div class='target-img'>
                                <img src="{{ asset('images/EventosCard.png') }}" alt='Eventos LMAD'/>
                            </div>
                            <div class='info'>
                                <span class='numberP'>@if ($eventCount <= 0) — @else{{$eventCount}}@endif</span>
                                <span>EVENTOS</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center cards">
                    <div class='target-wrapper'>
                        <div class='target-container'>
                            <div class='target-img'>
                                <img src="{{ asset('images/ExpositoresCard.png') }}" width="70px" alt='Expositores LMAD'/>
                            </div>
                            <div class='info'>
                                <span class='numberP'>@if ($expositorCount <= 0) — @else{{$expositorCount}}@endif</span>
                                <span>EXPOSITORES</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 justify-content-center cards">
                    <div class='target-wrapper'>
                        <div class='target-container'>
                            <div class='target-img'>
                                <img src="{{ asset('images/EmpresaCard.png') }}" alt='Expositores LMAD'/>
                            </div>
                            <div class='info'>
                                <span class='numberP'>@if ($companyCount <= 0) — @else{{$companyCount}}@endif</span>
                                <span>Empresas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-5 text-center text-white">
                <div id="legend-container" class="container-fluid col-12 mb-5"></div>
                <div class="col-sm-6 col-xs-12 m-auto">
                    <canvas id="pieChart"></canvas>
                </div>
            </div> -->

            <section class='row Targets'>
                <div class='target-wrapper'>
                    <div class='target-container'>
                        <div class='target-img'>
                            <img src="{{ asset('images/EventosCard.png') }}" alt='target'/>
                        </div>
                        <div class='info'>
                            <span class='numberP'>@if ($eventCount <= 0) — @else{{$eventCount}}@endif</span>
                            <span>EVENTOS</span>
                        </div>
                    </div>
                </div>
                <div class='target-wrapper'>
                    <div class='target-container'>
                        <div class='target-img'>
                            <img src="{{ asset('images/ExpositoresCard.png') }}" alt='target'/>
                        </div>
                        <div class='info'>
                            <span class='numberP'>@if ($expositorCount <= 0) — @else{{$expositorCount}}@endif</span>
                            <span>EXPOSITORES</span>
                        </div>
                    </div>
                </div>
                <div class='target-wrapper'>
                    <div class='target-container'>
                        <div class='target-img'>
                            <img src="{{ asset('images/EmpresaCard.png') }}" alt='target'/>
                        </div>
                        <div class='info'>
                            <span class='numberP'>@if ($companyCount <= 0) — @else{{$companyCount}}@endif</span>
                            <span>EMPRESAS</span>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>

        <div class="Stats">
            <div class="row mt-3 mb-5 text-center text-white">
                <div id="legend-container" class="container-fluid col-12 mb-5"></div>
                <div class="col-sm-6 col-xs-12 m-auto">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <livewire:table-expositores />

</div>

<script>
    function updateAccount(id){

        var url = "{{ route('adminInicio.update', ':id' ) }}";
        url = url.replace(':id', id);   

        Swal.fire({
            title: 'Editar cuenta',
            html:
            `
            <form action=${url} method="post" class="text-left px-3">
                @method('PUT')
                @csrf
                <div class="my-3 d-none">
                    <label class="my-1">Matricula</label>
                    <input type="number" class="form-control" name="matricula" placeholder="Matricula" value="${id}">
                </div>
                <div class="my-3">
                    <label class="my-1">Contraseña</label>
                    <input type="password" class="form-control" name="editPassword" placeholder="Contraseña">                    
                </div>
                <div class="my-3">
                    <label class="my-1">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirmar Contraseña">                    
                </div>

                <button id="confirmUpdate" hidden type="submit">Enviar</button>
            </form>
            `,
            confirmButtonText: "Confirmar",
            focusConfirm: false,
            preConfirm: () => {
                return[
                    document.getElementById('confirmUpdate').click()
                ]
            }
        })
    }

    Livewire.on('unlock-btn', function (filter, index){
        var btnAnt = document.getElementById("btn-pag-ant");
        btnAnt.disabled = false;
    });
    
    Livewire.on('lock-btn', function (filter, index){
        var btnAnt = document.getElementById("btn-pag-sig");
        btnAnt.disabled = true;
    });       

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
        function chooseColor() {
            const colors = ["#59ffee", "#39f6e4", "#21decb",
                            "#f04f97", "#e23a87", "#c9206c",
                            "#befa7a", "#a7ee54", "#83c932",
                            "#ffcff1", "#f5b1e2", "#de83c4",
                            "#3d3d3d", "#202020",
                            "#c53aff", "#8476ff", "#0de4fe"];
            let len = colors.length;
            var randIndex = Math.round(Math.random()*(len-1));

            var choosedColor = colors[randIndex];

            return (choosedColor);
        }

        const getOrCreateLegendList = (chart, id) => {
            const legendContainer = document.getElementById(id);
            let listContainer = legendContainer.querySelector('div');

            if (!listContainer) {
                listContainer = document.createElement('div');
                listContainer.style.display = 'flex';
                listContainer.style.flexDirection = 'column';
                listContainer.style.gap = '50px'
                listContainer.style.margin = 0;
                listContainer.style.padding = 0;
                listContainer.classList.add("row");

                legendContainer.appendChild(listContainer);
            }

            return listContainer;
        };

        const htmlLegendPlugin = {
            id: 'htmlLegend',
            afterUpdate(chart, args, options) {
                const ul = getOrCreateLegendList(chart, args.containerID);

                // Remove old legend items
                while (ul.firstChild) {
                    ul.firstChild.remove();
                }

                // Reuse the built-in legendItems generator
                const items = chart.options.legend.labels.generateLabels(chart);

                items.forEach(item => {
                    const li = document.createElement('div');
                    li.style.display = 'flex';
                    li.style.justifyContent = 'space-between';
                    li.style.alignItems = 'center';
                    li.style.cursor = 'pointer';
                    li.classList.add("col-lg-12");
                    li.classList.add("col-sm-6");
                    li.classList.add("col-6");
                    li.style.textAlign = 'center';


                    li.onclick = () => {
                        const {type} = chart.config;
                        if (type === 'pie' || type === 'doughnut') {
                        // Pie and doughnut charts only have a single dataset and visibility is per item
                            chart.getDatasetMeta(0).data[item.index].hidden = !chart.getDatasetMeta(0).data[item.index].hidden
                        } else {
                        chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
                        }
                        chart.update();
                    };

                    // Color box
                    const boxSpan = document.createElement('span');
                    boxSpan.style.background = item.fillStyle;
                    boxSpan.style.borderColor = item.strokeStyle;
                    boxSpan.style.borderWidth = item.lineWidth + 'px';
                    boxSpan.style.display = 'inline-block';
                    boxSpan.style.height = '20px';
                    boxSpan.style.marginRight = '10px';
                    boxSpan.style.width = '20px';

                    // Text
                    const textContainer = document.createElement('a');
                    textContainer.style.color = item.fontColor;
                    textContainer.style.margin = 0;
                    textContainer.style.padding = 0;
                    textContainer.style.width = 'fit-content';
                    textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

                    //numeroTEXT
                    const textContainerNumber = document.createElement('span');
                    textContainerNumber.style.color = item.fontColor;
                    textContainerNumber.style.margin = 0;
                    textContainerNumber.style.padding = 0;
                    textContainerNumber.style.width = 'fit-content';
                    textContainerNumber.style.textDecoration = item.hidden ? 'line-through' : '';
                    textContainerNumber.t

                    // Supongamos que tienes propiedades para el estilo y el valor de la barra de progreso
                    /*const item = {
                        fillStyle: 'green',
                        strokeStyle: 'blue',
                        lineWidth: 2
                    };*/
                    const progressValue = 50; // Este valor debe provenir de tus datos

                    
                    // Crear el elemento de barra de progreso
                    const progress = document.createElement('progress');
                    progress.max = '100';
                    progress.value = progressValue;

                    // Obtener el elemento .progressBar
                    const progressBar = document.querySelector('.progressBar');

                    // Agregar el cuadro y la barra de progreso al elemento .progressBar
                    
                    
                    const text = document.createTextNode(item.text);
                    textContainer.appendChild(text);
                    
                    //li.appendChild(boxSpan);
                    li.appendChild(textContainer);
                    li.appendChild(progress);
                    li.appendChild(textContainerNumber);
                    ul.appendChild(li);
                });
            }
        };

        var array = [];

        for(let i = 0; i < {{count($eventsTotalCount)}}; i++){
            array.push(chooseColor());
        }
        console.log(array);

        var data = {
            labels: {!!json_encode($eventsName)!!},
            datasets: [{
                data: {!!json_encode($eventsTotalCount)!!},
                backgroundColor: array,
                hoverBackgroundColor: array,
                borderWidth: 0,
            }]
        };

        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: data,
            options: {
                legend: {
                    display: false,
                },

                plugins: {
                    htmlLegend: {
                        // ID of the container to put the legend in
                        containerID: 'legend-container',
                    },
                }
            },

            plugins: [htmlLegendPlugin],
        });

</script>

 @endsection
