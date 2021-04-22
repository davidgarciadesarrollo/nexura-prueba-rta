<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';

$id_empleado = $_GET['id_empleado'];
$sql = "SELECT * FROM empleado_rol WHERE empleado_id = $id_empleado";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
    }
    print json_encode($rows);
}