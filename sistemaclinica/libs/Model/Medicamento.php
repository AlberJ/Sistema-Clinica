<?php
/** @package    Bancoclinicamodelo::Model */

/** import supporting libraries */
require_once("DAO/MedicamentoDAO.php");
require_once("MedicamentoCriteria.php");

/**
 * The Medicamento class extends MedicamentoDAO which provides the access
 * to the datastore.
 *
 * @package Bancoclinicamodelo::Model
 * @author ClassBuilder
 * @version 1.0
 */
class Medicamento extends MedicamentoDAO
{

	/**
	 * Override default validation
	 * @see Phreezable::Validate()
	 */
	public function Validate()
	{
		// example of custom validation
		// $this->ResetValidationErrors();
		// $errors = $this->GetValidationErrors();
		// if ($error == true) $this->AddValidationError('FieldName', 'Error Information');
		// return !$this->HasValidationErrors();

		return parent::Validate();
	}

	/**
	 * @see Phreezable::OnSave()
	 */
	public function OnSave($insert)
	{
		// the controller create/update methods validate before saving.  this will be a
		// redundant validation check, however it will ensure data integrity at the model
		// level based on validation rules.  comment this line out if this is not desired
		if (!$this->Validate()) throw new Exception('Unable to Save Medicamento: ' .  implode(', ', $this->GetValidationErrors()));

		// OnSave must return true or Phreeze will cancel the save operation
		return true;
	}

}

?>
