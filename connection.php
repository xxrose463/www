<?php 
//mysqli
//pdo

$dsn= "mysql:host=localhost;dbname=e-website;";
$user="root";
$pass="" ;
$options= array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
);

try {
   $con  = new PDO($dsn, $user, $pass , $options);
    // echo "connect";
}
catch (PDOException $e){
    echo $e->getMessage();
}






?>