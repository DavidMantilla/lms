<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="">
	
<?php   session_start();
	error_reporting(0);?>


				<?php
	
	//unset($_SESSION["perfil"]);	
	
	if($_POST["perfil"]){
		$_SESSION["perfil"]=$_POST["perfil"];
		$_SESSION["user"]=$_POST["user"];
					   }
	

		
	
	if(isset($_SESSION["perfil"]))
{	
	
	
	
	
		header("location:sistema/index.php");
		
	


}
	
	?>
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>Inicio de sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background: #C6CFDB">
	<div class="container-fluid" id="wrapper"><br><br>
		<div class="row justify-content-md-center">
			
			<div class="col-lg-4 mb-4">
								<div class="card">
									<div class="card-header">inicio de sesión</div>
									
									<div class="card-block">
										<form action="" method="post">
          <div class="form-group form-inline col-md-12"> <p id="errorUsr" class="text-danger" style="font-size: 12px; width: 100%;float: right"></p>
			  <span class="fa fa-user-o" style="font-size: 40px;color:#053446; "></span>&nbsp;&nbsp;
         
           <input type="text" class="form-control" style="border:none; border-bottom: thin #053446 solid;  width: 75%;" placeholder="Usuario o numero de documento" id="user" name="user" onKeyUp=" validarusuario(this.value), MiTecla(this,event)"> <br>
            </div>
            <input type="hidden" name=perfil id=perfil>
             
             <div class="form-group form-inline col-md-12">
            <p id="errorClave" class="text-danger" style="font-size: 12px; width: 100%;float: right"></p><br>
             <span id="" class="fa fa-key" style="font-size: 40px;color:#053446; "></span>&nbsp;&nbsp;
            <input type="password" class="form-control" id="pass" style="border:none; border-bottom: thin #053446 solid; width: 75%;" placeholder="Contraseña" onKeyUp="contra(this,Event)" >
			</div>
          <button class="btn btn-outline-primary btn-sm " style="float:right;margin-top:5px;margin-right: 10px" id="enviar" value="iniciar " id="boton" value="btn" type="button" onClick="validarpass()" >iniciar sesión</button>
        
      </form>
									</div><div class="card-footer bg-primary " ><center><a href="registro.html" class="btn text-white">registrarse con codigo <br>de usuario</a></center></div>
								</div>
			
			
			<div id="sesion"></div>	
			</div></div>
			</div>
		
			
			
		<script src="js/jquery-3.2.1.min.js"></script>	
			<script>
	
	function MiTecla(campo,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;
 
if (keycode == 13)
{ document.getElementById("pass").focus();
 
return false;
}
else
return true;
}
	function validarusuario(usr)
	{  
	
		$.get("lib/personas.php",{btn:"user", usuario:usr },function(data, status){
         
		
			if("1".localeCompare($.trim(data))==0){
				$('#sesion').html(data);
				$("#user").css("border-color","#ffffff");
				$("#user").css("color","#053446");
				$("#errorUsr").html("");
				$(".btn").attr("disabled", false);				

				
			} else{	
				$('#sesion').html(data+","+ "1".localeCompare($.trim(data)));
					$("#errorUsr").html(" usuario incorrecto");
				$("#user").css("border-color","red");
				$("#user").css("color","red");
				$(".btn").attr("disabled",true);
			}
    });	
	}
				function contra(campo,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;
 
if (keycode == 13)
{ validarpass();
 
return false;
}
else
return true;
}
				function validarpass()
	{
		
		var pass=$("#pass").val();
		
		var usr=$("#user").val();
	
		$.get("lib/personas.php",{btn:"pass", usuario:usr,pass:pass },function(data, status){
         
		
			if("0".localeCompare($.trim(data))!=0){
			     
								
				$('#sesion').html("*"+data);
				$("#perfil").val(data);
				$("form").submit();
			
				
				
			} else{	
				$('#sesion').html(data+","+ "1".localeCompare($.trim(data)));
				$("#errorClave").html("Contraseña Incorrecta");
				$("#pass").css("border-color","red");
				$("#pass").css("color","red");
				
			}
    });		
					
					
				}
	
	
	
	
	</script>
			
	</body>
</html>		
	
