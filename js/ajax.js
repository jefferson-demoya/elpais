$(document).ready(function(){
/////////////////////////////login//////////////////////////////
$("#noticias").click(function(){
	$("#cargador").hide(400,function(){
		$.ajax({
			url:'noticias.php',
		}).done(function(data){
			$("#cargador").html(data);
			$("#cargador").show(400,function(){
				//queremos que esta variable sea global
				var fileExtension = "";
					//función que observa los cambios del campo file y obtiene información
					$("#cont_noticias").find(':file').change(function(){
					//obtenemos un array con los datos del archivo
					var file = $("#archivo")[0].files[0];
					//obtenemos el nombre del archivo
					var fileName = file.name;
					//obtenemos la extensión del archivo
					fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
					//obtenemos el tamaño del archivo
					var fileSize = file.size;
					//obtenemos el tipo de archivo image/png ejemplo
					var fileType = file.type;
				});

					$("#enviar").click(function(){

						var titulo = $("#titulo").val();
						var escritor = $("#escritor").val();
						var contenido = $("#contenido").val();
						var referencia = $("#referencia").val();
						var slider_1 = $("#slider_1").val();

						var formData = new FormData($("#form_noticias")[0]);
						formData.append('titulo',titulo);
						formData.append('escritor',escritor);
						formData.append('contenido',contenido);
						formData.append('referencia',referencia);
						formData.append('slider_1',slider_1);

						$.ajax({
							type:'post',
							url:'../../php/actualizar_noticias.php',
							data:formData,
							dataType:'html',
							contentType:false,
							processData:false,
						}).done(function(data){
							if (data == 1) {
								$("#form_noticias")[0].reset();
								mensaje("¡Noticia subida exitosamente!"); 
								setTimeout(function() {
									window.location='index.php';
									
								}, 1500);
							}
						});

					});
				});


		});
	});
});




/*$("#usuarios").click(function(){
	$("#cargador").hide(400,function(){
		$.ajax({
			url:"usuarios.php",
		}).done(function(data){
			$("#cargador").html(data);
			$("#cargador").show(400);
			
			//instancia data-table
			var table = $('#dataTable').DataTable();

			$("#dataTable").find('.actualizar').each(function(){
				$(this).click(function(){
					var id = $(this).data("id_apre");
					$.ajax({
						type:'POST',
						url:"php/d_actualizar.php",
						data:{id:id},
						dataType:'json',
					}).done(function(data){
						$("#nombre").val(data[0])
						$("#apellido").val(data[1])
						$("#identificacion").val(data[2])
						$("#correo").val(data[3])
						$("#contrasena").val(data[4])

						$("#actualizar").click(function(){
							var nom = $("#nombre").val();
							var ape = $("#apellido").val();
							var ident = $("#identificacion").val();
							var cor = $("#correo").val();
							var cont = $("#contrasena").val();

							$.ajax({
								method:"post",
								url:"php/actualizar.php",
								data:{nom:nom,ape:ape,ident:ident,cor:cor,cont:cont,id:id},
							}).done(function(data){
								if(data==1){

									$(".close").click();
								}else{
									console.log(data)
								}
							});
						});
					});
				});
				$("#act_table").find('button.eliminar').each(function(){
					var dato = $(this);
					$(this).click(function(){
						deleted (dato);
					});
				});
			});
		});
	});
});*/
function mensaje(texto){
	alertify.success(texto);
}
});