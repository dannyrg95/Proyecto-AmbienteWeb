<?php
    include_once("../../global.php");
    include_once(CONTORLLERS_PATH . "/usuariosController.php");
    include_once(VIEWS_PATH . '/layout.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php MostrarHead('Activar Usuario');?>
<body>
 <?php MostrarHeader();?>
    
    <?php echo verificarToken(trim($_GET["token"]))?>

    <?php MostrarFooter();?>
</body>
</html>