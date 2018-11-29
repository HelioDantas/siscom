/*
$('#tipobusca').change(function(){
    var tipo = this.value;
    console.log(tipo);

    $.getJSON('/busca/tipo/' +tipo , function(dados){
        d = dados;
        $('select[id=plano_id]').empty();
        $.each(d, function(key,value){
            $('select[id=plano_id]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})*/






var tt = document.getElementById("#buscarPor");
console.log(tt);
//var opt = select.getElementsByTagName('option');
$("#buscarPor").on('change', function(e){
    //alert($(this).val())
    var filtro = this.value;
    if (filtro === "") {
     filtro = document.getElementById("#buscarPor");
     console.log('teste');
    }
    var filter = filtro;
    
    
 
    //console.log(opt);

var campofiltro = document.querySelector('#filtrar-tabela');

campofiltro.addEventListener("input",function(){
    console.log(this.value);

 
    var pacientes = document.querySelectorAll(".Filter");
    console.log(filter);
    // se tiver algo digitado entra no for buscando o nome 
    if (this.value.length > 0) {
        for(var i=0; i <pacientes.length ; i++){
            var paciente = pacientes[i];
            var td = paciente.querySelector(filter);
            console.log(td);
            var dados = td.textContent;
            var buscaPorLetra = new RegExp(this.value , "i") // "i"  nesse contesto significa ignoreCase
            
            if (!buscaPorLetra.test(dados)) {
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

});