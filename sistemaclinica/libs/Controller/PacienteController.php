<?php
/** @package    sistemaclinica::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Paciente.php");

/**
 * PacienteController is the controller class for the Paciente object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package sistemaclinica::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PacienteController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Paciente objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Paciente records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PacienteCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Cpf,Nome,Convenio,Telefone,Datanasc,Tiposanguineo'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$pacientes = $this->Phreezer->Query('Paciente',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pacientes->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pacientes->TotalResults;
				$output->totalPages = $pacientes->TotalPages;
				$output->pageSize = $pacientes->PageSize;
				$output->currentPage = $pacientes->CurrentPage;
			}
			else
			{
				// return all results
				$pacientes = $this->Phreezer->Query('Paciente',$criteria);
				$output->rows = $pacientes->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Paciente record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('cpf');
			$paciente = $this->Phreezer->Get('Paciente',$pk);
			$this->RenderJSON($paciente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Paciente record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$paciente = new Paciente($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$paciente->Cpf = $this->SafeGetVal($json, 'cpf');
			$paciente->Nome = $this->SafeGetVal($json, 'nome');
			$paciente->Convenio = $this->SafeGetVal($json, 'convenio');
			$paciente->Telefone = $this->SafeGetVal($json, 'telefone');
			$paciente->Datanasc = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datanasc')));
			$paciente->Tiposanguineo = $this->SafeGetVal($json, 'tiposanguineo');

			$paciente->Validate();
			$errors = $paciente->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$paciente->Save(true);
				$this->RenderJSON($paciente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Paciente record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('cpf');
			$paciente = $this->Phreezer->Get('Paciente',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $paciente->Cpf = $this->SafeGetVal($json, 'cpf', $paciente->Cpf);

			$paciente->Nome = $this->SafeGetVal($json, 'nome', $paciente->Nome);
			$paciente->Convenio = $this->SafeGetVal($json, 'convenio', $paciente->Convenio);
			$paciente->Telefone = $this->SafeGetVal($json, 'telefone', $paciente->Telefone);
			$paciente->Datanasc = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datanasc', $paciente->Datanasc)));
			$paciente->Tiposanguineo = $this->SafeGetVal($json, 'tiposanguineo', $paciente->Tiposanguineo);

			$paciente->Validate();
			$errors = $paciente->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$paciente->Save();
				$this->RenderJSON($paciente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Paciente record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('cpf');
			$paciente = $this->Phreezer->Get('Paciente',$pk);

			$paciente->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
