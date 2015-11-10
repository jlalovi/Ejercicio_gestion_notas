<?php
class Matricula {

	// DECLARACIÓN VARIABLES.
	private $nota;
	private $codigo; 
	private $codigo_asig;
	private $codigo_alum;

	//CONSTRUCTOR
	public function Matricula($alumno, $asignatura, $nota=0) { // Objetos de tipo Alumno y Asignatura
		$this->setNota($nota);
		$this->codigo_asig=$asignatura->getCodigo();
		$this->codigo_alum=$alumno->getCodigo();
		$this->codigo=$this->getCodigoAlum()."-".$this->getCodigoAsig(); // El valor será la concatenación de $codigo_alum y $codigo_asig, separados por un guión
	}

	// MÉTODOS

	//Setters y getters
	public function setNota($nota) {
		$this->nota=$nota;
	}
	public function getNota() {
		return $this->nota;
	}
	public function getCodigoAlum() {
		return $this->codigo_alum;
	}
	public function getCodigoAsig() {
		return $this->codigo_asig;
	}
	public function getCodigo() {
		return $this->codigo;
	}
}// fin de clase Matrícula

?>