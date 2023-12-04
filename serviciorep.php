<?php
include_once('includes/load.php');

ob_start();

if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    $recent_servicios = find_servicios_rep($estado);

    $no = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-print10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>REPORTE DE SERVICIOS</title>
    <link rel="stylesheet" type="text/css" href="html2pdf_v4.03/laporan.css" />
</head>
<body>
    <h1>REPORTE DE SERVICIOS</h1>
    <hr><br>
    <div id="isi">
        <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
                <tr class="tr-title"> 
                    <th height="20" align="center" valign="middle"><small>Codigo</small></th>
                    <th height="20" align="center" valign="middle"><small>Descripción</small></th>
                    <th height="20" align="center" valign="middle"><small>Precio</small></th>
                    <th height="20" align="center" valign="middle"><small>Estado</small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($recent_servicios as $recent_servicio):
                        echo "<tr>
                                <td width='80' height='13' align='center' valign='middle'>$recent_servicio[idservicio]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_servicio[descripcion]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_servicio[precio]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_servicio[estado]</td>
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
