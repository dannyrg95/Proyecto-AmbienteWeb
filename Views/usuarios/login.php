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
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>  
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
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
</script>

</html>