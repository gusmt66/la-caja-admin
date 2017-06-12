<?php 
header('Content-type: text/html; charset=UTF-8')
?>
<!doctype html>
<html>
	<head>
		<?php echo $this->Html->charset();?>
		<?php echo $this->Html->charset('ISO-8859-1');?>
		<?php
			echo $this->Html->meta('icon', $this->Html->link('/favicon.ico'));
			echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css');
			echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min.css');
			echo $this->Html->css('main.min.css');
			echo $this->Html->css('/bower_components/datatables/media/css/dataTables.bootstrap.min.css');
			echo $this->Html->script('/bower_components/jquery/dist/jquery.min.js');
			echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js');
			echo $this->Html->script('/bower_components/datatables/media/js/jquery.dataTables.min.js');
			echo $this->Html->script('/bower_components/datatables/media/js/dataTables.bootstrap.min.js');
			echo $this->Html->script('//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js');
			
		?>
	<script>
$(document).ready(function() {
$('#example').DataTable( 
{
	"iDisplayLength": 100,
	"responsive": false,
	 fixedColumns: true,
	 "scrollX": false,
		"language": 
		{
		"url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
		}
} 
        )});
</script>
	</head>
	<body>
		<div class="wrapper">
			<div class="header-wrapper">
				<div class='content'>
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <?php 
					      if(!$user_id)
					      {
					      	echo $this->Html->link('LA CAJA', ['controller' => 'UsersAdmin', 'action' => 'login'], ['class'=>'navbar-brand']);
							echo '</div>';
							echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
								echo '<ul class="nav navbar-nav">';
									//echo '<li>'.$this->Html->link('AÑADIR USUARIOS ADMIN', ['controller' => 'UsersAdmin', 'action' => 'add']).'</li>';
								echo '</ul>';
							echo '</div>';
							echo '</div>';
							echo '</nav>';
						  }
					      else
					      {
					      	echo $this->Html->link('LA CAJA', ['controller' => 'UsersApp', 'action' => 'index'], ['class'=>'navbar-brand']);
							echo '</div>';
							echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
								echo '<ul class="nav navbar-nav">';
									echo '<li>'.$this->Html->link('USUARIOS', ['controller' => 'UsersApp', 'action' => 'index']).'</li>';
									echo '<li>'.$this->Html->link('NOTIFICACIONES PUSH', ['controller' => 'Notifications', 'action' => 'index']).'</li>';
									echo '<li>'.$this->Html->link('PARAMETROS GENERALES', ['controller' => 'GlobalParameters', 'action' => 'index']).'</li>';
									echo '<li>'.$this->Html->link('LOGOUT', ['controller' => 'UsersAdmin', 'action' => 'logout']).'</li>';
								echo '</ul>';
							echo '</div>';
							echo '</div>';
							echo '</nav>';
					      }
					      ?>
				</div>
				<div class='clear'></div>
			</div>

			<?= $this->fetch('content') ?>

		</div>
	</body>
</html>
