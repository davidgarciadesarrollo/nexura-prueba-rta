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

function get_id()
{
	global $mysqli, $result;
	$sql = 'SELECT * FROM empleados ORDER BY id_empleado DESC LIMIT 0,1';
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
	$sql = 'SELECT * FROM  rol';
	return $mysqli->query($sql);
}




if(isset($_POST['nombre']) && $_POST['nombre']!="")  {
	$id_empleado = $_POST['id_empleado'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$sexo = $_POST['sexo'];
	$id_area = $_POST['id_area'];
	$boletin = $_POST['boletin'];
	$descripcion = $_POST['descripcion'];
	$rol_id = $_POST['rol_id'];

	foreach($_POST['rol_id'] as $selected){

		echo $selected."</br>";// Imprime resultados
	

			$querys="INSERT INTO empleado_rol (empleado_id, rol_id) VALUES ($id_empleado, $selected )";
			$resultado2 = mysqli_query($mysqli,$querys);
		
	
	}
	// var_dump($_POST['rol_id']);
	// var_dump($_POST);



	$query="INSERT INTO empleados (nombre, correo, sexo, id_area, boletin, descripcion) VALUES ('$nombre','$correo','$sexo','$id_area','$boletin','$descripcion')";
	$resultado = mysqli_query($mysqli,$query);


	
	if (!$resultado2) {
		die("query file");
		
	}else{
		?>
<script>
alert("enviados");
window.location.href = "http://localhost/nexura-prueba-rta-main";
</script>
<?php
	}
 }