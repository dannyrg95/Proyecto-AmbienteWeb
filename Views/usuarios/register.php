<?php
    include("../../global.php");
    include(VIEWS_PATH . "/layout.php");
    include(CONTORLLERS_PATH . "/usuariosController.php");
?>
<!DOCTYPE html>
<html>
<?php MostrarHead("Registro") ?>

<body>
    <?php MostrarHeader() ?>
        
        <form class="form-usuarios"  method="post">
            <h2>Registro de Usuario</h2>
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="rol">Rol:</label>
            <select id="rol" name="rol">
                <option value="usuario">Usuario</option>
                <option value="admin">Admin</option>
            </select>

            <button class="boton-usuarios" type="submit" name="registrar">Registrar</button>
        </form>
    </div>




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