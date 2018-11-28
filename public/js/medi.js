


$("#prof").on('change', function(e){
    //alert($(this).val())
     var pacientes = document.querySelectorAll(".Fill");
    // console.log(pacientes);
    var filtro = this.value;
 //console.log(filtro);

    if (filtro === "M") {
    // filtro = document.getElementById("#prof");

     for(var i=0; i <pacientes.length ; i++){
            var paciente = pacientes[i];
            paciente.classList.remove("invisivel");

     }
         
            }else{
                 for(var i=0; i <pacientes.length ; i++){
                      var paciente = pacientes[i]; 
               paciente.classList.add("invisivel");

                 }
            }
     
   //  console.log('teste');

      var filter = filtro;
    
   
});



  $("#prof option:selected").each(function() {
   var QtdAcomodacaoD = $(this).val();
   console.log(QtdAcomodacaoD);

   var pacientes = document.querySelectorAll(".Fill");
     console.log(pacientes.length);

     var tam = pacientes.length


     if (QtdAcomodacaoD == "M") {
    // filtro = document.getElementById("#prof");

     for(var i=0; i < tam ; i++){
            var paciente = pacientes[i];
            paciente.classList.remove("invisivel");

     }
         
            }else{
                 for(var i=0; i <tam ; i++){
                      var paciente = pacientes[i]; 
               paciente.classList.add("invisivel");

                 }
            }
     
   
});










 