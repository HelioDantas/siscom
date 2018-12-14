$('#medico').change(function(){
    var medico = this.value;
    console.log(medico);
    var horarios = getHorarios();
  
    console.log(ff());
    teste = ff();
    var inicio =horarios[0];
    var ini = 0;
    var ttt = 0;
        while ( ttt < teste.length) {
            console.log(ttt);
        if(teste[ttt].hora == inicio ){
           
                 $('tbody').append(
            '<tr>'+
            '<td>' + teste[ttt].hora + '</td>'+
            '<td>' + teste[ttt].paciente+'</td>'+
            '<td>' +  teste[ttt].id+'</td>'+
            '<td><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl" title="cadastrar">'+
            '<i class="fas fa-plus-circle"></i></a>'+
            '</td>'+
            '</tr>');   
             ttt++;
                   ini++;
                inicio = horarios[ini];
             console.log(inicio);
      
           
    }else{
           while (inicio != teste[ttt].hora) {
                 
            $('tbody').append(
            '<tr>'+
                '<td>' +  horarios[ini] + '</td>'+
                '<td>' + '</td>'+
                '<td>' +  '</td>'+
                '<td><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl" title="cadastrar">'+
                '<i class="fas fa-plus-circle"></i></a>'+
                '</td>'+
                '</tr>');
                ini++;
                  
                inicio = horarios[ini];
   }
   
   }
        
   }
   
   while (horarios[ini] != '18:30') {
            $('tbody').append(
            '<tr>'+
                '<td>' +  horarios[ini] + '</td>'+
                '<td>' + '</td>'+
                '<td>' +  '</td>'+
                '<td><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl" title="cadastrar">'+
                '<i class="fas fa-plus-circle"></i></a>'+
                '</td>'+
                '</tr>');
                ini++;
                  
        
   }
       
    });

  


function getHorarios(){
    horarios = [
        '08:00',
        '08:30',
        '09:00',
        '09:30',
        '10:00',
        '10:30',
        '11:00',
        '11:30',
        '12:00',
        '12:30',
        '13:00',
        '13:30',
        '14:00',
        '14:30',
        '15:00',
        '15:30',
        '16:00',
        '16:30',
        '17:00',
        '17:30',
        '18:00',
         '18:30',
    ];
    return horarios;

}

    function ff(){
    horarios = [
        
         {'hora':'08:00', 'paciente':'helio', 'id':'1'},
          {'hora':'09:00', 'paciente':'helio', 'id':'1'},
          {'hora':'10:00', 'paciente':'helio', 'id':'1'},
           {'hora':'12:00', 'paciente':'helio', 'id':'1'}
 
    ];
    return horarios;
}