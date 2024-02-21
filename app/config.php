<?php

//se definen las constantes
define('SERVIDOR','localhost'); 
define('USUARIO','root');
define('PASSWORD','root');
define('BD','sistemadeventas');
define('IGV','0.18');
define('MONEDA','S/ ');

//declaramos la varibale del servidor
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

//establecemos el try
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión a la base de datos fue con exito";
}catch (PDOException $e){
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost/prolaptop";

date_default_timezone_set("America/Lima");
$fechaHora = date('Y-m-d h:i:s');


