<?php
	$this->assign('title','sistemaclinica Secure Example');
	$this->assign('nav','secureexample');

	$this->display('_Header.tpl.php');
?>

<div class="container">

	<?php if ($this->feedback) { ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php $this->eprint($this->feedback); ?>
		</div>
	<?php } ?>

	<!-- #### this view/tempalate is used for multiple pages.  the controller sets the 'page' variable to display differnet content ####  -->

	<?php if ($this->page == 'login') { ?>

		<div class="hero-unit">
			<h1>Clinical System</h1></br>
			<!-- <p>
				<a href="secureadmin" class="btn btn-primary btn-large">Logar-se como Administrador</a>
				<?php if (isset($this->currentUser)) { ?>
					<a href="logout" class="btn btn-primary btn-large">Sair</a>
				<?php } ?>
			</p>
		</div> -->

		<form class="well" method="post" action="login">
			<fieldset>
			<legend>Informe seu usuário e senha</legend>
				<div class="control-group">
				<input id="username" name="username" type="text" placeholder="Usuário" />
				</div>
				<div class="control-group">
				<input id="password" name="password" type="password" placeholder="Senha" />
				</div>
				<div class="control-group">
				<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</fieldset>
		</form>

	<?php } else { ?>

		<div class="hero-unit">
			<h1>Acesse as seções abaixo </h1><br>

			<p>
				<ul class="nav">
					<li <?php if ($this->nav=='pacientes') { echo 'class="active"'; } ?>><a href="./pacientes">Pacientes</a></li>
					<li <?php if ($this->nav=='medicos') { echo 'class="active"'; } ?>><a href="./medicos">Medicos</a></li>
					<li <?php if ($this->nav=='consultas') { echo 'class="active"'; } ?>><a href="./consultas">Consultas</a></li>
					<li <?php if ($this->nav=='exames') { echo 'class="active"'; } ?>><a href="./exames">Exames</a></li>
					<li <?php if ($this->nav=='medicamentos') { echo 'class="active"'; } ?>><a href="./medicamentos">Medicamentos</a></li>
					<li <?php if ($this->nav=='prescricoes') { echo 'class="active"'; } ?>><a href="./prescricoes">Prescricões</a></li>

				</ul>
				<a href="logout" class="btn btn-primary btn-large">Sair</a>
			</p>
		</div>
	<?php } ?>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
