<?php

function formularioAlumno($tablaNotas) {
	
	$asignaturas="";
	if (!empty($tablaNotas->getAsignaturas())) {
		$arrayAsignaturas = $tablaNotas->getAsignaturas();
		for ($n=1; $n<=count($arrayAsignaturas); $n++ ) {
			$asignaturas=$asignaturas."<option value='{$arrayAsignaturas[$n]->getCodigo()}'>{$arrayAsignaturas[$n]->getNombre()}</option>";
		}
	}
		
	$devolver = <<<TABLA
		<form class="formulario" action="gestion_notas.php" method="post">
			<fieldset>
				<legend>Datos del alumno</legend>
				<div><label>Nombre:<input type="text" name="nombre"/></label></div>
				<div><label>Apellidos:<input type="text" name="apellidos"/></label></div>
				<div><label>DNI:<input type="text" name="dni"/></label></div>
				<br/>
				<label for="asignaturas" title="selección múltiple con tecla 'ctrl'">Asignaturas:</label>
				<br/>
				<select id="asignaturas" name="asignaturas[]" multiple="multiple">
					$asignaturas
				</select>
				<input class="invisible" type="text" name="nuevo_alumno" value="nuevo_alumno" />
				<input class="boton_guardar_alumno" type="submit" value="Guardar alumno">
			</fieldset>
			
		</form>
TABLA;

	return $devolver;
}

function formularioAsignatura() {

	$devolver = <<<TABLA
		<form class="formulario" action="gestion_notas.php" method="post">
			<fieldset>
				<legend>Nueva asignatura</legend>
				<div><label>Nombre:<input type="text" name="nombre"/></label></div>
				<input class="invisible" type="text" name="nueva_asignatura" value="nueva_asignatura" />
				<input class="boton_guardar_asignatura" type="submit" value="Guardar asignatura">
			</fieldset>
		
		</form>
TABLA;

	return $devolver;
}

function formularioModificarAlumno($tablaNotas, $alumno) {

	$asignaturas="";
	if (!empty($tablaNotas->getAsignaturas())) {
		$arrayAsignaturas = $tablaNotas->getAsignaturas();
		for ($n=1; $n<=count($arrayAsignaturas); $n++ ) {
			if (isset($tablaNotas->getMatriculas()[$alumno->getCodigo()."-".$n])) // Creo la opción seleccionada en caso de existir la matrícula
				$asignaturas=$asignaturas."<option value='{$arrayAsignaturas[$n]->getCodigo()}' selected>{$arrayAsignaturas[$n]->getNombre()}</option>";
			else
				$asignaturas=$asignaturas."<option value='{$arrayAsignaturas[$n]->getCodigo()}'>{$arrayAsignaturas[$n]->getNombre()}</option>";
		}
	}

	$devolver = <<<TABLA
		<form class="formulario" action="gestion_notas.php" method="post">
			<fieldset>
				<legend>Datos del alumno</legend>
				<div><label>Nombre:<input type="text" name="nombre" value="{$alumno->getNombre()}"/></label></div>
				<div><label>Apellidos:<input type="text" name="apellidos" value="{$alumno->getApellidos()}"/></label></div>
				<div><label>DNI:<input type="text" name="dni" value="{$alumno->getDni()}"/></label></div>
				<br/>
				<label for="asignaturas" title="selección múltiple con tecla 'ctrl'">Asignaturas:</label>
				<br/>
				<select id="asignaturas" name="asignaturas[]" multiple="multiple">
					$asignaturas
				</select>
				<input class="invisible" type="text" name="codigo" value="{$alumno->getCodigo()}" />
				<input class="invisible" type="text" name="modificar_alumno" value="modificar_alumno" />
				<input type="submit" value="Guardar cambios">
				<input type="submit" name="borrar_alumno" value="Borrar alumno">
			</fieldset>
		
		</form>
TABLA;

	return $devolver;
}

function formularioModificarAsignatura($asignatura) {

	$devolver = <<<TABLA
		<form class="formulario" action="gestion_notas.php" method="post">
			<fieldset>
				<legend>Nueva asignatura</legend>
				<div><label>Nombre:<input type="text" name="nombre" value="{$asignatura->getNombre()}"/></label></div>
				<input class="invisible" type="text" name="modificar_asignatura" value="modificar_asignatura" />
				<input class="invisible" type="text" name="codigo" value="{$asignatura->getCodigo()}" />
				<input type="submit" value="Guardar cambios">
				<input type="submit" name="borrar_asignatura" value="Borrar asignatura">
			</fieldset>

		</form>
TABLA;

	return $devolver;
}
?>