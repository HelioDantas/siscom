<?php
namespace database;
use PDO;

define('DB_HOST', 'wmysdes01v');
define('DB_USER', 'tresta');
define('DB_PASS', 'Mass55');
define('DB_NAME', 'tresta');
class database{



 static function obterConexao(){

    return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASS);
   //return new PDO("mysql:host=wmysdes01v;dbname=tresta,tresta,Mass55");
}


}
