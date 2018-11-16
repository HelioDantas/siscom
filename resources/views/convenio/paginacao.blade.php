@extends('layout.app')

@section('estilos')
<style>
    .btn{
        
    }
    .pesquisar{
        margin-top:1.7rem;
    }
    .seletorSexo{
        margin-top: 2rem;
        padding-right: 1.5rem;
        margin-top:1.7rem; 
    }
    .endCentralizado > label{
        color:blue;
        text-aling:center;
        
    }
    .form-control{
        border-radius:10px 10px; 
    }
    .titulocadastro{
        margin:0 auto;
        margin-top:2rem;
        width:80rem;
    }
    .naveg{
        float: left;
    }
    .navegacao{
        text-align:right ;
    }

</style>
@endsection


@section('conteudo')

        <h4 class="titulocadastro">Lista de Convenio</h4>   
@endsection

@section('navegação')

        
@endsection

@section('tela')

<table class="table">
    <?php foreach($paginacao as $c): ?>
        <tr>
            <td> <?= $c->cnpj ?> </td>
            <td> <?= $c->nome ?> </td>
            <td> <?= $c->adesao ?> </td>
            <td> <?= $c->banco ?> </td>
            <td> <?= $c->agencia ?> </td>
            <td> <?= $c->conta ?> </td>
            <td> <?= $c->status ?> </td>
              <a href="/paginacao.link"></a>
                Listar Convênio
          
          </a>
        </td> 
       </tr>
    <?php endforeach ?>
  </table>

  {{$paginacao->links() }}
  @endsection