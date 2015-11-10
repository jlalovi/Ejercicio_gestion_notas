<?php

	//LIBRERÍAS
	require_once 'html/cabecera.php';
	require_once 'html/nav.php';
	require_once 'html/formularios.php';
	require_once 'html/pie.php';

	//GENERADORES DE CONTENIDO HTML
	echo cabecera("NUEVA ASIGNATURA", "css/estilos.css");
	echo nav(array("<< Volver sin guardar"=>"gestion_notas.php"));
	echo formularioAsignatura();
	echo pie();
	
?>