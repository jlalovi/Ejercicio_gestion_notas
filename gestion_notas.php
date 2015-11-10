<?php
	//LIBRERÍAS
	require_once 'html/cabecera.php';
	require_once 'html/pie.php';
	require_once 'html/nav.php';
	require_once 'html/tabla.php';
	require_once 'clases/Alumno.php';
	require_once 'clases/Asignatura.php';
	require_once 'clases/Matricula.php';
	require_once 'clases/TablaNotas.php';
	require_once 'procesos/cagar_datos.php';
	
	//SESIÓN
	session_start();
		
	if (!isset($_SESSION["tablaNotas"]))
		$_SESSION["tablaNotas"]=new TablaNotas(array(), array(), array()); // TablaNotas($alumnos=array(), $asignaturas=array(), $matriculas=array())
	
	//GENERADORES DE CONTENIDO HTML
	echo cabecera("GESTIÓN DE NOTAS", "css/estilos.css");
	echo nav(array("Nuevo Alumno"=>"nuevo_alumno.php",
				   "Nueva Asignatura"=>"nueva_asignatura.php"));
	echo cargarDatos($_SESSION["tablaNotas"]);
	echo tabla($_SESSION["tablaNotas"]);
	echo pie();
?>







<?php 
	/*
	//TESTEO
	echo "<div class='clear'></div>";
	echo "<div style='margin:5px 20px'>";
	echo "<h2 style='color:#910202;'>Pruebas</h2>";
		
		//CLASES
		
		//Alumno:
		$nuevo_alumno1=new Alumno(1, "77349150N", "Javier", "Latorre López-Villalta");
		$nuevo_alumno2=new Alumno(2, "11111111H", "Pepe", "Moreno Rubio");
		$nuevo_alumno3=new Alumno(3, "22222222J", "Isabel", "Pereira Ruíz");
		$nuevo_alumno4=new Alumno(4, "33333333P", "María", "Puebla Domingo");
		echo $nuevo_alumno1->getApellidos()."<br/>"; // Latorre López-Villalta
		echo $nuevo_alumno2->getNombre()."<br/>"; // Pepe
		echo $nuevo_alumno3->getDni()."<br/>"; // 22222222J
		echo $nuevo_alumno4->getCodigo()."<br/>"; // 4
		echo "<br/>";
		
		//Asignatura:
		$asig1=new Asignatura(1,"L. Cliente");
		$asig2=new Asignatura(2,"L. Servidor");
		echo $asig1->getCodigo()."<br/>"; // 1
		echo $asig2->getNombre()."<br/>"; // L.Servidor
		echo "<br/>";
		
		//Matrícula:
		$mat1=new Matricula($nuevo_alumno1, $asig1, 10);
		$mat2=new Matricula($nuevo_alumno1, $asig2, 100);		
		echo $mat1->getNota()."<br/>"; // 10
		echo $mat2->getNota()."<br/>"; // 100
		echo $mat1->getCodigo()."<br/>"; // 1-1
		echo $mat2->getCodigo()."<br/>"; // 1-2
		echo "<br/>";
		
		//TablaNotas
		$tablaNotas = new TablaNotas();
		echo "<strong>'tablaNotas' recién creada:</strong>";
		echo var_dump($tablaNotas); // Cadenas alumnos, asignaturas y matrículas, vacías.
		
		$tablaNotas->addAlumno($nuevo_alumno1);
		$tablaNotas->addAlumno($nuevo_alumno2);
		$tablaNotas->addAlumno($nuevo_alumno3);
		$tablaNotas->addAlumno($nuevo_alumno4);
		$tablaNotas->addAsignatura($asig1);
		$tablaNotas->addAsignatura($asig2);
		$tablaNotas->addMatricula($mat1);
		$tablaNotas->addMatricula($mat2);
		echo "<strong>'tablaNotas' con elementos añadidos:</strong>";
		echo var_dump($tablaNotas);
		
		//Llamadas a valores de los Arrays:
		echo $tablaNotas->getAlumnos()[1]->getNombre()."<br/>"; //Javier
		echo $tablaNotas->getAlumnos()["1"]->getNombre()."<br/>";//Javier
		echo "<br/>";
		echo $tablaNotas->getAsignaturas()[1]->getNombre()."<br/>"; //L. Cliente. Ojo!! Aún a pesar de que 'var_dump()' lo indique como objeto [5], aquí también se hace referencia al índice asociativo.
		echo $tablaNotas->getAsignaturas()["2"]->getNombre()."<br/>";//L. Servidor
		echo "<br/>";
		echo $tablaNotas->getMatriculas()["1-1"]->getNota()."<br/>"; //10. En estos dos casos sí habrá que indicar las comillas para el índice asociativo.
		echo $tablaNotas->getMatriculas()["1-2"]->getNota()."<br/>"; //100.
				
	echo "</div>" // FIN TESTEO 
	*/
?>