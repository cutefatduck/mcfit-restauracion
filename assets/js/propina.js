
document.addEventListener('DOMContentLoaded', function () {
    standard()
    propinacheck()
    getPuntos()
    setPuntos()
    const botonEnviarPropina = document.getElementById('tramitar-pedido');
    botonEnviarPropina.addEventListener('click', function() {
        sendPropina();
        sendPuntos();
        sendDescuento();
    });

    const botonEnviarPuntos = document.getElementById('enviar-puntos');

    botonEnviarPuntos.addEventListener('click', function() {
        calcularPuntos();
        standard();
    });
});

//DEFAULT
let descuento = 0
let selectedPropina = "0.03"
let totalCarrito = 0

function standard(){
    totalCarrito = document.getElementById('total-carrito').value;

    let totalCarritoF = parseFloat(totalCarrito);
    sumaPrecioConPropina = selectedPropina * totalCarritoF;

    let precioTotal = document.getElementById('precio-total');
    total = (Math.max(0,(sumaPrecioConPropina + totalCarritoF) - descuento));
    precioTotal.innerHTML = total.toFixed(2)+" €";
}


function propinacheck(){
    const propinaRadios = document.querySelectorAll('input[type="radio"][name="propina"]');
    propinaRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                selectedPropina = radio.value;

                let totalCarritoF = parseFloat(totalCarrito);
                sumaPrecioConPropina = selectedPropina * totalCarritoF;

                let precioTotal = document.getElementById('precio-total');
                total = (Math.max(0,(sumaPrecioConPropina + totalCarritoF) - descuento));
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


function getPuntos(){

    axios.get('http://localhost/testmunoz/restaurante/index.php', {
        params: {
            controller: 'api',
            action: 'getPuntos'
        }
    })
    .then(response => {
        puntos = response.data;
        if(Number.isInteger(puntos)){
            setPuntosHtml(puntos);
            puntosFunction(puntos);
        }
        
    })
    .catch(error => {
        console.error('Error:', error);
    });

}

function setPuntosHtml(puntos){
    puntosElement = document.getElementById('puntos');
    puntosElement.innerHTML = puntos;
}
function puntosFunction(){
    return puntos;
}

function setPuntos(){
    let puntos = totalCarrito / 3
    puntosInt = parseInt(puntos)
    return puntosInt
}

function sendPuntos(){

    let puntos = setPuntos()

    axios.post('http://localhost/testmunoz/restaurante/index.php?controller=api&action=subirPuntos', puntos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        console.log('Respuesta:', response.config.data);
    })
    .catch(error => {
        console.error('Error al enviar los datos:', error);
    });
    
}


let puntosSelInt = 0
function calcularPuntos(puntos){
    puntos = puntosFunction()
    let puntosSel = document.getElementById('input-puntos').value
    puntosSelInt = parseInt(puntosSel)
    
    if(puntosSelInt > puntos || puntosSelInt < 0 || isNaN(puntosSelInt)){
        notie.alert({
            type: 3,
            text: "Selecciona una cantidad de puntos correcta",
            stay: false,
            time: 3,
            position: 'top'
          })

    }else{
        notie.alert({
            type: 1,
            text: "Se han seleccionado correctamente los puntos",
            stay: false,
            time: 3,
            position: 'top'
          })

          descuento = puntosSel * 0.5

    }
}

function sendDescuento(){

    const descuentoYpuntos = {
        descuento: descuento,
        puntos: puntosSelInt
    }

    axios.post('http://localhost/testmunoz/restaurante/index.php?controller=api&action=sendDescuento', descuentoYpuntos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        console.log('Respuesta:', response.config.data);
    })
    .catch(error => {
        console.error('Error al enviar los datos:', error);
    });
}