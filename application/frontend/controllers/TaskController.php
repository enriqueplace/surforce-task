<?php
class Frontend_TaskController extends Ztask_Generic_Controller{
	const MODELS_DIR = "./application/frontend/models/";
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
			$dep_from = $this->_request->getPost('task_from_department');
			$dep_to = $this->_request->getPost('task_to_department');
			$data = array(
				'task_name' => $nombre,
				'task_desc' => $descripcion,
				'id_depart_from' => $dep_from,
				'id_depart_to' => $dep_to
			);
			$tasks->add($data);
		}
		$where = array("estado = 1");
		$order = "";
		$this->view->departments = $depart->fetchAll($where,$order);
		$this->view->base_path = Zend_Registry::get('base_path');
		$this->render();
	}

	function viewAction()
	{
		Zend_Loader::loadClass('Comments', self::MODELS_DIR );
		Zend_Loader::loadClass('Tasks', self::MODELS_DIR );
		Zend_Loader::loadClass('Users', self::MODELS_DIR );
		$id_tarea = $this->_request->getParam('id');
		$tasks = new Tasks();
		$where = array("tarea_id = $id_tarea");
		$tareas = $tasks->fetchRow($where);


		$comments = new Comments();
		$where = array("tarea_id = $id_tarea");
		$comentarios = $comments->fetchAll($where);

		$users = new Users();

		$this->view->task = $tareas;
		$this->view->task_comments = $comentarios;
		$this->view->users = $users;
	}
}
?>