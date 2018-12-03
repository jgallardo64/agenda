<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar contactos</title>
    </head>

    <body>
        <?php
        $dwes = new mysqli('localhost', 'Jorge', '9NY7m7b3QmGU8us9', 'agenda');
        if ($dwes->connect_errno != null) {
            echo "ERROR: " . $dwes->connect_error;
            exit();
        }
        $consulta = "DELETE FROM contactos WHERE idContacto=" . $_GET['id'] . ";";
        $resultado = $dwes->query($consulta);
        sleep(3);
        header('Location: nuevoContacto.php');
        ?>
        <header>
        </header>
    </body>
</html>