<?php
class Asignatura {

	// DECLARACIÓN VARIABLES.
	private $nombre;
	private $codigo; // Este será el valor que utilizaré para el Array asociativo de Asignaturas

	//CONSTRUCTOR
	public function Asignatura($codigo=0, $nombre="") {
		$this->setNombre($nombre);
		$this->setCodigo($codigo);
	}

	// MÉTODOS

	//Setters y getters
	public function setNombre($nombre) {
		$this->nombre=$nombre;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setCodigo($codigo) {
		$this->codigo=$codigo;
	}
	public function getCodigo() {
		return $this->codigo;
	}
}// fin de clase Asignatura

?>