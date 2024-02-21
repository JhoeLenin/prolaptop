<?php
$id_venta_get = $_GET['id_venta'];
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../app/controllers/ventas/cargar_venta.php');
include ('../app/controllers/clientes/cargar_cliente.php');

include ('../layout/parte1.php');




?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de venta Nro <?php echo $nro_venta; ?> </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

           <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-cash-register"></i> Venta Nro
                                <input type="text" style="text-align: center" value="<?php echo $nro_venta; ?>" disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--<b>Carrito </b>-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                    <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                    <th style="background-color: #e7e7e7; text-align: center">Detalle</th>
                                    <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                    <th style="background-color: #e7e7e7; text-align: center">Precio unitario</th>
                                    <th style="background-color: #e7e7e7; text-align: center">Subtotal</th>

                                </tr>
                            </thead>
                                <tbody>
                                    
                                    <?php 
                                    $contador_de_carrito = 0;
                                    $precio_venta_total = 0;
                                    $cantidad_total = 0;
                                    $precio_total = 0;

                                    $sql_carrito = "SELECT *,
                                                    pro.nombre as nombre_producto,
                                                    pro.descripcion as descripcion,
                                                    pro.stock as stock,
                                                    pro.id_producto as id_producto
                                                    FROM tb_carrito as carr
                                                    INNER JOIN tb_almacen as pro
                                                    ON carr.id_producto = pro.id_producto
                                                    WHERE nro_venta = $nro_venta
                                                    ORDER BY carr.id_carrito ASC";
                                    
                                    $query_carrito = $pdo->prepare($sql_carrito);
                                    $query_carrito->execute();
                                    $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                    

                                    foreach ($carrito_datos as $carrito_dato) {
                                        $id_carrito = $carrito_dato['id_carrito'];
                                        $contador_de_carrito = $contador_de_carrito + 1;
                                        $cantidad_total = $cantidad_total + $carrito_dato['cantidad']; 
                                        $precio_venta_total = $precio_venta_total + $carrito_dato['precio_venta']; ?>

                                        <tr>
                                            <td>
                                                <center><?php echo $contador_de_carrito; ?></center>
                                                <input type="text" value="<?php echo $carrito_dato['id_producto']; ?>" 
                                                id="id_producto<?php echo $contador_de_carrito; ?>" hidden>
                                            </td>
                                            <td><?php echo $carrito_dato['nombre_producto']; ?></td>
                                            <td><?php echo $carrito_dato['descripcion']; ?></td>
                                            <td>
                                                <center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $carrito_dato['cantidad']; ?></span></center>
                                                <input type="text" id="stock_de_inventario<?php echo $contador_de_carrito; ?>" value="<?php echo $carrito_dato['stock'];?>" hidden>
                                            </td>
                                            <td><center><?php echo number_format($carrito_dato['precio_venta'], 2, '.', ','); ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                    $cantidad = floatval($carrito_dato['cantidad']);
                                                    $precio_venta = floatval($carrito_dato['precio_venta']);
                                                    $subtotal = $cantidad * $precio_venta;
                                                    $precio_total = $precio_total + $subtotal;

                                                    echo number_format($subtotal, 2, '.', ',');
                                                    ?>
                                                </center>
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                    <tr>                                                                                                   
                                        <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total</th>
                                        <th>
                                            <center>
                                                <?php echo $cantidad_total; ?>
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                <?php # echo number_format($precio_venta_total,2 , '.', ','); ?>
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                <?php echo number_format($precio_total,2 , '.', ','); ?>
                                            </center>
                                        </th>
                                    </tr>


                                
                                    <!-- PARA USAR LUEGO PARA EL IGV Y TODA LA COSA

                                    <tr>
                                        <th colspan="4" style="background-color: #e7e7e7; text-align: right">IGV(18%)</th>
                                        <td>
                                            <center>
                                                
                                            </center>
                                        </td>
                                    </tr>
                                    -->
                                </tbody>

                        </table>
                    </div>
                    
                </div>
            </div>
                    </
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                       
                            <h3 class="card-title"><i class="fas fa-users"></i>
                            Cliente
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            foreach($clientes_datos as $clientes_dato) {
                                $nombre_cliente = $clientes_dato['nombre_cliente'];
                                $dni_ce_cliente = $clientes_dato['dni_ce_cliente'];
                                $celular_cliente = $clientes_dato['celular_cliente'];
                                $email_cliente = $clientes_dato['email_cliente'];
                            }
                             ?>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Nombre del cliente</label>
                                                <input type="text" id="id_cliente" hidden>
                                                <input type="text" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" disabled>
                                            </div>                                        
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">DNI/CE</label>
                                                <input type="text" value="<?php echo $dni_ce_cliente; ?>" class="form-control" id="dni_ce_cliente" disabled>
                                            </div>                                        
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Celular</label>
                                                <input type="text" value="<?php echo $celular_cliente; ?>" class="form-control" id="celular_cliente" disabled>
                                            </div>                                        
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" value="<?php echo $email_cliente; ?>" class="form-control" id="email_cliente" disabled>
                                            </div>                                        
                                        </div>

                                    </div>
                                    
                                </div>                  
                    
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                       
                            <h3 class="card-title"><i class="fas fa-money-bill"></i>
                             Monto
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Monto pagado</label>
                                <input type="text" id="total_a_pagar"style="text-align: center; font-weight: bold" 
                                value="<?php echo number_format($precio_total, 2, '.', ',') ;?>" disabled>
                                
                            </div>
                        </div>

                    </div>
      
                </div>
                    
                </div>
                
            </div> 
                    <!-- card-body-->
                        
        
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <!-- /.content -->
</div>
</div>

 
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>



<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para agregar clientes -->
<div class="modal fade" id="modal-agregar_cliente">
    <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header" style="background-color: purple; color: white">
                 <h4 class="modal-title">Nuevo cliente</h4>
                 <div style="width: 15px "></div>
                 
                  
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                    <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del cliente</label>
                                    <input type="text" name="nombre_cliente" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">DNI/CE</label>
                                    <input type="text" name="dni_ce_cliente" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" name="celular_cliente" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email_cliente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-7">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </div>    
                    </form>
                </div>
          </div>
    </div>
</div>