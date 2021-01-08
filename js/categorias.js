function agregarCategoria(){
	var categoria = $('#nombreCategoria').val();

			if (categoria =="") {
				swal("Debes agregar una categoría");
				return false;
			}else{
				$.ajax({
					type:"POST",
					data:"categoria=" + categoria,
					url:"../procesos/categorias/agregarCategoria.php",
					success:function(respuesta){
						respuesta = respuesta.trim();

						if (respuesta== 1) {
							$('#tablaCategorias').load("categorias/tablaCategoria.php");
							$('#nombreCategoria').val("")
							swal(":D","Agrgado con exito","success");
						}else{
							swal(":(","Fallo al agregar","error");
						}
					}
				});
			}
}


	function eliminarCategorias(idCategoria){
		idCategoria = parseInt(idCategoria);
		if (idCategoria < 1) {
			swal("No tienes id de categoría!");
			return false;
		}else{
			///mensaje de alerta sweete alert
				swal({
  title: "Estas seguro de eliminar esta ategoría",
  text: "Una vez eliminada, no podras recurar la categoría!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   $.ajax({
    	type:"POST",
    	data:"idCategoria="+idCategoria,
    	url:"../procesos/categorias/eliminarCategoria.php",
    	success:function(respuesta){
    		respuesta = respuesta.trim();
    		if (respuesta == 1) {
    			$('#tablaCategorias').load("categorias/tablaCategoria.php");
    			swal("Eliminado con exito!", {
      		icon: "success",
    		
    });
    	}else{
    		swal(":(","Fallo al eliminar!","error")
    	}

    	}
    });
  } 
});
			////
		}
	}
function obtenerDatosCategoria(idCategoria){
	$.ajax({
		type:"POST",
    	data:"idCategoria="+idCategoria,
    	dataType:"json",
    	url:"../procesos/categorias/obtenerCategoria.php",
    	success:function(respuesta){
    		

    			$('#idCategoria').val(respuesta['idCategoria']);
    			$('#categoriaU').val(respuesta['nombreCategoria']);

    	}
	})
}


function actualizaCategoria(){
	if ($('#categoriaU').val()== "") {
		swal("No hay categoría!!");
		return false;
	}else{
		$.ajax({
			type:"POST",
			data:$('#frmActualizaCategoria').serialize(),
			url:"../procesos/categorias/actualizaCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					swal(":D","Actualizo con exito!!","success");
				}else{
					swal(":(","Fallo la actualización","error");
				}
			}
		})
	}
}
