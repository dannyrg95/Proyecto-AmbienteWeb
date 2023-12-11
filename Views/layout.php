<?php 
    function MostrarHeader() {
        echo '
        <!-- Navbar Start -->
        <a class="hamburger-menu close">
            <i class="fa-solid fa-bars"></i>
        </a>
        <header class="header">
            <div class="header-container">
        
                <nav class="header-navbar">
                    <ul class="header-navbar-list">
                            
                        <li>
                            <a href="' . ROOT . '/' . '" class="">Project Management</a>
                        </li>
                        <li>
                            <a href="' . ROOT . '/' . '" class="">Inicio</a>
                        </li>
                        <li>
                            <a href="#" class="">Tareas</a>                    
                        </li>
                        <li>
                            <a href="' . ROOT . '/Views/proyectos'  . '" class="">Proyectos</a>                   
                        </li>
                        <li>
                            <a href="' . ROOT . '/Views/empleados' . '" class="">Empleados</a>  
                        </li>';

                        // Verificar si el usuario ha iniciado sesión
                        if (isset($_SESSION['roles'])) {
                            // if (in_array("Administrador", $_SESSION['roles']))
                            echo '<li>
                                    <a href="' . ROOT . '/Views/usuarios" class="">Usuarios</a>  
                                </li>';
                        }
                    echo '</ul>
                    
                    <ul class="sign-in-up">';

        if (isset($_SESSION['loggedIn']) && isset($_SESSION["username"])){
            echo '
                <li class="logout-header">
                    <a href="' . ROOT . '/logout.php' . '">
                        ' . $_SESSION["username"] . '
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </li>';
        } else {
            echo '<li>
            <a href="' . ROOT . '/Views/usuarios/login.php' . '">Iniciar Sesión</a>
            </li>
            <li>
            <a href="' . ROOT . '/Views/usuarios/register.php' . '">Registrarse</a>
            </li>';
        }

        echo '</ul>
                </nav>
            </div>
        </header>
        
        <!-- Navbar End -->';
    }

    function MostrarHead($title) {
        echo '
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="'. ROOT . "/styles/main.css" . '" rel="stylesheet">
                <script src="https://kit.fontawesome.com/686814a22f.js" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <title>' . $title . '</title>
            </head>';
    }


    function MostrarFooter() {
        echo '
            <footer>
                <p>CopyRight Grupo 6 programación ambiente web cliente/servidor</p>
            </footer>
        ';
    }

?>