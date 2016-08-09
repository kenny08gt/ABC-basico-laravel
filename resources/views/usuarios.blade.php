@extends('layouts.app')

@section('content')


 @include('common.errors')
 <div class="container">
<h3 class="heading">Agregar usuario</h3>
  <div class="row">
    <form  action="{{ url('crear_user') }}" method="POST" class="col s12">
        {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nombre">
          <label for="icon_prefix">Nombre</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">info</i>
          <input id="icon_telephone" type="number" class="validate" name="dpi">
          <label for="icon_telephone">DPI</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
            <select name="role">
              <option value="" disabled selected>Escoja una opción</option>
              <option value="1">Administrador</option>
              <option value="2">Operativo</option>
              <option value="3">Goku</option>
            </select>
            <label>Seleccione un rol</label>
          </div>
      </div>
      <div class="center-align">
       <button type="submit" class="btn-floating btn-large waves-effect waves-light red">
                        <i class="material-icons">add</i> Add Task
                    </button>
    </div>
    </form>
  </div>
  <br>
  <div >
      <h3 class="heading">Usuarios registrados</h3>
  <ul class="collapsible" data-collapsible="accordion">
      
        @foreach ($usuarios as $usuario)
            <li>
              <div class="collapsible-header"><i class="material-icons">stars</i>{{$usuario->nombre}}</div>
              <div class="collapsible-body">
                  <table>
                      <tr><td>
                  <table  class="highlight container">
                       <form  action="{{ url('usuario_edit/'.$usuario->id) }}" method="POST" class="col s12">
                      {{ csrf_field() }}
                      <th>Nombre</th><th>DPI</th><th>Rol</th>
                      <tr><td><input  disabled=true type="Text" name="nombre" id="nombre{{$usuario->id}}" value="{{$usuario->nombre}}"></td>
                      <td><input  disabled=true type="number" name="dpi" id="dpi{{$usuario->id}}" value="{{$usuario->dpi}}"></td>
                      <td><input  disabled=true type="number" min=1 max=3 name="role" id="role{{$usuario->id}}" value="{{$usuario->role}}"></td>
                      <td></td>
                      </tr>
                  </table>
                  </td>
                  <td><button disabled=true type="submit" class="btn-floating btn-large waves-effect waves-light blue" id="guardar{{$usuario->id}}">
                        <i class="material-icons" >note_add</i> Guardar
                        </form>
                      
                  </td>
                  <td>
                      <form  action="{{ url('usuario/'.$usuario->id) }}" method="POST" class="col s12">
          {{ csrf_field() }}
            {{ method_field('DELETE') }}
                  <button type="submit" class="btn-floating btn-large waves-effect waves-light red">
                        <i class="material-icons">delete</i> Delete
                    </button>
                    </form>
                    </td>
                    <td>
                      <button type="button" class="btn-floating btn-large waves-effect waves-light yellow" onClick="habilitar_cambios({{$usuario->id}})">
                        <i class="material-icons">mode_edit</i> Editar
                        </td>
                    </tr>
                    </table>
              </div>
            </li>
        @endforeach
        
  </ul>
  </div>
  </div>
  @endsection
  
  @section('scripts')
  
      function habilitar_cambios($id){
          console.log("Habilitar cambios "+$id);
          document.getElementById('dpi'+$id).disabled = false;
          document.getElementById('nombre'+$id).disabled = false;
          document.getElementById('role'+$id).disabled = false;
          document.getElementById('guardar'+$id).disabled = false;
          /*$('#dpi'+$id).prop('disabled', false);
          $('#nombre'+$id).prop('disabled', false);
          $('#role'+$id).prop('disabled', false);*/
      }
  @endsection