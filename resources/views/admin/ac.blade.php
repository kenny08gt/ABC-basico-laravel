@extends('layouts.app')

@section('content')
<script type="text/javascript">
    var contenido=[
        @foreach ($cursos as $curso)
                    "{{$curso->codigo}} - {{$curso->nombre}}",
        @endforeach
        ];
</script>
<div class="container">
    <h3 class="heading">Buscar cursos</h3>
    <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="col s4"><p>Ingrese el curso que quiere impartir, luego seleccione abajo el correcto</p></div>
            <div class="input-field col s8">
              <input type="text" id="cursos" class="autocomplete" onkeyup="llenar_prediccion()" onkeydown="borrar_lista()">
              <label for="cursos">Curso</label>
            </div>
          </div>
            
           <div class="collection" id="lista">
            </ul>
        </div>
    </div>
</div>
<script>
      function borrar_lista() 
      {
          var resultsDiv=document.getElementById('lista');
          while ( resultsDiv.firstChild != null )
          {
              resultsDiv.removeChild( resultsDiv.firstChild );          
          }
          resultsDiv.style.display = "none";
      }
        function llenar_prediccion(){
            console.log("llenar prediccion");
            var searchField=document.getElementById('cursos');
            var txt=searchField.value.toLowerCase();
            var ul = document.getElementById("lista");            
            var fLen = contenido.length;
            var text="";
            for (i = 0; i < fLen; i++) {
                if((contenido[i].toLowerCase()).indexOf(txt) !== -1){
                    var li = document.createElement("a");
                    li.appendChild(document.createTextNode(contenido[i] ));
                    li.setAttribute("class","collection-item");
                    li.setAttribute("href","#nogo")
                    ul.appendChild(li);   
                }
            }
            ul.style.display = "block";
        }
         
</script>
@endsection
@section('scripts')
@endsection