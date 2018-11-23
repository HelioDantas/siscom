 var email_ok = false;
		   //Verifica se o email é valido
			$(document).ready(function(){
			   $("#email").blur(function(){
				  var email = $("#email").val();
            
					var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					 if(filtro.test(email) || email == "")
					 {
                         
				   return true;
					 } else {
                         alert("Email Invalido", "Por favor, digite um email valido");
					
					 }
				  
			   });
			});