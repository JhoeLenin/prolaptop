<?php

include ('../../config.php');


$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_a_pagar = $_GET['total_a_pagar'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas
       ( nro_venta, id_cliente, total_pagado, fyh_creacion, fyh_actualizacion) 
VALUES (:nro_venta,:id_cliente,:total_pagado,:fyh_creacion,:fyh_actualizacion)");

$sentencia->bindParam('nro_venta',$nro_venta);
$sentencia->bindParam('id_cliente',$id_cliente);
$sentencia->bindParam('total_pagado',$total_a_pagar);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);

if($sentencia->execute()){

    $pdo->commit();

    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registró la venta exitosamente";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/";
    </script>
    <?php
} else{


    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}






