<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Usuario;
use Illuminate\Http\Request;

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario','UsuarioController@index');

Route::post('/crear_user', 'UsuarioController@store');

Route::delete('/usuario/{usuario}','UsuarioController@delete');


Route::post('/usuario_edit/{id}', function ($id,Request $request) {
    file_put_contents('./log/log.txt', $id, FILE_APPEND);
    //$log=$usuario->nombre."-".$usuario->dpi."-".$usuario->role.date("j.n.Y")."\n";
    //file_put_contents('./log/log.txt', $log, FILE_APPEND);
    
    $usuario2=usuario::find($id);
    
    $log=$usuario2->nombre."-".$usuario2->dpi."-".$usuario2->role.date("j.n.Y")."\n";
    file_put_contents('./log/log.txt', $log, FILE_APPEND);
    
    $usuario2->dpi=$request->dpi;
    $usuario2->nombre=$request->nombre;
    $usuario2->role=$request->role;
    //$usuario2->nombre="mod";
    
    $log=$usuario2->nombre."-".$usuario2->dpi."-".$usuario2->role.date("j.n.Y")."\n";
    file_put_contents('./log/log.txt', $log, FILE_APPEND);
    
    $usuario2->save();
    

    return redirect('https://ias1a-ingeusac.c9users.io/Management/public/usuario');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin/asignarCursos',function(Request $request){
    $cursos = App\Curso::orderBy('codigo', 'asc')->get();
        return view('admin/ac', [
            'cursos' => $cursos
        ]);
});