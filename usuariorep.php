<?php
include_once('includes/load.php');


ob_start();


if (isset($_GET['tipo_usuario']) ) {


    
    $tipo_usuario = $_GET['tipo_usuario'];

    $recent_usuarios = find_usuario_rep($tipo_usuario);

    $no    = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN"
"http://www.w3.org/MarkUp/DTD/xhtml-print10.dtd">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>REPORTE DE USUARIOS</title>
        <link rel="stylesheet" type="text/css" href="html2pdf_v4.03/laporan.css" />
    </head>
    <body>
    REPORTE DE USUARIOS
        <hr><br>
        <div id="isi">

                  <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title"> 
                        <th height="20" align="center" valign="middle"><small>Codigo </small></th>
                        <th height="20" align="center" valign="middle"><small>Nombre</small></th>
                        <th height="20" align="center" valign="middle"><small>Usuario </small></th>
                        <th height="20" align="center" valign="middle"><small>Tipo Usuario </small></th>
                    </tr>
                </thead>
                <tbody>
<?php
   
        foreach ($recent_usuarios as  $recent_usuario): 

           
            echo "  <tr>  
                        <td width='80' height='13' align='center' valign='middle'>$recent_usuario[idusuario]</td>
                        <td width='80' height='13' align='center' valign='middle'>$recent_usuario[nombre]</td>
                        <td width='80' height='13' align='center' valign='middle'>$recent_usuario[usuario]</td>
						<td width='80' height='13' align='center' valign='middle'>$recent_usuario[tipo_usuario]</td>
                    </tr>
                  ";
            $no++;
         endforeach; 

        ECHO "  <tr>  
                        <td width='80' height='13' align='center' valign='middle'>Cantidad</td>
                        <td width='80' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='left' valign='middle'></td>
                        <td style='padding-left:5px;' width='80' height='13' valign='middle'> </td>
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