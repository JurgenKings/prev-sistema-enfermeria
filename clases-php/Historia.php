<?php
require_once("conexion.php");

class Historia extends Conexion
{
  //----------------Propiedades-------------------
  private $hMotivo;
  private $hDiagnostico;
  private $hTratamiento;
  private $hFecha;
  private $hIdPaciente;
  private $hAtendido;
  private $hReposo;
  private $hPresion;
  //----------------Metodo Constructor------------
  public function __construct()
  {
    //Llamar al constructor de la clase padre (Conexion)
    parent::__construct();
  }
  //Metodo que crea historias
  public function registrarHistoria($motivoHistoria, $diagnosticoHistoria, $tratamientoHistoria, $fechaIngresoHistoria, $idPacienteHistoria, $atendido, $reposo, $presion)
  {
    $this->hMotivo = $motivoHistoria;
    $this->hDiagnostico = $diagnosticoHistoria;
    $this->hTratamiento = $tratamientoHistoria;
    $this->hFecha = $fechaIngresoHistoria;
    $this->hIdPaciente = $idPacienteHistoria;
    $this->hAtendido = $atendido;
    $this->hReposo = $reposo;
    $this->hPresion = $presion;

    $consulta = "INSERT INTO historial(motivo, diagnostico, tratamiento, fecha_consulta, paciente_id, atendido, reposo, presion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $sentencia = $this->conexion->prepare($consulta);

    $arrDatos = array($this->hMotivo, $this->hDiagnostico,  $this->hTratamiento,  $this->hFecha,  $this->hIdPaciente, $this->hAtendido, $this->hReposo, $this->hPresion);

    $sentencia->execute($arrDatos);
  }
  //Metodo que consulta todas las historias de un paciente especifico
  public function consultarHistorias($idPaciente)
  {
    $consulta = "SELECT h.motivo, h.diagnostico, h.tratamiento, h.fecha_consulta, h.paciente_id, h.atendido, h.reposo, h.presion FROM historial h INNER JOIN pacientes p ON h.paciente_id = p.id_paciente WHERE h.paciente_id = ?";

    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->execute([$idPaciente]);

    $listaHistorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $listaHistorias;
  }

  public function consultaGeneral()
  {
    $consulta = "SELECT h.motivo, h.diagnostico, h.paciente_id, h.fecha_consulta, p.nombre,p.apellido, p.cedula
         FROM historial h INNER JOIN pacientes p ON h.paciente_id = p.id_paciente WHERE h.fecha_consulta = CURDATE()";

    $sentencia = $this->conexion->prepare($consulta);
    $sentencia->execute();

    $listaHistorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $listaHistorias;
  }
}
