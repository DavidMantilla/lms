
<?php

error_reporting(0);

class biblioteca 
{

public $conn=" ";
	
function __construct(){
	
$this->conn=new mysqli("localhost","root","","sace");

    }

	
function verRecursos($idmateria){
$con= $this->conn->query("select *from recursos where materia_recurso=".$idmateria);
	while($row=$con->fetch_assoc()){
if($row["activo_recursos"]!=0){
	echo("<option value=".$row["id_recursos"].",".$row["Nom_recurso"].">".$row["Nom_recurso"]."</option>");
		}
		
	}
}
	
function Recursos($idRecurso){
$con= $this->conn->query("select *from recursos where id_recursos=".$idRecurso);
	while($row=$con->fetch_assoc()){
		if($row["activo_recursos"]!=0){
	echo("<div > <h4>Nombre:&nbsp;".$row["Nom_recurso"]."</h4></div>");
		echo("<h7> <span class='fa fa-clock-o'> </span> ".$row["fecha_recursos"]." </h7>");
		echo("<h4> <br> <a href=\"resources/".$row["url_recursos"]."\" target=\"_BLANk\"><span class='fa fa-file'> </span> &nbsp;".$row["url_recursos"]."</a> </h4>");
		echo("<br><br><a class=\"btn btn-primary pull-left \" href=\"clases.php?materia=".$row["materia_recurso"]." \" > <span class=\"fa fa-chevron-left\"></span> volver  a Clase  </a>");
		
		
	}else{
		echo("<div><h3 class=\"text-muted\">NO EXISTE EL RECURSO</h2></div>");
			echo("<br><br><a class=\"btn btn-primary pull-left \" href=\"clases.php?materia=".$row["materia_recurso"]." \" > <span class=\"fa fa-chevron-left\"></span> volver  a Clase  </a>");
		echo("<a class=\"btn btn-secundary pull-right\" href=\"?materia=".$row["materia_recurso"]." \" > <span ></span> Todos los recursos </a>");
		}
	}
}	
	
	
	function ListaRecursos($idmateria){
		
		
		
$con= $this->conn->query("select *from recursos where materia_recurso=".$idmateria);
	while($row=$con->fetch_assoc()){
		if($row["activo_recursos"]!=0){
	echo('<li class="todo-list-item">
		<h5>
			<div class="form-check">
				<a href="?rec='.$row["id_recursos"].'&materia='.$idmateria.'">
					
					
						<span class="fa fa-file"></span>&nbsp;'.$row["Nom_recurso"].'
					
					
				</a>
				<div class="float-right action-buttons">
				 <a  class="trash" onclick="eliminar(\''.$row["id_recursos"].'\')">
				 	<em class="fa fa-trash"></em>
				 </a>
				</div>
		    </div>
		</h5>
		</li>' );
		
		}
	}
		
}
	
function agregarRecursos($nombre,$materia,$url){
	
$date=date("Y-m-d");
	
$sql="INSERT INTO `recursos` (`id_recursos`, `Nom_recurso`, `materia_recurso`, `url_recursos`, `fecha_recursos`, `activo_recursos`) VALUES (NULL, '".$nombre."', '".$materia."', '".$url."', '".$date."', '1');";
	$con= $this->conn->query($sql);
		
	$id=$this->conn->insert_id;
	if($this->conn->affected_rows>0){ 
			
		$consult=$this->conn->query("SELECT * FROM recursos where id_recursos=".$id);
	if($fila=$consult->fetch_assoc()){echo($fila["id_recursos"].",".$fila["Nom_recurso"]);}
	
	
	}else{
		echo $this->conn->error;
		
		
	}
	
}
	
function EliminarRecursos($id){
	
	$consult=$this->conn->query("UPDATE `recursos` SET `activo_recursos` = '0' WHERE `recursos`.`id_recursos` =".$id);
	
}

function uploadResources(){
	
	$target_dir = "../sistema/resources/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
	 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		 
	$this->agregarRecursos($_POST["nombre"],$_POST["materia"],$_FILES["file"]["name"]);

	 }
	else
	{
		
	echo(0);
			
	}
}	
	
};





$biblioteca=new biblioteca;




if($_REQUEST["btn"]==1){
	
$biblioteca->uploadResources();
		 
	
	}
elseif($_REQUEST["btn"]==2){
	
	
	
	$biblioteca->EliminarRecursos($_REQUEST["id"]);
}





	
?>




