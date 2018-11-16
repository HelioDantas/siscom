  			$(document).ready(function(){
                
                $('#recon').click(function(){
                                var x;
                                var r=confirm("Tem certeza que deseja resetar esse cadastro?");
                                if (r==true)
                                {
                                x= window.location = "{{route('funcionario.novo')}}" ;
                                }
                        
                                });
			
                $('#celular').click(function(){
                    $("#celular").mask("(99) 99999-9999");
                                
                            
                });
		
                jQuery(function($){
				
                    $("#id").mask("99.999.999-9");
                    $("#cep").mask("99999-999");
                    $("#telresi").mask("(99) 9999-9999");
                    $("#celular").mask("(99) 99999-9999");
                    $("#teltrab").mask("(99) 9999-9999");
                    $("#cpf").mask("999.999.999-99");
                    $("#fax").mask("(99) 9999-9999");
                    $("#dataCadastro").mask("99/99/9999");
                    $("#dataNasc").mask("99/99/9999");
                    $("#emissao").mask("99/99/9999");
                    $("#validade").mask("99/99/9999");
                    $("#ultConsulta").mask("99/99/9999");
				
			
			    });
			


		});
    
   

