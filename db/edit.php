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
	$rol_id = $_POST['rol_id'];



	// var_dump($_POST);
	// var_dump($id_empleado);
	
	$query="UPDATE `empleados` SET `nombre` = '$nombre', `correo` = '$correo', `sexo` = '$sexo', `id_area` = '$id_area', `boletin` = '$boletin', `descripcion` = '$descripcion' WHERE `empleados`.`id_empleado` = $id_empleado;";
	$resultado = mysqli_query($mysqli,$query);


	$eliminar="DELETE FROM empleado_rol WHERE empleado_id=$id_empleado";
	$resultado3 = mysqli_query($mysqli,$eliminar);

	if(!isset($_POST['rol_id'])){
		?>
			<script>
			alert("Seleccione los roles");
			window.location.href = "http://localhost/nexura-prueba-rta-main/";
			</script>
		<?php
		return;
	}

	foreach($_POST['rol_id'] as $selected){	
		$querys="INSERT INTO empleado_rol (empleado_id, rol_id) VALUES ($id_empleado, $selected )";
		// var_dump($querys);
		$resultado2 = mysqli_query($mysqli,$querys);
	}

	if (!$resultado2) {
		die("query file");
	}else{
	?>
		<script>
		alert("enviados");
		window.location.href = "http://localhost/nexura-prueba-rta-main/";
		</script>
		<?php
	}
 }