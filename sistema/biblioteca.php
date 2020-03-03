<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="david mantilla">
	
	
	
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>SACE</title>

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
	
	error_reporting(0);
	if (!isset($_SESSION["perfil"]))
	{
		header("location:../index.php");
		
	}
	

	include("../lib/personas.php");
	
	include("../lib/cursos.php");
	include("../lib/notas.php");
	include("../lib/biblioteca.php");
	
	
	?>
    
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
		<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
				 <h1 class="site-title "><b> <a href="index.php"><div style="background-color: white"><img src="../img/logo.png" width="100%" alt=""></div></a></b></h1>

				<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><em class="fa fa-bars"></em></a>
				
					<?php      if($_SESSION["perfil"]!=2){    ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php"><em class="fa fa-book"></em> &nbsp;Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link active" href="biblioteca.php"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
					
		
					
			</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-book"></em> &nbsp;Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link active" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a href="estudiantes.php?materia=<?php echo $_GET['materia'];?>" class="nav-link" ><span class="fa fa-users"></span> &nbsp; Estudiantes </a></li>
				
		
				<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
				
					
					
			</ul>
			<?php }; ?>
				
				
				
				
				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> Salir</a></nav>
		
<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
  <header class="page-header row justify-center">
				
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Bienvenido</h1>
					</div>
					<div class="col-md-6 col-lg-4">

						<div class="dropdown user-dropdown  text-center text-md-right pull-right">
						
							<a class="btn btn-stripped dropdown-toggle" href="" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div  >
						<img src="<?php  $personas->fotoPerfil($_SESSION["user"])?>" alt="foto Perfil" class="circle float-left profile-photo" width="50" height="auto">
						
						<div class="username mt-1">	
							<h4 class="mb-1"><?php 
								$personas->usuario($_SESSION["user"]);?></h4>
							
							<h6 class="text-muted"><?php $personas->perfil($_SESSION["perfil"]); ?></h6>
						</div></div>
						</a>
						

							<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="perfil.php"><em class="fa fa-user-circle mr-1"></em> Ver perfil</a>

								<a class="dropdown-item" href="../lib/personas.php?btn=salir"><em class="fa fa-power-off mr-1"></em> salir</a>
							</div>
							
							

						</div>
						<div class="dropdown user-dropdown  text-center  pull-right" style="padding: 30px">
					
					<ul class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem" aria-labelledby="not"> <?php $personas->notificaciones($_SESSION["user"]) ?>
							</ul><a id="dropdownMenuLink" class=" " data-toggle="dropdown" aria-haspopup="false" 
			         aria-expanded="true">
				<span class="fa fa-bell fa-1x" ></span> <span class="badge-primary badge"> <?php echo $personas->noti;   ?></span></a></div>

					</div>
				</header>
				
	<?php    ?>
						
						<div class="col-sm-12 col-md-8 col-lg-8">
						 <?php
							  if(!$_GET["rec"]){
							?>
						 
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Recursos</h3>
										
										
										
										
										<h6 class="card-subtitle mb-2 text-muted">Estas son tus clases actuales</h6>
									
										<ul id="lista" class="todo-list " >
											
											<?php {  $biblioteca->ListaRecursos($_GET["materia"]);}?>											
													
												
										</ul>
										<br><br>
										<div class="card-footer">
										<a class="btn btn-primary pull-left " href="clases.php?materia=<?php echo($_GET["materia"]); ?> " > <span class="fa fa-chevron-left"></span> volver  a Clase  </a>	
										<div class="pull-right"><button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#Recursos"><b>Agregar Recursos <span class="fa fa-file"> </span></b> </button></div>
										</div>
										</div>	
									</div>
								</div>
						

							<?php } else {
								  
								  
								  
								  ?>
								  
								  <div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Recurso</h3>
										
										<?php
										
								  $biblioteca->Recursos($_GET["rec"]);
										?>
										
									
										
									  </div>
									  </div>
								  
								  
								  <?php
								  
								  
								  
								  
								  
								  
							  }?>
																					
							</div>			
				
				
				
				
</main>
		</div>
		<div class="modal fade" id="Recursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Recursos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
		 
  <div class="container-fluid" >
  	
  	<form  enctype="multipart/form-data" id="formularo" name="formulario"  method="post" onSubmit="nuevorecurso(event)">
  	<label for="" class="form-control-label">Nombre recurso:</label>
  		<input  class="form-control" type="text" id="nombre" name="nombre"><br>
  		Tamaño maximo 2M
  		<div class="custom-file "><input  class="custom-file-input form-control" type="file" id="customFile" onchange="mensaje(this.value)" name="file">
  		<input type="hidden" value="<?php echo($_GET["materia"]);?>" name="materia" >
  		<button id="btn" for="customFile" class="custom-file-control "  > </button><label for="" id="msg" class="form-control-label"></label></div>
  		<br><br>
  		<div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btn" name="btn" value="1">Guardar Cambios</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
        
      </div>
  	</form>
   </div>
 
</div>
      </div>
      
    </div>
  </div>
</div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="js/custom.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
   
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    
    <script>
	
	function eliminar(id){
		
		 $.get("../lib/biblioteca.php",{btn:"2", id:id},function(data, status){
         
			  
		if(status=="success"){
			
			window.location.reload(true);
			
			
		}
			 
		  });
		  	}
		
		function nuevorecurso(e){
	e.preventDefault();
	 var f=$(this);
	var datos = new FormData(document.forms.namedItem("formulario"));
	datos.append("btn","1");
	 $.ajax({
                url: "../lib/biblioteca.php",
                type: "post",
                dataType: "html",
                data: datos,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
		 
                 console.log("datos: "+datos+"respuesta: "+res);
		 
		 if(res){
		 var recursos=res.split(",");	 
			 
			 
			 if(recursos[1]){
		
		 
					window.location.reload(true);
			
		 
		
			 }else{
				alert("no se pudo subir el archivo"); 
			 }
		 }
                })
	
	
}
	
	
	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");});
	
	
	
	</script>
    
    
    
    
    
    
	  </body>
</html>
