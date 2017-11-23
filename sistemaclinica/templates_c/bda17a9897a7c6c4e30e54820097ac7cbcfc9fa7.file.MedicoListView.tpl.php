<?php /* Smarty version Smarty-3.1.18, created on 2017-11-23 03:57:19
         compiled from "C:\wamp\www\sistemaclinica\templates\MedicoListView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173055a16471f82dca9-84497384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda17a9897a7c6c4e30e54820097ac7cbcfc9fa7' => 
    array (
      0 => 'C:\\wamp\\www\\sistemaclinica\\templates\\MedicoListView.tpl',
      1 => 1511420168,
      2 => 'file',
    ),
    '9dfe181ddc60a35e14b8b121ab65eccbea9514a8' => 
    array (
      0 => 'C:\\wamp\\www\\sistemaclinica\\templates\\Master.tpl',
      1 => 1511420168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173055a16471f82dca9-84497384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ROOT_URL' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a16471f92e738_50058791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a16471f92e738_50058791')) {function content_5a16471f92e738_50058791($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\phreeze\\libs\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
" />
		<title>BANCOCLINICAMODELO | Medicos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="BANCOCLINICAMODELO" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB
				.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js")
				.script("bootstrap/js/bootstrap-datepicker.js")
				.script("bootstrap/js/bootstrap-timepicker.js")
				.script("bootstrap/js/bootstrap-combobox.js")
				.script("scripts/libs/underscore-min.js").wait()
				.script("scripts/libs/underscore.date.min.js")
				.script("scripts/libs/backbone-min.js")
				.script("scripts/app.js")
				.script("scripts/model.js").wait()
				.script("scripts/view.js").wait()
		</script>

	

	
<script type="text/javascript">
	$LAB.script("scripts/app/medicos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});

		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>


	</head>

	<body>

		
	<?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("medicos", null, 0);?>


			<?php if (!isset($_smarty_tpl->tpl_vars['nav']->value)) {?><?php $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable("home", null, 0);?><?php }?>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./">BANCOCLINICAMODELO</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='consultas') {?> class="active"<?php }?>><a href="./consultas">Consultas</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='exames') {?> class="active"<?php }?>><a href="./exames">Exames</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='medicamentos') {?> class="active"<?php }?>><a href="./medicamentos">Medicamentos</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='medicos') {?> class="active"<?php }?>><a href="./medicos">Medicos</a></li>
							</ul>
							<ul class="nav">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='pacientes') {?> class="active"<?php }?>><a href="./pacientes">Pacientes</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='prescricoes') {?> class="active"<?php }?>><a href="./prescricoes">Prescricoes</a></li>
								</ul>
								</li>
							</ul>

							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a href="./loginform">Login</a></li>
									<li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
									<li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		

		
			<div class="container">

				
	<h1>
		<i class="icon-th-list"></i> Medicos
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>


				

	<!-- underscore template for the collection -->
	<script type="text/template" id="medicoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Crm">Crm<<?php ?>% if (page.orderBy == 'Crm') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Nome">Nome<<?php ?>% if (page.orderBy == 'Nome') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Telefone">Telefone<<?php ?>% if (page.orderBy == 'Telefone') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Datanasc">Datanasc<<?php ?>% if (page.orderBy == 'Datanasc') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
				<th id="header_Especialidade">Especialidade<<?php ?>% if (page.orderBy == 'Especialidade') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
			</tr>
		</thead>
		<tbody>
		<<?php ?>% items.each(function(item) { %<?php ?>>
			<tr id="<<?php ?>%= _.escape(item.get('crm')) %<?php ?>>">
				<td><<?php ?>%= _.escape(item.get('crm') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('nome') || '') %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('telefone') || '') %<?php ?>></td>
				<td><<?php ?>%if (item.get('datanasc')) { %<?php ?>><<?php ?>%= _date(app.parseDate(item.get('datanasc'))).format('MMM D, YYYY') %<?php ?>><<?php ?>% } else { %<?php ?>>NULL<<?php ?>% } %<?php ?>></td>
				<td><<?php ?>%= _.escape(item.get('especialidade') || '') %<?php ?>></td>
			</tr>
		<<?php ?>% }); %<?php ?>>
		</tbody>
		</table>

		<<?php ?>%=  view.getPaginationHtml(page) %<?php ?>>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="medicoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="crmInputContainer" class="control-group">
					<label class="control-label" for="crm">Crm</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="crm" placeholder="Crm" value="<<?php ?>%= _.escape(item.get('crm') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<<?php ?>%= _.escape(item.get('nome') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefoneInputContainer" class="control-group">
					<label class="control-label" for="telefone">Telefone</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefone" placeholder="Telefone" value="<<?php ?>%= _.escape(item.get('telefone') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="datanascInputContainer" class="control-group">
					<label class="control-label" for="datanasc">Datanasc</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="datanasc" type="text" value="<<?php ?>%= _date(app.parseDate(item.get('datanasc'))).format('YYYY-MM-DD') %<?php ?>>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="especialidadeInputContainer" class="control-group">
					<label class="control-label" for="especialidade">Especialidade</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="especialidade" placeholder="Especialidade" value="<<?php ?>%= _.escape(item.get('especialidade') || '') %<?php ?>>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteMedicoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMedicoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Medico</button>
						<span id="confirmDeleteMedicoContainer" class="hide">
							<button id="cancelDeleteMedicoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMedicoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="medicoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Medico
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="medicoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMedicoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="medicoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMedicoButton" class="btn btn-primary">Add Medico</button>
	</p>



				<hr>

				<footer>
					<p class="muted"><small>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 BANCOCLINICAMODELO</small></p>
				</footer>

			</div> <!-- /container -->

		

		
		

	</body>
</html><?php }} ?>
