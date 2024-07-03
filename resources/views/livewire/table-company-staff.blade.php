<div class="col-sm p-3 test">
    <div class="container-fluid" >
        <div class="row titleEvent">
            <h1 class="text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px; color:white">EMPRESAS</h1>
            <div>
                <div class="col-lg-5 my-3 search">
                    <form>
                        <div class="input-group rounded">
                            <div class="form-floating">
                                <input autocomplete="off" id="searchCompany" type="search" class="form-control" placeholder="" aria-label="Search" aria-describedby="search-addon" wire:model="searchTxt" wire:keyup="search"/>
                                <label for="searchCompany">Nombre de la Empresa</label>
                            </div>
                            <button type="button" wire:click="search" class="btn btn-primary bi bi-search p-1"><p class="m-0">Buscar</p> </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" style="text-align-last:center;">
                    <thead class="borderTable">
                        <tr>
                            <th class="w-priority">Empresa</th>
                            <th class="borderTableRight">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->nameCompany}}</td>
                            <td> <a href="{{route('staffEmpresa.show', [$company->id])}}"><button type="button" class="btn btn-primary">Asistencia</button></td></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>