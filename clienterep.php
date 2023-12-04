<?php
include_once('includes/load.php');
// include_once('includes/functions.php');

ob_start();

if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    $recent_clientes = find_clientes_rep($estado);

    $no = 0;

    /* Resto del código para generar el informe... */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN"
"http://www.w3.org/MarkUp/DTD/xhtml-print10.dtd">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>REPORTE DE CLIENTES</title>
    <link rel="stylesheet" type="text/css" href="html2pdf_v4.03/laporan.css" />
</head>
<body>
    REPORTE DE CLIENTES
    <hr><br>
    <div id="isi">
        <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
                <tr class="tr-title"> 
                    <th height="20" align="center" valign="middle"><small>Código </small></th>
                    <th height="20" align="center" valign="middle"><small>Nombre</small></th>
                    <th height="20" align="center" valign="middle"><small>Cédula </small></th>
                    <th height="20" align="center" valign="middle"><small>Teléfono </small></th>
                    <th height="20" align="center" valign="middle"><small>Dirección </small></th>
                    <th height="20" align="center" valign="middle"><small>Estado </small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($recent_clientes as $recent_cliente):
                        echo "
                            <tr>  
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[idcliente]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[nombre]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[cedula]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[telefono]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[direccion]</td>
                                <td width='80' height='13' align='center' valign='middle'>$recent_cliente[estado]</td>
                            </tr>";
                        $no++;
                    endforeach; 

                    echo "
                        <tr>  
                            <td width='80' height='13' align='center' valign='middle'>Cantidad</td>
                            <td width='80' height='13' align='center' valign='middle'>$no</td>
                            <td width='80' height='13' align='left' valign='middle'></td>
                            <td style='padding-left:5px;' width='80' height='13' valign='middle'></td>
                            <td style='padding-left:5px;' width='80' height='13' valign='middle'></td>
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
