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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario', function (Request $request) {
    //
    $usuarios = Usuario::orderBy('created_at', 'asc')->get();
    return view('usuarios', [
        'usuarios' => $usuarios
    ]);
});

Route::post('/crear_user', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
    ]);

     if ($validator->fails()) {
        return redirect('/errors')
            ->withInput()
            ->withErrors($validator);
    }

    $usuario=new usuario;
    $usuario->dpi=$request->dpi;
    $usuario->nombre=$request->nombre;
    $usuario->role=$request->role;
    $usuario->save();
    

    return redirect('https://ias1a-ingeusac.c9users.io/Management/public/usuario');
});
Route::delete('/usuario/{usuario}', function (usuario $usuario) {
    $usuario->delete();

    return redirect('https://ias1a-ingeusac.c9users.io/Management/public/usuario');
});
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
