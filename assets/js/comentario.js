document.addEventListener('DOMContentLoaded', function () {
    userId = 0;
    getUserID();
    axiosData();
});

var data; // Variable para almacenar los datos

function axiosData(){
    axios.get('http://localhost/testmunoz/restaurante/index.php', {
        params: {
            controller: 'api',
            action: 'mostrarComentario'
        }
    })
    .then(response => {
        data = response.data;
        printData(data);
        setupCheckboxListeners(data);
        
    })
    .catch(error => {
        // Handle error
        console.error('Error:', error);
    });
}



var selectElement = document.getElementById("orden");
selectElement.addEventListener("change", function() {
    var selectedValue = selectElement.value;
    


    if(data){
        if(selectedValue == 3){
            data.sort((a, b) => a.valoracion - b.valoracion);
        }

        if(selectedValue == 2){
            data.sort((a, b) => b.valoracion - a.valoracion);
        }
    }

    printData(data);

});


function printData(data) {
    let section = document.getElementById("comentarios");
    section.innerHTML = ''; // Clear existing content
    let comentariosMostrados = false;
    if (data && data.length > 0) {
        // Recorremos el array en reversa
        for (let i = data.length - 1; i >= 0; i--) {
            let comentario = data[i];
            if (shouldShowComment(comentario)) {
                comentariosMostrados = true;
                /* Article */
                let article = document.createElement('article');
                article.className = "comentario-container";
                section.appendChild(article);

                /* Nombre */
                let nombre = document.createElement('p');
                nombre.className = "comentario-nombre";
                nombre.innerHTML += comentario['nombre'] + ' ' + comentario['apellidos'];
                article.appendChild(nombre);

                /* Usuario */
                let usuario = document.createElement('p');
                usuario.innerHTML += "@" + comentario['usuario'];
                article.appendChild(usuario);

                let hr = document.createElement('hr');
                article.appendChild(hr);

                /* Comentario */
                let parragraf = document.createElement('p');
                parragraf.innerHTML += comentario['comentario'];
                article.appendChild(parragraf);

                /* Valoracion */
                for (let j = 0; j < 5; j++) {
                    let valoracion = document.createElement('img');
                    valoracion.src = comentario['valoracion'] > j ? "assets/img/valoracion_llena.svg" : "assets/img/valoracion_vacia.svg";
                    valoracion.className = "comentario-valoracion";
                    article.appendChild(valoracion);
                }
            }
        }
    } else {
        console.error('Data array is empty or undefined.', data);
    }
    if (!comentariosMostrados) {
        let section = document.getElementById("comentarios");
        var comentario = document.createElement("div");
        section.appendChild(comentario);
        comentario.innerHTML = "<h1 class='comentario-nombre'>Parece que esta vacio por aqui</h1><p>Prueba con otro filtro o se el primero en comentar</p>";
    }
}

/* Setup Checkbox Listeners */
function setupCheckboxListeners(data) {
    for (const key in checkboxes) {
        checkboxes[key].addEventListener('change', function () {
            printData(data);
        });
    }
}


var checkboxes = {
    checkbox5: document.getElementById('5-estrellas'),
    checkbox4: document.getElementById('4-estrellas'),
    checkbox3: document.getElementById('3-estrellas'),
    checkbox2: document.getElementById('2-estrellas'),
    checkbox1: document.getElementById('1-estrellas')
};
function shouldShowComment(comentario) {
    var checkedCount = Object.values(checkboxes).filter(checkbox => checkbox.checked).length;

    if (checkedCount === 0) {
        return true;
    }

    if (checkboxes.checkbox5.checked && comentario['valoracion'] >= 5) {
        return true;
    }
    if (checkboxes.checkbox4.checked && comentario['valoracion'] == 4) {
        return true;
    }
    if (checkboxes.checkbox3.checked && comentario['valoracion'] == 3) {
        return true;
    }
    if (checkboxes.checkbox2.checked && comentario['valoracion'] == 2) {
        return true;
    }
    if (checkboxes.checkbox1.checked && comentario['valoracion'] == 1) {
        return true;
    }
    return false;
}


/*ADD COMENTARIO*/

function enviarComentario(comentario) {
    axios.post('http://localhost/testmunoz/restaurante/index.php?controller=api&action=subirComentario', {
        contenido: comentario.contenido,
        usuario: comentario.usuario,
        rating: comentario.rating
    })
    .then(response => {
        console.log('Comentario enviado:', response.config.data);
        notie.alert({
            type: 1, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
            text: "Comentario agregado correctamente",
            stay: false, // optional, default = false
            time: 2, // optional, default = 3, minimum = 1,
            position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
          })
        axiosData();
    })
    .catch(error => {
        notie.alert({
            type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
            text: "Error al agregar comentario",
            stay: false, // optional, default = false
            time: 2, // optional, default = 3, minimum = 1,
            position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
          })
        console.error('Error al enviar comentario:', error);
    });
}

document.getElementById('formulario-comentario').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtén los datos del formulario
    var comentario = {
        contenido: document.getElementById('contenido').value,
        usuario: userId,
        rating: parseInt(obtenerValorRadio())
    };

    // Envía el comentario al servidor
    enviarComentario(comentario);

    // Limpia el formulario después de enviar el comentario
    document.getElementById('contenido').value = '';
});


function obtenerValorRadio() {
    // Obtener todos los radios con el nombre 'puntuacion'
    var radios = document.getElementsByName('puntuacion');

    // Variable para almacenar el valor seleccionado
    var valorSeleccionado = "";

    // Recorrer los radios
    for(var i = 0; i < radios.length; i++) {
        // Verificar si el radio está seleccionado
        if(radios[i].checked) {
            // Asignar el valor seleccionado a la variable
            valorSeleccionado = radios[i].value;
            // Romper el bucle ya que ya hemos encontrado el valor seleccionado
            break;
        }
    }

    // Mostrar el valor seleccionado
    return valorSeleccionado
}

function getUserID(){
    axios.get('http://localhost/testmunoz/restaurante/index.php', {
        params: {
            controller: 'api',
            action: 'recogerUserId'
        }
    })
    .then(response => {
        userId = response.data;
        
    })
    .catch(error => {
        // Handle error
        console.error('Error:', error);
    });
}
