<?php

	require_once 'Alumno.php';
	require_once 'Asignatura.php';
	require_once 'Matricula.php';
	
	class TablaNotas {
	
		// DECLARACIÓN VARIABLES.
		private $alumnos;
		private $asignaturas;
		private $matriculas;
	
		//CONSTRUCTOR
		public function TablaNotas($alumnos=array(), $asignaturas=array(), $matriculas=array()) {
			$this->alumnos=$alumnos;
			$this->asignaturas=$asignaturas;
			$this->matriculas=$matriculas;
		}
	
		// MÉTODOS
	
		//Getters
		public function getAlumnos() {
			return $this->alumnos;
		}
		public function getAsignaturas() {
			return $this->asignaturas;
		}
		public function getMatriculas() {
			return $this->matriculas;
		}
		
		//Añadir elementos
		public function addAlumno($alumno) { // Objeto tipo Alumno
			$this->alumnos[$alumno->getCodigo()]=$alumno;
		}
		public function addAsignatura($asignatura) { // Objeto tipo Asignatura
			$this->asignaturas[$asignatura->getCodigo()]=$asignatura;
		}
		public function addMatricula($matricula) { // Objeto tipo Matrícula
			$this->matriculas[$matricula->getCodigo()]=$matricula;
		}
		
		//Borrar elementos
		public function borrarAlumno($codigo) { // $codigo Alumno
			unset($this->alumnos[$codigo]);
			$asignaturas = count($this->asignaturas);
			for ($i=1; $i<=$asignaturas; $i++) { // Ojo!! Las matrículas (y los otros objetos en 'TablaNotas', los empiezo a contar desde 1)
				unset($this->matriculas[$codigo."-".$i]);
			}
		}
		public function borrarAsignatura($codigo) { // $codigo Asignatura
			unset($this->asignaturas[$codigo]);
			$alumnos = count($this->alumnos);
			for ($i=1; $i<=$alumnos; $i++) { // Ojo!! Las matrículas (y los otros objetos en 'TablaNotas', los empiezo a contar desde 1)
				unset($this->matriculas[$i."-".$codigo]);
			}
		}
		public function borrarMatricula($codigo) { // $codigo Matrícula
			unset($this->matriculas[$codigo]);
		}
		
	}// fin de clase TablaNotas

?>