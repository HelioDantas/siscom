/*$('#medico').change(function(){
    var medico = this.value;
    console.log(medico);
    horarios = getHorarios();
   for (let index = 0; index < horarios.length; index++) {
       $('tbody').append(
       '<tr>'+
        '<td id="hora">' +  horarios[index] + '</td>'+
        '<td>' + '</td>'+
        '<td>' +  '</td>'+
        '<td id="btnCad"><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl" title="cadastrar">'+
           '<i class="fas fa-plus-circle"></i></a>'+
        '</td>'+
        '</tr>')
   } 
    });

*/




$('#medico').change(function(){
    let medico_id = this.value;
   console.log(medico_id);

    $.getJSON('/get/esp/' +medico_id , function(meds){
        p = meds;
        $('#especialidade').empty();     
        $('select[id=especialidade]').append('<option value=>Selecione</option>')
        $.each(p, function(key,value){
            $('select[id=especialidade]').append('<option value=' + value.id + '>' + value.nome + '</option>')
        })
    })
})



$(document).on('click', '.btn-edit', function(e){
    
    
    var id = this.value;
  
 

     $.getJSON('/get/data/agd/' + this.value , function(agends){
         console.log(agends[0].hora);
        var modal = $('#update');
        modal.find("#optjs").empty();
        modal.find('option[id="optjs"]').val(agends[0].planoID);
        $("<span>"+agends[0].planoNome+"</span>").appendTo("option[id='optjs']");
        modal.find("[name='paciente_id']").text(agends['paciente_id']);
        $("[name=hora]").val(agends[0].hora);
        $("[name='primeiraVez']").val(agends[0].primeiraVez);
        modal.find("[name='compareceu']").val(agends[0]['compareceu']);
        modal.find("[name='pago']").val(agends[0]['pago']);
        modal.find("[name='obs']").val(agends[0]['obs']);
        modal.find("[name='Salvar']").val(id);
       
    })
    
    $('#update').modal('show');

});


$(document).ready(function () {

       $('#modal-mail').modal('show');
       $("#modal-mail").blur(function(){
        $("#modal-mail").modal('hide');
     //   $("#modal-mail").remove();
     })
    });
    


$("#plano").change(function(){
    var plano = this.value;  
        console.log(this.value);
    $.getJSON('/get/proced/' +plano , function(proceds){
        p = proceds;
        $('#procedimentoMed').empty();     
        $('select[id=procedimentoMed]').append('<option value=>Selecione</option>')
        $.each(p, function(key,value){
            $('select[id=procedimentoMed]').append('<option value=' + value.codTuss + '>' + value.descricao + '</option>')
        })
       

    })
});


$("#procedimentoMed").change(function(){
    let plano = document.getElementById('plano').value;
    $.getJSON('/get/proced/preco/' +this.value+"/"+plano , function(valor){
        $('#valor').empty();     
        $('input[id=valor]').val(valor);
    })

  
});
$(document).on('click', '#des',  function(event){
  
   var button = $(event.currentTarget);
   
   var  id = button.data('catid');
   
    var k = document.getElementsByClassName('id' +id);
    console.log(k[0].cells[10].innerHTML);

   var modal = $('#desmarcar');
   modal.find('.modal-body #id').val(id);
    modal.find(" .modal-body [name='obs']").val(k[0].cells[10].innerHTML);

    $('#desmarcar').modal('show');
 });


 $('#delete').on('show.bs.modal', function(event){
  
   var button = $(event.relatedTarget);
   var  id = button.data('catid');
   
   var modal = $(this);
   modal.find('.modal-body #id').val(id);



 });

 $('#obs').on('show.bs.modal', function(event){
  
    var button = $(event.relatedTarget);
    var  obs = button.data('catid');
    
    var modal = $(this);
    modal.find('.modal-body #p').text( obs);
 
  });

 
  


    $(function(){
        $('#paciente').autocomplete({
            appendTo: "body", 
            source: '/buscarName',
     
        });

    });

        $(function(){
        $('#cpf').autocomplete({
            appendTo: "body", 
            source: '/buscarCpf',
            
        });
        
    });

    $(document).ready(function(){
        $("#cpf").blur(function(){
           $.getJSON( '/cpf/' + this.value  , function(data){
               let dat = data;
          
                
                let nome = $('input[name = paciente]'); 
                   let telefone = $('input[name = telefone]'); 
                  let celular = $('input[name = celular]');   
                  let dataa = $('input[name = dataDeNascimento]');
                  let plano = $('select[id = plano]');
                  nome.val(dat[0]['nome']);
                  telefone.val(dat[0]['telefone']);
                  celular.val(dat[0]['celular']);
                  dataa.val(dat[0]['dataDeNascimento']);
                  
                    $('option[class = opt]').remove();
                 
                  
                  plano.append('<option class="opt" selected value=' + dat[0]['plano_id'] + '>' +dat[0]['planoNome'] + ' - Paciente </option>')

           });
         

     });
         $("#paciente").blur(function(){
           $.getJSON( '/nome/' + this.value  , function(nome){
               var funcionario = nome;
                
                var cpf = $('input[name = cpf]'); 
                   var telefone = $('input[name = telefone]'); 
                  var celular = $('input[name = celular]');   
                  var data = $('input[name = dataDeNascimento]');  
                  cpf.val(funcionario[0]['cpf']);
                  telefone.val(funcionario[0]['telefone']);
                  celular.val(funcionario[0]['celular']);
                data.val(funcionario[0]['dataDeNascimento']);
           });
           
            });

});


        $('#pv').on('show.bs.modal , click', function(event){
            var modal = $(this);

            if( $("input[id=pv]").is(":checked")){
                console.log("deu ruim");

               let cpf = $('input[name = cpf]'); 
               let telefone = $('input[name = telefone]'); 
               let celular = $('input[name = celular]');   
               let data = $('input[name = dataDeNascimento]');  
               cpf.empty();
               telefone.empty();
               celular.empty();
              data.empty();  

            }
         
          });
      
    
 





