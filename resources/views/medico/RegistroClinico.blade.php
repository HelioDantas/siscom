@extends('layout.app')
  @section('links')   
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    @endsection
 @section('estilos')
<style>
  
    .tdEspaco { display: table; float:left; margin-right:10px }
  
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
         margin-top: 1rem;
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
  
.fixed_header {
  display:block;
  overflow:auto;
 
  height:33rem;

  
 
}
.ui-front {
    z-index: 9999;
}

.contentBusca{
    margin-top: 1rem;
}

.opcoesDeNavegacao{
 
   display: inline-block;
    
}
 
 .yyyyy{

      
  
    
     margin-bottom: 2rem;

 }
  .infosPaciente{
      border-radius: 20px ;
  }
 .right {
 overflow:auto;
display: inline;
   

}
  .btnTop{
      margin-top: 1rem;
      margin-left: 0.5rem;
  }
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; } 
 

	.titulopacientes {
		display: ruby-base-container;
	}

     @media(max-width: 1350px){
        .titulopacientes{

                 margin-left: 10%; 
        }
    }
       @media(max-width: 1550px ){
        .respom{

                 margin-left: 30%; 
        }
    }

         @media(max-width: 2050px ){
        .respom{

                 margin-left: 45%; 
        }
    }


    .fixed_header {
  display:block;
  overflow:auto;
 
  height:33rem;

  
 
}
</style>

@endsection

@section('telaListarPaciente')
<hr>
<div class = 'container-fluid col-lg-12 corpo-paciente'>
        <h3 class="titulopacientes respom">Registros Clinicos</h3>
        <div class =" yyyyy">
                <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                <div class = '  opcoesDeNavegacao '>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="registros-tab" data-toggle="tab" href="#registros" role="tab" aria-controls="registros" aria-selected="true">Registros Clinicos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Atendimento</a>
                                </li>
                            
                                <li class="nav-item">
                                    
                                    {!! Form::open(['route' => 'medico.BuscarPorRegistrosClinicos','method ' => 'post','name'=>'form']) !!} @csrf
                                    
                                        <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <select name="tipobusca" id="tipobusca"class="form-control  mb-2" >
                                                       
                                                        <option value="paciente">paciente</option>
                                                        <option value="data">data</option>
                                                        <option value="medico">medico</option>
                                                        <option value="telefone">telefone</option>
                                                        <option value="celular">celular</option>
                                                        <option value="cpf">cpf</option>
                                                    </select>
                                                </div>

                                                <div class="col-auto">
                                                    <label class="sr-only" for="inlineFormInput">Pesquisa</label>
                                                    <input type="text" name = 'search'class="form-control mb-2" id="inlineFormInput" placeholder="Nome, prontuario">
                                                </div>
                                        
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-secondary mb-2">Search</button>
                                                </div>
                                        </div>
                                        

                                    {!! Form::close() !!}  

                                    
                                </li>
                        </ul>     
            </div>


        </div>

        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active   " id="registros" role="tabpanel" aria-labelledby="registros-tab">
                        <div class = 'd-print-inline  table-responsive'>
                            @if (isset($agendamentos))

                                    <table class="table table-hover ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">horario      </th>
                                                <th scope="col">paciente     </th>   
                                                <th scope="col">cpf          </th>
                                                <th scope="col">telefone     </th> 
                                                <th scope="col">celular     </th>     
                                                <th scope="col">opções       </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($agendamentos as $h)
                                                    <tr>
                                                            <td>{{ $h->hora }}</td>
                                                            <td>{{ $h->paciente }}</td>
                                                            <td>{{ $h->cpf }}</td>
                                                            <td>{{ $h->telefone }}</td>
                                                            <td>{{ $h->celular }}</td>
                                                            <td>                                               
                                                                <button type="button" class="btn btn-outline-success showRegistro" value = "{{ $h->id }}" data-target='#registro' title="Registro"><i class="fas fa-times"></i></button>           
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                        
                                                
                                        
                                        </tbody>
                                    </table>
                                            
                                  {!!$agendamentos->appends(['search' => $search, 'tipobusca' => $tipobusca])->links()!!}
                                        
                                 @endif   

                        </div>
             
                 </div>

                   
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @include('components.RegistroClinico')
                </div> 
        </div>     
</div>
                     
@endsection

    @section('scripts')



    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Registro.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection


