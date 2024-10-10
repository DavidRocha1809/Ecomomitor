// Instalación: npx create-react-app blynk-monitoring

import React, { useState, useEffect } from "react";
import "./App.css";

function App() {
  const [temperature, setTemperature] = useState("Cargando...");
  const token = "TU_TOKEN_DE_BLYNK"; // Reemplaza con tu token
  const vPin = "V1"; // Pin virtual (V1)

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(
          `http://blynk-cloud.com/${token}/get/${vPin}`
        );
        const data = await response.json();
        setTemperature(`${data[0]} °C`);
      } catch (error) {
        setTemperature("Error al obtener datos");
      }
    };

    fetchData();
    const intervalId = setInterval(fetchData, 5000); // Actualizar cada 5 segundos

    return () => clearInterval(intervalId);
  }, [token, vPin]);

  return (
    <div className="App">
      <header className="App-header">
        <h1>Monitoreo de Cultivos</h1>
        <div className="widget">
          <h2>Temperatura del Suelo</h2>
          <p>{temperature}</p>
        </div>
      </header>
    </div>
  );
}

export default App;
