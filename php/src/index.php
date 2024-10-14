<?php
$users = [
    'Aaron' => '1234'
];

foreach ($users as $name => $password) {
    $users[$name] = password_hash($password, PASSWORD_BCRYPT);
}

session_start();

if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header("Location: ./juegos.php");
    exit();
}

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (isset($users[$name]) && password_verify($password, $users[$name])) {
        $_SESSION['user'] = $name;

        if (isset($_POST['remember'])) {
            setcookie('user', $name, time() + (86400 * 30), "/"); 
        }

        header("Location: ./juegos.php");
        exit();
    } else {
        echo "Nombre o contraseña incorrectos.";
    }
}
?>

<form method="post">
    Nombre: <input type="text" name="name" required>
    Contraseña: <input type="password" name="password" required>
    <label>
        <input type="checkbox" name="remember"> Recordar-me
    </label>
    <button type="submit" name="login">Login</button>
</form>
