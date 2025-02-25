<?php

class Conexion
{
  //----------------Propiedades-------------------
  protected $conexion;

  //----------------Metodo Constructor------------
  public function __construct()
  {
    try {
      $this->conexion = new PDO("mysql:host=localhost; dbname=db_enfermeria_pro", "root", "");
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->conexion;
    } catch (PDOException $err) {
      echo "La linea de error es: " . $err->getLine() . "<br>";
      die("Error fatal: " . $err->GetMessage());
    }
  }
  public function getConexion()
  {
    return $this->conexion;
  }
}
