function getNextItem(data) {
    i = data.current_page+1;
    if (data.current_page == data.last_page) 
        s = '<li class="page-item disabled">';
    else
        s = '<li class="page-item">';
    s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Próximo</a></li>';
    return s;
}

function getPreviousItem(data) {
    i = data.current_page-1;
    if (data.current_page == 1) 
        s = '<li class="page-item disabled">';
    else
        s = '<li class="page-item">';
    s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Anterior</a></li>';
    return s;
}

function getItem(data, i) {
    if (data.current_page == i) 
        s = '<li class="page-item active">';
    else
        s = '<li class="page-item">';
    s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">' + i + '</a></li>';
    return s;
}

function montarPaginator(data) {
    
    $("#paginationNav>ul>li").remove();

    $("#paginationNav>ul").append(
        getPreviousItem(data)
    );
    // for (i=1;i<=data.last_page;i++) {
    //     $("#paginationNav>ul").append(
    //         getItem(data,i)
    //     );
    // }
    
    n = 10;
    
    if (data.current_page - n/2 <= 1)
        inicio = 1;
    else if (data.last_page - data.current_page < n)
        inicio = data.last_page - n + 1;
    else 
        inicio = data.current_page - n/2;
    
    fim = inicio + n-1;

    for (i=inicio;i<=fim;i++) {
        $("#paginationNav>ul").append(
            getItem(data,i)
        );
    }
    $("#paginationNav>ul").append(
        getNextItem(data)
    );
}

function montarLinha(paciente) {
  return '<tr>'+
  '<td>' +paciente.id     + '</td>'+
  '<td>'+paciente.nome            +'</td>'+
  '<td>'+paciente.cpf             +'</td>'+
  '<td>'+paciente.identidade      +'</td>'+
  '<td>'+paciente.dataDeNascimento+'</td>'+
  '</tr>';
}

function montarTabela(data) {
    $("#tabelaClientes>tbody>tr").remove();
    for(i=0;i<data.data.length;i++) {
        $("#tabelaPacientes>tbody").append(
            montarLinha(data.data[i])
        );
    }
}

function carregarPacientes(pagina) {
    $.get('./json',{page: pagina}, function(resp) {
        console.log(resp);
        console.log(resp.data.length);
        montarTabela(resp);
        montarPaginator(resp);
        $("#paginationNav>ul>li>a").click(function(){
            // console.log($(this).attr('pagina') );
            carregarPacientes($(this).attr('pagina'));
        })
        $("#cardtitle").html( "Exibindo " + resp.per_page + 
            " pacientes de " + resp.total + 
            " (" + resp.from + " a " + resp.to +  ")" );
    }); 
}

$(function(){
    carregarPacientes(1);
});