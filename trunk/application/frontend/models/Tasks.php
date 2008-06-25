<?php
class Tasks extends Zend_Db_Table_Abstract{
	protected $_name = 'tareas_listado';
	protected $_primary = 'tarea_id';

	public function add($data = null)
	{
		if(!is_array($data)){
			return false;
		}
		$task_name = $data["task_name"];
		$task_desc = $data["task_desc"];
		$id_estado_tarea = 1; //MEANS: SIN ASIGNAR (por que es nueva)
		$id_depart_from = $data["id_depart_from"];
		$id_depart_to = $data["id_depart_to"];

		$tarea = array(
			'nombre'      => $task_name,
			'descripcion' => $task_desc,
		);
		$this->_name = "tareas_tareas";
		$id_tarea = $this->insert($tarea);

		$tareaDep = array(
			'id_tarea' => $id_tarea,
			'id_departamento_origen'      => $id_depart_from,
			'id_departamento_destino' => $id_depart_to,
		);
		$this->_name = "tareas_tareas_departamentos";
		$this->insert($tareaDep);

		$tareaEstado = array(
			'id_tarea' => $id_tarea,
			'id_estado_tarea' => '1'
		);
		$this->_name = "tareas_tareas_estados";
		$this->insert($tareaEstado);
	}
}
?>