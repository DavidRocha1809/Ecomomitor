<?php

    session_start();

    include 'conexion_be.php';
    
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Validar login de usuario
    $validar_login = mysqli_query($conexion, "SELECT * FROM user WHERE Email='$Email' and Password='$Password'");

    // Buscando usuario
    if (mysqli_num_rows($validar_login) > 0) {
        $user = mysqli_fetch_assoc($validar_login);

        $_SESSION['Email'] = $user['Email'];
        $_SESSION['Username'] = $user['Username'];
        $_SESSION['UserType'] = 'user'; // Guardar el tipo de usuario en la sesión
        header("location: ../index.php");
        exit();
    } else {
        echo '
            <script>
                alert("El usuario o contraseña son incorrectos, por favor verifique los datos introducidos");
                window.location = "../Inicio_de_sesion/Inicio.php";
            </script>
        ';
        exit();
    }

    


?>