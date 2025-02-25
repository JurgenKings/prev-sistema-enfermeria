<?php
require_once("conexion.php");

//La clase Usuario hereda de la clase Conexion
class Usuario extends Conexion
{
  //----------------Propiedades-------------------

  //----------------Metodo Constructor------------
  public function __construct()
  {
    //Llamar al constructor de la clase padre (Conexion)
    parent::__construct();
  }
  //----------------Otros Metodos-----------------
  public function ingresar(string $user, string $contra)
  {
    //Definimos la consulta a realizar
    $consulta = "SELECT * FROM usuarios WHERE nombre = :marcaUsuario";
    //Preparamos la consulta, utilizando la variable protegida heredada
    $sentencia = $this->conexion->prepare($consulta);
    //Definimos un array asociativo, que asocie el parametro $user a el marcador :marcaUsuario
    $arrDatos = array(':marcaUsuario' => $user);
    //Ejecutamos la consulta con el array asociativo
    $sentencia->execute($arrDatos);

    /*Con el método fetch() devolvemos una sola fila de resultados de la consulta preparada*/
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    //Guardar en una variable las filas afectadas por la consulta
    $numFilas = $sentencia->rowCount();
    //Liberamos los recursos utilizados en la consulta
    $sentencia->closeCursor();

    if ($numFilas > 0) {
      //El usuario es correcto porque devolvio mas de 0 filas
      if (password_verify($contra, $resultado['clave'])) {
        //El usuario es correcto y la contraseña es correcta
        return true;
      } else {
        //El usuario es correcto pero la contraseña es incorrecta
        return false;
      }
    } else {
      //El usuario es incorrecto, no se le comprueba la contraseña
      return false;
    }
  }
}
