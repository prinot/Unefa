<?php
function conexion(){
	//error_reporting(0);
	//datos del postgreSQL
	$hostDB=('localhost');
	$userDB=('postgres');
	$passwordDB=('33293836');
	$nameDB=('SIRAU_NUEV');
	$portDB=(5432);
	$queryDB=('host='.$hostDB.' port='.$portDB.' dbname='.$nameDB.' user='.$userDB.' password='.$passwordDB);
	$conexionDB=(pg_connect($queryDB));
}
function test_conexion(){
	//datos del postgreSQL
	$hostDB=('localhost');
	$userDB=('postgres');
	$passwordDB=('33293836');
	$nameDB=('SIRAU_NUEV');
	$portDB=(5432);
	$queryDB=('host='.$hostDB.' port='.$portDB.' dbname='.$nameDB.' user='.$userDB.' password='.$passwordDB);
	$conexionDB=(pg_connect($queryDB) or die ('<em><strong>Test de conexion con el servidor:</strong> <span style="color:red">Error de conexion.</span></em><hr>'. pg_last_error()));
	


//echo '<em><strong>Test de conexion con el servidor:</strong> <span style="color:blue">Exito de conexion.</span></em><hr>';
}
?>