<?php
    include("../../global.php");
    include(VIEWS_PATH . "/layout.php");
    include(CONTORLLERS_PATH . "/usuariosController.php");
?>

<!DOCTYPE html>
<html>
<?php MostrarHead("Login") ?>

<body>
    <?php MostrarHeader() ?>
    <form class="form-rol" method="post" action="<?php echo ROOT ?>/Views/usuarios/login.php">
        <h2>Seleccione el Rol</h2>
        <div class="buton-select-rol">
            <button type="submit" name="rol" value="usuario" class="role-btn">
                <i class="fas fa-user role-icon"></i>
                User
            </button>
            <button type="submit" name="rol" value="admin" class="role-btn">
                <i class="fas fa-cogs role-icon"></i>
                Admin
            </button>
        </div>
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