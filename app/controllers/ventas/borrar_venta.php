<?php
include ('../../config.php');


$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_venta=:id_venta");

$sentencia->bindParam('id_venta',$id_venta);

if($sentencia->execute()){

    $sentencia2 = $pdo->prepare("DELETE FROM tb_carrito WHERE nro_venta =:nro_venta");
    $sentencia2->bindParam('nro_venta',$nro_venta);
    $sentencia2->execute();

    $pdo->commit();

    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se eliminó la venta exitosamente";
    $_SESSION['icono'] = "success";

    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas";
    </script>
    <?php
}else{
    //  header('Location: '.$URL.'/categorias');
    
    session_start();

    $_SESSION['mensaje'] = "No se pudo eliminar de la base de datos";
    $_SESSION['icono'] = "success";
    
    $pdo->rollBack();
}
