
<?php


class personas 
{
public $noti=0;
public $conn=" ";
	
function __construct(){
	
$this->conn=new mysqli("localhost","root","","sace");

    }

	

	
function verificarRegistro(){
		
	
	$consulta=$this->conn->query('select * from perfil where Code_perfil like "'.$_GET["pass"].'"');
	
	$row=$consulta->fetch_assoc();
	if ($consulta->num_rows > 0)
	{
		if($row["id_perfil"]==1){
	echo '<form action="lib/personas.php" method="post">
          <div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="Nombre" id="name"  name="name"><br>
            </div>
			<div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="Apellido" id="lastname"  name="lastname"><br>
            </div>
            
			<div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="cedula" id="id" name="id"><br>
            </div>
             <div class="form-group col-md-12">
             
            <input type="password" class="form-control" id="pass" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="contraseña" name="pass"><br></div>
			
			<div class="form-group col-md-12">
			<input type="text" class="form-control" id="e-mail" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="correo" name="e-mail" onKeyUp="email(this.value)" ></div>
			
		<input type="hidden" class="form-control" id="perfil" style="border:none; border-bottom: thin #053446 solid; width: 100%;" value='.$row["id_perfil"].'  name="perfil">
			
			</div>
          <button class="btn btn-outline-primary btn-sm" style="float:right;margin-top:5px;margin-right: 10px" id="btn" name="btn" value="reg2" >Registrarse</button>
        
      </form>
			';
		}
		else if($row["id_perfil"]==3)
		{
			
		echo '<form action="lib/personas.php" method="post">
          <div class="form-group col-md-12">
			 Nombre
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="name"  name="name"><br>
            </div>
			<div class="form-group col-md-12">
			 Apellido
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="lastname"  name="lastname"><br>
            </div>
	
	<div class="form-group col-md-12">
	Edad
			<input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="age"  name="age"><br>
            </div>
            
			<div class="form-group col-md-12">
			 
          Cedula
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="id" name="id"><br>
            </div>
             <div class="form-group form-inline col-md-12">
             Contraseña
            <input type="password" class="form-control" id="pass" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="" name="pass"> <br> </div>
			
		<input type="hidden" class="form-control" id="perfil" style="border:none; border-bottom: thin #053446 solid; width: 100%;" value='.$row["id_perfil"].'  name="perfil"><br>
		
			<div class="form-group col-md-12">
			 Correo
          
          <input type="text" class="form-control" id="e-mail" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="" name="e-mail" onKeyUp="email(this.value)"><br>
            </div>
			<div class="form-group col-md-12">
			Dirección
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="address" name="address"><br>
            </div><div class="form-group col-md-12">
			 
          Barrio
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="neight" name="neigth"><br>
            </div>
			<div class="form-group col-md-12">
			 
          Telefono fijo
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="tel" name="tel"><br>
            </div><div class="form-group col-md-12">
			 
         Celular
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="cel" name="cel"><br>
            </div><div class="form-group col-md-6">
			 Escolaridad
          
             <select class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="cedula" id="school" name="esc">
		  
		  
		   <option value="Bachiller">Bachiller</option>
		   <option value="Universitario">Universitario</option>
		   <option value="Trabajador">Trabajador</option>
		  
		  </select><br>
            </div>
			
			<div class="form-group col-md-12">
			 Nombre universidad
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="univ" name="uni"><br>
            </div><div class="form-group col-md-12">
			 
          Empresa en que labora 
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="id" name="Empresa"><br>
            </div><div class="form-group col-md-8">
			 <hr>
          Años en la iglesa
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="year" name="year"><br>
            </div>
			&nbsp;&nbsp;&nbsp;Bautizado 
			<div class="form-group col-md-12  form-inline" >
			 
              <br>
          <input type="radio" class="radio"  id="baut" name="baut" value="1"> &nbsp;Si &nbsp;
		   <input type="radio" class="radio"  id="baut" name="baut" value="0"> &nbsp;No  &nbsp; &nbsp; 
          Fecha:
			        
           <input type="date" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 50%;"  id="date" name="date">
            </div>
			<br>
						 
			<div class="col-md-10">
          Distrito
          <select class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="cedula" id="dist" name="dist">
		  
		  
		   <option value="1">1 - Mary Puerto</option>
		   <option value=2>2 - Milton García</option>
		   <option value=3>3 - Jacqueline Parra </option>
		   <option value=4>4 - Maria Elvia Castañeda </option> 
		   <option value=5>5 - Rocio Hernandez</option>
		   <option value=6>6 - Deisy Cardenas</option>
		   <option value=7>7 - Diana Camargo </option> 
		   <option value=8>8 - Antonio Galan</option>
		   <option value=9>9 - Gina Delgado </option>
		  </select><br>
		  
            </div><br><div class="form-group col-md-12">
			 
			 Cargo actual en grupo 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="cargo" name="cargo"><br><br>
		   
            </div>
			<div class="form-group col-md-12">
			 
			 ¿Cuantas veces ha multiplicado un grupo?
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="multi" name="multi"><br><br>
            </div>
			<div class="form-group col-md-12">
			 
			 Nivel a ingresar <select class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="" id="nivel" name="nivel" >	</div>
			';
		
			$con=$this->conn->query('select * from  nivel');
 while($fila=$con->fetch_assoc()){
	 echo '<option value='.$fila['id_nivel'].'>'.$fila['nombre_nivel'].'</option>';
 } 
	 
     echo' </select></div> <div class="form-group col-md-12">
             
            <input type="checkbox" class="" id="desea"  placeholder="" name="desea" value=1> Desea capacitarse y crecer en el evangelio<br></div>
			
		
          <button class="btn btn-outline-primary btn-sm" style="float:right;margin-top:5px;margin-right: 10px" id="btn" name="btn" value="reg2" >Registrarse</button>
        
      </form>
			';	
			
			
			
			
		}else
		{ echo '<form action="lib/personas.php" method="post">
          <div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="Nombre" id="name"  name="name"><br>
            </div>
			<div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="Apellido" id="lastname"  name="lastname"><br>
            </div>
            
			<div class="form-group col-md-12">
			 
          
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 100%;" placeholder="cedula" id="id" name="id"><br>
            </div>
             <div class="form-group col-md-12">
             
            <input type="password" class="form-control" id="pass" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="contraseña" name="pass"><br></div>
			
			<div class="form-group col-md-12">
			<input type="text" class="form-control" id="email" style="border:none; border-bottom: thin #053446 solid; width: 100%;" placeholder="correo" name="e-mail" onKeyUp="email(this.value)"></div> 
			
			
	 
	 
		<input type="hidden" class="form-control" id="perfil" style="border:none; border-bottom: thin #053446 solid; width: 100%;" value='.$row["id_perfil"].'  name="perfil">
			
			</div><br><br>
          <button class="btn btn-outline-primary btn-sm" style="float:right;margin-top:5px;margin-right: 10px" id="btn" name="btn" value="reg2" >Registrarse</button>
        
      </form>
			';
			
		}
	}
	else
		echo "Clave equivocada";
	
	
	
	
	$consulta->close();
	
}
	
function Registro()	{
	
	
	$pass=base64_encode($_POST["pass"]);
	
	
	$this->conn->query("INSERT INTO `usuario` (`id_usuario`, `usuario_cedula`, `usuario_nombre`, `usuario_apellido`, `usuario_pass`, `usuario_perfil`,`Usuario_Correo`) VALUES (NULL, '".$_POST["id"]."', '".$_POST["name"]."', '".$_POST['lastname']." ', '".$pass."', '".$_POST["perfil"]."','".$_POST["e-mail"]."')");
	
	
	
	$idperfil=$this->conn->insert_id;
	
	
	
	if($_POST["perfil"]==3){
		 $this->conn->query("INSERT INTO `estudiantes` 
		 (`id_estudiantes`,
		 `usuario_est`, 
		 `edad_estudiantes`,
		 `Direc_estudiant`,
		 `tel_estudiant`,		
		 movil_estudiant,		
		 `escol_estudiant`,
		 empresa_est,
		 univ_est,
		 year_estud,
		 bautizado_estud,
		 fecha_estud,
		 distri_estud,
		 CargoGh_estud,
		 MultGh,
		 nivel_estudiantes,
		 desea_estudiantes) VALUES
		 (NULL,
		 '".$idperfil ."',
		 '". $_POST['age']."', 
		 '". $_POST['address']." ',
		 '". $_POST["tel"]. "',
		 '". $_POST["cel"] ."',
		 '". $_POST["esc"] ."',
		 '". $_POST["Empresa"] ."',
		 '". $_POST["uni"] ."',
		 '". $_POST["year"] ."',
		 '". $_POST["baut"]. "',
		 '". $_POST["date"]. "',
		 '". $_POST["dist"]. "',
		 '". $_POST["cargo"]. "',
		 '". $_POST["multi"]."',
		 '". $_POST["nivel"]."',
		 '". $_POST["desea"]."')");
		
		echo $this->conn->error;
	}
	
		$this->session();
}
	
function verificarusuario(){
	$consulta=$this->conn->query("select * from usuario where usuario_cedula= '".$_REQUEST["usuario"]."'")	;
	
	
	if($consulta->num_rows>0){
		echo 1;
		
		
	}
	else{
		echo 0;
		
		
	}
	
	
}
function verificarpass(){
		
		$pass=base64_encode($_REQUEST["pass"]);
		
	$consulta=$this->conn->query("select * from usuario where usuario_cedula= '".$_REQUEST["usuario"]."' and usuario_pass= '".$pass."'")	;
	
	$row=$consulta->fetch_assoc();
	if($consulta->num_rows>0){
		echo $row["usuario_perfil"];
		
		
		
	
		
		
	
	}
	else{
		echo 0;
		
		
	}
	
	
}
function verperfil($usuario){
	
$con= $this->conn->query("select*from usuario where usuario_cedula=".$usuario);
	$row=$con->fetch_assoc();
$bautizado;	
	
?>
 <div class="col-md-6">
  <div class="card "> <div class="card-header">informacion Personal</div><div class="card-body container"><br><b>Nombre:</b> 
   <?php echo $row["usuario_nombre"]." ". $row["usuario_apellido"]."<br><b>Cedula:</b>" .$row["usuario_cedula"]."<br> <b>Correo: </b>". $row["Usuario_Correo"];?>	
	<?php
	if($row['usuario_perfil']==3){
$con= $this->conn->query("SELECT * FROM `estudiantes` where usuario_est=".$row["id_usuario"]);
	$row=$con->fetch_assoc();
		
		
	if($row["bautizado_estud"]=="1"){
		
		$bautizado="si";
	}
	else{
			$bautizado="no";
		
	}
	$desea="";
	
	if($row["desea_estudiantes"]=="1"){
		
		$desea="si";
	}
	else{
			$desea="no";
		
	}
	
	
	
	?>
		
<br><b>edad:</b> <?php echo $row["edad_estudiantes"];?><br><b> Dirección</b>
 <?php echo $row["Direc_estudiant"]."<br> <b>Telefóno:</b> ".$row["tel_estudiant"]."<br> <b>Celular: </b>".	$row["movil_estudiant"];?>
	</div></div></div></div>
	
	
	<div class="row">
	<div class="col-md-6" style="margin-top: 20px">
  <div class="card "> <div class="card-header">Area Laboral</div><div class="card-body container">	
	<?php
	echo " <br> <b>escolaridad: </b>". $row["escol_estudiant"]."<b> <br>Universidad: </b></b>". $row["univ_est"]."<br><b>empresa en la que labora: </b>".$row["empresa_est"];
	
	?>
	  </div></div></div> 
	<div class="col-md-6" style="margin-top: 20px">
  <div class="card "> <div class="card-header">Area Espiritual</div><div class="card-body container">
	<?php
	echo "<br>"."<b>Años asistiendo a la iglesia: </b>".$row["year_estud"]."<br> <b>Bautizado:</b> &nbsp;".$bautizado."  &nbsp; <b>Fecha de bautismo:</b> ".$row["Fecha_estud"]."<br> <b>Distrito:</b> ".$row["distri_estud"]."<br> <b>Cargo grupo hogareño: </b>". $row["CargoGh_estud"]."<br><b>Multiplicó grupo hogareño:</b> ".$row["MultGh"]."<br> <b>Nivel:</b> ".$row["nivel_estudiantes"]."<br><b>desea capacitarse y crecer en el ministerio</b> &nbsp; ".$desea;		
		?>
		
		</div></div></div></div>
		<?php
	
	
	}
	
	
}
function session(){
	

	session_start();
	
	$session["perfil"]=$_POST["perfil"];
		$session["user"]=$_POST["id"];
		
		
		
		if(isset($_SESSION["perfil"])){
		if($_SESSION["perfil"]==3)
	
	
	{  header("location:../sistema/perfil.php");
	}
	else{
		 header("location:../sistema/index.php");
		
	}
		
		}
	}
	
	
	
function fotoPerfil($usuario)	{
	
$con=$this->conn->query("select * from usuario  where usuario_cedula=".$usuario);
	
	
	$row=$con->fetch_assoc();
	
	
if($row["Usuario_foto"]!="")
{
	echo $row["Usuario_foto"];
}
	else
	{
		
		echo ("images/usuario_1.png");
		
	}
}
function usuario($usuario)	{
	
$con=$this->conn->query("select * from usuario  where usuario_cedula=".$usuario);
	
	
	$row=$con->fetch_assoc();
echo  $row["usuario_nombre"];
	
}
function perfil($perfil)	{

	
	$con= $this->conn->query("select*from perfil WHERE `perfil`.`id_perfil` = ".$perfil);
	$row=$con->fetch_assoc();
echo $row["Nom_perfil"];
	
}	
	
function notificaciones($usuario){
	
		
	$manana =""+(date("m") . (date("d")+1). date("Y"));
$cons=$this->conn->query("select id_usuario  from usuario where usuario_cedula=".$usuario);
	$fila=$cons->fetch_assoc();
	$id=$fila['id_usuario'];
$cons=$this->conn->query("select * from  trabajos where usuario_est=".$id);	
	while($fila=$cons->fetch_assoc())
		
	{   		
		
		
		
		$consul=$this->conn->query("select * from  respuestas where trabajo_Respuesta=".$fila['id_trabajo']."&& estudiante_Respuesta=".$fila['id_estudiantes']);
		
		
		
		
		if($consul->num_rows<=0){
		
			
			
		$datetime1 = new DateTime("tomorrow");
$datetime2 = new DateTime($fila["fechaFinal_Trabajo"]);
$interval = $datetime2->diff($datetime1);
$intervalo= $interval->d;
			
		if($intervalo<="1"){
			$this->noti++;
		echo " <li class='dropdown-item '> <a href='notas.php?id=".$fila['id_trabajo']."'> <span class='fa fa-warning text-warning'> </span>	Tienes un trabajo apunto de vencerce </a> </li>";
	}
			
		}
		
	}

$consulta=$this->conn->query("select * from evento  where `fecha_evento`>= curdate() ");
	
	while($row=$consulta->fetch_assoc())
		
	{   		
		$this->noti++;
		
		echo " <li class='dropdown-item '> <a href='eventos.php?id=".$row['id_evento']."'> <span class='fa fa-info-circle text-info'> </span>	Tienes un evento cerca ¡infomate aquí! </a> </li>";
		
		
		
		
	}
		

}
	
	
function cargarFoto($imagen, $usuario){
	
	$con=$this->conn->query("select * from usuario  where usuario_cedula=".$usuario);
	
	
	$row=$con->fetch_assoc();

	$con= $this->conn->query("UPDATE `usuario` SET `Usuario_foto` = '".$imagen."' WHERE `usuario`.`id_usuario` = ". $row["id_usuario"]."; ");
	
	
	echo $con->affected_rows;
	
	
}
	

};





$personas=new personas();


if($_REQUEST["btn"]=='reg'){
	$personas->verificarRegistro();}
elseif($_REQUEST["btn"]=='reg2')
{
	
	$personas->Registro();
	
	
} elseif($_REQUEST["btn"]=='user')
{
	$personas->verificarusuario();
	
} elseif($_REQUEST["btn"]=='pass')
{
	$personas->verificarpass();
	
}
 elseif($_REQUEST["btn"]=='salir')
{
	session_start();
	
	unset($session["user"]);
	unset($session["perfil"]);
	
	session_destroy();
	header("location:../index.php");
	
}


?>




