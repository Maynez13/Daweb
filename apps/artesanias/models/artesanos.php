<?php
class Artesanos extends DAO {

    public function __construct() {
        $this->keyfield = "id";
        $this->id = 0;
        $this->nombre = "";
        $this->primerapellido = "";
        $this->segundoapellido = "";
        $this->domicilio = "";
        $this->telefono = "";
        $this->correo = "";
    } 
}
?>
