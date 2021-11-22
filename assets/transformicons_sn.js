!function(r,n){"function"==typeof define&&define.amd?define(n):"object"==typeof exports?module.exports=n():r.transformicons=n()}(this||window,function(){"use strict";var r={},n={transform:["click"],revert:["click"]},t=function(r){return"string"==typeof r?Array.prototype.slice.call(document.querySelectorAll(r)):void 0===r||r instanceof Array?r:[r]},o=function(r){return"string"==typeof r?r.toLowerCase().split(" "):r},e=function(r,e,f){var i=(f?"remove":"add")+"EventListener",s=t(r),a=s.length,u={};for(var l in n)u[l]=e&&e[l]?o(e[l]):n[l];for(;a--;)for(var d in u)for(var m=u[d].length;m--;)s[a][i](u[d][m],c)},c=function(n){r.toggle(n.currentTarget)};return r.add=function(n,t){return e(n,t),r},r.remove=function(n,t){return e(n,t,!0),r},r.transform=function(n){return t(n).forEach(function(r){r.classList.add("tcon-transform")}),r},r.revert=function(n){return t(n).forEach(function(r){r.classList.remove("tcon-transform")}),r},r.toggle=function(n){return t(n).forEach(function(n){r[n.classList.contains("tcon-transform")?"revert":"transform"](n)}),r},r});



function myFunction() {
	
console.log("myfuncion");

	var inpObj = document.getElementById("nombre");
		if (!inpObj.checkValidity()) {
			var campos = document.querySelector(".fallo_campo_requerido");
//			inpObj.setCustomValidity(" ")
			campos.innerHTML = "<p class='formulario_js'>" + "Este campo es requerido" + "</p>" ;
			inpObj.style.borderColor = "red";
		}else{
			inpObj.style.borderColor = null;
		}
	console.log("nombre", inpObj.checkValidity());
	
	var nombre_empresa = document.getElementById("nombre_empresa");
		if (!nombre_empresa.checkValidity()) {
			var campos = document.querySelector(".fallo_campo_requerido2");
//			nombre_empresa.setCustomValidity(" ")
			campos.innerHTML = "<p class='formulario_js'>" + "Este campo es requerido" + "</p>" ;
			nombre_empresa.style.borderColor = "red";
		}else{
			nombre_empresa.style.borderColor = null;
		}
	console.log("nombre empresa", nombre_empresa.checkValidity());
	
	var email = document.getElementById("email");
		if (!email.checkValidity()) {
			var campos = document.querySelector(".fallo_campo_requerido3");
//			email.setCustomValidity(" ")
			campos.innerHTML = "<p class='formulario_js'>" + "Este campo es requerido" + "</p>" ;
			email.style.borderColor = "red";
			
		}else{
			email.style.color = null;
			nombre_empresa.style.borderColor = null;
		}
	console.log("email", email.checkValidity());

			
	var describe = document.getElementById("describe");
		if (!describe.checkValidity()) {
			var campos = document.querySelector(".fallo_campo_requerido4");
//			describe.setCustomValidity(" ")
			campos.innerHTML = "<p class='formulario_js'>" + "Este campo es requerido" + "</p>" ;
			describe.style.borderColor = "red";
		}
	console.log("describe", describe.checkValidity());



		if (!inpObj.checkValidity() || !nombre_empresa.checkValidity() || !email.checkValidity() || !describe.checkValidity()  ) {
			var todos = document.querySelector(".todos");
			todos.innerHTML = "<p class='todos'>" + "Uno o varios campos estan sin rellenar." + "<br>" +"Porfavor compruebalos y prueba otra vez. " + "</p>" ;
			
		}else{
			
	
		console.log("me diste un click");
		
		
		var datos = new FormData(formulario);
		
		console.log(datos);
		
		// CÓDIGO LUIS /
			queryString = new URLSearchParams(datos).toString();
			console.log(queryString);
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				console.log(this.responseText);
				var enviado = document.querySelector("#enviado");
				var contacto = document.querySelector(".contacto");
			
				contacto.style.display = "none";
				enviado.style.display = "block";
				enviado.innerHTML = this.responseText;

			}
			}; 
			xhttp.open("POST", "conectar.php", true);
			xhttp.send(datos);
		}
		// FIN: CÓDIGO LUIS 
		/*
		
		
		
		
		fetch('conectar.php', {
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
		*/


			console.log("--- todo perfecto");


		//}

			
		
}

	function texto_attach(){
	
		let textoValue = document.getElementById("file-input").value; 
		let textoArchivo = document.querySelector(".texto_adjunta");
		
	
		textoArchivo.innerHTML = textoValue.substr(textoValue.lastIndexOf('\\') + 1); 


	}


// Inicializamos el Script menu movil

(function() {
	transformicons.add(".tcon");
	
	document.querySelector(".toggle-menu").addEventListener("click",function(){
		document.querySelector(".menu").classList.toggle("open");
		document.querySelector(".logo").classList.toggle("open");
		document.querySelector(".debajo_cta").classList.toggle("open");
			document.querySelector(".contenedor_menuopen").classList.toggle("open");
	})
	
	

})()

// funciones de scroll al hacer click

function smoothScroll(target, duration){
	var target =  document.querySelector(target);
	var targetPosition = target.getBoundingClientRect().top;
	var startPosition = window.pageYOffset;
	var distance = targetPosition - startPosition;
	var startTime = null;
	
	function animation(currentTime){
		if(startTime === null) startTime = currentTime;
		
		var timeElapsed = currentTime - startTime;
		var run = ease(timeElapsed, startPosition, distance, duration);
		window.scrollTo(0,run);
		if(timeElapsed< duration) requestAnimationFrame(animation);
	}
	
	function ease (t, b, c, d) {
	t /= d;
	return c*t*t + b;
};
		
	requestAnimationFrame(animation);

}




var prueba = document.querySelector(".prueba");


prueba.addEventListener("click", function(){
	
	smoothScroll(".ascensor", 1000);
});

// funciones de scroll al hacer click


function smoothScroll(target, duration){
	var target =  document.querySelector(target);
	var targetPosition = target.getBoundingClientRect().top;
	var startPosition = window.pageYOffset;
	var distance = targetPosition - startPosition;
	var startTime = null;
	
	function animation(currentTime){
		if(startTime === null) startTime = currentTime;
		var timeElapsed = currentTime - startTime;
		var run = ease(timeElapsed, startPosition, distance, duration);
		window.scrollTo(0,run);
		if(timeElapsed< duration) requestAnimationFrame(animation);
	}
	
	function ease (t, b, c, d) {
	t /= d;
	return c*t*t + b;
};

	requestAnimationFrame(animation);
	
}


var flecha_botton = document.querySelector(".flecha_botton");











