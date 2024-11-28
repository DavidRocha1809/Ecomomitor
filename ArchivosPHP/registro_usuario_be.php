<?php

    //Enlace con el archivo de la conexión
    include 'conexion_be.php';

    /*Extracción de los datos por método POST*/
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $query = "INSERT INTO user(Username, Email, Password)
              VALUES('$Username', '$Email', '$Password')";
    
    //Verificación de los datos de CORREO no se repitan en la BD
    $verificar_email = mysqli_query($conexion, "SELECT * FROM user WHERE Email='$Email' ");

    //Verificar si un Email se repite
    if(mysqli_num_rows($verificar_email) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro diferente")
                window.location = "../RegistrarCuenta.php"
            </script>
        ';
        exit();
    }

    //Verificación de los datos de USUARIO no se repitan en la BD
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM user WHERE Username='$Username' ");

    //Verifica si un usuario ya está registrado
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya está registrado, intenta con otro diferente")
                window.location = "../Inicio_de_sesion/Registro.php"
            </script>
        ';
        exit();
    }

    //Envio de datos mediante la conexión
    $ejecutar = mysqli_query($conexion, $query);

    /* Confirmación de registro exitoso */
    if($ejecutar){
        echo '
        <script>
            alert("Usuario registrado correctamente")
            window.location = "../Inicio_de_sesion/Inicio.php"
        </script>
        ';
    }else{
        echo '
        <script>
            alert("Usuario NO registrado correctamente, inténtelo de nuevo.")
            window.location = "../Inicio_de_sesion/Registro.php"
        </script>
        ';
    }

    //Cerrar la conexión
    mysqli_close($conexion);

?>