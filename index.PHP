<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoMonitor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sección superior -->
    <header>
        <h1>EcoMonitor</h1>
        <img src="Ecomonitor.png" alt="Logo de EcoMonitor">
    </header>

    <!-- Contenedor para aside y main -->
    <div class="container">
        <!-- Barra de navegación derecha -->
        <aside>
            <h2>Seleccionar Medición</h2>
            <button onclick="showMeasurement('humidity')">Humedad</button>
            <button onclick="showMeasurement('temperature')">Temperatura</button>
            <button onclick="showMeasurement('purity')">Pureza</button>
            <h2>API Extra</h2>
            <a href="cultivos.html" style="text-decoration: none; color: white;"><button onclick="showApi1Data()">Guía de Cultivos</button></a>
            <h2>Usuario</h2>
            <a style="text-decoration: none; color: white;" href="Inicio_de_sesion/Inicio.php"><button >
            
            <?php
                if(!isset($_SESSION['Email'])){
                    echo 'Inicio de Sesión';
                } else{
                    echo 'Perfil';
                }
            ?>
        </aside>

        <!-- Área principal para los widgets -->
        <main id="data-display">
            <div id="widget">
                <h2 id="measurement-title">Medida Seleccionada</h2>
                <p id="measurement-value">Valor: --</p>
                <canvas id="measurement-doughnut" width="400" height="400"></canvas>
            </div>
            
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>
