var campofiltro = document.querySelector('#filtrar-tabela');

campofiltro.addEventListener("input",function(){
    console.log(this.value);

 
    var pacientes = document.querySelectorAll(".Filter-nome");
    
    // se tiver algo digitado entra no for buscando o nome 
    if (this.value.length > 0) {
        for(var i=0; i <pacientes.length ; i++){
            var paciente = pacientes[i];
            var tdnome = paciente.querySelector(".info-nome")
            var nome = tdnome.textContent;
            var buscaPorLetra = new RegExp(this.value , "i") // "i"  nesse contesto significa ignoreCase
            
            if (!buscaPorLetra.test(nome)) {
            /**
             * se o valor na tabela for diferente ao digitado
             *  vai deixado invisivel com o  display: none em home.css 
             * */ 
                paciente.classList.add("invisivel");
            }else{
                paciente.classList.remove("invisivel")
            }
        }
    }
    else{ 
        /**
         * se não tiver nada digitado ele remove a class invisivel
         *  assim avita o f5 pra regarregar apos a pesquisa.
         *  */ 
        for(var i=0; i <pacientes.length ; i++){
            var paciente = pacientes[i];
            paciente.classList.remove("invisivel");
        }
    }
})