document.addEventListener('DOMContentLoaded',function(){
    fetch('http://localhost/testmunoz/restaurante/index.php?controller=api&action=mostrarComentario',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        printData(data);
    })
    .catch(error => {
        console.error(error);
    })
})

function printData(data){
    let hola = document.getElementById("test");

   if (data && data.length > 0) {
        for (let i = 0; i < data.length; i++) {

            hola.innerHTML += data[i]['comentario_id'] + ' ';
            hola.innerHTML += data[i]['comentario'] + ' ';
        }
    } else {
        console.error('Data array is empty or undefined.', data);
    }
}
