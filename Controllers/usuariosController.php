<?php
include_once(MODELS_PATH . "/usuariosModel.php");
include_once(MODELS_PATH . "/rolesModel.php");
session_start();

$usuarioModel = new UsuariosModel();

function authorizeUser($username, $rol)
{
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    $_SESSION["rol"] = $rol;

    header('location: ' . ROOT . '/index.php');
}

if (isset($_POST['registrar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $identity = new Identity($username, $password);

    if ($identity->register($rol)) {
        authorizeUser($username, $rol);
    } else {
        echo "Error al registrar el usuario.";
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $identity = new Identity($username, $password);

    if ($identity->validate()) {
        authorizeUser($username, $rol);
    } else {
        echo "Error al registrar el usuario.";
    }
}

function ObtenerTodos()
{
    global $usuarioModel;
    $usuarios = $usuarioModel->ObtenerTodos();

    for ($i = 0; $i < count($usuarios); $i++) {
        $rolModel = new RolModel();
        $roles = $rolModel->ObtenerRolesUsuario($usuarios[$i]["id_usuario"]);
        $rolesString = "<div>";

        for ($j = 0; $j < count($roles); $j++) {
            $rolesString .= '<p>'.  $roles[$j]["descripcion"]  . '</p>';
        }

        $rolesString .= "</div>";
        echo '
        <div class="usuario">
            <h3>Nombre de Usuario: ' . $usuarios[$i]["usuario"] . '</h3>
            ' . $rolesString . '
            <div class="opciones">
                <a href="' . ROOT . "/Views/usuarios?eliminar=" . $usuarios[$i]["id_usuario"]  . '" class="delete-usuario">
                    <i class="fa-solid fa-trash"></i>
                </a>
                <a href="' . ROOT . "/Views/usuarios/modificar.php?actualizar=" . $usuarios[$i]["id_usuario"]  . '" class="edit-usuario">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>';
    }
}

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $usuarioModel  ->Eliminar($id);
    header("Location: " . ROOT . "/Views/usuarios");
}

function Modificar() {
    global $usuarioModel;

    if (isset($_GET["actualizar"])) {
        $id = $_GET["actualizar"];
        $_POST["id"] = $id;
        return $usuarioModel->Obtener($id);
    }
}

if (isset($_POST["actualizarUsuario"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $descripcion = $_POST["descripcion"];
    $id = $_GET["actualizar"];
    $usuarioModel->Modificar($id, $usuario, $password, $descripcion); 
    header("Location: " . ROOT . "/Views/usuarios");
}
