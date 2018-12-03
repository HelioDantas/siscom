 var email_ok = false;
		   //Verifica se o email é valido
			$(document).ready(function(){
			   $("#email").blur(function(){
				  var email = $("#email").val();

					var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					 if(filtro.test(email) || email == "")
					 {
                          $("#email").removeClass("is-invalid");
				   	return true;
					 } else {

						 $("#email").addClass("is-invalid");

					 }

               });


               $("#CNovaSenha").blur(function(){
                NovaSenha = document.getElementById('NovaSenha').value;
                CNovaSenha = document.getElementById('CNovaSenha').value;

               if (NovaSenha != CNovaSenha){

                $("#CNovaSenha").addClass("is-invalid");
                $("#NovaSenha").addClass("is-invalid");

                }else{

                console.log('dddd');
                $("#CNovaSenha").removeClass("is-invalid");
                $("#NovaSenha").removeClass("is-invalid");
                }

                });

                $("#NovaSenha").blur(function(){
                    NovaSenha = document.getElementById('NovaSenha').value;
                    CNovaSenha = document.getElementById('CNovaSenha').value;

                    if(CNovaSenha    == ""){
                        $("#CNovaSenha").removeClass("is-invalid");
                        $("#NovaSenha").removeClass("is-invalid")
                    }else
                        if (NovaSenha != CNovaSenha){

                            $("#CNovaSenha").addClass("is-invalid");
                            $("#NovaSenha").addClass("is-invalid");

                            }else{

                            console.log('dddd');
                            $("#CNovaSenha").removeClass("is-invalid");
                            $("#NovaSenha").removeClass("is-invalid");
                            }

                            });


			});
