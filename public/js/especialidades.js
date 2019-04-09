$('#especialidade').change(function(){
    let especialidade_id = this.value;
    console.log(especialidade_id);

    $.getJSON('/especialidade/' +especialidade_id , function(espacialidade2){
        p = espacialidade2;
        $('select[id=especialidade2]').empty();
        $('select[id=especialidade2]').append('<option value=' + '>' +'Selecione' + '</option>')
         $('select[id=especialidade2]').append('<option value=" "  ' + '>' +'Não possui' + '</option>')        
        $.each(p, function(key,value){
            $('select[id=especialidade2]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})