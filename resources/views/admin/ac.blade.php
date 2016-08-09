@extends('layouts.app')

@section('content')
<script type="text/javascript">
    var contenido=[
        @foreach ($cursos as $curso)
            
                    "{{$curso->codigo}} - {{$curso->nombre}}",
        @endforeach
        ];
        llenar_prediccion();
</script>
<div class="container">
    <h3 class="heading">Buscar cursos</h3>
    <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="col s4"><p>Ingrese el curso que quiere impartir</p><p> luego seleccione abajo el correcto</p></div>
            <div class="input-field col s8">
              <input type="text" id="cursos" class="autocomplete" onkeyup="llenar_prediccion()" onkeydown="borrar_lista()">
              <label for="cursos">Curso</label>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="collection" id="lista"></div>
        </div>
        <div class="col s6">
            <div class="collection" id="lista2"></div>
            <a class="waves-effect waves-light btn center-align">Guardar</a>
        </div>
    </div>
</div>
<div id="modal1" name="modal1" class="modal"></div>
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
                if((contenido[i].toLowerCase()).indexOf(txt) !== -1){ //comprueba si la palabra a buscar existe en la base de datos
                    var li = document.createElement("a");
                    li.appendChild(document.createTextNode(contenido[i] ));
                    li.setAttribute("class","collection-item");
                    li.setAttribute("onclick","open_modal('"+contenido[i]+"')");
                    ul.appendChild(li);   
                }
            }
            ul.style.display = "block";
        }
        
        function open_modal(curso){
            var modal1=document.getElementById('modal1');
            while ( modal1.firstChild != null )
              {
                  modal1.removeChild( modal1.firstChild );          
              }
            var content = document.createElement("div");
            content.setAttribute('class','modal-content');
            var header=document.createElement("h4");
            header.innerText="Confirmación";
            var pa=document.createElement("p");
            pa.innerText="¿Quiere agregar el curso "+curso+"?";
            content.appendChild(header);
            content.appendChild(pa);
        
            var footer=document.createElement("div");
            footer.setAttribute("class","modal-footer");
            var btnAgree=document.createElement("a");
            btnAgree.setAttribute("class","modal-action modal-close waves-effect waves-green btn-flat");
            btnAgree.setAttribute("onclick","agregar_curso('"+curso+"')");
            btnAgree.innerText="Aceptar";
            
            var btnCancel=document.createElement("a");
            btnCancel.setAttribute("class","modal-action modal-close waves-effect waves-green btn-flat");
            btnCancel.innerText="Cancelar";
            
            
            footer.appendChild(btnCancel);
            footer.appendChild(btnAgree);
            
            modal1.appendChild(content);
            modal1.appendChild(footer);
                
             $('#modal1').openModal();
        }
        function agregar_curso(curso){
            var ul = document.getElementById("lista2");
            var li = document.createElement("a");
            li.appendChild(document.createTextNode(curso));
            li.setAttribute("class","collection-item indigo-text text-darken-4");
            ul.appendChild(li);   
            
            var fLen = contenido.length;
            for (i = 0; i < fLen; i++) {
                if((contenido[i] == curso)){
                    contenido.splice(i, 1);
                    borrar_lista();
                    llenar_prediccion();
                    break;
                }
            }
        }
</script>
@endsection
@section('scripts')
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
@endsection