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
        console.error('Error:', error);
    });
}


async function retrieveQRData(data) {
    localStorage.setItem('QR', data);
    var retrievedData = localStorage.getItem('QR');
    const apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data='+encodeURIComponent(retrievedData);

    try {
        const imgElement = document.createElement('img');
        imgElement.src = apiUrl;
        document.getElementById('qr').appendChild(imgElement);
    } catch (error) {
        console.error('Error retrieving QR code data:', error);
    }
}

