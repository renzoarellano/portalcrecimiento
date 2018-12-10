<?php

require '../common/config.php';
require 'conexionBD.class.php';

class generalQuery extends ConexionBD
{

	public function obtenerTodos(){
		//Asegurarte que se estan enviando solo ENTEROS Y formato TIMESTAMP.
		$queryTrabajos = 'SELECT funcion.id,funcion.funcion_nombre,direccion.direccion_abreviatura FROM funcion,gerencia,direccion WHERE gerencia.direccion_id = direccion.id AND funcion.gerencia_id = gerencia.id';
		$result = $this->conectBD()->prepare($queryTrabajos);
		$result->execute();
		$call = $result->fetchAll();
		return $call;
	}

	public function obtener_IDfuncion($funcionNombre,$area){

		$queryTrabajos =	'SELECT funcion.id FROM funcion, gerencia, direccion WHERE funcion.funcion_nombre = '.'"'.$funcionNombre.'"'.' AND funcion.gerencia_id = gerencia.id AND gerencia.direccion_id = direccion.id AND direccion.direccion_abreviatura = '.'"'.$area.'"'.'';
		$result = $this->conectBD()->prepare($queryTrabajos);
		$result->execute();
		$call = $result->fetchAll();
		return $call;
	}

	public function obtener_Promedios($idFuncion){
		//Asegurarte que se estan enviando solo ENTEROS Y formato TIMESTAMP.
		$queryTrabajos = 'SELECT promedio_experiencia FROM funcion_experiencia WHERE funcion_id = '.$idFuncion.'';
		$result = $this->conectBD()->prepare($queryTrabajos);
		$result->execute();
		$call = $result->fetchAll();
		return $call;
	}
	public function obtener_Experiencias(){
		//Asegurarte que se estan enviando solo ENTEROS Y formato TIMESTAMP.
		$queryTrabajos = 'SELECT experiencia_nombre FROM experiencia';
		$result = $this->conectBD()->prepare($queryTrabajos);
		$result->execute();
		$call = $result->fetchAll();
		return $call;
	}
	public function obtenerConocimientos(){
		$queryConocimientos = 'CALL sp_ObtenerConocimientos(1)';
		$result = $this->conectBD()->prepare($queryConocimientos);
		$result->execute();
		$call = $result->fetchall();
		return $call;
	}
	public function obtenerConocimientospuntaje($id){
		$queryConocimientos = 'CALL sp_ObtenerPuntajeConocimiento('.$id.')';
		$result = $this->conectBD()->prepare($queryConocimientos);
		$result->execute();
		$call = $result->fetchall();
		return $call;
	}
}


?>
