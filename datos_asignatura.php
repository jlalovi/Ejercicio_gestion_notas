<?php
	//LIBRERÍAS
	require_once 'html/cabecera.php';
	require_once 'html/nav.php';
	require_once 'html/formularios.php';
	require_once 'html/pie.php';
	require_once 'clases/Alumno.php';
	require_once 'clases/Asignatura.php';
	require_once 'clases/Matricula.php';
	require_once 'clases/TablaNotas.php';
	
	//SESIÓN
	session_start();
	
	if (!isset($_SESSION["tablaNotas"]))
		$_SESSION["tablaNotas"]=new TablaNotas(array(), array(), array()); // TablaNotas($alumnos=array(), $asignaturas=array(), $matriculas=array())
	
	//INICIO DE VARIABLE 'ALUMNO'
	$asignatura = $_SESSION["tablaNotas"]->getAsignaturas()[$_GET["asignatura"]]; // $_GET["asignatura" es el código o ínidice asociativo de la asignatura que pasaré por parámetro.
	$nombre_asignatura = strtoupper($asignatura->getNombre());
	
	//GENERADORES DE CONTENIDO HTML
	echo cabecera("FICHA DE $nombre_asignatura", "css/estilos.css");
	echo nav(array("<< Volver sin guardar"=>"gestion_notas.php"));
	echo formularioModificarAsignatura($asignatura);
	echo pie();
?>