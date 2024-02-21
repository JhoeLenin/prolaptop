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
 * @author ProLaptop
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('../app/TCPDF/tcpdf.php');
include('../app/config.php');

$nro_venta_get =$_GET['nro_venta'];
$id_venta_get =$_GET['id_venta'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('ProLaptop');
$pdf->setTitle('Factura de venta');
$pdf->setSubject('Factura de venta');
$pdf->setKeywords('Factura de venta');

$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(left:15, right:15, top:15);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, margin:15);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Helvetica', '', 14,);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect

// Set some content to print
$html = '
<table border="1" style="font-size: 10px">
    <tr>
        <td style="text-align: center" width="230px">
            <img src="../public/images/logo4-logo.jpg" width="80px" alt=""> <br><br>
            <b>ProLaptop</b> <br>
            Lima Ira Sección Av. Litoral #2345 <br>
            23884774 - 75657007 <br>
            LA PAZ - BOLIVIA
        </td>
        <td style="width: 150px"></td>
        <td style="font-size: 16px;">
            <b>dni: </b>10001099920 <br>
            <b>Nro factura:1<br>
            <b>Nro de autorización:</b> 100020029930 <br>
            <p style="text-align: center">rar</p>
        </td>
    </tr> 
</table>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($html, true, false, true, true, '');

// ---------------------------------------------------------
$style = array(
	'border' => 0,
	'vpadding' => '3',
	'hpadding' => '3',
	'fgcolor' => array(0, 0, 0),
	'bgcolor' => false,
	'module_width' => 1,
	'module_height' => 1
);

$QR = 'Factura realizada por ProLaptop S.A.C. al cliente Anibal identificado con DNI: 72415568
generada el 19 de diciembre del 2023';

$pdf->write2DBarcode($QR, 'QRCODE,L', 22, 105, 35, 35, $style);
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Boleta de venta Nro ', 'I');

//============================================================+
// END OF FILE
//============================================================+
