
//Funcion para el menu tab en vista escritorio


var icons2 = document.querySelectorAll('.icon-toggle2')



function deselect2 (icon2) {
  icon2.classList.remove('selected2')
  icon2.children[0].classList.remove('selected')
}

function selectThis2 () {
  icons2.forEach(deselect2)
  this.children[0].classList.add('selected');
  this.classList.add('selected2');
}

icons2.forEach(function (icon2) {
  icon2.addEventListener('click', selectThis2)
  
})


//Función para el tab version movil

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}


//funcion de mover iconos al hacer scroll


// window.onscroll = function() {movimiento(), animateValue2()};

function movimiento() {
  if (document.body.scrollTop > 1150 || document.documentElement.scrollTop > 1150) {
    document.querySelector(".texto_propuestas").className = "texto_propuestas slideUp";
  }
  

}

// function animateValue2() {
//   if (document.body.scrollTop > 3000 || document.documentElement.scrollTop > 3000) {
//     console.log("prueba");
//      animateValue("value", 1, 100, 1000);
//      animateValue("value2", 0, 2, 1000); 
//      animateValue("value3", 0, 40, 1000);
//      window.onscroll = null;
//   }

  
// }


//contador

// function animateValue(id, start, end, duration) {
//       if (start === end) return;
//       var range = end - start;
//       var current = start;
//       var increment = end > start? 1 : -1;
//       var stepTime = Math.abs(Math.floor(duration / range));
//       var obj = document.getElementById(id);
//       var timer = setInterval(function() {
//           current += increment;
//           obj.innerHTML = current;
//           if (current == end) {
//               clearInterval(timer);
//           }
//       }, stepTime);

// }


let buttons = document.querySelectorAll('btn');

buttons.forEach(btn => {
  btn.addEventListener('click', function(){
    buttons.forEach(btn => btn.classList.remove('active'));ç
    this.classList.add('active');
  });
});

