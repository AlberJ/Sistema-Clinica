<?php
/** @package Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ExameMap.php");

/**
 * ExameDAO provides object-oriented access to the exame table.  This
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
class ExameDAO extends Phreezable
{
	/** @var int */
	public $Tipoexame;

	/** @var string */
	public $Descricaoexame;


	/**
	 * Returns a dataset of Prescricao objects with matching Codexame
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCodexamePrescricaos($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_EXAME", $criteria);
	}


}
?>