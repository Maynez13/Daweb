<?php
importar('core/mvc_engine/helper');

abstract class Controller{
	public function __construct($resource='', $arg='',$api=false){
		$this-> api    = $api;
		$this->apidata = '';
		$this->model   = MVCEngineHelper::get_model($this);
		$this->view    = MVCEngineHelper::get_view($this);

		if (method_exists($this, $resource)) {
			// llamar la clase con su metodo correspondiente,
			// y le manda los argumentos correspondientes en este caso de
			call_user_func(array($this, $resource), $arg);
			} else {
				HTTPHelper::go(DEFAULT_VIEW);
			}
	}
}
?>