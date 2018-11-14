@extends('layout.app')
@section('estilos')
<style>
    .dashboard{
        margin-top: 2rem;
        padding: 3rem;
        height: 10rem;
        width: 100%;

    }

</style>
@endsection


@section('conteudo')
<div class="container dashboard">
    b4-carou
</div>


@endsection

@section('scripts')
  
<script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>

@endsection
