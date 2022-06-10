<?php
	// Vista.php
	class Vista {
		public $img;
		public $ancho, $alto, $um;
		public $blanco, $negro, $verdeclaro;
		public function __construct($an, $al, $um){
			$this->ancho = $an;
			$this->alto = $al;
			$this->um = $um;
			$this->img = imagecreate($this->ancho, $this->alto);
			$this->blanco = imagecolorallocate($this->img, 255, 255, 255);
			$this->negro = imagecolorallocate($this->img, 0, 0, 0);
			$this->verdeclaro = imagecolorallocate($this->img, 196, 237, 220);
			imagefilledrectangle($this->img, 0, 0, $this->ancho, $this->alto, $this->blanco);
		}
		public function verLiberar(){
			imagepng($this->img);
			imagedestroy($this->img);
		}
		public function dibujarTitulo($modelo){
			imagestring($this->img, 3, 10, 300, $modelo->titulo, $this->negro);	
		}
		public function dibujarCuadricula(){
			$num_lin_hor = $this->alto / $this->um;
			$num_lin_ver = $this->ancho / $this->um;
			// lineas horizontales
			for($i=1; $i<=$num_lin_hor; $i++)
				imageline($this->img, 0, $this->um*$i, $this->ancho, $this->um*$i, $this->verdeclaro);
			// lineas verticales
			for($i=1; $i<=$num_lin_ver; $i++)
				imageline($this->img, $this->um*$i, 0, $this->um*$i, $this->alto, $this->verdeclaro);		
		}
		public function dibujarInicioFin($b, $x, $y){
			$width = 90;
			$height = 30;
			$cad = "Fin";
			if($b==1) $cad="Inicio";
			//imageellipse(resource $image,int $cx,int $cy,int $width,int $height,int $color): bool
			imageellipse($this->img, $x + $width / 2, $y + $height / 2, $width, $height, $this->negro);
			imagestring($this->img, 3, $x + $width / 3, $y + $height / 3, $cad, $this->negro);	
		}
		public function dibujarFlechaDer($p, $d){
			imageline($this->img, $p->x, $p->y, $p->x+$d, $p->y, $this->negro);
			// falta punta de la flecha
			imageline($this->img, $p->x+$d, $p->y, $p->x+$d-5, $p->y-5, $this->negro);
			imageline($this->img, $p->x+$d, $p->y, $p->x+$d-5, $p->y+5, $this->negro);
		} 
		public function dibujarFlechaAbajo($p, $d){
			imageline($this->img, $p->x, $p->y, $p->x, $p->y+$d, $this->negro);
			// falta punta de la flecha
			imageline($this->img, $p->x, $p->y+$d, $p->x-5, $p->y+$d-5, $this->negro);
			imageline($this->img, $p->x, $p->y+$d, $p->x+5, $p->y+$d-5, $this->negro);
		}
		public function dibujarSalida($p, $cad){
			// imagepolygon(resource $image,array $points,int $num_points,int $color): bool
			$l = strlen($cad) * imagefontwidth(3); // longitud de la cadena - imagefontwidth(int $font): int
			$al = imagefontheight(3); // altura de la fuente - imagefontheight(int $font): int
			$a = array(
				$p->x, $p->y,
				$p->x+$l+20, $p->y,
				$p->x+$l+10, $p->y+$al+10,
				$p->x-10, $p->y+$al+10 
			);
			imagepolygon($this->img, $a, 4, $this->negro);
			// línea de la flecha
			imagestring($this->img, 3, $p->x, $p->y+5, $cad, $this->negro);
			// punta de la flecha
			imageline($this->img, $p->x+$l, $p->y+5, $p->x+$l+15, $p->y-10, $this->negro);
			imageline($this->img, $p->x+$l+15, $p->y-10, $p->x+$l+15+2, $p->y-10+5, $this->negro);
			imageline($this->img, $p->x+$l+15, $p->y-10, $p->x+$l+15-8, $p->y-10+2, $this->negro);
		}
	}
?>