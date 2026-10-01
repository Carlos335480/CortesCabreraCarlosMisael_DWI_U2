<?php
session_start();
require_once __DIR__ . "/../config/conexion.php";


if (!isset($_POST['captcha']) || strtolower ($_POST['captcha']) !== strtolower ($_SESSION['captcha_text'])){
    header("Location: ../registro.php?error=Captcha incorrecto");
    exit();
}

$email    = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT id, nameuser, name, email, password
        FROM usuarios
        WHERE email = ?";

$params = array($email);

$stmt = sqlsrv_prepare($conn, $sql, $params);

if ($stmt && sqlsrv_execute($stmt)) {
 
    $usuario = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($usuario) {

        if (password_verify($password, $usuario['password'])) {

            $_SESSION['usuario'] = $usuario;

            header("Location: ../controllers/obtener_inventario.php?Inventario");
            exit();
        }

        header("Location: ../index.php?error=Contraseña incorrecta");
        exit();

    } else {

        header("Location: ../index.php?error=Usuario no encontrado");
        exit();
    }

} else {

    die(print_r(sqlsrv_errors(), true));
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>