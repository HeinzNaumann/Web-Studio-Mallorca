
//Funcion para el menu tab en vista escritorio


var icons2 = document.querySelectorAll('.icon-toggle2')


console.log(icons2[0].children)

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
