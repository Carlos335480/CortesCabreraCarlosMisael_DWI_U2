<?php
session_start();
require_once __DIR__ . "/../config/conexion.php";

if (!isset($_POST['captcha']) || strtolower ($_POST['captcha']) !== strtolower ($_SESSION['captcha_text'])){
    header("Location: ../registro.php?error=Captcha incorrecto");
    exit();
}

$nameuser = trim($_POST['nameuser']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$camposVacios = 0;

if (empty($nameuser)) $camposVacios++;
if (empty($name)) $camposVacios++;
if (empty($email)) $camposVacios++;
if (empty($password)) $camposVacios++;

if ($camposVacios > 1) {
    header("Location: ../registro.php?error=Todos los campos son obligatorios");
    exit();
} else if (empty($nameuser)) {
    header("Location: ../registro.php?error=El nombre de usuario es obligatorio");
    exit();
} else if (empty($name)) {
    header("Location: ../registro.php?error=El nombre es obligatorio");
    exit();
} else if (empty($email)) {
    header("Location: ../registro.php?error=El correo es obligatorio");
    exit();
} else if (empty($password)) {
    header("Location: ../registro.php?error=La contraseña es obligatoria");
    exit();
} else {

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nameuser, name, email, password) VALUES (?, ?, ?, ?)";
    
    $params = array($nameuser, $name, $email, $passwordHash);
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        header("Location: ../index.php?exito=Usuario guardado con éxito");
        exit();
    } else {
        header("Location: ../registro.php?error=Error al guardar el usuario");
        exit();
    }

}
?>
