<?php
	//  http://localhost:8080/j0906/mvc2/index.php?ancho=400&alto=400&um=10&t=Determina si es primo
	header("Content-type: image/png");
	require_once("Punto.php");
	require_once("Modelo.php");
	require_once("Vista.php");
	require_once("Controlador.php");
	$v = new Vista($_GET['ancho'], $_GET['alto'], $_GET['um']);
	//echo $v->um;
	$m = new Modelo($_GET['t']);
	//echo $m->titulo;
	$c = new Controlador();
	$c->exhibir($m, $v); 
?>