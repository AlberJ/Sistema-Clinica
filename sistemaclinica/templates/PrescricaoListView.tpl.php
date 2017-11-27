<?php
	$this->assign('title','sistemaclinica | Prescricoes');
	$this->assign('nav','prescricoes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/prescricoes.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Prescricoes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="prescricaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Codprescricao">Codprescricao<% if (page.orderBy == 'Codprescricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codconsulta">Codconsulta<% if (page.orderBy == 'Codconsulta') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codmedicamento">Codmedicamento<% if (page.orderBy == 'Codmedicamento') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Codexame">Codexame<% if (page.orderBy == 'Codexame') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Comentario">Comentario<% if (page.orderBy == 'Comentario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('codprescricao')) %>">
				<td><%= _.escape(item.get('codprescricao') || '') %></td>
				<td><%= _.escape(item.get('codconsulta') || '') %></td>
				<td><%= _.escape(item.get('codmedicamento') || '') %></td>
				<td><%= _.escape(item.get('codexame') || '') %></td>
				<td><%= _.escape(item.get('comentario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="prescricaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="codprescricaoInputContainer" class="control-group">
					<label class="control-label" for="codprescricao">Codprescricao</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="codprescricao"><%= _.escape(item.get('codprescricao') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codconsultaInputContainer" class="control-group">
					<label class="control-label" for="codconsulta">Codconsulta</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codconsulta" placeholder="Codconsulta" value="<%= _.escape(item.get('codconsulta') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codmedicamentoInputContainer" class="control-group">
					<label class="control-label" for="codmedicamento">Codmedicamento</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codmedicamento" placeholder="Codmedicamento" value="<%= _.escape(item.get('codmedicamento') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codexameInputContainer" class="control-group">
					<label class="control-label" for="codexame">Codexame</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codexame" placeholder="Codexame" value="<%= _.escape(item.get('codexame') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="comentarioInputContainer" class="control-group">
					<label class="control-label" for="comentario">Comentario</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="comentario" rows="3"><%= _.escape(item.get('comentario') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePrescricaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePrescricaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Prescricao</button>
						<span id="confirmDeletePrescricaoContainer" class="hide">
							<button id="cancelDeletePrescricaoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePrescricaoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="prescricaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Prescricao
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="prescricaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePrescricaoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="prescricaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPrescricaoButton" class="btn btn-primary">Add Prescricao</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
