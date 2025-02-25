<?php
   session_start();

   // Destruir todas las variables de sesión
   $_SESSION = array();

   session_destroy();

   // Redirigir al usuario al inicio de sesión
   header("Location: index.html");
   exit();
?>