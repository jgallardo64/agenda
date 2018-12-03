<!doctype html>
<html>
    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
        <meta charset="UTF-8">
        <title>Registro de contactos</title>
    </head>

    <body>
        <header>
        </header>
        <div id="registro" align="center">
            <?php

            $errorNombre = $errorPrimerApellido = $errorSegundoApellido = $errorTelefono = $nombre = $primerApellido = $segundoApellido = $telefono = '';

            if ($_POST) {
                $errores = 0;

                if (empty($_POST['nombre'])) {
                    $errorNombre = " El nombre es obligatorio";
                    $errores++;
                } else {
                    $nombre = $_POST['nombre'];
                }

                if (empty($_POST['primerApellido'])) {
                    $errorPrimerApellido = " El primer apellido es obligatorio";
                    $errores++;
                } else {
                    $primerApellido = $_POST['primerApellido'];
                }

                if (empty($_POST['segundoApellido'])) {
                    $errorSegundoApellido = " El segundo apellido es obligatorio";
                    $errores++;
                } else {
                    $segundoApellido = $_POST['segundoApellido'];
                }

                if (empty($_POST['telefono'])) {
                    $errorTelefono = " El telefono es obligatorio";
                    $errores++;
                } else {
                    $telefono = $_POST['telefono'];
                }
            }

            if (!$_POST || $errores > 0) {

                $dwes = new mysqli('localhost', 'Jorge', '9NY7m7b3QmGU8us9', 'agenda');
                if ($dwes->connect_errno != null) {
                    echo "ERROR: " . $dwes->connect_error;
                    exit();
                }

                if (isset($_GET['editar']) == 1) {

                    $consulta = $dwes->stmt_init();
                    $consulta->prepare('SELECT nombre, primerApellido, segundoApellido, telefono FROM contactos WHERE idContacto=' . $_GET['id']);
                    $consulta->execute();
                    $consulta->bind_result($nombre, $primerApellido, $segundoApellido, $telefono);

                    while ($consulta->fetch()) {
                        echo
                        "<h1>Actualizar contacto</h1>
                        <form name=\"input\" action=\"#\" method=\"post\">
                        <span class=\"error\">* Campos requeridos</span><br><br>
                        Nombre: <input type=\"text\" name=\"nombre\" id=\"nombre\" value=\"$nombre\">
                        <span class=\"error\">*" . $errorNombre . "</span><br><br>
                        Primer Apellido: <input type=\"text\" name=\"primerApellido\" value=\"$primerApellido\">
                        <span class=\"error\">*" . $errorPrimerApellido . "</span><br><br>
                        Segundo Apellido: <input type=\"text\" name=\"segundoApellido\" value=\"$segundoApellido\">
                        <span class=\"error\">*" . $errorSegundoApellido . "</span><br><br>
                        Telefono: <input type=\"number\" name=\"telefono\" value=\"$telefono\">
                        <span class=\"error\">*" . $errorTelefono . "</span><br><br>
                        <input type=\"submit\"><br><br>
                        </form>";
                    }
                } else if (isset($_GET['borrar']) == 1) {

                    $consulta = $dwes->stmt_init();
                    $consulta->prepare('DELETE FROM contactos WHERE idContacto=' . $_GET['id']);
                    $consulta->execute();
                    sleep(1);
                    header('Location: nuevoContacto.php');
                } else {
                    echo
                    "<h1>Formulario inserción contactos</h1>
                    <form name=\"input\" action=\"#\" method=\"post\">
                    <span class=\"error\">* Campos requeridos</span><br><br>
                    Nombre: <input type=\"text\" name=\"nombre\" id=\"nombre\" value=\"$nombre\">
                    <span class=\"error\">*" . $errorNombre . "</span><br><br>
                    Primer Apellido: <input type=\"text\" name=\"primerApellido\" value=\"$primerApellido\">
                    <span class=\"error\">*" . $errorPrimerApellido . "</span><br><br>
                    Segundo Apellido: <input type=\"text\" name=\"segundoApellido\" value=\"$segundoApellido\">
                    <span class=\"error\">*" . $errorSegundoApellido . "</span><br><br>
                    Telefono: <input type=\"number\" name=\"telefono\" value=\"$telefono\">
                    <span class=\"error\">*" . $errorTelefono . "</span><br><br>
                    <input type=\"submit\"><br><br>
                    </form>";

                    $consulta = 'SELECT idContacto, nombre, primerApellido FROM contactos';
                    $resultado = $dwes->query($consulta);
                    $contactos = $resultado->fetch_object();
                    while ($contactos != null) {
                        echo $contactos->nombre . ' ' . $contactos->primerApellido . ' <a href=nuevoContacto.php?id=' . $contactos->idContacto . '&borrar=' . 1 . '"><img src="css/delete.png" alt="borrar" width="15px" height="15px"></a> <a href="nuevoContacto.php?id=' . $contactos->idContacto . '&editar=' . 1 . '"><img src="css/edit.png" alt="editar" width="15px" height="15px"></a><br>';
                        $contactos = $resultado->fetch_object();
                    }
                }
            } else {
                $dwes = new mysqli('localhost', 'Jorge', '9NY7m7b3QmGU8us9', 'agenda');
                if ($dwes->connect_errno != null) {
                    echo "ERROR: " . $dwes->connect_error;
                    exit();
                }

                if (isset($_GET['editar']) == 1) {
                    $consulta = $dwes->stmt_init();
                    $consulta->prepare('UPDATE contactos SET nombre = ?, primerApellido = ?, segundoApellido = ?, telefono = ? WHERE idContacto =' . $_GET['id']);
                    $consulta->bind_param('sssi', $_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['telefono']);
                    $consulta->execute();
                    sleep(1);
                    header('Location: nuevoContacto.php');
                } else {
                    $consulta = "INSERT INTO contactos VALUES (NULL, '" . $_POST['nombre'] . "','" . $_POST['primerApellido'] . "','" . $_POST['segundoApellido'] . "','" . $_POST['telefono'] . "')";
                    if ($dwes->query($consulta) === true) {
                        echo "<p><h1>El contacto se ha insertado con éxito<h1></p>";
                        sleep(1);
                        header('Location: nuevoContacto.php');
                        $dwes->close();
                    } else {
                        echo "ERROR: " . $dwes->error;
                    }
                }
            }
            ?>
        </div>
    </body>
</html>