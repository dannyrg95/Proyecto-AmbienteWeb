<?php
    include("../../global.php");
    include(VIEWS_PATH . "/layout.php");
    include(CONTORLLERS_PATH . "/usuariosController.php");

    if(isset($_POST['rol']))
    {
        $rol = $_POST['rol']; 
    }
?>

<!DOCTYPE html>
<html>
<?php MostrarHead("Login") ?>

<body>
    <?php MostrarHeader() ?>
    <form class="form-usuarios" method="post">
        <h2>Inicio de Sesión</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>  
        <label for="password">Contraseña:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <i class="eye fa-sharp fa-solid fa-eye-slash"></i>
        </div>
        <input type="hidden" id="rol" name="rol" value="<?php echo $rol ?>" >
        <button type="submit" id="login" name="login" class="boton-usuarios">Iniciar Sesión</button>
    </form>
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