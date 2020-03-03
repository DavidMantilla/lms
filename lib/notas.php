
<?php



class Notas
{

	public $conn=" ";
	
  		function __construct(){
	
$this->conn=new mysqli("localhost","root","","sace");

    }



	function vernotasEst($usuario){
	
$cons=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$cons->fetch_assoc();
	
	
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos where usuario_est=".$id);	
	
	
	while($fila=$cons->fetch_assoc())
	{ 
		$consul=$this->conn->query("select * from  respuestas where trabajo_Respuesta=".$fila['id_trabajo']."&& estudiante_Respuesta=".$fila['id_estudiantes']);
	$row=$consul->fetch_assoc();

	
	$respuesta=$row['nota_Respuesta'];
		$fechaini= explode(" ",$fila['FechaIni_trabajo']);
		$fechafin= explode(" ",$fila['fechaFinal_Trabajo']);
		
		if($row['Estado_Respuesta']){
			
		$enviado= $row['Estado_Respuesta'];	
		} else
		{	$enviado="aun sin enviar"; 	}
		
		echo '<tr><td><a href="notas.php?id='.$fila['id_trabajo'].'" class="text-inverse "style="font-weight:bold">'.$fila['Nombre_trabajo'].'<a><br></td><td>'.$fila['porcent_trabajo'].'</td><td align=center>'.$fechaini[0]."<br>".$fechaini[1].'</td><td>'.$fechafin[0]."<br>".$fechafin[1].'</td><td><a href="notas.php?materia='.$fila['id_Materia'].'" class="text-inverse " style="font-weight:bold">'.$fila['Nom_Materia'].'</td><td>'.$enviado.'</td><td>'.$respuesta.'</td></tr>';
			
		
		
	}
	
	}
	function Calendiario($usuario){
	
$cons=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$cons->fetch_assoc();
	
	
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos where usuario_est=".$id);	
	
	$fechas="";
	while($fila=$cons->fetch_assoc())
	{ 
		$consul=$this->conn->query("select * from  respuestas where trabajo_Respuesta=".$fila['id_trabajo']."&& estudiante_Respuesta=".$fila['id_estudiantes']);
		
		
		if($consul->num_rows<=0){
		
	   $fechas.= $fila['fechaFinal_Trabajo'].",";
			
		}
		
	}echo($fechas);
		
}
	function contarPendientes($usuario){
	
$cons=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$cons->fetch_assoc();
	
	
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos where usuario_est=".$id);	
	
	$i=0;
	while($fila=$cons->fetch_assoc())
	{ 
		$consul=$this->conn->query("select * from  respuestas where trabajo_Respuesta=".$fila['id_trabajo'] ."&& estudiante_Respuesta=".$fila['id_estudiantes'] );
		
		
		if($consul->num_rows<=0){
		
		$i+=1;
}
	} 
	 echo $i;
	}
	function vernotaprof($materia){

	
	
	$consul=$this->conn->query("SELECT * FROM `trabajo` WHERE `materia_trabajo` = ".$materia);
	while($fila=$consul->fetch_assoc()){
		echo '<tr><td><a href="notas.php?id='.$fila['id_trabajo'].'&materia='.$materia.'" class="text-inverse "style="font-weight:bold">'.$fila['Nombre_trabajo'].'<a><br></td><td>'.$fila['porcent_trabajo'].'</td><td>'.$fila['FechaIni_trabajo'].'</td><td>'.$fila['fechaFinal_Trabajo'].'</td><td><a href="notas.php?materia='.$fila['materia_trabajo'].'" class="text-inverse " style="font-weight:bold">'.$fila['Nom_materia'].'</td></tr>';
				
	}
	
	
	
}
	function trabajos($trabajo){
		
		
		$consul=$this->conn->query("SELECT * FROM trabajo where id_trabajo=".$trabajo);
			while($fila=$consul->fetch_assoc()){
		echo "<div class='card '><div class='card-block'><h1 class= 'h1' style='font-weight:bold'>".$fila['Nombre_trabajo']."</h1><br><br><b>Descripción:</b><div id='contenido' class='text-inverse'  >".$fila['Descripcion_trabajo'].'</div><br><br><b> Fecha de entrega: &nbsp;  </b> <div id="fecha">'.$fila['fechaFinal_Trabajo'].'</div><br></div>';
		
		
			
		

	}

	
	
}
	function respuesta($trabajo,$usuario){
		
		
		$query=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$query->fetch_assoc();
	
	
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos where usuario_est=".$id);
		if($fil=$cons->fetch_assoc())
		
		{
		$con=$this->conn->query("SELECT * FROM `respuestas` WHERE ((`trabajo_Respuesta`=".$trabajo.") and(estudiante_Respuesta=".$fil["id_estudiantes"]." )) ");
	
				if($con->num_rows>0){
				
		while($fila=$con->fetch_assoc()){ 
		$archivo=explode("/",$fila['archivo_Respuesta']);
			
		echo "<br> <b>Estado:</b> ".$fila['Estado_Respuesta']."<br><b>Respuesta: </b>".$fila['texto_Respuesta']."<br><br>";
		
			if(end($archivo)){
			echo("<a href=".$fila['archivo_Respuesta']."> <span class='fa fa-file'></span> ".end($archivo)."</a>");
			}
		}
				}
	
			 else {
				$consult=$this->conn->query("SELECT * FROM trabajo where id_trabajo=".$trabajo);
$row=$consult->fetch_assoc();
				 $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($row["fechaFinal_Trabajo"]);
		
		if($fecha_actual < $fecha_entrada){
			echo "<br><br><button class='btn btn-primary' id='resp'> <span class='fa fa-plus'> </span> Agregar respuesta</button>";
		}else
		{echo(" <b>Plazo finalizado</b>");}
	
				
				
			 }
			}
			
	}
	function trabajos_materia($materia,$usuario){
		
		
	        $query=$this->conn->query("SELECT * FROM materias where id_Materia=".$materia);
	while($fila=$query->fetch_assoc()){
		
		echo "<h3 class='h3'> <b>Materia: ".$fila['Nom_materia']."</b></h1><br> <br>";
		
	}
	
	?>
	
<table class="table table-striped table-responsive table-hover table-bordered ">
						<tr class="bg-primary text-white  " >
		<th>Nombre</th>
		<th>Porcentage %</th>
		<th>Comienza</th>
		<th>Plazo Max</th>
		<th>Estado</th>
		<th>Calificación</th>
	</tr>

	
	
	
	<?php
		$query=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$query->fetch_assoc();
	
	
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos  WHERE `usuario_est` = ".$id." AND `id_Materia` = ".$materia);	
	
	
	while($fila=$cons->fetch_assoc())
	{ 
		$consul=$this->conn->query("select * from  respuestas where trabajo_Respuesta=".$fila['id_trabajo']."&& estudiante_Respuesta=".$fila['id_estudiantes']);
	$row=$consul->fetch_assoc();

	
	$respuesta=$row['nota_Respuesta'];
		$fechaini= explode(" ",$fila['FechaIni_trabajo']);
		$fechafin= explode(" ",$fila['fechaFinal_Trabajo']);
		
		if($row['Estado_Respuesta']){
			
		$enviado= $row['Estado_Respuesta'];	
		} else
		{	$enviado="aun sin enviar"; 	}
		
		echo '<tr><td><a href="notas.php?id='.$fila['id_trabajo'].'&materia='.$materia.'" class="text-inverse "style="font-weight:bold">'.$fila['Nombre_trabajo'].'<a><br></td><td>'.$fila['porcent_trabajo'].'</td><td align=center>'.$fechaini[0]."<br>".$fechaini[1].'</td><td>'.$fechafin[0]."<br>".$fechafin[1].'</td><td>'.$enviado.'</td><td>'.$respuesta.'</td></tr>';
			
		
		
	}
		
		

	
	echo "</table>";
	
}
	function trabajos_estudiante($trabajo){
		
		
	
	?>
	
<table class="table table-striped table-responsive table-hover table-bordered ">
						<tr class="bg-primary text-white  " >
		<th> Nombre</th>
		
		<th>fecha </th>
		<th>nota</th>
		
	</tr>

	
	
	
	<?php
		$consul=$this->conn->query("SELECT * FROM usuario_respuestas where`trabajo_Respuesta`=".$trabajo);
			while($fila=$consul->fetch_assoc()){
		echo '<tr><td><a href="notas.php?est='.$fila['estudiante_Respuesta'].'&tarea='.$trabajo.'&materia='.$_GET["materia"].'" class="text-inverse "style="font-weight:bold">'.$fila['usuario_nombre']." ".$fila['usuario_apellido'].'<a></td><td>'.$fila['fecha_respuesta'].'</td><td>'.$fila['nota_Respuesta'].'</td></tr>';
		
		
		

	}
	echo "</table>";
	
}	
	function Resp_estudiante($trabajo,$est){
		
		
		$consult=$this->conn->query("SELECT * FROM usuario_respuestas where`trabajo_Respuesta`=".$trabajo." and estudiante_Respuesta=".$est);
	
	
	
		 while($fila=$consult->fetch_assoc()){
			 $archivo=explode("/",$fila['archivo_Respuesta']);
		echo "<div class='card container fluid'><br><h3 class= 'h3' style='font-weight:bold'>".$fila['usuario_nombre']." ".$fila['usuario_apellido']."</h3><br><br><b> Fecha de respuesta: &nbsp;  </b>".$fila['fecha_respuesta']."<br><br><b> Respuesta: </b> <br><p class='text-inverse '  >".$fila['texto_Respuesta']."<br> <a href='".$fila['archivo_Respuesta']."' target='_BLANK'> <span class='fa fa-file'></span> ".end($archivo)."</a></p><br><div class='col-md-4'><form>	<b> Nota de la entrega:</b> <input type='text' id='nota' class='form-control'value=".$fila["nota_Respuesta"]."><br><br> <a href='notas.php?id=".$trabajo."&materia=".$_GET["materia"]."' class= 'btn btn-secundary'>volver </a> <button type='button' class='btn btn-primary' onclick='calificar(".$fila['id_respuestas'].")'>Guardar </button><br> <br></div>";
		
		
		
		

	}}
	function AgregarTrabajos($nombre,$porcentage,$fechaInicio,$fechafinal,$descripcion,$materia){

	
	
		$consult=$this->conn->query("INSERT INTO `trabajo` (`id_trabajo`, `Nombre_trabajo`, `porcent_trabajo`, `materia_trabajo`, `FechaIni_trabajo`, `fechaFinal_Trabajo`, `Clase_trabajo`, `Descripcion_trabajo`)
		VALUES (NULL,'".$nombre."','".$porcentage."', '".$materia."','".$fechaInicio."','".$fechafinal."', '0',	'".$descripcion."'); ");

	if($this->conn->affected_rows>0){ 
			$consult=$this->conn->query("SELECT * FROM trabajo where id_trabajo=".$this->conn->insert_id);
	$fila=$consult->fetch_assoc();
	
	echo($fila["id_trabajo"].",".$fila["Nombre_trabajo"]);
	}else{
		echo $this->conn->errno;
		
		
	}
	
}	
	function agregaRespuesta($texto,$archivo,$usuario,$trabajo){
	
	$date= date("Y-m-d");
	
	$query=$this->conn->query("SELECT `estudiantes`.`id_estudiantes` FROM `usuario`, `estudiantes` WHERE ((`usuario`.`usuario_cedula` =".$usuario.") AND (`estudiantes`.`usuario_est` =usuario.id_usuario)) ORDER BY `id_estudiantes` ASC");
	if($fila=$query->fetch_assoc()){
	
	$estudiante=$fila["id_estudiantes"];
	
	
	$consult=$this->conn->query("INSERT INTO `respuestas` (`id_respuestas`, `fecha_respuesta`, `Estado_Respuesta`, `texto_Respuesta`, `archivo_Respuesta`, `estudiante_Respuesta`, `trabajo_Respuesta`)
	VALUES (NULL,'".$date."','Enviado', '".$texto."','".$archivo."','".$estudiante."', '".$trabajo."'); ");

	
	echo ($this->conn->error);
	}
	
	
}
	function uploadAnswer(){
	
	$target_dir = "../sistema/resources/";
$target_file = $target_dir . basename($_FILES["archivo"]["name"]);
	 if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
		 
	$this->agregaRespuesta($_REQUEST["texto"],$target_file,$_REQUEST["user"],$_REQUEST["trab"]);

	 }
	else
	{
		
	echo(0);
			
	}
}	
	function calificar($nota,$respuesta){
	
		$sql="UPDATE `respuestas` SET `Estado_Respuesta` = 'Calificado', `nota_Respuesta` = '".$nota."' WHERE `respuestas`.`id_respuestas` = ".$respuesta;
		
		$query=$this->conn->query($sql);
		
	
		
		
	}
	function editartrabajo($fecha,$desc,$id){
	
	$sql="UPDATE `trabajo` SET `fechaFinal_Trabajo` = '".$fecha."', `Descripcion_trabajo` = '".$desc."' WHERE `trabajo`.`id_trabajo` = $id;";
	
	
	$query=$this->conn->query($sql);
		
}	


};
$nota=new Notas();


if($_GET["btn"]==1){
	
	
$nota->AgregarTrabajos( $_GET['nombre'],$_GET['porcentage'],$_GET['inicio'],$_GET['final'],$_GET['descripcion'],$_GET['materia']);
}
if($_REQUEST["btn"]=="responder")

{
	$nota->uploadAnswer();
	
}
if($_REQUEST["btn"]=="califica"){
	
	$nota->calificar($_GET["nota"],$_GET["respuesta"]);
	}
if($_REQUEST["btn"]=="edita"){
	
	$nota->editartrabajo($_GET["fecha"],$_GET["desc"],$_GET["id"]);
	}


?>




