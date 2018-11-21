  			$(document).ready(function(){
                
                $('#excluir').click(function(){
                                var x;
                                var r=confirm("Tem certeza que deseja resetar esse cadastro?");
                                if (r==true)
                                {
                                x= window.location = "{{route('excluir/{{$p->matricula}}')}}" ;
                                }
                                
                                });
			
            


		});
    
   

