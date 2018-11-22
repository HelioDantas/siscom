$('#convenio').change(function(){
    var convenio_id = this.value;
    console.log(convenio_id);

    $.getJSON('/novo/get-planos/' +convenio_id , function(planosA){
        p = planosA;
        $('select[name=plano]').empty();
        $.each(p, function(key,value){
            $('select[name=plano]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})