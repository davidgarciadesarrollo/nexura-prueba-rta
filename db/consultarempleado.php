<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "nexura_b_d");
$id_empleado = $_GET['id_empleado'];
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

$result = mysqli_query($link, "SELECT * FROM empleados WHERE id_empleado=$id_empleado");

mysqli_data_seek ($result, 0);

$extraido= mysqli_fetch_object($result);
//$extraido= mysqli_fetch_assoc($result);
//print_r($extraido);

$usuario = json_encode($extraido, true);
echo $usuario;


//echo $nombre = $extraido['nombre'];
//echo $correo = $extraido['correo'];

mysqli_free_result($result);

mysqli_close($link);
