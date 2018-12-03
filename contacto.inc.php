<?php

class Contacto {
    
    private $idContacto=0;
    private $nombre="";
    private $apellido1="";
    private $apellido2="";
    private $telefono=0;

    public function __construct($idContacto, $nombre, $apellido1, $apellido2, $telefono) {
        $this->idContacto = $idContacto;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->telefono = $telefono;
    }
    
    public function getIdContacto() {
        return $this->idContacto;
    }
    
    public function setIdContacto($idContacto) {
        $this->idContacto = $idContacto;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getApellido1() {
        return $this->apellido1;
    }
    
    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }
    
    public function getApellido2() {
        return $this->apellido2;
    }
    
    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function aCadena() {
        $output=null;
        $output.= 'ID Contacto: ' .$this->idContacto .'<br>'
                .'Nombre: ' . $this->nombre .'<br>'
                .'Apellido1: ' .$this->apellido1.'<br>'
                .'Apellido2: ' .$this->apellido2.'<br>'
                .'Telefono: ' .$this->telefono
                .'<br><br>';
        echo $output;
    }

}
?>