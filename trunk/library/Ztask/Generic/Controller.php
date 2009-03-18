<?php
abstract class Ztask_Generic_Controller extends Zend_Controller_Action
{
    protected $_registry = null;
    protected $_session = null;
    protected $_debug = null;

    public function init()
    {
        parent::init();
        $this->view->baseUrl = $this->_request->getBaseUrl ();
    }
    public function preDispatch()
    {
        $auth = Zend_Auth::getInstance ();
        
        if ($auth->hasIdentity ()) {
            $this->view->usuarioLogueado = true;
            $this->view->role = $auth->getIdentity()->role;
        }
    }
}