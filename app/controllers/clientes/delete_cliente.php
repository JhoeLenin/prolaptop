<?php

include ('../../config.php');

$id_cliente = $_GET['id_cliente'];

$sentencia = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente=:id_cliente ");

$sentencia->bindParam('id_cliente',$id_cliente);

if($sentencia->execute()){
    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se eliminó al cliente exitosamente";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes";
    </script>
    <?php
}