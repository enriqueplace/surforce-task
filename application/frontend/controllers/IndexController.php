<?php
require_once './application/frontend/models/Tasks.php';

class Frontend_IndexController extends Zsurforce_Generic_Controller{

	function indexAction()
	{
		$tasks = new Tasks();
		$where = array();
		$order = "";
		$this->view->tasks = $tasks->fetchAll($where, $order);
		$this->view->base_path = Zend_Registry::get('base_path');
		$this->render();
	}
}
?>