<?php
/** @package Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ConsultaMap.php");

/**
 * ConsultaDAO provides object-oriented access to the consulta table.  This
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
class ConsultaDAO extends Phreezable
{
	/** @var int */
	public $Codconsulta;

	/** @var date */
	public $Dataconsulta;

	/** @var int */
	public $Codpaciente;

	/** @var int */
	public $Crmmedico;

	/** @var string */
	public $Descricaoconsulta;


	/**
	 * Returns a dataset of Prescricao objects with matching Codconsulta
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCodconsultaPrescricaos($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_CONSULTA", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Crmmedico
	 * @return Medico
	 */
	public function GetCrmmedicoMedico()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_MEDICO");
	}

	/**
	 * Returns the foreign object based on the value of Codpaciente
	 * @return Paciente
	 */
	public function GetCodpacientePaciente()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_PACIENTE");
	}


}
?>