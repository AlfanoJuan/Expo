<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminStaffPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::where('rol', '=', 'staff')->get();
        $staff = \App\Models\User::where('rol', 'staff')
        ->orderBy('key', 'asc')
        ->get();

        return view('admin.staff', compact('staff','accounts'));
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
        $randomKey = random_int(1000000, 9999999);

        $new_password = password_hash("staff2023_".$randomKey, PASSWORD_BCRYPT);

        $user = new User(['key'=> $randomKey,
                    'password' => $new_password,
                    'rol' => 'staff',
                    'permanent'=> true]);

        if($user->save()){
            session()->flash("status","Cuenta generada");
        }else{
            session()->flash("status","Hubo un problema en la generación de la cuenta");
        }
        return redirect()->route('adminStaffPage.index');
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

        $user = User::find($id);

        $user->key = $request->staffKey;
        $user->password = password_hash($request->staffPass, PASSWORD_BCRYPT);

        if($user->save()){
            session()->flash("update","Edición exitosa");
        }else{
            session()->flash("update","Hubo un error, intente de nuevo");
        }
        return redirect()->route('adminStaffPage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            session()->flash("delete","Se ha eliminado correctamente");
        }else{
            session()->flash("delete","Hubo un error, intente de nuevo");
        }

        return redirect()->route('adminStaffPage.index');

    }
}