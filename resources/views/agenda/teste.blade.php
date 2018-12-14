@extends('layout.app')
@section('estilos')
    <style>
    #wrapper{
        margin-top: 2rem;
        margin-left: -5rem;
     
     
    }
    .sidebar-wrapper{
        float: left;
        
        height: auto;
     
    }
    </style>
@endsection

@section('tela')
<div class="container-fluid">
<div id="wrapper">
<div class="sidebar-wrapper">
        <div style="overflow:hidden;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-12-lg-10-sm-8-mb-8">
                            <div id="datetimepicker"></div>
                        </div>
                    </div>
                </div>
</div>
</div>

</div>

    {{-- 
<div style="overflow:hidden;">
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <div id="datetimepicker12"></div>
            </div>
        </div>
    </div>
    
</div> --}}
@endsection

@section('scripts')

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            inline: true,
            sideBySide: true,
            locale: 'js/pt-br'
        });
    });

    
</script>
@endsection