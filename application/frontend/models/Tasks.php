<?php
class Tasks extends Zend_Db_Table{
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
		$this->insert('tareas_tareas', $tarea);

		#$idTarea = $this->lastInsertId();

		#$tareaEstado = array ();
	}
}
?>