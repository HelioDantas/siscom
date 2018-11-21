
	
			$(document).ready(function(){
				$("#cpf").blur(function(){
					var cpf = $("#cpf").val();
					// alert(cpf);
					 $.ajax({
						type: "GET",
						url: "ver_cpf_paciente.php",
						data: "cpff=" + cpf,
						success: function(ver){
								if(ver == "existe"){
									$("#freeow").freeow("CPF já cadastrado", "Desculpe, este CPF já está cadastrado no sistema.", {classes: ["smokey", "error"],});
									$("#cpf").focus();
								}
							}
					 });
				});
			});
