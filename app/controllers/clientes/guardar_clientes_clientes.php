<?php

include ('../../config.php');


$nombre_cliente = $_POST['nombre_cliente'];
$dni_ce_cliente = $_POST['dni_ce_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$email_cliente = $_POST['email_cliente'];


$sentencia = $pdo->prepare("INSERT INTO tb_clientes
       ( nombre_cliente, dni_ce_cliente, celular_cliente, email_cliente, fyh_creacion, fyh_actualizacion) 
VALUES (:nombre_cliente,:dni_ce_cliente,:celular_cliente,:email_cliente,:fyh_creacion,:fyh_actualizacion)");

$sentencia->bindParam('nombre_cliente',$nombre_cliente);
$sentencia->bindParam('dni_ce_cliente',$dni_ce_cliente);
$sentencia->bindParam('celular_cliente',$celular_cliente);
$sentencia->bindParam('email_cliente',$email_cliente);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);

if($sentencia->execute()){

    session_start();
    $_SESSION['mensaje'] = "Se registró al cliente exitosamente";
    $_SESSION['icono'] = "success";

    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes";
    </script>
    <?php
}else{

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";

    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes";
    </script>
    <?php
}

