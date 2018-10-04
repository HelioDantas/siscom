<?php

$limit = 8;

 function gerarsenha01 ($limit){ 

$str = "123456789asdfghjkl";  // <- gera senha com 9 carac com nº e letras

   $maximo = strlen ($str)-1;  

   $ret = '';  

   for($i = 0; 

  $i < $limit; 

  $i++):

   $ret .= $str{mt_rand(0,$maximo)};

   endfor;

return ($ret); 

   } 

$nvSenha = gerarsenha01 (9);
return $nvSenha;
?> 