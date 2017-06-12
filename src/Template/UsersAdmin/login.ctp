<?php 
	$this->layout = 'layout'; 
?>
<title>Login Usuario Admin | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">INICIAR SESI&Oacute;N ADMINISTRADOR</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/login_users_admin') ?>
		</div>
	</div>
</div>

			