<?php
abstract class Ztask_Generic_Controller extends Zend_Controller_Action
{
 	protected $registry = null;
    protected $session = null;
	protected $debug = null;

	public function init()
	{
		parent::init();
		$this->registry = Zend_Registry::getInstance();

		$this->initView ();

		$this->view->setScriptPath( './application/views/scripts/' );

		$this->view->setHelperPath( './application/views/helpers/', 'Helper' );
		$this->view->addHelperPath( './library/Zcms/View/helper/', 'Ztask_View_Helper' );
        $this->view->addHelperPath('./library/Zsurforce/View/Helper/', 'Zsurforce_View_Helper');

        $this->view->addBasePath('./public/','');

		$this->view->baseUrl = $this->_request->getBaseUrl ();

		Zend_Loader::loadClass ( 'Configuracion' );

		$this->view->user 	= Zend_Auth::getInstance ()->getIdentity ();
		$this->info 		= $this->registry->get('personalizacion');
		$this->view->title 	= $this->info->sitio->index->index->titulo;

		$this->session 			= $this->registry->get('session');
        $this->view->session 	= $this->session;

        $this->debug 		= $this->registry->get('debug');
        $this->view->debug 	= $this->debug;

	}
	function preDispatch()
	{
		$auth = Zend_Auth::getInstance ();
		if ($auth->hasIdentity ()) {
			$this->view->usuarioLogueado = true;
		}
	}
}
?>