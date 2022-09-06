<?php 
  include_once "../header/header.php"; 
  require("../base_datos/conexion/conexion.php");
  $query = mysqli_query($conexion, "SELECT * FROM usuarios");
     $result = mysqli_num_rows($query);
     
   
?>
            <div class="row">
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Admins</h5>
                    <div class="row">
                      <div class="col-5 col-sm-8 col-xl-5 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $result; ?></h2>
                        </div>
                      </div>
                      <div class="col-8 col-sm-8 col-xl-7 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Empleados Activos</h5>
                    <div class="row">
                    <div class="col-5 col-sm-8 col-xl-5 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo '1'; ?></h2>
                        </div>
                      </div>
                      <div class="col-8 col-sm-8 col-xl-7 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-worker text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Empleados Inactivos</h5>
                    <div class="row">
                    <div class="col-5 col-sm-8 col-xl-5 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo '1'; ?></h2>
                        </div>
                      </div>
                      <div class="col-8 col-sm-8 col-xl-7 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account-off  text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Departamentos</h5>
                    <div class="row">
                    <div class="col-5 col-sm-8 col-xl-5 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo '1'; ?></h2>
                        </div>
                      </div>
                      <div class="col-8 col-sm-8 col-xl-7 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-hospital-building text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <th> ID </th>
          <th> Foto </th>
          <th> Nombre</th>
          <th> Fecha de Ingreso </th>
          <th> Sueldo Mensual </th>
          <th> Sueldo Diario </th>
          <th> Departamento </th>
          <th> Acciones </th>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM empleados WHERE status = 1 ");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td><?php echo $data['id_empleado'] ?></td>
                  <td>
                    <img src="<?php echo $data['foto'] ?>" alt="image" class="rounded-circle"/> 
                  </td>
                  <td><a href=" caratula.php"><?php echo $data['nombre_empleado'] . " " . $data['apellido_paterno'] . " " . $data['apellido_materno'] ?></a> </td>
                  <td><?php echo $data['fecha_ingreso'] ?></td>
                  <td><?php echo $data['sueldo_mensual'] ?></td>
                  <td><?php echo $data['sueldo_diario'] ?></td>
                  <td><?php echo $data['nombre_departamento'] ?></td>
                  <td><a href="baja_empleado.php?id='. $data['id_empleado'] ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a></td>
                </tr>
              <?php
              }
            } 
          ?>
        </tbody>
      </table>
    </div>
         
<?php
    include_once "../header/header2.php"; 
?>