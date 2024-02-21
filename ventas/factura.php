<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('../app/TCPDF/tcpdf.php');
include('../app/config.php');
include('../app/controllers/ventas/numeros_a_letras.php');

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];


$sql_ventas = "SELECT *, cli.nombre_cliente as nombre_cliente,
               cli.dni_ce_cliente as dni_ce_cliente
               FROM tb_ventas as ve 
               INNER JOIN tb_clientes as cli
               ON cli.id_cliente = ve.id_cliente
               WHERE ve.id_venta = '$id_venta_get'";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $ventas_dato) {
    $fyh_creacion = $ventas_dato["fyh_creacion"];
    $nombre_cliente = $ventas_dato["nombre_cliente"];
    $dni_ce_cliente = $ventas_dato["dni_ce_cliente"];
    
}

$fecha = date("d/m/Y", strtotime($fyh_creacion));
$hora = date("H:m:s", strtotime($fyh_creacion));


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('ProLaptop');
$pdf->setTitle('Boleta de Venta');
$pdf->setSubject('Boleta de Venta');
$pdf->setKeywords('Boleta de Venta');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(left: 10, top:10, right:10);
//$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to rint
$html = '
<table border="0">
    <tr>
        <td style="width:230px">
        <img src="../public/images/logo-factura.png">
        <b>PROLAPTOP S.A.C.</b> <br>
        Juliaca - Puno - Perú <br>
        Teléfono: 931377004
        </td>
        <td style="width:180px"></td>
        <td style="text-align:center; font-size: 15px; width:275px">
        <br><br>
        <b>R.U.C. N° 2021207002</b> <br>
        <b>BOLETA DE VENTA ELECTRÓNICA</b> <br>
        <b>B001-'.$id_venta_get.'</b> <br>
        </td>
    </tr>
</table>

<div>
<p><b>Fecha</b> : '.$fecha.' '.$hora.'</p> <br>
<p><b>Sr(es)</b> : '.$nombre_cliente.'</p> <br>
<p><b>DNI</b> : '.$dni_ce_cliente.'</p> <br>
</div>

<table border="1" cellpadding="5" style="border: 5px solid blue; border-radius: 25px">
<tr style="text-align: center; background-color: #d6d6d6">
    <th style="width: 40px"><b>Nro</b></th>
    <th style="width: 155px"><b>Producto</b></th>
    <th style="width: 235px"><b>Descripción</b></th>
    <th style="width: 70px"><b>Cantidad</b></th>
    <th style="width: 90px"><b>P.U.</b></th>
    <th style="width: 100px"><b>Total</b></th>
</tr>
';

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
WHERE nro_venta = $nro_venta_get
ORDER BY carr.id_carrito ASC";

$query_carrito = $pdo->prepare($sql_carrito);
                                    $query_carrito->execute();
                                    $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                    $precio_venta_total = 0;

                                    foreach ($carrito_datos as $carrito_dato) {
                                        $id_carrito = $carrito_dato['id_carrito'];
                                        $nombre_producto = $carrito_dato['nombre_producto']; 
                                        $descripcion = $carrito_dato['descripcion']; 
                                        $cantidad = $carrito_dato['cantidad']; 
                                        $precio_unitario = $carrito_dato['precio_venta']; 
                                        $contador_de_carrito = $contador_de_carrito + 1;
                                        $cantidad_total = $cantidad_total + $carrito_dato['cantidad']; 
                                        $subtotal = $carrito_dato['cantidad'] * $carrito_dato['precio_venta'];
                                        $precio_venta_total = $precio_venta_total + $subtotal;

                                    
                                        $html .= '
                                        
                                        <tr style="text-align: center">
                                        
                                            <td>'.$contador_de_carrito.'</td>
                                            <td>'.$nombre_producto.'</td>
                                            <td>'.$descripcion.'</td>
                                            <td>'.$cantidad.'</td>
                                            <td>'.MONEDA.number_format($precio_unitario, 2, '.', ',').'</td>
                                            <td style="text-align: rigth">'.MONEDA.number_format($subtotal, 2, '.', ',').'</td>
                                        </tr>

                                        ';
                                    }
$precio_con_igv = $precio_venta_total*IGV;
$igv = $precio_venta_total - $precio_con_igv;      
$precio_qr = MONEDA.number_format($precio_venta_total, 2, '.', ',');      
$literal = numtoletras($precio_venta_total);          
$html .= '
<tr style="text-align: rigth">
<th colspan="5"><b>SUB TOTAL</b></th>
<th><b>'.MONEDA.number_format($igv, 2, '.',',').'</b></th>
</tr>
<tr style="text-align: rigth">
    <th colspan="5"><b>I.G.V. (18%)</b></th>
    <th><b>'.MONEDA.number_format($precio_con_igv, 2, '.', ',').'</b></th>
</tr>
<tr style="text-align: rigth">
    <th colspan="5"><b>TOTAL</b></th>
    <th><b>'.MONEDA.number_format($precio_venta_total, 2, '.', ',').'</b></th>
</tr>
</table>

<p><b>IMPORTE EN LETRAS: </b>'.$literal.' NUEVOS SOLES.</p>

<div style="text-align: center; font-size: 20px">
<br>
<p><b>¡MUCHAS GRACIAS POR SU COMPRA!</b></p>
</div>
';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, false, false, '');

$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false,
    'module_width' => 1,
    'module_height' => 1
);

$QR = "Boleta electronica emitida por ProLaptop el $fecha a horas $hora al cliente $nombre_cliente con DNI $dni_ce_cliente
por un monto total de $precio_qr Nuevos Soles.";

// ---------------------------------------------------------
$pdf->write2DBarcode($QR, 'QRCODE,L', 10, 200, 40, 40, $style);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
