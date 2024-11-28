
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleR.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Registro</title>

</head>

<body>

    <div class="back-arrow">
        <a href="../index.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    


    <!--  //////////////////////////// -CONTENIDO PRINCIPAL- ////////////////////////////  -->
<div class="container">
    <h1>Regístrate</h1>
    <form action="../ArchivosPHP/registro_usuario_be.php" method="post" id="registro">
        <div class="row">
            <div class="col">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="Username" placeholder="Introduce tu nombre" maxlength="35" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="Email" placeholder="Introduce tu correo electrónico" maxlength="45" required>
            </div>
        </div>
        
        <!-- Campo para mostrar la contraseña generada y botón para generarla -->
        <div class="row">
            <div class="col">
                <label for="generatedPassword">Contraseña Generada</label>
                <input type="text" id="generatedPassword" readonly>
                
            </div>
        </div>
        <button type="button" class="generate" onclick="generatePassword()">Generar Contraseña</button>

        <div class="row">
            <div class="col">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="Password" placeholder="Introduce la contraseña"
                       pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&/-+\])[A-Za-z\d@$!%*#?&/-+\]{8,}$"
                       title="La contraseña debe tener al menos 8 caracteres, incluir una letra, un número y un carácter especial"
                       minlength="8" maxlength="20" required>
            </div>
        </div>

        <p>La contraseña debe tener al menos 8 caracteres, incluir una letra, un número y un carácter especial ( @$!%*#?&/-+\ ).</p>
        
        <button type="submit" action="./Inicio.php">Enviar</button>
    </form>
</div>


<!--  Script de generar password  -->
<script>
    function generatePassword() {
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@$!%*#?&/-+";
        let password = "";
        for (let i = 0; i < 12; i++) {  // Puedes cambiar la longitud de la contraseña aquí
            password += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        document.getElementById("generatedPassword").value = password;
        document.getElementById("password").value = password;  // Asigna la contraseña generada al campo de contraseña
    }
</script>


</body>

</html>
