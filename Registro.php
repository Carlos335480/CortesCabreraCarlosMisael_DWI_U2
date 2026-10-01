<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel = "stylesheet" href = "assets/css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@500&family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_GET['error'])): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo htmlspecialchars($_GET['error']); ?>',
            showConfirmButton: false,
            confirmButtonColor: '#d33',
            timer: 3000,
            timerProgressBar: true
        });

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    </script>
    <?php endif; ?>

    <?php if (isset($_GET['exito'])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '<?php echo htmlspecialchars($_GET['exito']); ?>',
            confirmButtonColor: '#28a745',
            timer: 3000,
            timerProgressBar: true
        });
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    </script>
    <?php endif; ?>

    <div class = "container">
        <div class = "lado-izquierdo">
        </div>
        
        <div class = "lado-derecho">
            <h1 > Registro</h1>
            <form method="post">
                <div class="grupo">

                    <div class = "input-icon">
                        <input name = "nameuser" id = "nameuser" type = "text" placeholder = "Nombre de Usuario">
                        <i class = "fa-solid fa-user"></i>
                    </div>

                    <div class = "input-icon">
                        <input name = "name" id = "name" type = "text" placeholder = "Nombre">
                        <i class = "fa-solid fa-address-card"></i>
                    </div>

                    <div class = "input-icon">
                        <input name = "email" id = "email" type = "email" placeholder = "Correo">
                        <i class = "fa-solid fa-envelope"></i>
                    </div>

                    <div class = "input-icon">
                        <input name = "password" id = "password" type = "password" placeholder = "Contraseña">
                        <i class = "fa-solid fa-key"></i>
                    </div>

                    <div class="input-icon">
                        <img src="../captcha.php" alt="Captcha" 
                            style="margin-bottom:10px; border:2px solid #fff; border-radius:5px; width:100%;">
                        <input type="text" name="captcha" placeholder="Escribe el texto de la imagen" required>
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <button type = "submit" formaction = "controllers/guardar_usuario.php">Registrar</button>
                    <p class = "texto-extra">¿Ya tienes cuenta?&nbsp;<a href = "index.php" class = "link-login">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>

    </div>
</body>
</html>