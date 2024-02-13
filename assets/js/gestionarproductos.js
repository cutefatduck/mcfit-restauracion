let selectElement = document.getElementById("orden");
var elemento = document.getElementById('miElemento');
selectElement.addEventListener("change", function() {
    let selectedValue = selectElement.value;
    

    var allElements = document.querySelectorAll('.productos');
    for (var i = 0; i < allElements.length; i++) {
        if (!allElements[i].classList.contains(selectedValue)) {
            allElements[i].style.display = 'none';
        } else {
            allElements[i].style.display = '';
        }
        
        if(selectedValue == 0){
            allElements[i].style.display = '';
        }
    }
});
