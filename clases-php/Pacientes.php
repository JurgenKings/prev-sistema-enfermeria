<?php
require_once("Conexion.php");

class Paciente extends Conexion
{
  //----------------Propiedades-------------------
  private $pNombre;
  private $pApellido;
  private $pCedula;
  private $pEdad;
  private $pAltura;
  private $pPeso;
  private $pSemestre;
  private $pCarrera;
  private $pTelefono;
  private $pDireccion;
  private $pTipoAlergias;
  private $pTipoSangre;
  private $pSexo;
  //----------------Metodo Constructor------------
  public function __construct()
  {
    //Llamar al constructor de la clase padre (Conexion)
    parent::__construct();
  }
  //----------------Otros Metodos-----------------
  public function registrarPacientes($nombre, $apellido, $cedula, $edad, $altura, $peso, $semestre,  $carrera,  $telefono,  $direccion,  $tipoAlergias,  $tipoSangre, $sexo)
  {
    $this->pNombre = $nombre;
    $this->pApellido = $apellido;
    $this->pCedula = $cedula;
    $this->pEdad = $edad;
    $this->pAltura = $altura;
    $this->pPeso = $peso;
    $this->pSemestre = $semestre;
    $this->pCarrera = $carrera;
    $this->pTelefono = $telefono;
    $this->pDireccion = $direccion;
    $this->pTipoAlergias = $tipoAlergias;
    $this->pTipoSangre = $tipoSangre;
    $this->pSexo = $sexo;

    $consulta = "INSERT INTO pacientes(nombre, apellido, cedula, edad, altura, peso, semestre, carrera, telefono, direccion, tipo_de_alergias, tipo_de_sangre, sexo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = $this->conexion->prepare($consulta);

    $arrDatos = array($this->pNombre, $this->pApellido,  $this->pCedula,  $this->pEdad, $this->pAltura, $this->pPeso, $this->pSemestre,  $this->pCarrera,  $this->pTelefono,  $this->pDireccion,  $this->pTipoAlergias,  $this->pTipoSangre, $this->pSexo);

    $sentencia->execute($arrDatos);
  }
  //Metodo que consulta todos los pacientes en la base de datos
  public function consultarPacientes()
  {
    $consulta = "SELECT * FROM pacientes";

    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->execute();

    $listaPacientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $listaPacientes;
  }
  //Metodo que devuelve cuantos pacientes hay en la base de datos
  //Metodo que elimina a un paciente en la base de datos por la cedula
  public function eliminarPaciente($ci)
  {
    $consulta = "DELETE FROM pacientes WHERE cedula= :ci";

    $sentencia = $this->conexion->prepare($consulta);
    //Asociamos el parametro al marcador
    $sentencia->bindParam(':ci', $ci);
    $sentencia->execute();
    $sentencia->closeCursor();
  }
}
