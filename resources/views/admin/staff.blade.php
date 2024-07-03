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
<link rel="stylesheet" href="{{ asset('css/adminEvent.css') }}">

<div class="col-sm p-3 min-vh-100 backgroundImg tab-pane">
       <!--<div class="container-fluid">
        <div class="glassContainer">
            <div class="carouselContainer col-12">
                <div id="carouselExampleControls" class="carousel slide" >
                    <div class="carousel-inner d-flex justify-content-start align-items-center">
                        @foreach($staff->chunk(8) as $chunk)
                            <div class="carouselExampleControls carousel-item @if($loop->first) active @endif">
                                <div class="row gapCarousel">
                                @foreach($chunk as $account)
                                    <div class="col-md-8  staffCard ">
                                        <div class="col-12 col-md-12 staffBackground">
                                            
                                            <h5>{{$account->key}}</h5>
                                            
                                            <div class="btnsForm">
                                                <a onclick="updateAccount(`{{$account->id}}`, `{{$account->key}}`, `{{$account->password}}` )"  class="btn-edit btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                
                                                <form action="{{route('adminStaffPage.destroy', [$account->id])}}" method="POST" hidden>
                                                @method('DELETE')
                                                @csrf
                                                    <button id="formAdminDeleteBtn_{{$account->id}}" type="submit"> DESTROY </button>
                                                </form>
                    
                                                <a onclick="confirmDialog(`formAdminDeleteBtn_{{$account->id}}`)"  class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        @endforeach
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
        -->
        <div class="col-12 my-2 d-flex  justify-content-center">
            <form action="{{route('adminStaffPage.store')}}" method="POST">
            @csrf
                <button id="regEvent" type="submit" class="btn btn-primary">Generar cuenta</button>
            </form>
        </div>
    
    <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button href="table-staff-accounts" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <p class="h2"> Cuentas de staff </p>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="text-center text-white py-2 mb-4">

                            <div class="table-responsive col-11 mx-auto" id="table-staff-accounts">
                                <table class="table" style="text-align-last:center;">
                                    <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Contraseña</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account )
                                        <tr>
                                            <td>{{$account->key}}</td>
                                            <td>{{$account->password}}</td>
                                            <td>
                                                <a onclick="updateAccount(`{{$account->id}}`, `{{$account->key}}`, `{{$account->password}}` )"  class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('adminStaff.destroy', [$account->id])}}" method="POST" hidden>
                                                    @method('DELETE')
                                                    @csrf
                                                        <button id="formAdminDeleteBtn_{{$account->id}}" type="submit"> DESTROY </button>
                                                    </form>

                                                <a onclick="confirmDialog(`formAdminDeleteBtn_{{$account->id}}`)"  class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-12 my-2">
                                <form action="{{route('adminStaffPage.store')}}" method="POST">
                                    @csrf
                                    <button id="regEvent" type="submit" class="btn btn-primary">Generar cuenta</button>
                                </form>
                            </div>

                            <div class="col-12 my-2">
                                <form action="{{route('adminInicio.hash')}}" method="POST">
                                    @csrf
                                    <button id="regEvent" type="submit" class="btn btn-primary">Encriptar Todas las Contraseñas</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>

<script>
    function updateAccount(id, key, pass){

        var url = "{{ route('adminStaffPage.update', ':id' ) }}";
        url = url.replace(':id', id);   

        Swal.fire({
            title: 'Editar cuenta',
            html:
            `
            <form action=${url} method="post">
                @method('PUT')
                @csrf
                <div class="form-floating my-2">
                    <input required type="number" class="form-control" name="staffKey" id="staffKey" placeholder="Clave" value=${key}>
                    <label for="staffKey">Clave</label>
                </div>
                <div class="form-floating my-2">
                    <input required type="text" class="form-control" name="staffPass" id="staffPass" placeholder="Contraseña" value=${pass}>
                    <label for="staffPass">Contraseña</label>
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

@endsection