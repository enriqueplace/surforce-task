<?php
class Users extends Zend_Db_Table
{
	protected $_name = 'tareas_usuarios';
    protected $_referenceMap    = array(
		'User' => array(
            'columns'           => 'id_usuario',//this column is found in this table (group)
            'refTableClass'     => 'TasksUsers',  //this is the class name for employee_group table
            'refColumns'        => 'id_usuario' //this is the field found in employee_group table
        )
    );
}