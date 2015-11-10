<?php
	function nav($enlaces_nav=array()){ // Para a�adir tantos enlaces de navegaci�n como se indiquen por par�metros
		                                // $enlaces_nav=Array($nombre_enlace1=>$href_enlace1, $nombre_enlace2=>$href_enlace2, etc.)
		$lista_enlaces="";
		foreach ($enlaces_nav as $nombre_enlace=>$href_enlace) {
			$lista_enlaces=$lista_enlaces."<li><a href='$href_enlace'>$nombre_enlace</a></li>"; // No concatena con el '+=' :/
		}
		$devolver = <<<NAV
			<div class="nav">
				<ul>
					$lista_enlaces
				</ul>
				<div class="clear"></div>	
			</div>
NAV;

		return $devolver;
	}
?>