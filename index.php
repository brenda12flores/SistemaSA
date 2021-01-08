<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="css/styleIndex.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/all.css">

</head>
<body>

	<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Gestor de Archivos</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fas fa-laptop-code"></i></span>
					
					
				</div>
			</div>
			<div class="card-body">
				<form method="post" id="frmLogin" onsubmit="return logear()" autocomplete="off">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>

						<input type="text" class="form-control" placeholder="usuario" required="" id="login" name="login">
						
					</div>
					<br>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="contraseña" required="" id="password" name="password">
					</div>
					<br>
					
					<div class="form-group">
						<p align="right">
						<input type="submit" value="Ingresar" class="btn btn-warning" >
						</p>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Eres nuevo?<a href="registro.php">Registrate </a>
				</div>
				
			</div>
		</div>
	</div>
</div>

	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">
		function logear(){
			$.ajax({
				type:"POST",
				data:$('#frmLogin').serialize(),
				url:"procesos/usuario/login/login.php",
				success:function(respuesta){
						
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						window.location = "vistas/inicio.php";
					}else{
						swal(":(" , "Fallo la entrada!", "error");
					}
				}
			});
			return false;
		}
	</script>

</body>
</html>