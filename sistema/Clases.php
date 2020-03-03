<!DOCTYPE html>
<html lang="es">
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
   <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
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
					<li class="nav-item"><a class="nav-link active " href="Clases.php"><em class="fa fa-book"></em>Clases <span class="sr-only"></span></a></li>
					<?php if($_GET['materia']){?>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
					<?php } ?>
		
					
			</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link active " href="Clases.php"><em class="fa fa-book"></em>Clases <span class="sr-only"></span></a></li>
					<?php if($_GET['materia']){?>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a href="estudiantes.php?materia=<?php echo $_GET['materia'];?>" class="nav-link" ><span class="fa fa-users"></span> &nbsp; Estudiantes </a></li>
				
		
				<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
				
					
					
			</ul>
			<?php }?>
								
								
			<?php			  }; ?>
				
				
				
				
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
														
							</ul>
							<a id="dropdownMenuLink" class=" " data-toggle="dropdown" aria-haspopup="false" 
			         aria-expanded="true">
				<span class="fa fa-bell fa-1x" ></span> <span class="badge-primary badge"> <?php echo $personas->noti;   ?></span></a>
							</div>

					</div>
				</header>
				
				<section class="row">
					<div class="col-sm-12">
						<section class="row">
							
							
							
							
							
							
							<?php  
							if($_GET['materia']){
							
					
								if($_SESSION["perfil"]==3){    ?>
								
							<br><br>
						<div class="col-sm-12 col-md-10 col-lg-10">
						 
						<?php $curso->verClases($_GET['materia'],$_SESSION["perfil"]) ?>
							
							</div>
						
							<?php } else{ ?>
			<ul class="nav">
			  <li class="nav-item">
				<a class="nav-link " onClick="añadir()" style="cursor: pointer">
				<span class="fa fa-plus"></span> &nbsp;Añadir</a>
			  </li>
			  
  
			</ul>
				    
							
							
							
							</div>
				    <div id='class' class="col-sm-12 col-md-10 col-lg-10">
					    
						    <br><div id='plus' class='card' style="display: none">
				        <div class= 'card-header card-primary text-white  '><b> 
					        <form action="" id="clases">
								Fecha:
					             <input type=date class= form-control name="fecha" id="fecha"> </b>
					             					             </div>    
					             
						        <div class=card-block>	<p>
						        <textarea id="editor" name="contenido" class= form-control ></textarea>
						        
						        <div class="form-group">
					          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Tareas" >
					         <b>Agregar Tareas &nbsp;<span class="fa fa-check-circle"> </span></b> 
					          </button>
					          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Recursos"><b>Agregar Recursos <span class="fa fa-file"> </span></b> </button></div>
					          <div id="agregados"></div>
					          <input type="hidden" id="trabajos" name="trabajos" value=" "/>
						          <br> <button type="button" class='btn btn-primary' name="btn"  
						          value ="ingresar" onclick="agregarclase()"> Guardar</button> </p></form>	</div>	</div>
							
						
							<?php $curso->verClases($_GET['materia'],$_SESSION["perfil"]) ?>
							</div>
							
							
							<?php }
							}
							else{
							
							if($_SESSION["perfil"]==3){    ?>
						
						<div class="col-sm-12 col-md-8 col-lg-8">
						 
						 
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Mis Cursos</h3>
										
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href=""><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href=""><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href=""><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<h6 class="card-subtitle mb-2 text-muted">Estas son tus clases actuales</h6>
										
										<ul id="lista" class="todo-list mt-2 list-unstyled" >
											
											<?php $curso->VerMisCursosEst($_SESSION["user"]);?>											
													
													
										</ul>	
											
									</div>
								</div>
							
							</div>
						
							<?php } else{ ?>
							<div class="col-sm-12 col-md-8 col-lg-8">
						
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Mis Cursos</h3>
										
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<h6 class="card-subtitle mb-2 text-muted">Estas son tus clases actuales</h6>
										
										<ul id="lista" class="todo-list mt-2 list-unstyled" >
											
																							
												<?php
															  
																  
										 $curso->VerMisCursosprofes($_SESSION["user"]); 
																  
																
											
											
											
											?>
													
										</ul>	
											
									</div>
									<div class="card-footer">
									<form action="../lib/cursos.php" method="post">
										<div class="form-group form-inline">
										<input type="text" class="form-control" placeholder="nombre" name ="materia">&nbsp;
										<input type="hidden" name="user" value="<?php echo $_SESSION["user"]; ?>">	
										<select class="form-control" name="nivel" id="nivel" >
										
										
										<?php $curso->nivel();?>
										
										</select>
										
										&nbsp;&nbsp;
										<button class="btn btn-primary " type="submit" name="btn" value="add">
										
										<span class="fa fa-plus-circle "></span> Agregar
										
									</button></div>
									</form></div>
								</div>
					
							</div></div>
							
							</div>
							
							<?php }}
							?>
							
						
						<section class="row">
							
						</section>
					</div>
				</section>
			</main>
		</div>
	</div>
 <!--agregar TAREAS -->
   <div class="modal fade" id="Tareas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tareas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form id="miForm" >
    <p class="form-control-label"> Nombre del trabajo *</p>  <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" required>
   <p class="form-control-label" > Porcentage *</p> 
   <div class="input-group mb-3">
  <input type="number" class="form-control form-control-sm" min="0" max="100"name="porcentage" id="porcentage" >
  <div class="input-group-addon bg-primary text-white">
    <span class="input-group-text " >%</span>
  </div>
