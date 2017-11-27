<?php
/**
 * @package sistemaclinica
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Consulta
	'GET:consultas' => array('route' => 'Consulta.ListView'),
	'GET:consulta/(:any)' => array('route' => 'Consulta.SingleView', 'params' => array('codconsulta' => 1)),
	'GET:api/consultas' => array('route' => 'Consulta.Query'),
	'POST:api/consulta' => array('route' => 'Consulta.Create'),
	'GET:api/consulta/(:any)' => array('route' => 'Consulta.Read', 'params' => array('codconsulta' => 2)),
	'PUT:api/consulta/(:any)' => array('route' => 'Consulta.Update', 'params' => array('codconsulta' => 2)),
	'DELETE:api/consulta/(:any)' => array('route' => 'Consulta.Delete', 'params' => array('codconsulta' => 2)),
		
	// Exame
	'GET:exames' => array('route' => 'Exame.ListView'),
	'GET:exame/(:num)' => array('route' => 'Exame.SingleView', 'params' => array('tipoexame' => 1)),
	'GET:api/exames' => array('route' => 'Exame.Query'),
	'POST:api/exame' => array('route' => 'Exame.Create'),
	'GET:api/exame/(:num)' => array('route' => 'Exame.Read', 'params' => array('tipoexame' => 2)),
	'PUT:api/exame/(:num)' => array('route' => 'Exame.Update', 'params' => array('tipoexame' => 2)),
	'DELETE:api/exame/(:num)' => array('route' => 'Exame.Delete', 'params' => array('tipoexame' => 2)),
		
	// Medicamento
	'GET:medicamentos' => array('route' => 'Medicamento.ListView'),
	'GET:medicamento/(:num)' => array('route' => 'Medicamento.SingleView', 'params' => array('codMedicamento' => 1)),
	'GET:api/medicamentos' => array('route' => 'Medicamento.Query'),
	'POST:api/medicamento' => array('route' => 'Medicamento.Create'),
	'GET:api/medicamento/(:num)' => array('route' => 'Medicamento.Read', 'params' => array('codMedicamento' => 2)),
	'PUT:api/medicamento/(:num)' => array('route' => 'Medicamento.Update', 'params' => array('codMedicamento' => 2)),
	'DELETE:api/medicamento/(:num)' => array('route' => 'Medicamento.Delete', 'params' => array('codMedicamento' => 2)),
		
	// Medico
	'GET:medicos' => array('route' => 'Medico.ListView'),
	'GET:medico/(:any)' => array('route' => 'Medico.SingleView', 'params' => array('crm' => 1)),
	'GET:api/medicos' => array('route' => 'Medico.Query'),
	'POST:api/medico' => array('route' => 'Medico.Create'),
	'GET:api/medico/(:any)' => array('route' => 'Medico.Read', 'params' => array('crm' => 2)),
	'PUT:api/medico/(:any)' => array('route' => 'Medico.Update', 'params' => array('crm' => 2)),
	'DELETE:api/medico/(:any)' => array('route' => 'Medico.Delete', 'params' => array('crm' => 2)),
		
	// Paciente
	'GET:pacientes' => array('route' => 'Paciente.ListView'),
	'GET:paciente/(:any)' => array('route' => 'Paciente.SingleView', 'params' => array('cpf' => 1)),
	'GET:api/pacientes' => array('route' => 'Paciente.Query'),
	'POST:api/paciente' => array('route' => 'Paciente.Create'),
	'GET:api/paciente/(:any)' => array('route' => 'Paciente.Read', 'params' => array('cpf' => 2)),
	'PUT:api/paciente/(:any)' => array('route' => 'Paciente.Update', 'params' => array('cpf' => 2)),
	'DELETE:api/paciente/(:any)' => array('route' => 'Paciente.Delete', 'params' => array('cpf' => 2)),
		
	// Prescricao
	'GET:prescricoes' => array('route' => 'Prescricao.ListView'),
	'GET:prescricao/(:num)' => array('route' => 'Prescricao.SingleView', 'params' => array('codprescricao' => 1)),
	'GET:api/prescricoes' => array('route' => 'Prescricao.Query'),
	'POST:api/prescricao' => array('route' => 'Prescricao.Create'),
	'GET:api/prescricao/(:num)' => array('route' => 'Prescricao.Read', 'params' => array('codprescricao' => 2)),
	'PUT:api/prescricao/(:num)' => array('route' => 'Prescricao.Update', 'params' => array('codprescricao' => 2)),
	'DELETE:api/prescricao/(:num)' => array('route' => 'Prescricao.Delete', 'params' => array('codprescricao' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Consulta","FK_MEDICO",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Consulta","FK_PACIENTE",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Prescricao","FK_CONSULTA",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Prescricao","FK_EXAME",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Prescricao","FK_MEDICAMENTO",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>