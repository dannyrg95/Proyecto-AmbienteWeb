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

        <label for="descripcion">Agregar Roles:</label>
        <select class="role-selector" name="descripcion">
            <option value="" disabled>Seleccione</option>
            <option value="Usuario">Usuario</option>
            <option value="Administrador">Administrador</option>
        </select>
        <button class="botones-roles-usuarios agregar" onclick="addRole(<?php echo $usuario['id_usuario']?>)" type="button">Agregar</button>
        
        <label for="descripcion">Eliminar Roles :</label>
        <select class="role-selector" name="descripcion">
            <option value="" disabled>Seleccione</option>
            <?php
                echo ObtenerRolesUsuarioOpciones($usuario["id_usuario"]);
            
            ?>
        </select>
        <button class="botones-roles-usuarios eliminar" onclick="deleteRole(<?php echo $usuario['id_usuario']?>)" type="button">Eliminar</button>
        
        <?php echo ObtenerRolesUsuario($usuario["id_usuario"]) ?>

        <button class="boton-usuarios"  type="submit" name="actualizarUsuario">Guardar</button>
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
    });

    
    function deleteRole(id) {
        const deleteSelection = document.querySelectorAll(".role-selector")[1];
        const role = deleteSelection.value;
        $.ajax({
            url: "<?php echo ROOT?>/api/rest/apiRest.php",
            method: "POST",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: "deleteRole=1&role=" + encodeURIComponent(role) + "&idUsuario=" + encodeURIComponent(id)
        }).done(function(response) {
            const result = JSON.parse(response);
            if (result.success) {
                location.reload();
            } 
        });
    }

    function addRole(id) {
        const deleteSelection = document.querySelectorAll(".role-selector")[0];
        const role = deleteSelection.value;
        $.ajax({
            url: "<?php echo ROOT?>/api/rest/apiRest.php",
            method: "POST",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: "addRole=1&role=" + encodeURIComponent(role) + "&idUsuario=" + encodeURIComponent(id)
        }).done(function(response) {
            const result = JSON.parse(response);
            if (result.success) {
                location.reload();
            } 
        });
    }

</script>

</script>

</html>