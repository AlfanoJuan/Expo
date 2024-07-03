<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\student;
use App\Models\project;
use App\Models\projectStudent;
use App\Models\validation_tokens;
use App\Models\projects_datas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('porfolio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectdata = projects_datas::join('projects', 'projects_datas.id_proyect', '=', 'projects.id')
            ->select('projects.subject', 'projects.nameProject', 'projects_datas.imagen_url', 'projects.id', 'projects_datas.description', 'projects_datas.video_url')
            ->where('projects.id', $id)
            ->get();
        
        $studentsdata = projectStudent::join('students', 'project_students.student', '=', 'students.enrollment')
        ->select('students.fullName','students.enrollment')
        ->where('project_students.project', '=', $id)
        ->get();
        
        if(!isset($projectdata[0]) || !isset($studentsdata[0]))
        {
            return redirect()->route('Portfolio.index');
        }
           
        return view('project', compact('projectdata', 'studentsdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function student($name)
    {
        $projectdata = array();
        
        if($name != null)
        {
            $students = student::join('project_students', 'students.enrollment', '=', 'project_students.student')->select('project_students.project', 'students.enrollment')->where('students.fullName', '=', $name)->get()->first();
            $projectdata == null;
        }
        
        if($students != null)
        {
            $projectdata = projects_datas::join('projects', 'projects_datas.id_proyect', '=', 'projects.id')
            ->select('projects.subject', 'projects.nameProject', 'projects_datas.imagen_url', 'projects.id')->where('projects.id', '=', $students->project)
            ->get();
        }
            
        return view('portfoliostudent', compact('projectdata'));
    }

    public function base($name)
    {

        $array_subjects = array();
        $title = "";

        switch ($name) {
            case 'programacion':
                $array_subjects = array('Programación avanzada', 'Programación básica', 
                                        'Estructura de datos','Modelos de administración de datos', 
                                        'Administración de alto volumen de datos', 'Programación web I', 
                                        'Interface y experiencia de usuario en web', 'Base de datos multimedia', 
                                        'Procesamiento de imágenes', 'Programación web II');
                                        $title = "Programación";
                break;

            case 'arte':
                $array_subjects = array('Dibujo de la anatomía humana', 'Tecnologías multimedia', 'Modelado arquitectónico', 
                                        'Producción multimedia', 'Modelado orgánico', 'Fotografía digital', 
                                        'Cinematografía', 'Animación básica', 'Preproducción de vídeo', 'Preproducción 2D', 
                                        'Modelado en alto poligonaje', 'Ilustración digital', 'Efectos Visuales l', 
                                        'Actuación y dirección para animación', 'Animación tradicional de humanos y de animales', 
                                        'Efectos visuales II', 'Animación tradicional de escenarios', 'Esqueletos de personajes', 
                                        'Postproducción');
                                        $title = "Arte";
                break;

            case 'rv':
                $array_subjects = array('Realidad virtual');
                $title = "Realidad virtual";
                break;

            case 'videojuegos':
                $array_subjects = array('Programación orientada a objetos', 'Lenguaje ensamblador', 'Gráficas computacionales I', 
                                        'Diseño de hápticos', 'Gráficas computacionales II', 'Escenarios de videojuegos', 
                                        'Optimización de videojuegos', 'Gráficas computacionales en web', 
                                        'Diseño de videojuegos en línea');
                                        $title = "Videojuegos";
                break;

            default:
                $array_subjects = array();
                break;
        }

        $projectdata = projects_datas::join('projects', 'projects_datas.id_proyect', '=', 'projects.id')
        ->select('projects.subject', 'projects.nameProject', 'projects_datas.imagen_url', 'projects.id')
        ->get();

        $projectdataFinal = array();

        for($i=0; $i < count($projectdata); $i++)
        {
            if(in_array($projectdata[$i]->subject, $array_subjects))
            {
                array_push($projectdataFinal, $projectdata[$i]);
            }
        }
        
         return view('porfolio_subject', compact('projectdataFinal', 'title'));
    }
}