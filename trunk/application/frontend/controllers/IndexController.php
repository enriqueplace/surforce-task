<?php
class Frontend_IndexController extends Ztask_Generic_Controller{
	const MODELS_DIR = './application/frontend/models/';
	function indexAction()
	{
		Zend_Loader::loadClass('Tasks', self::MODELS_DIR );
		$tasks = new Tasks();
		$where = array();
		$order = "";
		$this->view->tasks = $tasks->getAll($where, $order);
		$this->view->base_path = Zend_Registry::get('base_path');
		$this->render();
	}
}
?>