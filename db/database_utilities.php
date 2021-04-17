<?php
require_once('database_credentials.php');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';



if( $mysqli->connect_errno )
{
	echo 'Error en la conexión';
	exit;
}
function error($numero,$texto){
	$ddf = fopen('error.log','a');
	fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n");
	fclose($ddf);
	}
function get_empleado()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM  empleados';
	return $mysqli->query($sql);
}

function get_empleado_one()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM  empleados WHERE id_empleado=1';
	return $mysqli->query($sql);
}

function get_area()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM  area';
	return $mysqli->query($sql);
}
function get_rol_empleado()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM  rol_empleado';
	return $mysqli->query($sql);
}



if  (isset($_GET['id_empleado'])) {
	$id_empleado = $_GET['id_empleado'];
	$query = "SELECT * FROM empleados WHERE id_empleado=$id_empleado";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
	  $row = mysqli_fetch_array($result);

	$nombre = $row['nombre'];
	$correo = $row['correo'];
	$sexo = $row['sexo'];
	$id_area = $row['id_area'];
	$boletin = $row['boletin'];
	$descripcion = $row['descripcion'];
	}
  }


if(isset($_POST['nombre']) && $_POST['nombre']!="")  {

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$sexo = $_POST['sexo'];
	$id_area = $_POST['id_area'];
	$boletin = $_POST['boletin'];
	$descripcion = $_POST['descripcion'];

	$query="INSERT INTO empleados (nombre, correo, sexo, id_area, boletin, descripcion) VALUES ('$nombre','$correo','$sexo','$id_area','$boletin','$descripcion')";
	$resultado = mysqli_query($mysqli,$query);
	if (!$resultado) {
		die("query file");
		
	}else{
		?>
		<script>
		alert("enviados");
		window.location.href = "http://localhost/prueba-nexura_editar/";
		</script>
	<?php
	}
 }