fetch('cultivos.json')
    .then(response => response.json())
    .then(data => {
        const listaCultivos = document.getElementById('lista-cultivos');
        // Asegúrate de acceder al array correcto
        const cultivos = data.query; // Acceder al array de cultivos

        cultivos.forEach(cultivo => {
            const tarjeta = document.createElement('div');
            tarjeta.classList.add('tarjeta'); // Añadir la clase de tarjeta

            // Crear el contenido de la tarjeta
            tarjeta.innerHTML = `
                <img src="${cultivo.thumbnail_url}" alt="${cultivo.name}">
                <h3>${cultivo.name}</h3>
                <p>${cultivo.description ? cultivo.description : 'Descripción no disponible'}</p>
            `;

            listaCultivos.appendChild(tarjeta);
        });
    })
    .catch(error => console.error('Error al cargar el archivo JSON:', error));
