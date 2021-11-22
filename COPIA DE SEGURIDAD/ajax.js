var formulario = document.getElementById("formulario");

/*var respuesta = 

formulario.addEventListener('submit', function(e){
	
	console.log("me diste un click");
	
	
	var datos = new FormData(formulario);
	
	console.log(datos.get("nombre"));
	console.log(datos.get("nombre_compania"));
	
	
	fetch('borrar.php', {
		method:'POST',
		body: datos
	})
	
		.then( res => res.json())
		.then( data => {
			var enviado = document.querySelector("#enviado");
			var contacto = document.querySelector(".contacto");
		
			contacto.style.display = "none";
				enviado.style.display = "block";
			enviado.innerHTML = data ;
		})
	
})*/