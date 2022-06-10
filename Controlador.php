<?php
	// Controlador.php
	class Controlador {
		public function exhibir($modelo, $vista){
			$vista->dibujarTitulo($modelo);
			$vista->dibujarCuadricula();
			$p = new Punto(80,20);
			$vista->dibujarInicioFin(1, 20, 40);
			$vista->dibujarFlechaDer(new Punto(110,55), 20);
			$vista->dibujarSalida(new Punto(135,45), "Dame un numero entero:");
			//$vista->dibujarFlechaAbajo($p, 20);
			$vista->verLiberar();
		}
	}
?>