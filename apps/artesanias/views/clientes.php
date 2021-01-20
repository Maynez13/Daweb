<?php

class ClientesView  {

    public function agregar($list=[]){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/clientes_agregar.html"); 
        $html = Template($str)->render_regex('LISTADO_CLIENTE', $list);
        print Template('Agregar cliente')->show($html);
    }  

    public function listar($list=array()) {
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/clientes_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_CLIENTES', $list);
        print Template('Listado de clientes')->show($html);
    }
    public function editar($list=[], $clasificacion){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/clientes_editar.html"); 
        $html = Template($str)->render_regex('LISTADO_CLIENTES', $list);
        $html = Template($html)->render($clasificacion);
        print Template('Editar cliente')->show($html);
    } 



}

?>