$(document).on('click', '#historico', function(e){
    let historico_id = this.value;


    $.getJSON('/agenda/historico/' +historico_id , function(historico){
        h = historico;
       // console.log(h);
        var nomeDoPaciente = h[0].paciente;           
        
        $('.js-historico').empty();
        $.each(h, function(key,value){
            
                     
               //var data = Date.parse(value.data) + 86400 + 86400 ;

                      
                    data  = new Date(value.data);
                    data.setDate(data.getDate() + 1);
                                   
              
               data = data.toLocaleDateString('pt-br');
            $('.js-historico').append(   '<tr>'+
                      
                '<td>' +   data + '</td>'+
                '<td>'+value.hora            +'</td>'+
                '<td>'+value.medico             +'</td>'+
                '<td>'+value.compareceu      + '</td>'+
                '<td>'+value.pago+'</td>'+
                '<td>'+value.status+'</td>'+
                '<td>'+value.obs+'</td>'+
                '</tr>')
        })
        $('.NomeDoPacienteParaOHistorico').text('Histórico '+ nomeDoPaciente);
         $('#historicoPaciente').modal('show');
    })
})


// registro clinico
formateData = date => {
    data  = new Date(date);
    data.setDate(data.getDate() + 1);
                   

data = data.toLocaleDateString('pt-br');
return data;
}

function colapseRegistroClinico(valor){

    var paciente_id = valor;
   // agenda_id = $("#registroCollapse").data("calid");

    $.getJSON( "/registro/"+paciente_id, function( data ) {
       let r = data;
       var contador=0 ;
       $("#nav-contact").empty();

       $.each(r,function(key,value){
        let data = formateData(value.dataAgendamento)
        $("#nav-contact").append(`
        <div>
        <h5 class='nameP'"><a href="${"#cont-"+contador}" name="tt" style="cursor:pointer;" data-toggle='collapse' >Agendamento do dia: <h6 class="badge badge-pill badge-primary">${data}</h6></a></h5>
        <div id="cont-${key}" class='panel-collapse collapse ${contador}'>
        <div class='panel-body'>

        <div class=' container-fluid' id='conteudo'>

        <div class= "row">
            <div class='col'>
            <label >queixaPrincipal:</label>
            <span id=''>${value.queixaPrincipal}</span>
          </div>

           <div class='col'>
            <label >historia:</label>
            <span id=''>${value.historia}</span>
          </div>

           <div class='col'>
            <label >tempo_atendimento:</label>
            <span id=''>${value.tempo_atendimento}</span>
          </div>
          
          <div class="row">
           <div class='col'>
            <label >prognostico:</label>
            <span id=''>${value.prognostico}</span>
          </div>
           <div class='col'>
            <label >observacoes:</label>
            <span id=''>${value.observacoes}</span>
          </div>
           <div class='col'>
            <label >Nome:</label>
            <span id=''>${value.orientacao}</span>
            </div>
          </div>
          <div class = "row">
           <div class='col'>
            <label >problemas:</label>
            <span id=''>${value.problemas}</span>
          
          </div>
           <div class='col'>
            <label >historicoFamiliar:</label>
            <span>${value.historicoFamiliar}</span>
          </div>
           <div class='col'>
            <label >obsPessoal:</label>
            <span >${value.obsPessoal}</span>
          </div>
          </div>
         </div
          </div>
          </div>
          </div>
          </div>
          `);

        contador++; 
       
       });

 
});
  

  

}




