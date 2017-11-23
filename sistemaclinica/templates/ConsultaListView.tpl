{extends file="Master.tpl"}

{block name=title}BANCOCLINICAMODELO | Consultas{/block}

{block name=customHeader}
<script type="text/javascript">
	$LAB.script("scripts/app/consultas.js").wait(function(){
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
		<i class="icon-th-list"></i> Consultas
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="consultas"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="consultaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Codconsulta">Codconsulta<% if (page.orderBy == 'Codconsulta') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dataconsulta">Dataconsulta<% if (page.orderBy == 'Dataconsulta') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codpaciente">Codpaciente<% if (page.orderBy == 'Codpaciente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Crmmedico">Crmmedico<% if (page.orderBy == 'Crmmedico') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricaoconsulta">Descricaoconsulta<% if (page.orderBy == 'Descricaoconsulta') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('codconsulta')) %>">
				<td><%= _.escape(item.get('codconsulta') || '') %></td>
				<td><%if (item.get('dataconsulta')) { %><%= _date(app.parseDate(item.get('dataconsulta'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('codpaciente') || '') %></td>
				<td><%= _.escape(item.get('crmmedico') || '') %></td>
				<td><%= _.escape(item.get('descricaoconsulta') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="consultaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="codconsultaInputContainer" class="control-group">
					<label class="control-label" for="codconsulta">Codconsulta</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codconsulta" placeholder="Codconsulta" value="<%= _.escape(item.get('codconsulta') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataconsultaInputContainer" class="control-group">
					<label class="control-label" for="dataconsulta">Dataconsulta</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataconsulta" type="text" value="<%= _date(app.parseDate(item.get('dataconsulta'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codpacienteInputContainer" class="control-group">
					<label class="control-label" for="codpaciente">Codpaciente</label>
					<div class="controls inline-inputs">
						<select id="codpaciente" name="codpaciente"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="crmmedicoInputContainer" class="control-group">
					<label class="control-label" for="crmmedico">Crmmedico</label>
					<div class="controls inline-inputs">
						<select id="crmmedico" name="crmmedico"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoconsultaInputContainer" class="control-group">
					<label class="control-label" for="descricaoconsulta">Descricaoconsulta</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descricaoconsulta" rows="3"><%= _.escape(item.get('descricaoconsulta') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteConsultaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteConsultaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Consulta</button>
						<span id="confirmDeleteConsultaContainer" class="hide">
							<button id="cancelDeleteConsultaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteConsultaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="consultaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Consulta
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="consultaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveConsultaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="consultaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newConsultaButton" class="btn btn-primary">Add Consulta</button>
	</p>

{/block}
