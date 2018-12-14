  			$(document).ready(function(){
         
    
   

  $("#btn2").click(function(){
    $("ol").prepend("<table > <thead> <tr> <th scope>#</th><th scope=>First</th> <th scope=>Last</th><th scope=>Handle</th> </tr>  </thead> <tbody>  "+ t() +" </tbody></table>    ");
  });
  
  function t(){
  	var inicio1 = new Date(2018, 10, 10, 8,0, 0, 0);
 
  	var i;  
    var time = inicio1.toLocaleTimeString();
    var inicio = new Date(2018, 10, 10, 8,0, 0).getTime();
    var fim = new Date(2018, 10, 10, 18,0, 0).getTime();
         var t = "  <tr> <th scope=>" + time + "</th> <td>Mark</td><td>Otto</td> <td>@mdo</td> </tr>";
         time +1800000;
   while (inicio <= fim) { 
     var t = t + "  <tr> <th scope=>" + time + "</th> <td>Mark</td><td>Otto</td> <td>@mdo</td> </tr>";
     
     var f = inicio1.getTime() +1800000;
     var inicio1 = new Date(f);
     inicio = inicio1.getTime();
      time = inicio1.toLocaleTimeString();
     
	}
    console.log(t);
    return t;
  }
  
});

