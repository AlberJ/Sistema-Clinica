<?php
/** @package    Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ConsultaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ConsultaDAO to the consulta datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Bancoclinicamodelo::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ConsultaMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Codconsulta"] = new FieldMap("Codconsulta","consulta","codConsulta",true,FM_TYPE_INT,11,null,false);
			self::$FM["Dataconsulta"] = new FieldMap("Dataconsulta","consulta","dataConsulta",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Cpfpaciente"] = new FieldMap("Cpfpaciente","consulta","cpfPaciente",false,FM_TYPE_VARCHAR,11,null,false);
			self::$FM["Crmmedico"] = new FieldMap("Crmmedico","consulta","crmMedico",false,FM_TYPE_INT,11,null,false);
			self::$FM["Descricaoconsulta"] = new FieldMap("Descricaoconsulta","consulta","descricaoConsulta",false,FM_TYPE_TEXT,null,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["FK_CONSULTA"] = new KeyMap("FK_CONSULTA", "Codconsulta", "Prescricao", "Codconsulta", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_MEDICO"] = new KeyMap("FK_MEDICO", "Crmmedico", "Medico", "Crm", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_PACIENTE"] = new KeyMap("FK_PACIENTE", "Cpfpaciente", "Paciente", "Cpf", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>