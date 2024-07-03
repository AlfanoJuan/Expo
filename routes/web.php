<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpositorController;
use App\Http\Controllers\ExpositorQRController;
use App\Http\Controllers\TeacherCreatesExpositorController;
use App\Http\Controllers\AttendanceCompanyController;
use App\Http\Controllers\StaffCompanyController;
use App\Http\Controllers\AdminStaffPageController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StaffExpositorController;
use App\Http\Controllers\StaffEventController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPersonCompany;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MapCIController;
use App\Http\Controllers\AfiRegisterController;
use App\Http\Controllers\AfiAssistantsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\TeacherCreatesTeamController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DelfinController;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/delfinEasterEgg', [DelfinController::class, 'index']);
Route::get('/expo', [WelcomeController::class, 'index'])->name('expo.index');
Route::get('/MapCI', [MapCIController::class,'index']);
Route::get('/AfiRegister', [AfiRegisterController::class,'index']);
Route::resource('/AfiRegister', AfiRegisterController::class, [
    'index' => 'AfiRegister.index',
    'store' => 'AfiRegister.store',
]);

Route::get('/AfiAssistants', [AfiAssistantsController::class,'index']);
Route::resource('/AfiAssistants', AfiAssistantsController::class, [
    'index' => 'AfiAssistants.index',
    'store' => 'AfiAssistants.store'
]);

Route::get('/', [IndexController::class, 'index']);
Route::resource('/Portfolio', PortfolioController::class, [
    'index' =>  '/Portfolio.index',
    'show' =>  '/Portfolio.show',
]);

Route::get('/Portfolio/subject/{name}', [PortfolioController::class, 'base'])->name('Portfolio.subject');
Route::get('/Portfolio/student/{name}', [PortfolioController::class, 'student'])->name('student');

/*
Route::resource('/Portfolio/subject/', PortfolioController::class, [
    'index' =>  '/Portfolio/subject.index',
    'show' =>  '/Portfolio/subject.show',
]);
*/

//Route::get('email/{email}', 'CommentController@edit')->name('email');


//Acceso todos inicio sesion
Route::resource('/inicioSesion', LoginController::class, [
    //1. Vista inicio sesion
    'index' => 'inicioSesion.index',
    //2. Enviar request
    'store' => 'inicioSesion.store'
]);

//Solo los de sesion

Route::get('cerrarSesion', [LoginController::class, 'logOut']
)->name('cerrarSesion')->middleware('LogOut');

