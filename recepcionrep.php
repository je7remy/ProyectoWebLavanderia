<?php
include_once('includes/load.php');

ob_start();

if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    $recent_recepciones = find_recepciones_rep($estado);

    $no = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-print10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>REPORTE DE RECEPCIONES</title>
    <link rel="stylesheet" type="text/css" href="html2pdf_v4.03/laporan.css" />
</head>
<body>
    <h1>REPORTE DE RECEPCIONES</h1>
    <hr><br>
    <div id="isi">
        <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
                <tr class="tr-title"> 
                    <th height="20" align="center" valign="middle"><small>Codigo</small></th>
                    <th height="20" align="center" valign="middle"><small>Fecha</small></th>
                    <th height="20" align="center" valign="middle"><small>ID Usuario</small></th>
                    <th height="20" align="center" valign="middle"><small>ID Cliente</small></th>
                    <th height="20" align="center" valign="middle"><small>Estado</small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($recent_recepciones as $recent_recepcion):
                        echo "<tr>
                                <td width='80' height='13' align='center' valign='middle'>$recent_recepcion[idrecepcion]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_recepcion[fecha]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_recepcion[idusuario]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_recepcion[idcliente]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_recepcion[estado]</td>
                            </tr>";
                        $no++;
                    endforeach; 

                    echo "<tr>
                            <td width='80' height='13' align='center' valign='middle'>Cantidad</td>
                            <td width='80' height='13' align='center' valign='middle'>$no</td>
                            <td width='80' height='13' align='left' valign='middle'></td>
                            <td style='padding-left:5px;' width='80' height='13' valign='middle'></td>
                        </tr>";
                ?>	
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
}
?>
