<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Validación PHP</title>
</head>
<body>

<?php
// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Array para almacenar los errores
    $errores = [];

    // Validar nombre
    if (empty($_POST['nombre'])) {
        $errores[] = "El nombre es obligatorio.";
    }

    // Validar email
    if (empty($_POST['email'])) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email es incorrecto.";
    }

    // Función para validar la complejidad de la contraseña
    function validarComplejidad($password) {
        if (strlen($password) < 8) {
            return "La contraseña debe tener al menos 8 caracteres.";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return "La contraseña debe contener al menos una letra mayúscula.";
        }
        if (!preg_match('/[a-z]/', $password)) {
            return "La contraseña debe contener al menos una letra minúscula.";
        }
        if (!preg_match('/[0-9]/', $password)) {
            return "La contraseña debe contener al menos un número.";
        }
        if (!preg_match('/[\W]/', $password)) {
            return "La contraseña debe contener al menos un carácter especial.";
        }
        return true;
    }

    // Validar contraseña
    if (empty($_POST['password'])) {
        $errores[] = "La contraseña es obligatoria.";
    } else {
        $validacionPassword = validarComplejidad($_POST['password']);
        if ($validacionPassword !== true) {
            $errores[] = $validacionPassword;
        }
    }

    // Validar coincidencia de contraseñas
    if ($_POST['password'] !== $_POST['password_confirmacion']) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Mostrar errores o procesar formulario
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        echo "<p style='color: green;'>Formulario válido, procesando datos...</p>";
        // Aquí podrías procesar los datos, como guardarlos en una base de datos
    }
}
?>

<!-- Formulario HTML -->
<form method="POST" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
    <br><br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    <br><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br><br>

    <label for="password_confirmacion">Confirmar Contraseña:</label>
    <input type="password" name="password_confirmacion" id="password_confirmacion">
    <br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