</div>
		  <p class="form-control-label"> Fecha de inicio* </p>
		  
		  <input type="datetime-local"  class="form-control form-control-sm" name="inicio" id="inicio" >
		  <p class="form-control-label"> Fecha final*</p>
		  <input name="final" id="final" type="datetime-local"  value="2014-11-16T15:25:33" class="form-control form-control-sm"  >
		  <p class="form-control-label"> Descripción*</p>
     <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control form-control-sm" ></textarea></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="agregarTareas()" data-dismiss="modal" >Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
   
  <!--agragar recursos--> 
   
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
      
		  <ul class="nav nav-tabs">
		  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Elegir Recurso</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo Recurso </a>
  </li>
		  </ul>
		  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  <br>
		<select class="form-control"  id="recursos"   onChange="AgregarExistentes()"><option value=" " selected></option>
	   <?php $biblioteca->verRecursos($_GET["materia"]);
			
			?>
	  
	  </select>		  
			  
			  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	
  	<form  enctype="multipart/form-data" id="formularo" name="formulario"  method="post" onSubmit="nuevorecurso(event)">
  	<label for="" class="form-control-label">Nombre recurso:</label>
  		<input  class="form-control" type="text" id="nombre" name="nombre"><br>
  		Tamaño maximo 2M
  		<div class="custom-file"><input  class="custom-file-input" type="file" id="customFile" onchange="mensaje(this.value)" name="file">
  		<input type="hidden" value="<?php echo($_GET["materia"]);?>" name="materia" >
  		<button id="btn" for="customFile" class="custom-file-control btn-secondary"  >Seleccione archivos </button><label for="" id="msg" class="form-control-label"></label></div>
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
   
   
   
   
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.es.min.js" charset="utf8" ></script>
    <script src="js/custom.js"></script>
    
   <script>
	
	  CKEDITOR.replace( 'editor' );
		</script>
     <script>
		
