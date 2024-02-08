document.addEventListener('DOMContentLoaded', function () {
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
        comentario.innerHTML = "<h1 class='comentario-nombre'>Parece que esta vacio por aqui</h1><p>Contenido de la nueva vista...</p>";
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
    axios.post('http://localhost/testmunoz/restaurante/index.php', {
        controller: 'api',
        action: 'subirComentario',
        contenido: comentario.contenido,
        usuario: comentario.usuario
    })
    .then(response => {
        console.log('Comentario enviado:', response.data);
        // Actualiza la lista de comentarios después de agregar uno nuevo
        axiosData();
    })
    .catch(error => {
        console.error('Error al enviar comentario:', error);
    });
}

document.getElementById('formulario-comentario').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtén los datos del formulario
    var comentario = {
        contenido: document.getElementById('contenido').value,
        usuario: document.getElementById('usuario').value
    };

    // Envía el comentario al servidor
    enviarComentario(comentario);

    // Limpia el formulario después de enviar el comentario
    document.getElementById('contenido').value = '';
    document.getElementById('usuario').value = '';
});