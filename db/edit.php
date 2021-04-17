<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';

if(isset($_POST['nombre']) && $_POST['nombre']!="")  {

	$id_empleado = $_POST['id_empleado'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$sexo = $_POST['sexo'];
	$id_area = $_POST['id_area'];
	$boletin = $_POST['boletin'];
	$descripcion = $_POST['descripcion'];

	$query="UPDATE `empleados` SET `nombre` = '$nombre', `correo` = '$correo', `sexo` = '$sexo', `id_area` = '$id_area', `boletin` = '$boletin', `descripcion` = '$descripcion' WHERE `empleados`.`id_empleado` = $id_empleado;";


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