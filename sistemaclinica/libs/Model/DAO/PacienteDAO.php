<?php
/** @package Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("PacienteMap.php");

/**
 * PacienteDAO provides object-oriented access to the paciente table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Bancoclinicamodelo::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PacienteDAO extends Phreezable
{
	/** @var string */
	public $Cpf;

	/** @var string */
	public $Nome;

	/** @var string */
	public $Convenio;

	/** @var string */
	public $Telefone;

	/** @var date */
	public $Datanasc;

	/** @var string */
	public $Tiposanguineo;


	/**
	 * Returns a dataset of Consulta objects with matching Cpfpaciente
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCpfpacienteConsultas($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_PACIENTE", $criteria);
	}


}
?>