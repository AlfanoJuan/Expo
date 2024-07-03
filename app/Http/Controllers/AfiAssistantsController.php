<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\project;
//use App\Models\AFIstudents;


class AfiAssistantsController extends Controller
{

      /**
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //Pinkus quita esto
        $matriculas = [];

        $matriculas1 = [];
        $matriculas1['1'] = '2127289';
        $matriculas1['2'] = '2127290';
        //$matriculas['3'] = '2127291';
        $matriculas2 = [];
        $matriculas2['1'] = '2127289';

        $matriculas3 = [];
        $matriculas3['1'] = '2127289';
        $matriculas3['1'] = '2127280';

        $matriculas4 = [];
        $matriculas4['1'] = '2127289';

        $matriculas5 = [];
        $matriculas5['1'] = '2127289';
        $matriculas5['1'] = '2127287';
        $matriculas5['1'] = '2127281';

        $matriculas6 = [];
        $matriculas6['1'] = '2127589';

        $matriculas7 = [];
        $matriculas7['1'] = '2137289';

        $matriculas8 = [];
        $matriculas8['1'] = '2127489';

        $matriculas9 = [];
        $matriculas9['1'] = '2127289';
        $matriculas5['1'] = '2127287';
        $matriculas5['1'] = '2127281';

        $matriculas10 = [];
        $matriculas10['1'] = '2127283';

        $matriculas11 = [];
        $matriculas11['1'] = '2127289';
        $matriculas11['1'] = '2127281';

        $matriculas12 = [];
        $matriculas12['1'] = '2127289';
                
        $matriculas13 = [];
        $matriculas13['1'] = '2127219';

        //Pinkus pon esto
        //$matriculas = estudiante::all(); 
        return view('AfiAssistants', compact('matriculas1', 'matriculas2', 'matriculas3', 
        'matriculas4', 'matriculas5', 'matriculas6', 'matriculas7', 'matriculas8', 'matriculas9',
        'matriculas10', 'matriculas11', 'matriculas12', 'matriculas13'));
    }
    
    public function __invoke()
    {
        //Pinkus quita esto
        $matriculas = [];

        $matriculas1 = [];
        $matriculas1['1'] = '2127289';
        $matriculas1['2'] = '2127290';
        //$matriculas['3'] = '2127291';
        $matriculas2 = [];
        $matriculas2['1'] = '2127289';

        $matriculas3 = [];
        $matriculas3['1'] = '2127289';
        $matriculas3['1'] = '2127280';

        $matriculas4 = [];
        $matriculas4['1'] = '2127289';

        $matriculas5 = [];
        $matriculas5['1'] = '2127289';
        $matriculas5['1'] = '2127287';
        $matriculas5['1'] = '2127281';

        $matriculas6 = [];
        $matriculas6['1'] = '2127589';

        $matriculas7 = [];
        $matriculas7['1'] = '2137289';

        $matriculas8 = [];
        $matriculas8['1'] = '2127489';

        $matriculas9 = [];
        $matriculas9['1'] = '2127289';
        $matriculas5['1'] = '2127287';
        $matriculas5['1'] = '2127281';

        $matriculas10 = [];
        $matriculas10['1'] = '2127283';

        $matriculas11 = [];
        $matriculas11['1'] = '2127289';
        $matriculas11['1'] = '2127281';

        $matriculas12 = [];
        $matriculas12['1'] = '2127289';
                
        $matriculas13 = [];
        $matriculas13['1'] = '2127219';

        //Pinkus pon esto
        //$matriculas = estudiante::all(); 
        return view('AfiAssistants', compact('matriculas1', 'matriculas2', 'matriculas3', 
        'matriculas4', 'matriculas5', 'matriculas6', 'matriculas7', 'matriculas8', 'matriculas9',
        'matriculas10', 'matriculas11', 'matriculas12', 'matriculas13'));
    }
    

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request){
    
        if (strlen($request->asisAFImatr) != 7){
            session()->flash("status", "Matrícula no válida, deben ser 7 caracteres");
            return redirect()->route("AfiAssistants.index");
        }

        if (is_numeric($request->asisAFImatr) != 1){
            session()->flash("status", "Matrícula no válida, ingrese solo números");
            return redirect()->route("AfiAssistants.index");
        }

        /*
        $request->validate([<<
            'regAFIname' => ['required', 'regex:/^[a-zA-Z]+\s[a-zA-Z]+$/'],
        ], [
            'nombre_completo.regex' => 'El campo de nombre completo debe contener al menos dos palabras y no debe contener caracteres especiales',
        ]);
        */

        session()->flash("status", "El registro fue exitoso");
        return redirect()->route("AfiAssistants.index");
        //return redirect()->route("AfiAssistants");
        //Pinkus ña ña ña ña
    }
    
     /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
     public function update(Request $request){
    
    }

}
