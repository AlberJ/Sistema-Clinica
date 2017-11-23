{extends file="Master.tpl"}

{block name=title}BANCOCLINICAMODELO | Pacientes{/block}

{block name=customHeader}
<script type="text/javascript">
	$LAB.script("scripts/app/pacientes.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});

		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>
{/block}

{block name=banner}
	<h1>
		<i class="icon-th-list"></i> Pacientes
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="pacientes"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="pacienteCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Cpf">Cpf<% if (page.orderBy == 'Cpf') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Convenio">Convenio<% if (page.orderBy == 'Convenio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefone">Telefone<% if (page.orderBy == 'Telefone') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Datanasc">Datanasc<% if (page.orderBy == 'Datanasc') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
{* UNCOMMENT TO SHOW ADDITIONAL COLUMNS *}
{*
				<th id="header_Tiposanguineo">Tiposanguineo<% if (page.orderBy == 'Tiposanguineo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codpaciente">Codpaciente<% if (page.orderBy == 'Codpaciente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
*}
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('codpaciente')) %>">
				<td><%= _.escape(item.get('cpf') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('convenio') || '') %></td>
				<td><%= _.escape(item.get('telefone') || '') %></td>
				<td><%if (item.get('datanasc')) { %><%= _date(app.parseDate(item.get('datanasc'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
{* uncomment to show additional colums *}
{*
				<td><%= _.escape(item.get('tiposanguineo') || '') %></td>
				<td><%= _.escape(item.get('codpaciente') || '') %></td>
*}
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="pacienteModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="cpfInputContainer" class="control-group">
					<label class="control-label" for="cpf">Cpf</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cpf" placeholder="Cpf" value="<%= _.escape(item.get('cpf') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="convenioInputContainer" class="control-group">
					<label class="control-label" for="convenio">Convenio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="convenio" placeholder="Convenio" value="<%= _.escape(item.get('convenio') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefoneInputContainer" class="control-group">
					<label class="control-label" for="telefone">Telefone</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefone" placeholder="Telefone" value="<%= _.escape(item.get('telefone') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="datanascInputContainer" class="control-group">
					<label class="control-label" for="datanasc">Datanasc</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="datanasc" type="text" value="<%= _date(app.parseDate(item.get('datanasc'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tiposanguineoInputContainer" class="control-group">
					<label class="control-label" for="tiposanguineo">Tiposanguineo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tiposanguineo" placeholder="Tiposanguineo" value="<%= _.escape(item.get('tiposanguineo') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codpacienteInputContainer" class="control-group">
					<label class="control-label" for="codpaciente">Codpaciente</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codpaciente" placeholder="Codpaciente" value="<%= _.escape(item.get('codpaciente') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePacienteButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePacienteButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Paciente</button>
						<span id="confirmDeletePacienteContainer" class="hide">
							<button id="cancelDeletePacienteButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePacienteButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="pacienteDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Paciente
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="pacienteModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePacienteButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="pacienteCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPacienteButton" class="btn btn-primary">Add Paciente</button>
	</p>

{/block}
