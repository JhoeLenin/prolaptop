<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/ventas/listado_de_ventas.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Lista de ventas</h1>
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
                            <h3 class="card-title">Ventas registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro de venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Clientes</center></th>
                                        <th><center>Total pagado</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ventas_datos as $ventas_dato){
                                        $id_venta = $ventas_dato['id_venta']; 
                                        $id_cliente = $ventas_dato['id_cliente'];
                                        $contador = $contador + 1; ?>
                                        
                                        <tr>
                                            <td><center><?php echo $contador; ?></center></td>
                                            <td><center><?php echo $ventas_dato['nro_venta']; ?></center></td>
                                            <td>
                                                <center>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_productos<?php echo $id_venta; ?>">
                                                Productos
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal_productos<?php echo $id_venta; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background: orange">
                                                        <h5 class="modal-title" id="exampleModalLabel">Venta Nro <?php echo $id_venta; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
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
                                                                    $nro_venta = $ventas_dato['nro_venta'];
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
                                                                            </center>
                                                                        </th>
                                                                        <th>
                                                                            <center>
                                                                                <?php echo number_format($precio_total,2 , '.', ','); ?>
                                                                            </center>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>

                                                        </table>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_clientes<?php echo $id_venta; ?>">
                                                <?php echo $ventas_dato['nombre_cliente']; ?>
                                                </button>

                                                <!-- modal para agregar clientes -->
                                                <div class="modal fade" id="modal_clientes<?php echo $id_venta; ?>">
                                                    <div class="modal-dialog modal-sm-1">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: purple; color: white">
                                                                <h4 class="modal-title">Cliente de venta Nro <?php echo $id_venta; ?></h4>
                                                                <div style="width: 15px "></div>
                                                                
                                                                
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                                <?php 
                                                                $sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = $id_cliente ";
                                                                $query_clientes = $pdo->prepare($sql_clientes);
                                                                $query_clientes->execute();
                                                                $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach ($clientes_datos as $clientes_dato) {
                                                                    $nombre_cliente = $clientes_dato['nombre_cliente']; 
                                                                    $dni_ce_cliente = $clientes_dato['dni_ce_cliente']; 
                                                                    $celular_cliente = $clientes_dato['celular_cliente']; 
                                                                    $email_cliente = $clientes_dato['email_cliente']; 

                                                                
                                                                
                                                                ?>
                                                                <div class="modal-body">
                                                                   
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del cliente</label>
                                                                                    <input type="text" style="text-align: center" value="<?php echo $nombre_cliente?>" 
                                                                                    name="nombre_cliente" class="form-control" disabled>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="">DNI/CE</label>
                                                                                    <input type="text" style="text-align: center" value="<?php echo $dni_ce_cliente; ?>" 
                                                                                    name="dni_ce_cliente" class="form-control" disabled>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="">Celular</label>
                                                                                    <input type="text" style="text-align: center" value="<?php echo $celular_cliente; ?>" 
                                                                                    name="celular_cliente" class="form-control" disabled>
                                                                                </div>

                                                                                <div class="form-group">                                    
                                                                                        <label for="">Email</label>
                                                                                        <input type="email" style="text-align: center" value="<?php echo $email_cliente; ?>" 
                                                                                        name="email_cliente" class="form-control" disabled>
                                                                                </div>
                                                                                <hr>
                                                                        </div>

                                                                        
                                                                
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                </center>
                                            </td>
                                            <td><center><b><?php echo number_format($ventas_dato['total_pagado'],2 , '.', ','); ?></b></center></td>
                                            <td>
                                                <center>
                                                    <a href="show.php?id_venta=<?php echo $id_venta; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                    <a href="delete.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                    <a href="factura.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-success"><i class="fa fa-file-pdf"></i> PDF</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 15,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

