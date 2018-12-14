@extends('layout.app')
 @section('estilos')
<style>
    .save{
        margin-top: 2rem;
        float:right;
        
    }
    .back{
        margin-top: 2rem;
        float:right;
        padding-left: 1rem;
    }
    .ctt{
      
   -ms-flex-align: center;
     
     }
     .lista{
         margin-top: 2rem;
         text-align: center;
     }
     form{
         margin-left: 15%;
     }
     .h2{
         text-align: center;
     }
     #detalheTop{
        margin-top: 5%;
     }
   .center{
        margin: auto;
  width: 50%;

  padding: 10px;
 text-align: center;

   }
   .row{

      text-align: center; 
   }
tbody {
 width: 200px;
 height: 400px;
 overflow: auto;
}
.fixed_header tbody{
  display:block;
  overflow:auto;
  height:200px;
  width:100%;
}
.fixed_header thead tr{
  display:block;
}
}</style>
@endsection

@section('tela')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>

            <div class = '  '>
          
                        <div class="col-md-4 mb-3 center">
                            <div class="form-group ">

                                <label for="selectbasic">Medicos </label>

                                <select id="medico" class = "form-control">
                                @foreach($especialidade as $e)
                                    <optgroup label="{{$e->nome}}">
                                        @foreach($e->Medico as $medico)
                                             <option value={{$medico->funcionario->matricula}}>{{$medico->funcionario->nome}}</option>
                                        @endforeach
                                    </optgroup>
                                 @endforeach
                                 </select>
                            </div>
                        </div>
               

               
                        <div class="form-group  col-md-3 mb-3 center">
                            <label for="nome">Data</label>
                            <input type="date" name="nome" id="nome"   value = document.querySelector('input[type="date"]') maxlength="49" class="form-control {{$errors->has('nome') ? 'is-invalid': '' }}" placeholder="nome" required
                            @if(!empty($p)) value = "{{$p->nome}}" @else value = {{old('nome')}} @endif>

                        </div>
                    

                    </div>
     
                    <div class="card-body header">
                    <div class="table-responsive scrolltable" style="overflow-y:auto;">  
                        <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">horario      </th>
                            <th scope="col">paciente           </th>   
                            <th scope="col">procedimeno             </th>
                     <!--        <th scope="col">nascimento      </th>
                            <th scope="col">sexo            </th>
                            <th scope="col">telefone        </th>
                            <th scope="col">naturalidade    </th>
                       <th scope="col">rua             </th>
                            <th scope="col">numero          </th>
                            <th scope="col">bairro          </th>
                            <th scope="col">cep             </th>
                            <th scope="col">cidade          </th>
                            <th scope="col">estado          </th>
                            <th scope="col">telefone        </th>
                            <th scope="col">celular         </th>
                            <th scope="col">email           </th>-->
                           
                            <th scope="col">opções</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                    </tbody>
                   
                </table> 
                 </div>
        </div>
      
        </div>
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="container-fluid">
                    <form>
                       <div class="row">
                           <div class="col">

                            <input type="text" class="form-control">
                           </div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                       </div>
                       
                    </form>
                </div>
              </div>
            </div>
          </div>

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>
<script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>
    @endsection


