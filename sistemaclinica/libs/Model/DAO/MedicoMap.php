<?php
/** @package    Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * MedicoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MedicoDAO to the medico datastore.
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
class MedicoMap implements IDaoMap, IDaoMap2
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
			self::$FM["Crm"] = new FieldMap("Crm","medico","CRM",true,FM_TYPE_INT,10,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","medico","Nome",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","medico","Telefone",false,FM_TYPE_INT,11,null,false);
			self::$FM["Datanasc"] = new FieldMap("Datanasc","medico","DataNasc",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Especialidade"] = new FieldMap("Especialidade","medico","Especialidade",false,FM_TYPE_VARCHAR,50,null,false);
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
			self::$KM["FK_MEDICO"] = new KeyMap("FK_MEDICO", "Crm", "Consulta", "Crmmedico", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>