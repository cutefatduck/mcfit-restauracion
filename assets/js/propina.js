document.addEventListener('DOMContentLoaded', function () {
    propinacheck();
});



function propinacheck(){
    const propinaRadios = document.querySelectorAll('input[type="radio"][name="propina"]');

    let selectedPropina = "0.03";

    propinaRadios.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.checked) {
        selectedPropina = radio.value;
        }
    });
    });

    console.log("Current selected propina:", selectedPropina);

    let propina = document.getElementById('propina');

    propina.innerHTML = selectedPropina;

}