<div>
    <div class="my-3 card dashboard-t text-center text-white">
        <div class="mt-4"><h3>Expositores:</h3></div>
        <table class="table w-75 mx-auto" id="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Matricula</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($expositores as $expositor)
                    <form id="delete" method="post" enctype="multipart/form-data" action="{{route('adminInicio.destroy', [$expositor->enrollment])}}">
                    @method('DELETE')
                    @csrf
                    <tr>
                        <td>{{$expositor->fullName}}</td>
                        <td>{{$expositor->enrollment}}</td>
                        <td>
                            <div>
                                <button onclick="updateAccount({{$expositor->enrollment}})" type="button" class="btn btn-primary mx-2"><i class="bi bi-pencil"></i></button>
                                <button type="submit" class="btn btn-primary mx-2"><i class="bi bi-trash"></i></button>
                            </div>                            
                        </td>
                    </tr>
                    </form>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="row mt-5">
        <center>
            <button type="button" wire:click="pagination(`{{$pag-1}}`)" id="btn-pag-ant" class="btn-pagination" style="/*background-color: #000000;border-radius: 8px;width: 5%;float:left;border: 2px solid #FFFFFF;color: #FFFFFF;*/" disabled=true><center><i class="gg-arrow-left" style="filter: drop-shadow(0 0 5px var(--shadow-color));"></i></center></button> 
            <button type="button" wire:click="pagination(`{{$pag+1}}`)" id="btn-pag-sig" class="btn-pagination" style="/*background-color: #000000;border-radius: 8px;width: 5%;float:left;border: 2px solid #FFFFFF;color: #FFFFFF;*/"><center><i class="gg-arrow-right" style="filter: drop-shadow(0 0 5px var(--shadow-color));"></i></center></button>
            <div class="numPagination">Página: <p class="PagNum">{{$pag+1}}</p></div>
        </center>
    </div>
    
</div>


