<?php

if (empty($_POST['files_editar'] ) ||empty($_POST['id_empleado_editar'] ) || empty($_POST['nombre_editar'] )|| empty($_POST['ap_editar'] )|| empty($_POST['am_editar'] )|| empty($_POST['sm_editar'] )|| empty($_POST['num_cuenta_editar'] )|| empty($_POST['banco_editar'] )|| empty($_POST['fecha_editar'] ) || empty($_POST['dep_editar']) || empty($_POST['turno_editar'] ) || empty($_POST['fp_editar'] )) {
    

}else{
    require("../conexion.php");
    
    $tips = 'jpg';
        $type = array ('image1/jpg' => 'jpg');
        $id = $_POST['id_empleado_editar'];
        $id = preg_replace('([^A-Za-z0-9])', '', $id);
        
        
        $nombrefoto1 = $_FILES['files_editar']['name'];
        $ruta1 = $_FILES['files_editar']['tmp_name'];
        $name = $id.'A.'.$tips;
        if(is_uploaded_file($ruta1)){
            $destino = "imagenes_nomina/".$name;
            copy($ruta1,$destino);
        }
    $dni = $_POST['dni_editar'];
    $id = $_POST['id_empleado_editar']; 
    $nombre = $_POST['nombre_editar'];
    $ap = $_POST['ap_editar'];
    $am = $_POST['am_editar'];
    $sm = $_POST['sm_editar'];
    $sd = $_POST['sm_editar']/30.4;
    $no_cuenta = $_POST['num_cuenta_editar'];
    $banco = $_POST['banco_editar'];
    $fecha = $_POST['fecha_editar'];
    $dep = $_POST['dep_editar'];
    $fp = $_POST['fp_editar'];
    $fecha_baja = $_POST['fecha_baja'];
    $motivo_baja = $_POST['motivo_baja'];
    $check = $_POST['baja'];
    $status = 1;
    
    
        
       if($check == on){
            $status =2;
        }
        
       if($destino ==NULL){


    
	    $sql = mysqli_query($conexion, "UPDATE empleados SET id_empleado = '$id', nombre = '$nombre', apellido_paterno = '$ap', apellido_materno = '$am', 
	    fecha_ingreso = '$fecha', sueldo_mensual = '$sm', sueldo_diario = '$sd', no_cuenta = '$no_cuenta', banco = '$banco', departamento = '$dep', frecuencia_pago = '$fp', status = '$status', fecha_baja = '$fecha_baja', motivo_baja = '$motivo_baja' WHERE dni = $dni");

   
        
        }else{
        
        var_dump("no entro");

    
	    $sql = mysqli_query($conexion, "UPDATE empleados SET id_empleado = '$id', nombre = '$nombre', apellido_paterno = '$ap', apellido_materno = '$am', 
	    fecha_ingreso = '$fecha', sueldo_mensual = '$sm', sueldo_diario = '$sd', no_cuenta = '$no_cuenta', banco = '$banco', departamento = '$dep', frecuencia_pago = '$fp', status = '$status', foto = '$destino', fecha_baja = '$fecha_baja', motivo_baja = '$motivo_baja' WHERE dni = $dni");

        
            

        }
	    
    	    
	    mysqli_close($conexion);

	//header("location: agregar_empleado.php");
	
}
?>