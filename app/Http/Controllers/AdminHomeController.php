<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyPeople;
use App\Models\eventStudent;
use App\Models\externalPeopleEvent;
use App\Models\projectStudent;
use App\Models\company;
use App\Models\event;
use App\Models\User;
use App\Models\Student;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accounts = User::where('rol', '=', 'staff')->get();
        $finalCount = companyPeople::where('attended', '=', true)->get()->count();
        $finalCount += eventStudent::where('attended', '=', true)->get()->count();
        $finalCount += externalPeopleEvent::where('attended', '=', true)->get()->count();
        $finalCount += projectStudent::where('attended', '=', true)->get()->count();

        $studentsCount = eventStudent::where('attended', '=', true)->get()->count();
        $studentsCount += projectStudent::where('attended', '=', true)->get()->count();

        $externalCount = externalPeopleEvent::where('attended', '=', true)->get()->count();

        $femaleExternalCount = externalPeopleEvent::with('externalPeople')
            ->whereHas('externalPeople', function ($query) {
                $query->where('genre', '=', 'female');
            })->get()->count();

        $maleExternalCount = externalPeopleEvent::with('externalPeople')
        ->whereHas('externalPeople', function ($query) {
            $query->where('genre', '=', 'male');
        })->get()->count();

        $theyExternalCount = externalPeopleEvent::with('externalPeople')
        ->whereHas('externalPeople', function ($query) {
            $query->where('genre', '=', 'they');
        })->get()->count();

        $eventCount = event::all()->count();

        $companyCount = company::all()->count();

        $expositorCount = projectStudent::distinct('student')->count();

        $events = event::select('eventName')->get();

        $eventsName = [];

        foreach($events as $event){
            array_push($eventsName, $event->eventName);
        }

        $eventsTotalCount= [];

        foreach($events as $event){

            $tempCount = externalPeopleEvent::with('event')->whereHas('event', function ($query) use($event) {
                $query->where('eventName', '=', $event->eventName);
            })->where('attended', '=', true)->count();

            $tempCount += eventStudent::with('event')->whereHas('event', function ($query) use($event) {
                $query->where('eventName', '=', $event->eventName);
            })->where('attended', '=', true)->count();

            array_push($eventsTotalCount, $tempCount);
            $tempCount = 0;

        }

        return view('admin.index', compact('finalCount', 'studentsCount', 'externalCount', 'femaleExternalCount', 'maleExternalCount', 'eventCount', 'companyCount', 'expositorCount', 'eventsName', 'eventsTotalCount', 'accounts', 'theyExternalCount'));
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
        if($request->input('editPassword') != null && $request->input('confirmPassword') != null && $request->input('matricula') != null ){
            
            $matricula = intval($request->input('matricula'));
            $user = User::where('key', $matricula )->first();

            if($request->input('editPassword') == $request->input('confirmPassword')){
                $user->password = password_hash($request->input('editPassword'), PASSWORD_BCRYPT);
                
                if($user->save()){
                    session()->flash("status","Contraseña cambiada.");
                    
                }else{
                    session()->flash("status","Hubo un problema con la edición.");               
                }
                        
            }else{
                session()->flash("status","Las contraseñas no coinciden.");
            }                  
            
        }
        else{
            session()->flash("status","Campos incompletos.");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);

        if($student->delete()){
            session()->flash("status","Alumno eliminado correctamente");
        }else{
            session()->flash("status","Hubo un problema en la eliminación");
        }

        return redirect()->route('adminInicio.index');
    }

    public function hash()
    {
        $accounts = User::all();

        foreach ($accounts as $account)
        {
            //$id = $user->id;
            if(password_needs_rehash($account->password, PASSWORD_BCRYPT))
            {
                $user = User::find($account->id);
                $user->password = password_hash($account->password, PASSWORD_BCRYPT);
                $user->save();
            }
        }
        session()->flash("update","Edición exitosa");
        return redirect()->route('adminStaffPage.index');
    }
}
