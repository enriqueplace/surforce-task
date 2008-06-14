<?php
abstract class Ztask_Generic_Controller extends Zend_Controller_Action
{
 	protected $registry = null;
    protected $session = null;
	protected $debug = null;
	public function init()
	{
		parent::init();
		$this->view->baseUrl = $this->_request->getBaseUrl ();
	}
	function preDispatch()
	{
		$auth = Zend_Auth::getInstance ();
		if ($auth->hasIdentity ()) {
			$this->view->usuarioLogueado = true;
			$this->view->role = $auth->getIdentity()->role;
		}
	}
}
?>