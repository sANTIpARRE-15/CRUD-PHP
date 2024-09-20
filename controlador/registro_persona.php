 <?php
 if (isset($_POST["btnregistrar"])) {
  if (!empty($_POST["nombre"])and !empty($_POST["apellido"]) and !empty($_POST["dni"])and !empty($_POST["fecha"])and !empty($_POST["correo"])) {
   
   $nombre=($_POST["nombre"]);
   $apellido=($_POST["apellido"]);
   $dni=($_POST["dni"]);
   $fecha=($_POST["fecha"]);
   $correo=($_POST["correo"]);
   $sql=$conexion->query("insert into personas(nombre, apellido, dni, fecha_nacimiento, email) values ('$nombre', '$apellido', '$dni', '$fecha', '$correo')");

   if ($sql==1) {
    echo"<div class='alert alert-success' role='alert'>Los datos fueron registrados correctamnte</div>";
   } else {
    echo "<div class='alert alert-danger' role='alert'>Error al registrar los datos</div>";
   }
   

  } else {
    echo"<div class='alert alert-warning' role='alert'>Todos los campos deben estar registrados</div>";
  }
  
 }
 ?>



