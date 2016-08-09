<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;

class UsuarioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $usuarios = Usuario::orderBy('created_at', 'asc')->get();
        return view('usuarios', [
            'usuarios' => $usuarios
        ]);
    }
    public function store(Request $request){
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
    }
    public function delete(Request $request,Usuario $usuario){
        $usuario->delete();
        return redirect('https://ias1a-ingeusac.c9users.io/Management/public/usuario');
    }
    
    
}
