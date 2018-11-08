
$(function(){
    carregarPacientes(1);
});

function montarLinha(paciente) {

   return '<tr>'+
    '<td>' +paciente.prontuario     + '</td>'+
    '<td>'+paciente.nome            +'</td>'+
    '<td>'+paciente.cpf             +'</td>'+
    '<td>'+paciente.identidade      +'</td>'+
    '<td>'+paciente.dataDeNascimento+'</td>'+
'</tr>';
}

function montarTabela(data){
    $("#tabelaPacientes>tbody>tr").remove();
    for(i=0; i<data.data.lenght; i++){
       s = montarLinha(data.data[i]); 
       $("#tablelaPacientes>tbody").append(s);
    }
}

function carregarPacientes(pagina){
    $.get('./json',{page:pagina }, function(resp){
        console.log(resp);
        montarTabela(resp);
        });

}
