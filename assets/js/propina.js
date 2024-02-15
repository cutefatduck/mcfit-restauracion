document.addEventListener('DOMContentLoaded', function () {
    propinacheck()
    const botonEnviarPropina = document.getElementById('tramitar-pedido');
    botonEnviarPropina.addEventListener('click', sendPropina);
});

//DEFAULT
let selectedPropina = "0.03"
let totalCarrito = document.getElementById('total-carrto').value;

let totalCarritoF = parseFloat(totalCarrito);
sumaPrecioConPropina = selectedPropina * totalCarritoF;

let precioTotal = document.getElementById('precio-total');
total = (sumaPrecioConPropina + totalCarritoF);
precioTotal.innerHTML = total.toFixed(2)+" €";

function propinacheck(){
    const propinaRadios = document.querySelectorAll('input[type="radio"][name="propina"]');
    propinaRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                selectedPropina = radio.value;

                let totalCarrito = document.getElementById('total-carrto').value;
                let totalCarritoF = parseFloat(totalCarrito);
                sumaPrecioConPropina = selectedPropina * totalCarritoF;
                
                // let precioConPropina = document.getElementById('precio-propina');
                // precioConPropina.innerHTML = sumaPrecioConPropina;

                let precioTotal = document.getElementById('precio-total');
                total = (sumaPrecioConPropina + totalCarritoF);
                precioTotal.innerHTML = total.toFixed(2)+" €";
            }
        });
    });
}

function sendPropina() {
    const data = {
        propina: selectedPropina
    };

    axios.post('http://localhost/testmunoz/restaurante/index.php?controller=api&action=recibirPropina', data, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        console.log('Respuesta:', response);
        // Aquí puedes manejar los datos de respuesta como desees
    })
    .catch(error => {
        console.error('Error al enviar los datos:', error);
        // Maneja el error aquí
    });
}


