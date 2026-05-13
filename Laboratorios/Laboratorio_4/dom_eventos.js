var colores  = ['#FFEAA7', '#DFE6E9', '#B2BEFF'];
var colorIdx = 0, contador = 0;

function cambiarColor() {
  
  colorIdx = (colorIdx + 1) % colores.length;

  document.getElementById('panel').style.backgroundColor = colores[colorIdx];

  var nombresColor = ['Amarillo', 'Gris claro', 'Lavanda'];
  document.getElementById('colorActual').textContent =
    'Color actual: ' + nombresColor[colorIdx];

  contador++;
  document.getElementById('cont').innerHTML = 'Clics: ' + contador;
}

function agregarParrafo() {
  
  var txt = document.getElementById('txtInput').value;

  if (txt.trim() === '') { alert('Escribe algo'); return; }

  var p = document.createElement('p');
  p.textContent = txt;                         
  p.setAttribute('class', 'item-dinamico');    
 
  document.getElementById('lista').appendChild(p);

 
  document.getElementById('txtInput').value = '';
}

function eliminarUltimo() {
  var lista  = document.getElementById('lista');

  var items  = lista.querySelectorAll('.item-dinamico');

  if (items.length > 0) {
    lista.removeChild(items[items.length - 1]);
  }
}

document.getElementById('btnAgregar').onclick  = agregarParrafo;
document.getElementById('btnEliminar').onclick = eliminarUltimo;

window.onload = function() {

  document.getElementById('miImagen')
    .addEventListener('mouseover', function() {
      this.style.border = '3px solid #C8420A';
    });

  document.getElementById('miImagen')
    .addEventListener('mouseout', function() {
      this.style.border = 'none';
    });

};
