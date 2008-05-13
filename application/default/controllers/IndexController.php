<?php

/**
 * IndexController - The default controller class
 *
 * @author
 * @version
 */



/**
 * La clase IndexController al igual que las clases de los modulos
 * puede heredar de Zsurforce_Generic_Controller en cuyo caso no
 * sería necesario redefinir el método init.
 * IndexController hereda de Zend_Controller_Action para que el
 * proyecto base no sea dependiente de librería.
**/
//class IndexController extends Zsurforce_Generic_Controller
class IndexController extends Ztask_Generic_Controller
{
	/**
	 * The default action - show the home page
	 */
    public function indexAction()
    {
        // TODO Auto-generated IndexController::indexAction() action
    }
}
