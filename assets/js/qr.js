document.addEventListener('DOMContentLoaded', function () {
    axiosData();
});

function axiosData(){
    axios.get('http://localhost/testmunoz/restaurante/index.php', {
        params: {
            controller: 'api',
            action: 'recuperarPedido'
        }
    })
    .then(response => {
        data = response.data;
        retrieveQRData(data);
        console.log(data);
    })
    .catch(error => {
        // Handle error
        console.error('Error:', error);
    });
}


// Function to retrieve data from QR code API
async function retrieveQRData(data) {
    const apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data='+encodeURIComponent(data);

    try {
        const imgElement = document.createElement('img');
        imgElement.src = apiUrl;
        document.getElementById('qr').appendChild(imgElement);
    } catch (error) {
        console.error('Error retrieving QR code data:', error);
    }
}

