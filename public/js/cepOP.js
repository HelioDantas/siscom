function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('estado').value=("");
   
}


$(document).ready(function(){
$("#cep").blur(function(){
    var cep = $('#cep').val() || '';

    if (!cep) {
        return
    }

    var url = 'http://viacep.com.br/ws/' + cep+ '/json';
    $.getJSON(url,function(data){
        if("error" in data){
            return
        }

        if (data) {
            $('#rua').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#cidade').val(data.localidade);
            $('#estado').val(data.uf); 
        }else{
            limpa_formulário_cep();
            if (data.data.logradouro == "") {
                return console.log('teste');   
            }
            
            //alert(" CEP inválido.");
        }

    });
})    
});


/*





*/
