<?php
include("../../global.php");
include_once(CONTORLLERS_PATH . "/usuariosController.php");
include_once(VIEWS_PATH . "/layout.php");
$usuario = Modificar();

?>
<!DOCTYPE html>
<html lang="en">
<?php MostrarHead("Modificar Usuarios") ?>

<body>
    <?php MostrarHeader() ?>
    <form class="form-usuarios" method="post">
        <a href="<?php echo ROOT . "/Views/usuarios/" ?>" class="atras">
            <i class="fa-solid fa-arrow-left"></i>
            Atrás
        </a>
        <h2>Modificar Usuario</h2>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario['usuario']; ?>" required>

        <label for="password">Contraseña:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" value="<?php echo $usuario['password']; ?>" required>
            <i class="eye fa-sharp fa-solid fa-eye-slash"></i>
        </div>

        <!-- <label for="descripcion">Roles:</label>
        <select id="descripcion" name="descripcion">
            <option value="" <?php echo empty($usuario['rol_descripcion'] == 'Usuario') ? 'selected' : ''; ?> disabled>Nuevo Rol</option>
            <option value="usuario" <?php echo ($usuario['rol_descripcion'] == 'Usuario') ? 'selected' : ''; ?>>Usuario</option>
            <option value="admin" <?php echo ($usuario['rol_descripcion'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
        </select> -->

        <button class="boton-usuarios" type="submit" name="actualizarUsuario">Actualizar</button>
    </form>

    <?php MostrarFooter() ?>
</body>

<script>
    const burger = document.querySelector(".hamburger-menu");
    burger.addEventListener("click", () => {
        if (burger.classList.contains("close")) {
            burger.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        } else {
            burger.innerHTML = '<i class="fa-solid fa-bars"></i>'
        }

        burger.classList.toggle("close");
    })

    
    const closeEye = document.querySelector(".eye");
    const password = document.querySelector("#password");
    closeEye.addEventListener("click", () => {
        if (closeEye.classList.contains("fa-eye-slash")) {
            closeEye.classList.replace("fa-eye-slash", "fa-eye");
            password.setAttribute("type", "text");
        } else {
            closeEye.classList.replace("fa-eye", "fa-eye-slash");
            password.setAttribute("type", "password");
        }
    })

</script>

</html>