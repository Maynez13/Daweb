
<?php

importar('apps/artesanias/models/clasificacion');
importar('apps/artesanias/views/clasificacion');

class ClasificacionController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM clasificacion";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }
    public function listar($formato){
        $sql = "SELECT C.id, C.descripcion, 
            IFNULL(P.descripcion, 'Ninguno') as padre 
                FROM clasificacion C LEFT JOIN clasificacion P 
                ON C.padre=P.id";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
       $descripcion = $_POST['descripcion'];
       $padre       = $_POST['padre'];
       //--- validar datos

       //--- asociar al modelo
       $this->model->descripcion = $descripcion;
       $this->model->padre       = $padre;
       $this->model->save();
       //--- 
       HTTPHelper::go("/artesanias/clasificacion/listar");
    }

}

?>


