<?php
class Ztask_Acl extends Zend_Acl
{
    public function __construct(Zend_Auth $auth)
    {
        $roleGuest = new Zend_Acl_Role('guest');

        $this->add( new Zend_Acl_Resource( 'index' ) );
        $this->add( new Zend_Acl_Resource( 'login' ) );

        $this->addRole( new Zend_Acl_Role( 'guest' ) );
        $this->addRole( new Zend_Acl_Role( 'member' ), 'guest');
        $this->addRole( new Zend_Acl_Role( 'admin' ));

        $this->allow( 'guest', array('index','login'));
        $this->allow( 'admin');
    }
}
?>