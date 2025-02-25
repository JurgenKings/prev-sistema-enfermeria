<?php
require_once('./estructuras/head.php');
require_once("clases-php/Pacientes.php");
?>
<!-- Se llama toda la estructura del head, pero sin cerrarla para poder cambiar el title -->

<title>Consultas</title>
<link rel="stylesheet" href="css/consulta.css">

<?php require('./estructuras/cabecera-menu.php'); ?>
<!-- Se cierra el head y se llama toda la estructura del header y del nav-->

<section class="contenedor-contenido-principal">
  <h1>
    <a href="principal.php">
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
        width="1280.000000pt" height="1085.000000pt" viewBox="0 0 1280.000000 1085.000000"
        preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,1085.000000) scale(0.100000,-0.100000)" stroke="none">
          <path d="M3449 10837 c-20 -8 -49 -23 -65 -35 -59 -43 -3343 -3338 -3360
                     -3372 -23 -45 -24 -143 -2 -190 8 -19 431 -533 939 -1141 508 -608 1228 -1470
                     1599 -1915 371 -445 702 -840 734 -878 75 -87 142 -122 218 -113 68 8 126 43
                     163 97 l30 45 3 1166 2 1166 78 17 c328 69 819 116 1217 116 1668 -1 3233
                     -594 4555 -1725 1068 -914 1997 -2192 2736 -3768 117 -250 150 -289 256 -303
                     68 -9 126 12 179 65 74 73 77 95 45 346 -256 1983 -832 3673 -1689 4955 -571
                     853 -1262 1536 -2077 2052 -924 585 -2011 947 -3190 1063 -297 29 -484 37
                     -840 37 -443 -1 -800 -24 -1157 -76 l-83 -12 -2 1131 c-3 1030 -4 1133 -20
                     1160 -21 39 -65 83 -101 102 -41 21 -125 26 -168 10z" />
        </g>
      </svg>
    </a>
    Lista de Pacientes
    <form action="buscaCedula.php" method="GET" autocomplete="off">
      <input type="search" name="cedulaBuscada" placeholder="Cedula">
    </form>
  </h1>
  <dl class="lista-definicion-pacientes">
    <!-- Inicio codigo PHP -->
    <?php
    $nuevaConsultaPaciente = new Paciente();
    $arrayPacientes = $nuevaConsultaPaciente->consultarPacientes();

    foreach ($arrayPacientes as $elemento) {
      $nombre = $elemento['nombre'];
      $apellido = $elemento['apellido'];
      $cedula = $elemento['cedula'];
    ?>
      <!-- Fin codigo PHP -->
      <div>
        <img src="img/avatar-paciente.png" alt="">
        <dt>
          <a href="consulta-especifica.php?cedula=<?php echo $cedula ?>"><?php echo "$nombre $apellido"; ?></a>
        </dt>
        <dd>C.I: <?php echo $cedula ?></dd>
        <a href="consulta-especifica.php?cedula=<?php echo $cedula ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
          </svg></a>
      </div>
      <!-- Inicio codigo PHP -->
    <?php
    }
    ?>
    <!-- Fin codigo PHP -->
  </dl>
</section>
</main>
</div>
<script defer type="text/javascript" src="js/cambiarModo.js"></script>
<script defer type="text/javascript" src="js/script.js"></script>
<script defer type="text/javascript" src="js/validaciones.js"></script>
</body>

</html>