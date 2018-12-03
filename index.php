<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="nuevocontacto.php">Insertar contacto</a><br>
        <?php
        include('contacto.inc.php');
        include('agenda.inc.php');
        
        //Creamos un objeto agenda
        $miAgenda = new Agenda();
        
        //Construimos los 3 contactos
        $contacto1 = new Contacto(001, "Jorge", "Gallardo", "Garcia", 664365766);
        $contacto2 = new Contacto(002, "David", "Jimenez", "Bonora", 654782478);
        $contacto3 = new Contacto(003, "Eva", "Redondo", "Calero", 654824579);
        
        //Añadimos todos los contactos a la agenda
        $miAgenda->addContacto($contacto1);
        $miAgenda->addContacto($contacto2);
        $miAgenda->addContacto($contacto3);
        
        //Mostramos todos los contactos de la agenda
        $miAgenda->mostrarContactos();
        
        echo "----------------------------<br><br>";
        
        //Borramos el primer contacto pasandole la id al metodo
        $miAgenda->borrarContacto(3);
        
        //Volvemos a mostrar todos los contactos de la agenda para comprobar que se ha borrado correctamente
        $miAgenda->mostrarContactos();
        
        echo "----------------------------<br><br>";
        
        $miContacto=$miAgenda->obtenerContacto(1);

        ?>
    </body>
</html>
