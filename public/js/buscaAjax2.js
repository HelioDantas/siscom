$("#convenio").on('change', function(e){

    var busca = this.value;
    console.log(busca);

$.ajax({
    type: 'POST',
    url:  'buscaAjax',
    //async: false,
    data: {
        nome: $(busca).val()
    },
    success: function(data) {
        $('#tipoConvenio').html(data);
    },
   

})

});



