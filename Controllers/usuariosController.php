<?php
include_once(MODELS_PATH . "/usuariosModel.php");
include_once(MODELS_PATH . "/rolesModel.php");
session_start();

$usuarioModel = new UsuariosModel();

function authorizeUser($username, $roles)
{
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    $_SESSION["roles"] = $roles;

    header('location: ' . ROOT . '/index.php');
}

if (isset($_POST['registrar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];

    $identity = new Identity($correo, $password);

    if ($identity->register($username)) {
        authorizeUser($username, $identity->getRoles());
    } else {
        echo "Error al registrar el usuario.";
    }
}

if (isset($_POST['login'])) {
    $correo = $_POST['email'];
    $password = $_POST['password'];
    echo $correo;

    $identity = new Identity($correo, $password);

    if ($identity->validate()) {
        authorizeUser($identity->Obtener()["usuario"], $identity->getRoles());
    } else {
        echo "Error al registrar el usuario.";
    }
}

function ObtenerRolesUsuario($usuario) {
    $rolModel = new RolModel();
        $roles = $rolModel->ObtenerRolesUsuario($usuario);
        $rolesString = "<ul class='roles'><p>Roles:</p>";

        for ($j = 0; $j < count($roles); $j++) {
            $rolesString .= '<li>'.  $roles[$j]["descripcion"]  . '</li>';
        }

        $rolesString .= "</ul>";
        return $rolesString;
}

function ObtenerRolesUsuarioOpciones($usuario) {
    $rolModel = new RolModel();
        $roles = $rolModel->ObtenerRolesUsuario($usuario);
        $rolesString = "";

        for ($j = 0; $j < count($roles); $j++) {
            $rolesString .= '<option value="' . $roles[$j]["descripcion"]  .  '">' .  $roles[$j]["descripcion"]  . '</option>';
        }

        
        return $rolesString;
}


function ObtenerTodos()
{
    global $usuarioModel;
    $usuarios = $usuarioModel->ObtenerTodos();

    for ($i = 0; $i < count($usuarios); $i++) {
        $rolesString = ObtenerRolesUsuario($usuarios[$i]["id_usuario"]);
        echo '
        <div class="usuario">
            <h3>Nombre: ' . $usuarios[$i]["usuario"] . '</h3>
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


function verificarToken($token) {
    $usuario = UsuariosModel::verificarToken(strval($token));
    
    return '
    <div class="usuario-activo">
        ' . ($usuario ? '<h1>La cuenta con el correo fue activada exitósamente</h1>' : '<h1>No se pudo activar la cuenta</h1>') . '
        <a href="' . ROOT  .'"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    </div>';
   
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
    $id = $_GET["actualizar"];
    $usuarioModel->Modificar($id, $usuario, $password); 
    header("Location: " . ROOT . "/Views/usuarios");
}
