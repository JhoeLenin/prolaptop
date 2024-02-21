<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/clientes/listado_de_clientes.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Lista de Clientes
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar_cliente">
                            <i class="fa fa-plus"></i> Agregar Nuevo
                    </button>
                    </h1>
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
                            <h3 class="card-title">Clientes registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del cliente</center></th>
                                    <th><center>DNI/CE</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                foreach ($clientes_datos as $clientes_dato){
                                    $id_cliente = $clientes_dato['id_cliente'];
                                    $nombre_cliente = $clientes_dato['nombre_cliente']; ?>
                                    <tr>
                                        <td><center><?php echo $contador = $contador + 1;?></center></td>
                                        <td><?php echo $nombre_cliente;?></td>
                                        <td><?php echo $clientes_dato['dni_ce_cliente'];?></td>
                                        <td><?php echo $clientes_dato['celular_cliente'];?></td>
                                        <td><?php echo $clientes_dato['email_cliente'];?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_cliente;?>">Eliminar</button>
                                                </div>
                                                <div id="respuesta_delete<?php echo $id_cliente;?>"></div>
                                            </center>
                                        </td>
                                        <script>
                                                    $('#btn_delete<?php echo $id_cliente;?>').click(function () {

                                                        var id_cliente = '<?php echo $id_cliente;?>';

                                                            var url2 = "../app/controllers/clientes/delete_cliente.php";
                                                            $.get(url2,{id_cliente:id_cliente},function (datos) {
                                                                $('#respuesta_delete<?php echo $id_cliente;?>').html(datos);
                                                            });


                                                    });
                                                </script>
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
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 clientes",
                "infoFiltered": "(Filtrado de _MAX_ total clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ clientes",
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
                    <form action="../app/controllers/clientes/guardar_clientes_clientes.php" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del cliente</label>
                                    <input type="text" name="nombre_cliente" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">DNI/CE</label>
                                    <input type="text" name="dni_ce_cliente" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" name="celular_cliente" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email_cliente" class="form-control" required>
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