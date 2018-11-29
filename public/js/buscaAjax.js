$('#convenio').change(function(){
    var convenio_id = this.value;
    console.log(convenio_id);

    $.getJSON('/novo/get-planos/' +convenio_id , function(planosA){
        p = planosA;
        $('select[id=plano_id]').empty();
        $.each(p, function(key,value){
            $('select[id=plano_id]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})


$('#editAjax').click(function(){
    var dado = this.value;
    console.log(dado);

    $.getJSON('/editar' +dado , function(planosA){
        p = dado;
       if(p = 0){
        $('#tempermissao').modal('show');
       }
    })
})