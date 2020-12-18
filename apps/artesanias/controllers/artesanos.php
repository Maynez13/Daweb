
<?php

importar('apps/artesanias/models/artesanos');
importar('apps/artesanias/views/artesanos');

class ArtesanosController extends Controller  {

    public function agregar(){
        $sql = "SELECT * FROM artesanos";
        $data = $this->model->query($sql);

        $this->view->agregar($data);
    }
    public function listar($formato){
        $sql = "SELECT * from artesanos ";
        $data = $this->model->query($sql);
        $this->view->listar($data);
    }

    public function guardar(){
       $id          = $_POST['id'] ?? 0;
       $nombre = $_POST['nombre'];
       $primerapellido       = $_POST['primerapellido'];
       $segundoapellido      = $_POST['segundoapellido'];
       $domicilio           = $_POST['domicilio'];
       $telefono            = $_POST['telefono'];
       $correo              = $_POST['correo'];
       //--- validar datos

       //--- asociar al modelo
       $this->model->id=$id;
       $this->model->nombre=$nombre;
       $this->model->primerapellido=$primerapellido;
       $this->model->segundoapellido=$segundoapellido;
       $this->model->domicilio=$domicilio;
       $this->model->telefono=$telefono;
       $this->model->correo=$correo;
       $this->model->save();
       //--- 
       HTTPHelper::go("/artesanias/artesanos/listar");
    }


     public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/artesanos/listar");
    }

    public function editar($id=0){
        $sql= "SELECT * FROM artesanos WHERE id=$id ";
         
        $clasificacionListado = $this->model->query($sql);
        $clasificacion = $this->model->getById($id);

        $this->view->editar($clasificacionListado, $clasificacion);
    }
}

?>


