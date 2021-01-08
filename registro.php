<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/styleRegistro.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">

</head>
<body>

	<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Registro de Usuario</h3>
				<div class="d-flex justify-content-end social_icon">
						<span><i class="fas fa-id-card-alt"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off"> 

					<label class="label">Nombre persona</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-address-card"></i></span>
						<input type="text" name="nombre" id="nombre" class="form-control" required="">
					</div>

					<label class="label">Fecha de nacimiento</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
						<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
					</div>

					<label class="label">Correo</label>
					<div  class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-at"></i></span>
						<input type="text" name="correo" id="correo" class="form-control" required="">
					</div>

					<label class="label">Nombre de usuario</label>
					<div  class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
						<input type="text" name="usuario" id="usuario" class="form-control" required="">
					</div>

					<label class="label">Contraseña</label>
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input type="password" name="password" id="password" class="form-control" required="">
					</div>
					<br>

					<div class="form-group">
						<p align="right">
							<button class="btn btn-warning">Registrar</button>
						</p>
					</div>

				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Volvemos para ingresar? <a href="index.php">Login</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
	
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">

		$(function(){
			var fechaA = new Date();
			var yyyy= fechaA.getFullYear();

			$("#fechaNacimiento").datepicker ({
				changeMonth: true,
				changeYear: true,
				yearRange: '1900:' + yyyy,
				dateFormat: "dd-mm-yy"
			});
		});

		function agregarUsuarioNuevo(){
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					console.log(respuesta);
					respuesta = respuesta.trim();

					if (respuesta == 1) {
						swal(":(","Fallo el registro!","Error");
					}else if(respuesta == 2){
						swal(":(","Ya EXISTE este usuario!","Error");
					}else{
						$('#frmRegistro')[0].reset();
						swal(":D","Agregado con exito!","success");
					}
				}

			});
			return false;

		} 
	</script>

</body>
</html>