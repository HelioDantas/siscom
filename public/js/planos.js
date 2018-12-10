$('#especialidade').change(function(){
    let especialidade_id = this.value;
    console.log(especialidade_id);

    $.getJSON('/planos/' +especialidade_id , function(espacialidade2){
        p = espacialidade2;
        $('select[id=especialidade2]').empty();
   
        $.each(p, function(key,value){
            $('id').append('<tr class='"Filter"'>' +
              '<th scope='row'>'+  +'</th> <td class>' '</td>   <td> '      '</td>'    '</tr>')
        })
    })
})