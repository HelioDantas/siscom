$("#data").change(function(){
         
                var date = this.value;
                console.log(date);
           
                location.href = "/medd/" + date  ;
     });