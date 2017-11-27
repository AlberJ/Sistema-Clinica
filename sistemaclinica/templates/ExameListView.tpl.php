<?php
	$this->assign('title','sistemaclinica | Exames');
	$this->assign('nav','exames');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/exames.js").wait(function(){
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
	<i class="icon-th-list"></i> Exames
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="exameCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Tipoexame">Tipoexame<% if (page.orderBy == 'Tipoexame') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricaoexame">Descricaoexame<% if (page.orderBy == 'Descricaoexame') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('tipoexame')) %>">
				<td><%= _.escape(item.get('tipoexame') || '') %></td>
				<td><%= _.escape(item.get('descricaoexame') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="exameModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="tipoexameInputContainer" class="control-group">
					<label class="control-label" for="tipoexame">Tipoexame</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="tipoexame"><%= _.escape(item.get('tipoexame') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoexameInputContainer" class="control-group">
					<label class="control-label" for="descricaoexame">Descricaoexame</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoexame" placeholder="Descricaoexame" value="<%= _.escape(item.get('descricaoexame') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteExameButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteExameButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Exame</button>
						<span id="confirmDeleteExameContainer" class="hide">
							<button id="cancelDeleteExameButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteExameButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="exameDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Exame
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="exameModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveExameButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="exameCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newExameButton" class="btn btn-primary">Add Exame</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
