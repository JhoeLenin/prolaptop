
<?php
include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];
//$fecha_compra = $_GET['fecha_compra'];


$sentencia = $pdo->prepare("INSERT INTO tb_carrito
       ( nro_venta, id_producto, cantidad, fyh_creacion, fyh_actualizacion) 
VALUES (:nro_venta,:id_producto,:cantidad,:fyh_creacion,:fyh_actualizacion)");

$sentencia->bindParam('nro_venta',$nro_venta);
$sentencia->bindParam('id_producto',$id_producto);
$sentencia->bindParam('cantidad',$cantidad);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);

if($sentencia->execute()){
    
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{


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






