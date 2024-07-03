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

class TeacherCreatesExpositorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Crear expositor - TEACHER
        return view('register');
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
        //$AuthToken = new validation_tokens();
        $AuthTokenfind = validation_tokens::where('token', $request->codeProject, 'and')->where('used', false)->get()->first();
        if($AuthTokenfind != null)
        {

            //Validaciones

            if($request->nameProject == null || $request->descProject == null || $request->videoProject == null
                || $request->imgProject == null)
            {
                session()->flash("status", "Hubo un problema en el registro");
                return redirect()->route("RegisterTeam.index");
            }

            if(!preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}$/', $request->videoProject))
            {
                session()->flash("status", "No se ingreso un link de video valido");
                return redirect()->route("RegisterTeam.index");
            }

            //Max 500 caracteres del textarea
            if(strlen($request->descProject) > 500)
            {
                session()->flash("status", "No se permiten más de 500 caracteres en la descripción");
                return redirect()->route("RegisterTeam.index");
            }

            
            $file = $request->file('imgProject');
            $allowedFileTypes = ['jpeg', 'png', 'jpg'];
            //list($width, $height) = getimagesize($_FILES['imgProject']['tmp_name']);
            
            if($file->getSize() > 10000000 || in_array($file->getClientOriginalExtension(), $allowedFileTypes) == false
            )
            {
                session()->flash("status", "La imagen no tiene las características permitidas");
                return redirect()->route("RegisterTeam.index");
            }
            
            $proyectUpdate = project::find($AuthTokenfind->proyect_id);
            $proyectUpdate->nameProject = $request->nameProject;
            $proyectUpdate->save();

            $projectStudent = new projectStudent();
            $projectStudentfind = projectStudent::where('project', $proyectUpdate->id)->get();

            for ($i=0; $i < count($projectStudentfind); $i++) { 
                $studentfind = student::find($projectStudentfind[$i]->student);
                $partesNombres = explode(' ', $studentfind->fullName);
                $firstName = $partesNombres[0];
                $user = new User(['key'=> $studentfind->enrollment,
                    'password' => password_hash((strtolower(str_replace(' ', '', $firstName))."_".$studentfind->enrollment), PASSWORD_BCRYPT),
                    'rol' => 'expositor',
                    'permanent'=> false
                ]);
                $user->save();
            }

            $projects_data = new projects_datas();
            $projects_data->description = $request->descProject;
            $projects_data->video_url = $request->videoProject;
            if($request->DriveProject != null)
            {
                $projects_data->drive_url = $request->DriveProject;
            }
            $fileName = $request->nameProject . "_" . $proyectUpdate->id;
            //Nombre de archivo
            $fileName = $request->nameProject . "_" . $proyectUpdate->id."_".$request->file('imgProject')->getClientOriginalName();
            //Guardar archivo
            Storage::disk('public')->put($fileName, file_get_contents($request->file('imgProject')));
            $projects_data->imagen_url = $fileName;
            $projects_data->id_proyect = $proyectUpdate->id; 

            $projects_data->save();

            $AuthTokenfind->used = true;

            if($AuthTokenfind->save())
            {
                session()->flash("status", "Registro de proyecto exitoso");
            }
            else
            {
                session()->flash("status", "Hubo un problema en el registro");
            }
            
        }
        else
        {
            session()->flash("status", "Código de autorización invalido");
        }

        return redirect()->route("RegisterTeam.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}