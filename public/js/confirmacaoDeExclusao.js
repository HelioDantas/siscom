   function alguma(id) {
    var apagar = confirm('Você deseja excluir este usuário');
    if (apagar){
        location.href = 'excluir/'+ id;
        }else{
         alert('ufaaa, quase deletou o usuario errado.');
        }    
    }
   

    function permissaoExcluir(id){
        $.getJSON( location.href = 'excluir/'+ id  , function(planosA){
            if(planosA == 0){
                $('#permissaoEditarPaciente').append('<p style="color:red;"> voce não tem permissao </p>');
               //alert("<p style=color:red;> voce não tem permissao </p>");
               history.go(0);
              //setInterval( window.history.go(-1),1000);
              //setInterval(function(){ window.history.go(0) }, 100);
            }else{
                location.href = 'excluir/'+ id;
            }
        });

    }
    function permissaoEditar(id){
        $.getJSON( location.href = 'editar/'+ id  , function(planosA){
            if(planosA == 0){
                alert("Você não tem permissao");
                window.history.go(0);
            }else{
                location.href = 'editar/'+ id;
            }
        });

    }
    function permissaoShow(id){
        $.getJSON( location.href = 'show/'+ id  , function(planosA){
            if(planosA == 0){
                alert("Você não tem permissao");
                window.history.go(0);
            }else{
                location.href = 'show/'+ id;
            }
        });

    }

    function teste(id){
        location.href = "editar/"+id;
    }
    