function añadir(){

	$("#plus").slideToggle(500);
	
	
	
	
	
}
		   var resources="";
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
		
		 
					  $('#agregados').append("<br><a href=''><li class='fa fa-file'></li> &nbsp;<b>"+recursos[1]+"<b></a>");
		 resources+=recursos[0]+",";
		 
		
			 }else{
				alert("no se pudo subir el archivo"); 
			 }
		 }
                })
	
	
}
	
	
	
	
	
	
	
	

		
	</script>
  <script>
	  
	
	  
	  function agregarTareas(){
		  var nomb=$("#nombre").val();
		  var porcent=$("#porcentage").val();
		  var inicio=$("#inicio").val();
		  var final=$("#final").val();
		  var descripcion=$("#descripcion").val();
		  var mate="<?php echo $_GET["materia"]; ?>";
	  
	        
	  
	     
		  $.get("../lib/notas.php",{btn:"1", nombre:nomb,porcentage:porcent,inicio:inicio,final:final,descripcion:descripcion,materia:mate},function(data, status){
         
			  
		
		var trab=data.split(',');
			
			
			 
				$('#agregados').append("<br><a href='Notas.php?id="+trab[0]+"'><li class='fa fa-check-circle'></li> &nbsp;<b>"+trab[1]+"</b></a>");
				$("#trabajos").attr("value",trab[0]+","+$("#trabajos").attr("value")+",");
				
			
 
	  });
		  	}
		  
	
		  
function AgregarExistentes(f){
			  
			var recursos=$("#recursos").val().split(",");
			 $('#agregados').append("<br><a href=''><li class='fa fa-file'></li>&nbsp; <b>"+recursos[1]+"</b></a>");
			  
			resources+=recursos[0]+",";
			
			 console.log(resources);
			
			 
		  }
		  
	  			
/*
*/			
  function agregarclase(){
		  
		  
	   var form=$("#clases").serialize();
	  
	  
	  
	  var fecha=$("#fecha").val();
		 
	 var contenido=CKEDITOR.instances.editor.getData();
	  
	
		  var mate="<?php echo $_GET["materia"]; ?>";
	  
	       var enviar=$("#trabajos").attr("value");
	    

	  
		  $.get("../lib/cursos.php",{btn:"ingresar", fecha:fecha,contenido:contenido,materia:mate,trabajo:enviar,recursos:resources},
				function(data, status){
         
	alert(data);
			if(status=="success"){
				
				
				window.location.reload(true);
			}
			  
				
			

	  });
		  
		  
	  
				}
	  
	  var edit=false;
	  var txt=null;
	   function editarclase(clase){
		  var editor="editor"+clase;
		   
		   		   var clases="#clase-"+clase;
		   var fecha="";
		   if(edit){
			fecha= $("div#fecha"+clase).children("input").val()
			 var b= $(clases).children("div").html();
			  $(clases).children("div").replaceWith("<div id=editor"+clase+">"+b+"</div>");
			  $(clases).children("button").remove();
			   $("div#fecha"+clase).html(fecha);
			   $(clases).children("div").css("border","none ");
			   edit=false;
			   console.log(edit);
			   
		   }
		   else
		   {edit=true;
	console.log(edit);
		  fecha=$("div#fecha"+clase).html();
		  		  
		   $(clases).children("div").attr("contenteditable","true");
		    
		   
		  var text =$(clases).children("div").html();
		  
		      $(clases).children("div").css("border","#000 solid thin ");
		   
      
		   
		  
		   $("div#fecha"+clase).html("<input type='date' id='date' class='form-control' value='"+fecha+"'>");
		 txt=CKEDITOR.inline( editor);
		   
		   
			
		
			$(clases).append("<button class=\"btn btn-primary\" onClick=\"EditaClase()\">Guardar</button>");
			
			
			
		   }
		   
	   }
	  
	  
	  
	  function EditaClase(){
		  
		 var date=$("#date").val();
		alert(date);
		  
		  
		 $.get("../lib/cursos.php",{btn:"editar",fecha:date,contenido:txt.getData()},
				function(data, status){
         

			if(status=="success"){
				
				
				window.location.reload(true);
			}
			
			
		  
		 });
	  }
	
	  
	 function eliminarclase(clase){
		  
		  
	   
	
		  
	  
	       var enviar=$("#trabajos").attr("value");
	    

	  
		  $.get("../lib/cursos.php",{btn:"eliminar", clase:clase},
				function(data, status){
         

			if(status=="success"){
				
				
				window.location.reload(true);
			}
			  
				
			

	  });
		  
		  
	  
				}
	   
	  function mensaje(f){
		  		  
		 f = f.split('\\');
  
		  
		  $("#msg").html(f[f.length-1]);
	  }
	  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");});
</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
	  </body>
</html>
