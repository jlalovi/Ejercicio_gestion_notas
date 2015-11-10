<?php
	function cabecera($titulo, $rutaCss){
		$devolver = <<<CAB
			<!DOCTYPE html>
			<html>
				<head>
					<title>$titulo</title>
					<meta charset="ISO-8859-1">
					<link rel="stylesheet" type="text/css" href="$rutaCss" media="screen" />
				</head>
				<body>
					<h1 class="encabezado">$titulo</h1>
CAB;
		return $devolver;
	}
?>