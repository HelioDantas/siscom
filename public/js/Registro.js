$(document).on('click', '.showRegistro', function(e){
    
    
    var id = this.value;
    console.log(id);
 

     $.getJSON('get/Registro/' + this.value , function(registro){

           var  reg = registro;
            var nav = $('#home');
             console.log(reg);
             for(var i in reg) {
                  nav.find("[name='"+ i +"']").val(reg[i]);
              
            }
           


            /*nav.find("[name='pago']").val(agends[0]['pago']);
            nav.find("[name='obs']").val(agends[0]['obs']);
            nav.find("[name='Salvar']").val(id);*/
       
    })
    $('#myTab a[href="#home"]').tab('show');
   

});
