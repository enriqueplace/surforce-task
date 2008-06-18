<?php
class Frontend_TaskController extends Ztask_Generic_Controller{
	const MODELS_DIR = './application/frontend/models/';
	function indexAction()
	{
		Zend_Loader::loadClass('Tasks', self::MODELS_DIR );
		$tasks = new Tasks();
		$where = array();
		$order = "";
		$this->view->tasks = $tasks->fetchAll($where, $order);
		$this->view->base_path = Zend_Registry::get('base_path');
		$this->render();
	}
	function addAction()
	{
		Zend_Loader::loadClass('Departments', self::MODELS_DIR );
		Zend_Loader::loadClass('Tasks', self::MODELS_DIR );
		$depart = new Departments();
		$tasks = new Tasks();

		if($this->_request->isPost()){
			Zend_Loader::loadClass('Zend_Filter_StripTags');
			$filter = new Zend_Filter_StripTags();
			$nombre = trim($filter->filter($this->_request->getPost('task_name')));
			$descripcion = trim($filter->filter($this->_request->getPost('task_desc')));
			$data = array(
				'nombre' => $nombre,
				'descripcion' => $descripcion,
			);
			$tasks->insert($data);
		}
		$where = array("estado = 1");
		$order = "";
		$this->view->departments = $depart->fetchAll($where,$order);
		$this->view->base_path = Zend_Registry::get('base_path');
		$this->render();
	}
}
?>