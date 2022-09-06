<?php
if (empty($_POST['id_empleado']) || empty($_POST['nombre']) || empty($_POST['ap']) || empty($_POST['am']) || empty($_POST['num_cuenta']) || empty($_POST['sm']) 
    || empty($_POST['fecha']) || empty($_POST['turno']) ||  empty($_POST['dep']) ||  empty($_POST['fp']) ||  empty($_POST['banco']) ) {

} else {
	require ("../conexion/conexion.php");
    
	$tips = 'jpg';
	$type = array('image/jpg' => 'jpg');
	$id = $_POST['id_empleado'];
	$id = preg_replace('([^A-Za-z0-9])', '', $id);

	$nombrefoto1 = $_FILES['files']['name'];
	$ruta1 = $_FILES['files']['tmp_name'];
	$name = $id . 'A.' . $tips;
	if (is_uploaded_file($ruta1)) {
		$destino = "../../imagenes/" . $name;
		copy($ruta1, $destino);
	}


	$id = $_POST['id_empleado'];
	$nombre = $_POST['nombre'];
	$ap = $_POST['ap'];
	$am = $_POST['am'];
    $banco = $_POST['banco'];
    $num_cuenta = $_POST['num_cuenta'];
	$sm = $_POST['sm'];
	$sd = $_POST['sm'] / 30.4;
	$fecha = $_POST['fecha'];
	$dep = $_POST['dep'];
    $turno = $_POST['turno'];
	$fp = $_POST['fp'];
	$status = 0;

	$sql = mysqli_query($conexion, "INSERT INTO empleados (id_empleado, nombre_empleado, apellido_paterno, apellido_materno, banco, fecha_ingreso, sueldo_mensual, sueldo_diario, nombre_departamento, frecuencia_pago, status, foto)
        VALUES ('$id','$nombre','$ap','$am', '$banco', '$fecha','$sm','$sd','$dep','$fp','$status', '$destino')");

	mysqli_close($conexion);

	header("location: empleados_activos.php");
}
?>