<div class="jumbotron">
	<h3>Dashboard</h3>
</div>
<div class="container">
	<?php $username = $this->session->userdata('nom');?>
	<h3><?php echo 'Welcome '.$username ?></h3>
	<br>
	
	<?php echo anchor("client","Clients",['class'=>'btn btn-primary']); ?>
	<?php echo anchor("commande","Commandes",['class'=>'btn btn-primary']); ?>
</div>