!function(r,n){"function"==typeof define&&define.amd?define(n):"object"==typeof exports?module.exports=n():r.transformicons=n()}(this||window,function(){"use strict";var r={},n={transform:["click"],revert:["click"]},t=function(r){return"string"==typeof r?Array.prototype.slice.call(document.querySelectorAll(r)):void 0===r||r instanceof Array?r:[r]},o=function(r){return"string"==typeof r?r.toLowerCase().split(" "):r},e=function(r,e,f){var i=(f?"remove":"add")+"EventListener",s=t(r),a=s.length,u={};for(var l in n)u[l]=e&&e[l]?o(e[l]):n[l];for(;a--;)for(var d in u)for(var m=u[d].length;m--;)s[a][i](u[d][m],c)},c=function(n){r.toggle(n.currentTarget)};return r.add=function(n,t){return e(n,t),r},r.remove=function(n,t){return e(n,t,!0),r},r.transform=function(n){return t(n).forEach(function(r){r.classList.add("tcon-transform")}),r},r.revert=function(n){return t(n).forEach(function(r){r.classList.remove("tcon-transform")}),r},r.toggle=function(n){return t(n).forEach(function(n){r[n.classList.contains("tcon-transform")?"revert":"transform"](n)}),r},r});


const header = document.getElementsByClassName('barra');
const logo = document.getElementById('logo');

window.addEventListener('scroll', function() {  
  if (window.scrollY > 0) {
   
    header[0].style.background = 'rgba(0, 0, 0, 0.8)';
    header[0].style.position = "fixed";
    header[0].style.width = "100vw";
    header[0].style.zIndex = "99";
  
  } else {
    header[0].style.background = 'transparent';
    
  }
});

// Inicializamos el Script

(function() {
	transformicons.add(".tcon");
	
		document.querySelector(".toggle-menu").addEventListener("click",function(){

		document.querySelector(".logo_header").classList.toggle("open");
		document.querySelector(".logo2_header").classList.toggle("open");
		document.querySelector(".menu").classList.toggle("open");
		document.querySelector(".contenedor_menuopen").classList.toggle("open");
		document.querySelector(".debajo_cta").classList.toggle("open");
		document.querySelector(".logo_header_texto").classList.toggle("open");
		document.getElementById("prueba").classList.toggle("transformicon2");
	
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
	var distance = targetPosition - startPosition -120;
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


// var flecha_botton = document.querySelector(".flecha_botton");


// flecha_botton.addEventListener("click", function(){
	
// 	smoothScroll(".destino", 500);
// });


// contador 








