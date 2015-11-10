<?php

	function cargarDatos($tablaNotas) {
		var_dump($_POST); //Testeo!!!
		
		// Para solucionar el problema de posteos diferentes, he añadido campos ocultos con valores a las acciones que me interesan.
		// Por lo tanto, según el tipo de posteo se realizarán unas acciones u otras detalladas en las siguientes condiciones:
		
		// ECHO $_SERVER["HTTP_REFERER"];
		
		if (isset($_POST["notas"])) {
			foreach ($_POST as $codigo=>$valor) {
				if ($codigo!="notas")
					$tablaNotas->getMatriculas()[$codigo]->setNota($valor);
			}
		}
		
		else if (isset($_POST["nuevo_alumno"])) {
			if(empty($tablaNotas->getAsignaturas())) {
				echo "<p class='error'>¡¡Necesitas crear al menos una asignatura antes de crear un alumno!!</p>";
			}
			else if($_POST["nombre"]===''||$_POST["apellidos"]===$_POST["dni"]){
				echo "<p class='error'>¡¡No puede haber ninguno de los campos de alumno vacío!!</p>";
			}
			else {
				$codigo_nuevo_alumno=count($tablaNotas->getAlumnos())+1;
				$nuevo_alumno = new Alumno($codigo_nuevo_alumno, $_POST["dni"], $_POST["nombre"], $_POST["apellidos"]); // Alumno($codigo=0 ,$dni="", $nombre="", $apellidos="")
				$tablaNotas->addAlumno($nuevo_alumno);
				foreach ($_POST["asignaturas"] as $valor) {
					$asignatura = $tablaNotas->getAsignaturas()[$valor];
					$nueva_matricula = new Matricula($nuevo_alumno,$asignatura,0); // Matricula($alumno, $asignatura, $nota=0)
					$tablaNotas->addMatricula($nueva_matricula);
				}
			}			
		}
		
		else if (isset($_POST["borrar_alumno"])) {
			$tablaNotas->borrarAlumno($_POST["codigo"]);
		}
		
		else if (isset($_POST["modificar_alumno"])) {
			if($_POST["nombre"]===''||$_POST["apellidos"]===$_POST["dni"]){
				echo "<p class='error'>¡¡No puede haber ninguno de los campos de alumno vacío!!</p>";
			}
			else {
				// Modificaciones de los datos del alumno
				$alumno=$tablaNotas->getAlumnos()[$_POST["codigo"]];
				$alumno->setNombre($_POST["nombre"]);
				$alumno->setApellidos($_POST["apellidos"]);
				$alumno->setDni($_POST["dni"]);
					
					
				// Modificaciones de sus matrículas: TODO
				$asignaturas = $tablaNotas->getAsignaturas();
				$matriculas = $tablaNotas->getMatriculas();
				for ($i=1; $i<=count($asignaturas); $i++) { // Borro todas las matrículas para reiniciarlas en el siguiente bucle si es el caso
					$borrar_matricula=false;
					if (isset($matriculas[$_POST["codigo"]."-".$i])) {
						$borrar_matricula=true; // Si la matrícula de la asignatura existía, indicaré que la voy a borrar (aunque esta decisión la tomaré o no posteriormente)
					}
					for ($j=0; $j<count($_POST["asignaturas"]); $j++) {
						if($_POST["asignaturas"][$j]==$asignaturas[$i]->getCodigo()) {// Si la asignatura forma parte de la modificación, no borraré la asignatura en caso de que exista
							$borrar_matricula=false;
						}
					}
					if ($borrar_matricula) {// Si la matrícula existía, pero la asignatura la he descartado en la modificicación, elimino la matrícula.
						$tablaNotas->borrarMatricula($_POST["codigo"]."-".$i);
					}
				}
					
				for ($i=0; $i<count($_POST["asignaturas"]); $i++) { // Inicializo aquellas matrículas que no existían y ahora sí después de modificación
					$valor_asig_post=$_POST["asignaturas"][$i];
					if($valor_asig_post==$asignaturas[$valor_asig_post]->getCodigo()&&!isset($matriculas[$_POST["codigo"]."-".$valor_asig_post])) {// Si la asignatura forma parte de la modificación, no borraré la asignatura en caso de que exista
						$asignatura = $tablaNotas->getAsignaturas()[$valor_asig_post];
						$alumno = $tablaNotas->getAlumnos()[$_POST["codigo"]];
						$nueva_matricula = new Matricula($alumno,$asignatura,0); // Matricula($alumno, $asignatura, $nota=0)
						$tablaNotas->addMatricula($nueva_matricula);
					}
				}
			}			
		}
		
		else if (isset($_POST["nueva_asignatura"])) {
			if($_POST["nombre"]===''){
				echo "<p class='error'>¡¡No puede estar el campo nombre de asignatura vacio!!</p>";
			}
			else {
				$nueva_asignatura = new Asignatura(count($tablaNotas->getAsignaturas())+1, $_POST["nombre"]); // Asignatura($codigo=0, $nombre="")
				$tablaNotas->addAsignatura($nueva_asignatura);
			}
			
		}
		
		else if (isset($_POST["borrar_asignatura"])) {
			$tablaNotas->borrarAsignatura($_POST["codigo"]);
		}
		
		else if (isset($_POST["modificar_asignatura"])) {
			if($_POST["nombre"]===''){
				echo "<p class='error'>¡¡No puede estar el campo nombre de asignatura vacio!!</p>";
			}
			else {
				$tablaNotas->getAsignaturas()[$_POST["codigo"]]->setNombre($_POST["nombre"]);
			}			
		}		
	}
?>