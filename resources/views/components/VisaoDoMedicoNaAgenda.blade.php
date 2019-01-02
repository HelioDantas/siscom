 <label for="">Medicos</label>
        <select name="medico" id="medico" class="form-control">
            @if (isset($med) && !empty($med))
            <option value="{{ $med->funcionario->matricula }}" selected>{{ $med->funcionario->nome }}</option>  
             
            @endif
      
        </select>
</div>

<div class="col-4 center">                                                
        <label for="">especialidades</label>
        <select name="especialidade" id="especialidade" class="form-control">
            @if (isset($esp) && !empty($esp) && $esp != "")
                <option value="{{ $esp->id }}" selected>{{ $esp->nome }}</option>  
                    @foreach($DemaisEspecialidadesDoMedicoSemSerAEscolhida as $especialidade)
                        <option value="{{ $especialidade->id }}" >{{ $especialidade->nome }}</option>  
                @endforeach
            @else
                @foreach($especialidade as $especialidade)
             
                        <option value="{{ $especialidade->id }}" >{{ $especialidade->nome }}</option>  
                @endforeach
            @endif

            </select>                 
</div>
            
<div class="col-3 center">
    <label for="data">Data</label>
    <input type="date" name="data" id="data"    maxlength="20" class="form-control {{$errors->has('data') ? 'is-invalid': '' }}"   
        @if(empty($date) && $date == "" ) value= '<?php echo date("Y-m-d"); ?>' @else value = {{ $date}}@endif>

</div>