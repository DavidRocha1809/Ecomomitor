// URLs de la API de Blynk
const API_URLS = {
    humidity: "https://blynk.cloud/external/api/get?token=rODJTD_Nd1gnUBs37VcjPn4JsBWhBgpn&V0",
    temperature: "https://blynk.cloud/external/api/get?token=rODJTD_Nd1gnUBs37VcjPn4JsBWhBgpn&V1",
    purity: "https://blynk.cloud/external/api/get?token=rODJTD_Nd1gnUBs37VcjPn4JsBWhBgpn&V2"
};

// Selección de elementos HTML
const measurementTitle = document.getElementById("measurement-title");
const measurementValue = document.getElementById("measurement-value");
const doughnutCtx = document.getElementById("measurement-doughnut").getContext("2d");

// Configurar la gráfica de dona
const doughnutChart = new Chart(doughnutCtx, {
    type: "doughnut", // Tipo de gráfica
    data: {
        labels: ["Medida Actual", "Resto"], // Etiquetas para los segmentos
        datasets: [{
            data: [0, 100], // Valores iniciales
            backgroundColor: ["#66c2a5", "#444"], // Colores de los segmentos
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: "bottom"
            }
        },
        cutout: "70%" // Tamaño del agujero central
    }
});

// Función para actualizar los datos de la gráfica
function updateDoughnutChart(chart, value) {
    chart.data.datasets[0].data[0] = value; // Actualiza el valor actual
    chart.data.datasets[0].data[1] = 100 - value; // Actualiza el "resto"
    chart.update(); // Refresca la gráfica
}

// Función para obtener y actualizar los datos de la medida seleccionada
async function fetchData(type) {
    try {
        const response = await fetch(API_URLS[type]);
        const data = await response.text();
        const numericValue = parseFloat(data);

        // Actualiza el widget y la gráfica
        updateWidgets(type, numericValue);
        updateDoughnutChart(doughnutChart, numericValue);
    } catch (error) {
        console.error("Error al obtener los datos:", error);
    }
}

// Función para mostrar la medida seleccionada
function showMeasurement(type) {
    measurementTitle.innerText = capitalize(type);
    fetchData(type);
}

// Actualizar el widget numérico
function updateWidgets(type, value) {
    measurementValue.innerText = `Valor: ${value}`;
}

// Función de capitalización
function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

// Actualización automática cada 10 segundos
setInterval(() => {
    const selectedType = measurementTitle.innerText.toLowerCase();
    if (selectedType) {
        fetchData(selectedType);
    }
}, 10000);
