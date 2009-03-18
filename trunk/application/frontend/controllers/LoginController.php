<?php
class Frontend_LoginController extends Ztask_Generic_Controller
{
    public function indexAction()
    {
        $this->_redirect('/frontend');
    }
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }
    public function loginAction()
    {
        //$info = Zend_Registry::get('personalizacion');
        $this->view->message = '';

        if ($this->_request->isPost()) {

            Zend_Loader::loadClass('Zend_Filter_StripTags');
            $f = new Zend_Filter_StripTags();

            $usuario 	= $f->filter($this->_request->getPost('usuario'));
            $password 	= $f->filter($this->_request->getPost('password'));

            if (empty($usuario)) {
                $this->view->message = $info->sitio->autenticacion->login->msgNombreVacio;
            } else {

                Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');

                $dbAdapter = Zend_Registry::get('dbAdapter');
                $autAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

                $autAdapter->setTableName('tareas_usuarios');
                $autAdapter->setIdentityColumn('email');
                $autAdapter->setCredentialColumn('password');

                /*
                 * FIXME: falta no habilitar el login si
                 * el usuario es estado = 0
                 */
                $autAdapter->setIdentity($usuario);
                $autAdapter->setCredential($password);

                $aut    = Zend_Auth::getInstance();
                $result = $aut->authenticate($autAdapter);

                if ($result->isValid()) {

                    $data = $autAdapter->getResultRowObject(null, 'password');
                    $aut->getStorage()->write($data);

                    $this->_redirect('/frontend');
                } else {
                    $this->view->message = $info->sitio->autenticacion->login->msgUserPassIncorrectos;
                }
            }
        }
        $this->view->title = "Login";
        $this->render();
    }
}