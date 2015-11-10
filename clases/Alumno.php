<?php
class Alumno {

	// DECLARACI�N VARIABLES.
	private $nombre;
	private $apellidos;
	private $dni;
	private $codigo;

	//CONSTRUCTOR
	public function Alumno($codigo=0 ,$dni="", $nombre="", $apellidos="") {
		$this->setDni($dni);
		$this->setCodigo($codigo); // Este ser� el valor que utilizar� para el Array asociativo de Alumnos
		$this->setNombre($nombre);
		$this->setApellidos($apellidos);
	}

	// M�TODOS

	//Setters y getters
	public function setCodigo($codigo) {
		$this->codigo=$codigo;
	}
	public function getCodigo() {
		return $this->codigo;
	}
	public function setDni($dni) {
		$this->dni=$dni;
	}
	public function getDni() {
		return $this->dni;
	}
	public function setNombre($nombre) {
		$this->nombre=$nombre;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setApellidos($apellidos) {
		$this->apellidos=$apellidos;
	}
	public function getApellidos() {
		return $this->apellidos;
	}

}// fin de clase Alumno

?>