Route::group(['middleware' => 'isAdmin'], function () {

    // Acceso SOLO ADMIN
    
    /*Visitante Expo*/
    
    Route::resource('adminRegistroVisitor', VisitorsController::class ,[
        'create' => 'adminRegistroVisitor.create'
    ]);
    
    Route::resource('adminInicio', AdminHomeController::class ,[
        'index'     => 'adminInicio.index',
        'update'    => 'adminInicio.update',
        'destroy'   => 'adminInicio.destroy'
    ]);
    
    Route::post('/adminInicio/hash', [AdminHomeController::class, 'hash'])->name('adminInicio.hash');

    Route::resource('adminStaff', AdminStaffController::class ,[
        'store'     => 'adminStaff.store',
        'update'    => 'adminStaff.update',
        'destroy'   => 'adminStaff.destroy'
    ]);

    Route::resource('adminStaffPage', AdminStaffPageController::class ,[
        'index'     => 'adminStaffPage.index',
        'store'     => 'adminStaffPage.store',
        'update'    => 'adminStaffPage.update',
        'destroy'   => 'adminStaffPage.destroy'
    ]);

    Route::resource('adminRegistroPersonaEmpresa', AdminPersonCompany::class ,[
        'show'      => 'adminRegistroPersonaEmpresa.show',
        'store'     => 'adminRegistroPersonaEmpresa.store',
        'update'    => 'adminRegistroPersonaEmpresa.update'
    ]);

    Route::resource('adminRegistroEmpresas', CompaniesController::class ,[
        'index'     =>  'adminRegistroEmpresas.index',
        'store'     =>  'adminRegistroEmpresas.store',
        'update'    =>  'adminRegistroEmpresas.update',
        'destroy'   =>  'adminRegistroEmpresas.destroy'
    ]);

    Route::resource('adminRegistroEventos', EventsController::class ,[
        'index'     => 'adminRegistroEventos.index',
        'store'     => 'adminRegistroEventos.store',
        'show'      => 'adminRegistroEventos.show',
        'update'    => 'adminRegistroEventos.update',
        'destroy'   => 'adminRegistroEventos.destroy'
    ]);

    Route::get('editarEvento/{eventToEdit}', [EventsController::class, 'editarEvento'])->name('editarEvento');

    Route::resource('adminRegistroInvitados', GuestsController::class ,[
        'index'     => 'adminRegistroInvitados.index',
        'store'     => 'adminRegistroInvitados.store',
        'update'    => 'adminRegistroInvitados.update',
        'destroy'   => 'adminRegistroInvitados.destroy'
    ]);

    Route::get('editarInvitado/{guestToEdit}', [GuestsController::class, 'editarInvitado'])->name('editarInvitado');

    Route::resource('adminRegistroMaestros', TeachersController::class ,[
        'index'     => 'adminRegistroMaestros.index',
        'store'     => 'adminRegistroMaestros.store',
        'update'    => 'adminRegistroMaestros.update',
        'destroy'   => 'adminRegistroMaestros.destroy',
        'email'     => 'adminRegistroMaestros.mail'
    ]);

    Route::get('editarMaestro/{teacherToEdit}', [TeachersController::class, 'editarMaestro'])->name('editarMaestro');

    Route::get('email/{id}', [EmailController::class, 'email'])->name('email');
});

Route::group(['middleware' => 'isStaffOrAdmin'], function () {

    //Acceso staff y admin

    //VISITANTE
    Route::get('/adminVisitorExpo', function(){
        return view('admin.visitor');
    });

    //EMPRESAS
    Route::resource('staffEmpresa', StaffCompanyController::class, [
            //1. Mostrar en staff las empresas
        'index' => 'staffEmpresa.index',
            //2. Mostrar en staff 1 empresa
        'show' => 'staffEmpresa.show',
        //3. Asistencia de empresa persona
        'update' => 'staffEmpresa.update'
    ]);

    //EXPOSITOR
    Route::resource('staffExpositor', StaffExpositorController::class, [
        //1. Mostrar para leer el qr
        'index' => 'staffExpositor.index',
        //2. Leer qr
        'store' => 'staffExpositor.store'
    ]);

    //EVENTO
    Route::resource('staffEvento', StaffEventController::class, [
        //1. Mostrar en staff los eventos
        'index' => 'staffEvento.index',
        //2. Mostrar en staff 1 evento
        'show' => 'staffEvento.show',
        //3. Attendance
        'update' => 'staffEvento.update'
    ]);



});

Route::group(['middleware' => 'isTeacherOrAdmin'], function () {

    //Acceso solo maestros y admin
    Route::resource('teacherRegistroExpositor', TeacherCreatesTeamController::class, [
        'index' =>  'teacherRegistroExpositor.index',
        'store' =>  'teacherRegistroExpositor.store',
        'show'  =>  'teacherRegistroExpositor.show'
    ]);
});

//Acceso General
Route::resource('RegisterTeam', TeacherCreatesExpositorController::class, [
    'index' =>  'RegisterTeam.index',
    'store' =>  'RegisterTeam.store'
]);


Route::group(['middleware' => 'isExpositor'], function () {

    //Acceso solo expositores
    Route::resource('expositorQR', ExpositorQRController::class, [
        'index' => 'expositorQR.index'
    ]);


    Route::get('/RegistroNetworking', [ExpositorQRController::class, 'apiStoreNetworking'])->name('RegistroNetworking');
});

use Illuminate\Support\Facades\Artisan;

Route::get('link', function(){
    Artisan::call('storage:link');
});



