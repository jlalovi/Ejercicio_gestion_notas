<?php

	function tabla($tablaNotas){
		if (empty($tablaNotas->getAlumnos())&&empty($tablaNotas->getAsignaturas()))
			$devolver="<div class='contenido_vacio'></div>"; // En caso de no haber alumnos ni asignaturas, aumento la altura del contenido con CSS para separar el pie de página
		
		else {
			$filas=count($tablaNotas->getAlumnos());
			$cols=count($tablaNotas->getAsignaturas());
			$contenido_tabla="";
			
			for ($f=0; $f<=$filas; $f++) { //Creando la tabla paso a paso a partir de las clases Alumno, Asignatura y Matrícula almacenadas en $tablaNotas
				$contenido_tabla=$contenido_tabla."<tr>";
				for ($c=0; $c<=$cols; $c++) {
					if ($c==0&&$f==0) // Condición para la primera celda
						$contenido_tabla=$contenido_tabla."<th class='encabezado_principal_tabla'>Alumnos/Asignaturas</th>";						
					else if ($c==0) // Condición para rellenar las celdas de Alumnos
						$contenido_tabla=$contenido_tabla."<th><a href='datos_alumno.php?alumno={$tablaNotas->getAlumnos()[$f]->getCodigo()}'>{$tablaNotas->getAlumnos()[$f]->getDni()}</a></th>";
					else if ($f==0) // Condición para rellenar las celdas de Asignaturas
						$contenido_tabla=$contenido_tabla."<th><a href='datos_asignatura.php?asignatura={$tablaNotas->getAsignaturas()[$c]->getCodigo()}'>{$tablaNotas->getAsignaturas()[$c]->getNombre()}</a></th>";
					else // Condición para llenar el resto de celdas con la nota correspondiente si se da el caso.
						if (isset($tablaNotas->getMatriculas()[$f."-".$c])) {
							$codMatricula = $f."-".$c;
							$contenido_tabla=$contenido_tabla."<td><input type='text'
																	  name='$codMatricula' 
																	  value='{$tablaNotas->getMatriculas()[$f."-".$c]->getNota()}'/>
														  	   </td>";
						}
						else {
							$contenido_tabla=$contenido_tabla."<td><input type='text' value='-' disabled/></td>";
						}
				}
				$contenido_tabla=$contenido_tabla."</tr>";
			}
			
			$devolver = <<<TABLA
				<form action="" method="post">
					<table>
						$contenido_tabla
					</table>
					<input class="invisible" type="text" name="notas" value="notas" />
					<input class="boton_salvar" type="submit" value="Salvar" />
				</form>
TABLA;
		
		} //fin else
			
		return $devolver;
	}
?>