$('select[name=convenio]').change(function(){
    var convenio_id = this.value;
    
    $.get('/novo/get-planos/' +convenio_id , function(planos){
        alert("opa");
        $('select[name=TipoConvenio]').empty();
        $.each(planos, function(key,value){
            $('select[name=TipoConvenio]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})