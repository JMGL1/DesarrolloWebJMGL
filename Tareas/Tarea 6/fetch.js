document.addEventListener("DOMContentLoaded", function() {
    const btn1 = document.getElementById("btn1");
    if(btn1) {
        btn1.addEventListener("click", cargarGaleria);
    }
});

// Pregunta 1: Cargar galería con XMLHttpRequest
function cargarGaleria() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "galeria.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("contenido").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function mostrarModalReceta(id) {
    fetch(`detalle_receta.php?id=${id}`)
    .then(response => response.text())
    .then(html => {
        const modalSpace = document.getElementById("espacio-modal");
        modalSpace.innerHTML = html;
        const modal = modalSpace.querySelector('.modal');
        if(modal) {
            modal.style.visibility = 'visible';
            modal.style.opacity = '1';
        }
    });
}

function cerrarModal() {
    const modalSpace = document.getElementById("espacio-modal");
    modalSpace.innerHTML = "";
}

// Pregunta 2: Cargar Modal Formulario con fetch()
function cargarModal(abrir) {
	var contenedor;
	contenedor = document.getElementById('espacio-modal');

	fetch(abrir)
		.then(response => response.text())
		.then(data => {
			contenedor.innerHTML=data
			cargarTipos();
			document.getElementById('modal-crear').style.visibility="visible";
			});
	
}

function registrarReceta() {
	var contenedor = document.getElementById('contenido');
	var forminsertar = document.getElementById('form-receta');
	var datos = new FormData(forminsertar);
	
	fetch("create.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => {
			document.getElementById('modal-crear').style.visibility="hidden";
            cerrarModal();
            // Actualizar la galería automáticamente después de guardar
            cargarGaleria();
		});
}

function cargarEditar(id) {
	var contenedor = document.getElementById('contenido');
	fetch('form-editar.php?id='+id)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function update() {
	var contenedor = document.getElementById('contenido');
	var formeditar= document.getElementById('form-editar');
	var datos = new FormData(formeditar);
	
	fetch("update.php",
		{method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
}

function cargarTipos(){
	var contenedor = document.getElementById('idtiporeceta');
	fetch('tipos_receta.php')
		.then(response => response.text())
		.then(data => {
			var tiposrecetas = JSON.parse(data);
			let html = ``;
			tiposrecetas.forEach(tiporeceta => {
				html += `
					<option value=${tiporeceta.id}>
					${tiporeceta.tiporeceta}
					</option>
				`;
			});
			contenedor.innerHTML = html;
		});
}

function aumentar(){
    let color=document.getElementById("color").value;
    let tema=document.getElementById("tema").value;
    let contenedor=document.getElementById("contenedor");
 	let html=`<div style="background-color:${color}"> 
    ${tema}</div>`;
    contenedor.innerHTML+=html;
}

// Pregunta 3: Cargar listado con fetch
function cargarContenido(url) {
	var contenedor = document.getElementById('contenido');

	fetch(url)
		.then(response => response.text())
		.then(data => {
			contenedor.innerHTML=data
		});
}

function filtrarRecetas(tipo) {
    fetch(`listar_recetas.php?tipo=${tipo}`)
    .then(response => response.text())
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const nuevaTabla = doc.getElementById('cuerpo-tabla');
        if (nuevaTabla) {
            document.getElementById('cuerpo-tabla').innerHTML = nuevaTabla.innerHTML;
        }
    });
}

// Pregunta 4: Temas
function agregarColor() {
    const colorInput = document.getElementById("colorInput");
    const gridColor = document.getElementById("gridColor");
    
    if (colorInput && gridColor) {
        const colorDiv = document.createElement("div");
        colorDiv.className = "color-card";
        colorDiv.style.backgroundColor = colorInput.value;
        gridColor.appendChild(colorDiv);
    }
}

function cambiarTema() {
    const selectTema = document.getElementById("selectTema");
    if(selectTema) {
        const body = document.body;
        body.className = ''; // reset
        body.classList.add(`tema-${selectTema.value}`);
    }
}
