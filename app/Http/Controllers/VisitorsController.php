<?php

namespace App\Http\Controllers;
use App\Models\Visitors;


use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function create(Request $request)
    {
        //var_dump($request);
        

        
            $person = new Visitors();

            if($request->input('fullNameStudentEvent') != ""){
                //Para alumno
                $person->nombre_completo = $request->input('fullNameStudentEvent');
                $person->matricula = $request->input('enrollmentStudentEvent');
            }else{
                //Para visitante externo
                $person->nombre_completo = $request->input('regEventExternal');
                $person->genero = $request->input('genre');
            }



            if(!($person->save())){
                session()->flash("status","Hubo un problema. Verifique los datos");
            }
        
        

        session()->flash("status","Registro exitoso");
        return redirect()->back();
    }
}
