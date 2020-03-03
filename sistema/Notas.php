<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="david mantilla">
	
	<?php  error_reporting(0);
	
	include("../lib/personas.php");
	include("../lib/notas.php");
	include("../lib/cursos.php");
	
	?>
	
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>Curso</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
   
    
    <?php 
session_start();
	
	
	
	if (!isset($_SESSION["perfil"]))
	{
		
		header("location:../index.php");
		
	}
	
	
	?>
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
				<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
				<h1 class="site-title "><b> <a href="index.html"><div style="background-color: white"><img src="../img/logo.png" width="100%" alt=""></div></a></b></h1>
				
				<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><em class="fa fa-bars"></em></a>
					<?php      if($_SESSION["perfil"]!=2){    ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-book"></em>Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a class="nav-link active" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
					
		
					
			</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-book"></em> &nbsp;Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a href="estudiantes.php?materia=<?php echo $_GET['materia'];?>" class="nav-link" ><span class="fa fa-users"></span> &nbsp; Estudiantes </a></li>
				
		
				<li class="nav-item"><a class="nav-link active" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
				
					
					
			</ul>
			<?php }; ?>
				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> salir</a></nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
<header class="page-header row justify-center">
	    <div class="col-md-6 col-lg-8" >
				    <h1 class="float-left text-center text-md-left">Bienvenido</h1>
			      </div>
				  <div class="col-md-6 col-lg-4">
				    <div class="dropdown user-dropdown  text-center text-md-right pull-right"> <a class="btn btn-stripped dropdown-toggle" href="" id="a" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				      <div  > <img src="<?php  $personas->fotoPerfil($_SESSION["user"])?>" alt="foto Perfil" class="circle float-left profile-photo" width="50" height="auto">
				        <div class="username mt-1">
				          <h4 class="mb-1">
				            <?php 
								$personas->usuario($_SESSION["user"]);?>
			              </h4>
				          <h6 class="text-muted">
				            <?php $personas->perfil($_SESSION["perfil"]); ?>
			              </h6>
			            </div>
			        </div>
				      </a>
				      <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="perfil.php"><em class="fa fa-user-circle mr-1"></em> Ver perfil</a> <a class="dropdown-item" href="../lib/personas.php?btn=salir"><em class="fa fa-power-off mr-1"></em> salir</a> </div>
			        </div>
				    <div class="dropdown user-dropdown  text-center  pull-right" style="padding: 30px">
				      <ul class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem" aria-labelledby="not">
				        <?php $personas->notificaciones($_SESSION["user"]) ?>
			          </ul>
			         <a id="dropdownMenuLink2" class=" " data-toggle="dropdown" aria-haspopup="false" 
			         aria-expanded="true"> <span class="fa fa-bell fa-1x" ></span> <span class="badge-primary badge">
				      <?php echo $personas->noti;  ?>
				      </span></a></div>
			      </div>
			  </header>
					<section align="left">
					<br><br>
					<div class="col-md-12" style="text-align:left">
					 
				<?php  
	if($_GET['id']){
	
	 $nota->trabajos($_GET['id']);
		if($_SESSION['perfil']==3){
			echo "<div class='container'>";
			$nota->respuesta($_GET['id'],$_SESSION["user"]);
			
			echo"<br><br></div></div>";
		} else{
			
			
	?>
		<br><div class="card-footer">
		<button class="btn btn-primary" onclick="editar(<?php echo $_GET["id"];?>)" id="editar"><span class="fa fa-pencil"></span> &nbsp; Editar</button><br></div> </div> <br>
						<div class="card"><div class="card-header">	<h2 class="h2">Trabajos entregados</h2></div>
				<div class="card-block">
					
		<div class="container">
		
		<?php		
			$nota->trabajos_estudiante($_GET['id']);
		}
		
?>	
</div>
		<br><br><div id="respuesta" style="display: none">
 <form  enctype="multipart/form-data" method="post" id="form1"  onSubmit="responder(event)" >
<textarea name="" id="editor1" cols="30" rows="10"></textarea>
	 <input id="archivo" name="archivo" type="file" class="form-control "></input>
	 <br> <center>
	  
	    <button name="btn" id="btn" class="btn btn-primary" value="responder" >Enviar Respuesta</button></center>
	    
</form></div></div></div>
<?php
		
	
	
	}
	elseif($_GET['materia']&&!$_GET['est']){
	if($_SESSION["perfil"]==3){
		$nota->trabajos_materia($_GET['materia'],$_SESSION['user']);
	}
		else{
			?>
			
			<table class="table table-striped table-responsive table-hover table-bordered ">
						<tr class="bg-primary text-white  " >
							<th>Nombre</th>
							<th>Porcentage %</th>
						<th>Comienza</th>
							<th>plazo max</th>
						</tr>
					<?php 
	
	$nota->vernotaprof($_GET['materia']);
} ?></table>
			<?php
			
		
		
	} elseif($_GET['tarea']&&$_GET['est']&&$_GET['materia']){
		$est=$_GET['est'];
		$trabajo=$_GET['tarea'];
		$nota->Resp_estudiante($trabajo,$est);
	}
	else
	
	if($_SESSION["perfil"]==3){?>
					
					<table class="table table-striped table-responsive table-hover table-bordered ">
						<tr class="bg-primary text-white  " >
							<th>Nombre</th>
							<th>Porcentage %</th>
							<th>Comienza</th>
							<th>Plazo Max</th>
							<th>materia</th>
							<th>estado</th>
							<th>Nota</th> 
						</tr><?php $nota->vernotasEst($_SESSION["user"]); ?>
						</table>
					<?php  }elseif($_SESSION["perfil"]==2){ ?>
					<table class="table table-striped table-responsive table-hover table-bordered ">
						<tr class="bg-primary text-white  " >
							<th>Nombre</th>
							<th>Porcentage %</th>
						<th>Comienza</th>
							<th>Plazo Max</th>
						</tr>
					<?php 
} ?></table>
				
					</div>	
				</section>
			</main>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script>
		var editor=CKEDITOR.replace( 'editor1' );
		</script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    
   
   <script>
	
