 <div class="row"> 
                
          <div class="col-md-12">
            <div class="form-group ">
                <label for="nome">Queixa principal</label>
                <input type="text" class="form-control "  maxlength="100" name="queixaPrincipal" id ="QueixaPrincipal" value = "{{ old('queixaPrincipal') }}" required>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">História</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="historia" rows="3" required placeholder="História"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Problemas</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="problemas" required placeholder="Problemas"value = "{{ old('problemas') }}"></textarea>
        </div> 

        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Prognóstico</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prognostico" required placeholder="Prognóstico" ></textarea>
        </div>                       
    
    
    <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Orientação</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="orientacao"placeholder="Orientação"></textarea>
        </div>     
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Medicamentos</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="medicamento" required placeholder="Medicamentos"></textarea>
        </div>   

            <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Observações:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observacoes" placeholder="Observações"></textarea>
        </div>   
    
    </div>           
    <div class="row">

        <div class="col-md-1 col-sm-6">
            <div class="form-group">
                <label for="tipo">Bebe</label>
                <select class="form-control" name="bebe" id="bebe" required>
                
                    <option>S</option>
                    <option>N</option>
                </select>
            </div>
        </div>
        <div class="col-md-1 col-sm-6">
            <div class="form-group">
                <label for="tipo">Fuma</label>
                <select class="form-control" name="fuma" id="fuma" required>
                    <option>S</option>
                    <option>N</option>
                </select>
            </div>
        </div>
        <div class="col-md-3 col-sm-10">
            <div class="form-group">
                <label for="tipo">Com qual frequencia realizar execicios fisicos?</label>
                <select class="form-control" name="fisico" id="fisico" required>
                    <option>nenhuma</option>
                    <option>1 vez por semana</option>
                    <option>3 vez por semana</option>
                    <option>mais de 3 vez por semana</option>
                </select>
            </div>
    
        </div>
        

        <div class="col-md-1 col-sm-6">
            <div class="form-group">

                <label for="peso">Peso</label >
                <input type="text" class="form-control name" maxlength="3" placeholder="" name="peso" id ='peso' required >

            </div>
        </div>

            <div class=" col-sm-6 col-md-1">
            <div class="form-group">

                <label for="peso">Altura</label >
                <input type="text" class="form-control name" maxlength="3" placeholder="" name="altura" id ='altura' required >

            </div>
        </div>
        
        <div class=" col-sm-5 col-md-1">
            <div class="form-group">

                <label for="peso">Pressâo</label >
                <input type="text" class="form-control name" maxlength="3" placeholder="" name="pressao" id ='pressao' required >

            </div>
        </div>

            <div class="col-md-1 col-sm-6">
                <div class="form-group">

                    <label for="peso">Pulso</label >
                    <input type="text" class="form-control name" maxlength="3" placeholder="" name="pulso" id ='pulso' required >

                </div>
        </div>

            <div class="col-md-1 col-sm-6">
                <div class="form-group">

                    <label for="peso">Temperatura</label >
                    <input type="text" class="form-control name" maxlength=3 placeholder="" name="temperatura" id ='temperatura' required >

                </div>
            </div>

        </div>
        <div class="row"> 
                    
            <div class="col-md-12">
                <div class="form-group ">
                    <label for="nome">Obs Pessoal</label>
                    <input type="text" class="form-control "  maxlength="100" name="obsPessoal" id ="ObsPessoal" required>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Historico familiar</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = 'historicoFamiliar'placeholder="Historico familiar"></textarea>
            </div>          

        </div> "