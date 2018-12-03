<?php

require_once('contacto.inc.php');

class Agenda {   
    
    private static $contactos = array();
    
    public function addContacto($contacto) {
        SELF::$contactos[]=$contacto;
    }
    
    public function obtenerContacto($id) {
        foreach (SELF::$contactos as $clave => $valor) {
            if ($valor!=null) {
                if ($valor->getIdContacto()==$id) {
                    return SELF::$contactos[$clave]->aCadena();
                }
            }
        }        
    }
    
    public function borrarContacto($id) {
        foreach (SELF::$contactos as $clave => $valor) {
            if ($valor->getIdContacto()==$id) {
                SELF::$contactos[$clave]=null;
            }
        }
    }
    
    public function mostrarContactos() {
        foreach (SELF::$contactos as $valor) {
            if ($valor!=null) {
            $valor->aCadena();
            }
        }
    }
    
}