$("#resp").click(
	  function añadir(){

	$("#respuesta").slideToggle(500);
	
	
	
	
	
});
	</script>
   
   
   <script>
	   	   
	   
	   
function responder(e){
		e.preventDefault();
		var texto= editor.getData();
		
		var formElement = document.getElementById("form1");
var formData = new FormData(formElement);
formData.append("texto", texto);
formData.append("btn","responder");
		formData.append("btn","responder");
		formData.append("trab","<?php echo($_GET["id"]);?>");
		formData.append("user","<?php echo $_SESSION["user"];?>");
		
		
		$.ajax({
                url: "../lib/notas.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
		
		.done(function(res){
		 
                 console.log("respuesta: "+res);
			
			
			window.location.reload(true);
		})
		
	}
	   
function calificar(id){
	
	
	var nota=$("#nota").val();
	$.get("../lib/notas.php",{btn:"califica",nota:nota,respuesta:id },
				function(data, status){
         

			if(status=="success"){
				
				alert("Calificado");
				
			}
	
	
	
	
});
}
	
	  var activo=false;
	   
	 function editar(id){
		if(!activo){
		 var desc=$("#contenido").html();
		 var fecha=$("#fecha").html();
		 fecha=fecha.replace(" ","T");
		 
		 $("#editar").html("Guardar"); 
		 $("#contenido").html("<textarea class='form-control' id='desc'>"+desc+"</textarea>");
		 $("#fecha").html("<input type='datetime-local' class='form-control' value='"+fecha+"' id='date'>");
		
			activo=true;
		}else
			{activo=false;
			 
			var nota=$("#nota").val();
			 
			 
			 var cont= $("#desc").val();
			 var date=$("#date").val();
			 
	$.get("../lib/notas.php",{btn:"edita",fecha:date,desc:cont,id:id },
				function(data, status){
         alert(data);

			if(status=="success"){
				
				window.location.reload(true);
				
			}
			
	});
			}
	 }
			 
			 
			
			
			
			
			
		 
		 
	   
	   
	   
	   
	   
	   
	   
	</script>
    
    
    
	  </body>
</html>
