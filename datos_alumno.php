<?php
	//LIBRER�AS
	require_once 'html/cabecera.php';
	require_once 'html/nav.php';
	require_once 'html/formularios.php';
	require_once 'html/pie.php';
	require_once 'clases/Alumno.php';
	require_once 'clases/Asignatura.php';
	require_once 'clases/Matricula.php';
	require_once 'clases/TablaNotas.php';
	
	//SESI�N
	session_start();
	
	if (!isset($_SESSION["tablaNotas"]))
		$_SESSION["tablaNotas"]=new TablaNotas(array(), array(), array()); // TablaNotas($alumnos=array(), $asignaturas=array(), $matriculas=array())
	
	//INICIO DE VARIABLE 'ALUMNO'
	$alumno = $_SESSION["tablaNotas"]->getAlumnos()[$_GET["alumno"]]; // $_GET["alumno" es el c�digo o �nidice asociativo del alumno que pasar� por par�metro.
	$nombre_alumno = strtoupper($alumno->getNombre()." ".$alumno->getApellidos());
	
	//GENERADORES DE CONTENIDO HTML
	echo cabecera("FICHA DE $nombre_alumno", "css/estilos.css");
	echo nav(array("<< Volver sin guardar"=>"gestion_notas.php"));
	echo formularioModificarAlumno($_SESSION["tablaNotas"], $alumno);
	echo pie();
?>