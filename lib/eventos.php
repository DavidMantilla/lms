
<?php
class  eventos {

public $contar=0;
public $conn=" ";
	
function __construct(){
	
$this->conn=new mysqli("localhost","root","","sace");

    }

	
	
	
	
	
function listaEventos($user)	{
	
	$query=$this->conn->query("select * from usuario where usuario_cedula=".$user);
	
	
	while($fila=$query->fetch_assoc()){
		
		$id= $fila["id_usuario"];
		
		
	}
	
	

	
	$consulta=$this->conn->query("select * from evento  where usuario_evento=".$id);
	
	
	while($row=$consulta->fetch_assoc()){
		
		if($row["tipo_evento"]==1){
		
		echo"<li class=\"todo-list-item \"> <a href='eventos.php?id=".$row['id_evento']."'> <span class='fa fa-calendar'></span>".$row["Nombre_evento"]."</a></li>";
		
		}
		else
		{
		echo"<li class=\"todo-list-item  \"> <a href='eventos.php?id=".$row['id_evento']."'>  <span class='fa fa-calendar-o'> </span>".$row["Nombre_evento"]."</a></li>";	
			
		}
	}
	
	
}


	
function listaEventostodos(){
	
	
		
		$consulta=$this->conn->query("select * from evento  where `fecha_evento` >= ".date("Y-m-d"));
	while($row=$consulta->fetch_assoc()){
		$this->contar++;
		
		
		if($row["tipo_evento"]==1){
		
		echo "<li class=\"todo-list-item \"> <a href='eventos.php?id=".$row['id_evento']."'><span class='fa fa-calendar'></span>".$row["Nombre_evento"]." </a></li>";
		
		}
		else
		{
		echo"<li class=\"todo-list-item  \"><a href='eventos.php?id=".$row['id_evento']."' > <span class='fa fa-calendar-o'> </span>".$row["Nombre_evento"]."</a></li>";	
			
		}
		
	}
}
	
	
	
function listatodos($user){
	
	$query=$this->conn->query("select * from usuario where usuario_cedula=".$user);
	
	$id;
	while($fila=$query->fetch_assoc()){
		
		$id= $fila["id_usuario"];
		
		
	}
		
		$consulta=$this->conn->query("select * from evento  where `fecha_evento` >= ".date("Y-m-d"));
	while($row=$consulta->fetch_assoc()){
		$this->contar++;
		
		
		if($row["tipo_evento"]==1){
		if($row["usuario_evento"]==$id){
		echo "<li class=\"todo-list-item text-white\"> <a href='eventos.php?id=".$row['id_evento']."' class='text-muted'><span class='fa fa-calendar'></span>".$row["Nombre_evento"]." (Creado por ti)</a></li>";
		}
			else
			{
				
		echo "<li class=\"todo-list-item \"> <a href='eventos.php?id=".$row['id_evento']." class=''><span class='fa fa-calendar'></span>".$row["Nombre_evento"]." </a></li>";
				
			}
		}
		else
		{
		if($row["usuario_evento"]==$id){
		echo "<li class=\"todo-list-item text-muted\"> <a href='eventos.php?id=".$row['id_evento']."' class='text-muted'><span class='fa fa-calendar-o'></span>".$row["Nombre_evento"]." (Creado por ti)</a></li>";
		}
			else
			{
				
		echo "<li class=\"todo-list-item text-muted\"> <a href='eventos.php?id=".$row['id_evento']."'><span class='fa fa-calendar-o'></span>".$row["Nombre_evento"]." </a></li>";	
				
			}
		}
		
	}
}	
function verEvento($id){
	
	$consulta=$this->conn->query("select * from evento  where id_evento=".$id);
	while($row=$consulta->fetch_assoc()){
		?>
<div class='container-fluid  '>
<div class='row  ' style="padding: 20px">

<div class='col-md-6'>
	<h2 style="text-transform: uppercase"><?php  echo($row["Nombre_evento"]); ?></h2>	
	
	<div class=container><img width=100% class="img-responsive" src="<?php echo($row["imagen_evento"]);?>"></div>	
	
	</div>	
	<div class='col-md-6 bg-inverse text-white'>
	
	<article class="text-justify">
		<br><br><br>
	<h3> <span  class="fa fa-info-circle text-info"></span> Info	</h3>	<br>
		<h4 class="bg-inverse text-white" style="padding: 10px;"> <span  class="fa fa-calendar text-warning"></span> Fecha: <?php  echo($row["fecha_evento"]); ?></h4> <br>
		<p  style="font-size: 18px"><?php  echo($row["info_evento"]); ?></p>
		
		
		</article>
		
		<?php  if($row["tipo_evento"]==1){ ?>
		<article>
		<br><br><br>
		<center>	<button class="btn btn-outline-info " >Registrarse</button></center>
		
		<br>
		</article>
	<?php }?>
	
	</div>	
	</div>


</div>



<?php
	}
	
	
	
	
}
	
function agregarEvento($nombre,$fecha,$user,$info,$imagen){
	
	$query=$this->conn->query("select * from usuario where usuario_cedula=".$user);
	
	$id;
	while($fila=$query->fetch_assoc()){
		
		$id= $fila["id_usuario"];
		
		
	}
	
	$cons=$this->conn->query("insert into evento (id_evento,Nombre_evento,fecha_evento,	valor_evento,usuario_evento,tipo_evento,info_evento,imagen_evento) value (NULL,'".$nombre."','".$fecha."',0,".$id.",1,'".$info."','".$imagen."')");
	
	
	
	
	
	echo($this->conn->error);
	
}	
	
	
	

function editarEvento(){}
	

	
function compartireventoEvento(){}
	
function contarEventos(){
	
		$consulta=$this->conn->query("select * from evento  where `fecha_evento` >= ".date("Y-m-d"));
	while($row=$consulta->fetch_assoc()){
		$this->contar++;
	}
	
	return $this->contar;
}

	function uploadevent(){
	
	$target_dir = "../sistema/images/evento/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
	 if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
$this->agregarEvento($_REQUEST["name"],$_REQUEST["fecha"],$_REQUEST["user"],$_REQUEST["desc"],$target_file);
	
	 }
	else
	{
		
	echo(0);
			
	}
}
	


}





$eventos=new  eventos();


if($_REQUEST["btn"]==1){
$eventos->uploadevent();
}

?>