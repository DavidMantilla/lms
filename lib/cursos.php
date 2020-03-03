
<?php



class cursos
{

public $conn=" ";
	
function __construct(){
	
$this->conn=new mysqli("localhost","root","","sace");

    }

function VerMisCursosEst($usuario){
	
$cons=$this->conn->query("select * from usuario where usuario_cedula=".$usuario.";");
	
$fila=$cons->fetch_assoc();
	
	$id=$fila['id_usuario'];

$cons=$this->conn->query("select * from clase_estudiante where usuario_est=".$id);	
	
	while($fila=$cons->fetch_assoc()){
		
		echo '<li class="todo-list-item"><a href="clases.php?materia='.$fila['id_Materia'].'">'.$fila['Nom_materia']."<a><br><li>";
			
		
		
	}
}

	function VerMisCursosprofes($usuario){
		
		
		$con= $this->conn->query("SELECT * FROM `usuario` where `usuario_cedula`=".$usuario);
		$row=$con->fetch_assoc();
		
		$usr=$row['id_usuario'];
		
	
		
		$cons=$this->conn->query("SELECT * FROM `materias` where `prof_materia`=".$usr);	
	
	while($fila=$cons->fetch_assoc()){
		
		echo '<li class="todo-list-item"><a href="clases.php?materia='.$fila['id_Materia'].'">'.$fila['Nom_materia'].'<a><li>';
			
	}
		
	}
	
function verclases($idmateria,$perfil){
	
	
$cons=$this->conn->query("select * from clases where Materia_clase='".$idmateria."'ORDER BY `clases`.`id_clase` DESC");	
	
	
	while($fila=$cons->fetch_assoc()){
		if($fila["mostrar_clase"]!=0){
		
		echo '<div class="card " >
									<div class="card-header card-primary text-white "><b><div  class="pull-left"> Fecha: &nbsp;</div><div id="fecha'.$fila["id_clase"].'" class="pull-left">'.$fila["fecha_clase"].'</div></b>';
											if($perfil!=3){
											echo '<div class="dropdown pull-right">
											<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<em class="fa fa-cog"></em>
											</button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
												
												<a class="dropdown-item"
												onclick="editarclase(\''.$fila["id_clase"].'\')" ><em class="fa fa-pencil-square-o mr-1" ></em> Editar</a>
												
												<a class="dropdown-item" href="" onclick="eliminarclase('.$fila["id_clase"].')" >
												<em class="fa fa-remove mr-1"></em> Eliminar</a>
												</div></div>';
											}
			
										echo'</div>
									
									<div class="card-block" id= "clase-'.$fila["id_clase"].'">
										<div id="editor'.$fila["id_clase"].'" contenteditable="false"  >'.$fila["Contenido_clase"].'</div>
										<p><b>';
		$con=$this->conn->query("select * from trabajo where Clase_trabajo=".$fila["id_clase"]);
		
		while($row=$con->fetch_assoc()){
		echo '<br><a href="notas.php?id='.$row['id_trabajo'].'& materia='.$_GET["materia"].'"><li class="fa fa-check-circle"> </li>&nbsp;<b>'.$row["Nombre_trabajo"].'<b></a>';}
									
		$query=$this->conn->query("SELECT `recursos`.*, `recursos_materia`.`id_clase` FROM `recursos`, `recursos_materia` WHERE ((`recursos`.`id_recursos` =recursos_materia.id_recursos) AND (`recursos_materia`.`id_clase` =".$fila["id_clase"]."))"); 
		
		while($fil=$query->fetch_assoc()){
		echo '<br><a href="biblioteca.php?rec='.$fil['id_recursos'].'"><li class="fa fa-file"> </li>&nbsp;<b>'.$fil["Nom_recurso"].'<b></a>';}
									
		
	
		
		echo '</b></p></div></div><br><br>' ;	
		
		}
	}
	
	
	
}
	

function clase($idmateria){
	
	$cons=$this->conn->query("select * from materias where id_Materia=".$idmateria);	
	while($fila=$cons->fetch_assoc()){
		
		echo $fila["Nom_materia"];
		
	}
	
	
} 
	



function añadirmateria($nombre,$nivel,$profesor){
	
	
	$this->conn->query("call addMaterias('".$profesor."','".$nombre."','".$nivel."')");
		
		if(!$this->conn->error)
{
		header("location:../sistema/clases.php");
	}
	else 
		echo $this->conn->error;
	
	
	
}
	
function añadirclase($fecha,$contenido,$materia,$trabajo){
	
	
	$cons=$this->conn->query("insert into clases (fecha_clase,Contenido_clase,mostrar_clase,Materia_clase) value ('".$fecha."','".$contenido."','1','".$materia."')");	
	
	echo($this->conn->error);
	$trab=explode(",",$trabajo);
	 
	$id=$this->conn->insert_id;
foreach ($trab as &$valor) {
    
	if ($valor!=" ")
	
	{
		
		$con=$this->conn->query( 'UPDATE `trabajo` SET `Clase_trabajo` = '.$id.' WHERE `trabajo`.`id_trabajo` = '.$valor.';');
		
		
		
		
	} 
	
	
	
}
	unset($valor);
	
	$RSC=explode(",",$_GET["recursos"]);
	 
	
foreach ($RSC as &$reso) {
    
	if ($reso!=" ")
	
	{
		
		$con=$this->conn->query( 'INSERT INTO `recursos_materia` (`id_recursosMat`, `id_recursos`, `id_clase`) VALUES (NULL, '.$reso.', '.$id.'); ');
		
		
		
		
	} 
	
	
	
}
	unset($reso);
	}

function EditarClase($fecha,$contenido){
	
	
	
	$cons=$this->conn->query("UPDATE `clases` SET `fecha_clase` = '".$fecha."', `Contenido_clase` = '".$contenido."' WHERE `clases`.`id_clase` = 2;");	
}
	
