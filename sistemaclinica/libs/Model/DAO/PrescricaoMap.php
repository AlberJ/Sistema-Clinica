<?php
/** @package    Bancoclinicamodelo::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PrescricaoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PrescricaoDAO to the prescricao datastore.
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
class PrescricaoMap implements IDaoMap, IDaoMap2
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
			self::$FM["Codprescricao"] = new FieldMap("Codprescricao","prescricao","codPrescricao",true,FM_TYPE_INT,11,null,true);
			self::$FM["Codconsulta"] = new FieldMap("Codconsulta","prescricao","codConsulta",false,FM_TYPE_INT,11,null,false);
			self::$FM["Codmedicamento"] = new FieldMap("Codmedicamento","prescricao","codMedicamento",false,FM_TYPE_INT,11,null,false);
			self::$FM["Codexame"] = new FieldMap("Codexame","prescricao","codExame",false,FM_TYPE_INT,11,null,false);
			self::$FM["Comentario"] = new FieldMap("Comentario","prescricao","Comentario",false,FM_TYPE_TEXT,null,null,false);
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
			self::$KM["FK_CONSULTA"] = new KeyMap("FK_CONSULTA", "Codconsulta", "Consulta", "Codconsulta", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_EXAME"] = new KeyMap("FK_EXAME", "Codexame", "Exame", "Tipoexame", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_MEDICAMENTO"] = new KeyMap("FK_MEDICAMENTO", "Codmedicamento", "Medicamento", "CodMedicamento", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>