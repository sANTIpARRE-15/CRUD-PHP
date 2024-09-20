<?php

if (!empty ($_GET["id"]) ) {
   $id=$_GET["id"];
   $sql=$conexion-> query("delete from personas where id_persona=$id");

   if ($sql==1) {
    echo "<div class='alert alert-success' role='alert'>La perosna se eliminó correctamente</div>";
   } else {
   echo "<div class='alert alert-danger' role='alert'>Hubo un error</div>";



   }
   
}
?>