  function nivel (){
	  
	 $cons=$this->conn->query("Select * from nivel ");
	  while($fila=$cons->fetch_assoc()){
	  
		  echo "<option value='".$fila['id_nivel']."'>".$fila['nombre_nivel']."</option>";
	  
	  }
	  
	  
  }
	
function listaEstudiantes($materia){
	
	$cons=$this->conn->query("select * from clase_estudiante where `id_Materia`=".$materia);	
	echo "<table cellpadding=20px cellspacing=0px border=1px  class= 'table table-responsive trable-stripped'>  <tr class='bg-primary text-white'><th>Estudiante</th><th>Cedula</th><th>nivel</th><th> &nbsp;&nbsp;&nbsp;&nbsp; </th><th> &nbsp;&nbsp;&nbsp;&nbsp; </th> </tr>";
	while($fila=$cons->fetch_assoc()){
		
		echo "<tr><td>".$fila["usuario_nombre"]." ". $fila["usuario_apellido"]."</td><td>".$fila["usuario_cedula"]."</td><td> ". $fila["nombre_nivel"]."</td> <td> &nbsp;&nbsp; &nbsp;&nbsp; </td><td>  &nbsp;&nbsp;&nbsp; &nbsp;</td></tr>";
		
	}
	echo "</table>";
}
	
	function EliminarClase($clase){
		
		$con=$this->conn->query( 'UPDATE `clases` SET `mostrar_clase` = "0" WHERE `clases`.`id_clase` = " '.$clase.'";');
		
	}
}
$curso=new cursos;
if( $_REQUEST['btn']=="clases"){
$curso->VerMisCursos($_GET['usuario']);
}
elseif($_REQUEST['btn']=="ingresar") {
	
$curso->añadirclase($_GET['fecha'],$_GET['contenido'],$_GET["materia"],$_GET["trabajo"]);
	
	
}elseif($_REQUEST['btn']=="add"){
	
	$curso->añadirmateria($_POST["materia"],$_POST["nivel"],$_POST["user"]);
	
}elseif($_REQUEST['btn']=="lista")

{
	$curso->listaEstudiantes($_GET["materia"]);
	
	
}
elseif($_REQUEST['btn']=="eliminar")

{
	$curso->EliminarClase($_GET["clase"]);
	
	
}

elseif($_REQUEST['btn']=="editar")

{
	
	$curso->EditarClase($_GET["fecha"],$_GET["contenido"]);
	
	
}	






?>




