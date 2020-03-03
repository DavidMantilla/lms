<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/style.css">
</head>

<body onLoad="imprimir()">


<div class="container">
<?php
	session_start();
	error_reporting(0);
	
	
	include("personas.php");
	
	
	if(isset($_SESSION["perfil"]))
		
{	echo '<div class="container">
<div class="row"> ';
	$personas->verperfil($_SESSION["user"]);

}

	
	?>
	
	<br><br>
	
<script>
	function imprimir() 
	{window.print();}
	</script>	
	
</body>

</html>