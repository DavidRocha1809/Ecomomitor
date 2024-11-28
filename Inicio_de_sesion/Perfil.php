<?php
        session_start();

        //si en la sesión no se encontró un usuario activo, mandar mensade de error(NO PERMITIR VER LA PÁGINA)
        if(!isset($_SESSION['Email'])){
            echo '
                <script>
                    alert("Por favor, debes iniciar sesión")
                    window.location = "Inicio.php"
                </script>
            ';
            session_destroy();
            die();
        }
        /*
        if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'admin') {
            echo 'Hello world';
        }*/
        //Extracción de tipo de usuario
        $UserType = $_SESSION['UserType'];
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoMonitor</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!--<script src="main.js"></script>
     Sección superior -->
    <header>
        <h1>EcoMonitor</h1>
        <img src="../ECOMONITOR.png" alt="Logo de EcoMonitor">
    </header>

    <!-- Contenedor para aside y main -->
    <div class="container">
        <!-- Barra de navegación derecha -->
        <!-- Barra de navegación derecha -->
        <aside>
            <a href="../index.PHP"><button>Inicio</button></a>
            <h2>Usuario</h2>
            <button ><a style="text-decoration: none; color: white;" href="Inicio_de_sesion/Inicio.php">
                
            <?php

                if(!isset($_SESSION['Email'])){
                    echo 'Inicio de Sesión';
                } else{
                    echo 'Perfil';
                }

            ?>

            </a></button>
           
        </aside>


        <!-- Área principal para los widgets -->
        <main id="data-display">
            <h3>Bienvenido <?php echo $_SESSION['Username']; ?> !</h3>
            <br><br>
            <h2>Correo: <?php echo $_SESSION['Email']; ?> </h2>
            <a href="../ArchivosPHP/cerrar_sesion.php">Cerrar Sesión</a>
        </main>

        
    </div>

    <script src="../script.js"></script>
    <script src="../main.js"></script>
</body>
</html>
