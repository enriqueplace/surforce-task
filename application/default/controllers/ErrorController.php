<?php

/**
 * ErrorController - The default error controller class
 *
 * @author
 * @version
 */

require_once 'Zend/Controller/Action.php';

class ErrorController extends Ztask_Generic_Controller
{

    /**
     * This action handles
     *    - Application errors
     *    - Errors in the controller chain arising from missing
     *      controller classes and/or action methods
     */
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                // 404 error -- controller or action not found
                $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');
                $this->view->title = 'HTTP/1.1 404 Not Found';
                break;
            default:
                // application error; display error page, but don't change
                // status code
                $this->view->title = 'Application Error';
                break;
        }

        $this->view->message = $errors->exception;
    }
    public function privilegesAction()
    {
    	$this->view->title = 'No tenes privilegios';
    }
}
?>