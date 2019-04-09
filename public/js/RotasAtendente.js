$('#especialidade').change(function(){
    var medico = this.value;
    
    var date = document.getElementById('data').value;
    var espec = document.getElementById('especialidade').value;
    var medico = document.getElementById('medico').value;
    location.href = '/agd/medico/' + medico +'/' +date + '/' +espec;
  
});

$("#data").change(function(){
               var medico = document.getElementById('medico').value;
               var espec = document.getElementById('especialidade').value;
                var date = this.value;

            if(!medico == '' && !espec == '')
                location.href = '/agd/medico/' + medico + '/' + date + '/' +espec; 
     });