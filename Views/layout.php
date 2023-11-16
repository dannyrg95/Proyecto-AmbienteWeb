<?php 
    function MostrarHeader() {
        echo
        '    <!-- Navbar Start -->
        <a class="hamburger-menu close">
            <i class="fa-solid fa-bars"></i>
        </a>
        <header class="header">
            <div class="header-container">
        
                <nav class="header-navbar">
                <ul class="header-navbar-list">
                        
                        <li>
                            <a href="" class="">Project Management</a>
                        </li>
                        <li>
                            <a href="#" class="">Inicio</a>
                        </li>
                        <li>
                            <a href="#" class="">Tareas</a>                    
                        </li>
                        <li>
                            <a href="#" class="">Proyectos</a>  
                        </li>
                        <li>
                            <a href="#" class="">Empleados</a>  
                        </li>
                        
                        
                    </ul>
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