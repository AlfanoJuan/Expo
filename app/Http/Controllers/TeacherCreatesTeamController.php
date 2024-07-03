<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\student;
use App\Models\project;
use App\Models\projectStudent;
use App\Models\validation_tokens;
use App\Models\teacher;

class TeacherCreatesTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Crear expositor - TEACHER
        return view('teacher.index');
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

        $numStudents = $request->inputCount;
        $semester = $request->semester;
        $ua = $request->UA;
        $projectName = "Proyecto_" . str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        $project = new project();
        $project->semester = $semester;
        $project->subject = $ua;
        $project->nameProject = $projectName;

        $project->save();

        $suffix = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $token = str_replace(array('.',mt_rand(0, 9)),'-',uniqid($suffix, true));

        $regex = '/^[^\s]+(\s[^\s]+){2,}$/';

        for($i = 0; $i < $numStudents; $i++) {

            $fullName = $request->{"name".$i};
            if (preg_match($regex, $fullName)) {
                //Correcto!
            } else {
                ///echo "No se encontraron más de dos espacios entre las palabras.";
                session()->flash("status", "Hubo un problema en el registro");
                return redirect()->route("teacherRegistroExpositor.index");
            }
            $arrayName = explode(" ",$fullName);
            $enrollment = $request->{"enrollment".$i};

            $firstName = $arrayName[0];
            $lastName = $arrayName[1]." ".$arrayName[2];

            $thisUser = student::find($enrollment);

            # Crea un usuario y un estudiante si NO existe

            if(is_null($thisUser)) {

                /*$user = new User(['key'=> $enrollment,
                    'password' => password_hash((strtolower(str_replace(' ', '', $firstName))."_".$enrollment), PASSWORD_BCRYPT),
                    'rol' => 'expositor',
                    'permanent'=> false
                ]);*/

                //if($user->save()) {
                    $student = new student();

                    $student->enrollment = $enrollment;
                    $student->fullName = $fullName;

                    $student->save();

                //}
            }

            $projectStudent = new projectStudent();
            $projectStudent->project = $project->id;
            $projectStudent->student = $enrollment;
            $projectStudent->attended = false;
            $projectStudent->save();
        }

        $token_validation = new validation_tokens();
        $token_validation->token = $token;
        $token_validation->subject = $ua;
        //$token_validation->plan = $request->planvalue;
        $token_validation->plan = 420;
        $token_validation->used = false;
        $teacher = new teacher();
        $teacher_id = $teacher::where('user', session()->get('id'))->get()->first();
        if($teacher_id == null)
        {
            $token_validation->teacher_id = 7;
        }
        else
        {
            $token_validation->teacher_id = $teacher_id->id;
        }
        
        $token_validation->proyect_id = $project->id;

        if($token_validation->save()){
            session()->flash("status", "Registro expositor exitoso");
        }else{
            session()->flash("status", "Hubo un problema en el registro");
        }

        return redirect()->route("teacherRegistroExpositor.index");
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $teacher = new teacher();
        $teacher_id = $teacher::where('user', session()->get('id'))->get()->first();
        if($teacher_id == null)
        {
            $teacher = User::where('id', session()->get('id'), 'and')->where('rol', 'admin')->get()->first();
            if($teacher != null)
            {
                $AuthTokenfind = validation_tokens::all();
            }
            else
            {
                return view('welcome');
            }
        }
        else
        {
            $AuthTokenfind = validation_tokens::where('teacher_id', $teacher_id->id)->get();
        }
        
        $final_data = array();

        for ($i=0; $i < count($AuthTokenfind); $i++)
        {
            //$findproyectstudents = projectStudent::where('project', $AuthTokenfind[$i]->proyect_id)->get();
            $data_token = array();
            $findproyectstudents = projectStudent::join('students', 'project_students.student', '=', 'students.enrollment')
            ->select('students.enrollment', 'students.fullName')
            ->where('project_students.project', $AuthTokenfind[$i]->proyect_id)
            ->get();

            for ($j=0; $j < count($findproyectstudents); $j++) { 
                array_push($data_token, array("fullname"=>$findproyectstudents[$j]->fullName,
                                              "matricula"=>$findproyectstudents[$j]->enrollment));
            }

            array_push($final_data, array("token"=>$AuthTokenfind[$i]->token, "active"=>$AuthTokenfind[$i]->used,
                                            "subject"=>$AuthTokenfind[$i]->subject, "data" =>$data_token));
        }

        return view('teacher.show', compact('final_data'));
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