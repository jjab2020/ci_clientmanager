
<div class="jumbotron">
	<h2 class='dispaly-3'><?= $title ?></h2>
</div>

<div class="my-4">

<div class="row">

 <div class="col-lg-4">
  <?php echo anchor("register","S'inscrire",['class'=>'btn btn-primary']); ?>
</div>

<div class="col-lg-4">
  <?php if(!$this->session->userdata('nom')):?> 
  	<?php echo anchor("login","S'authentifier",['class'=>'btn btn-primary']); ?>
  <?php endif;?>
</div>

</div>

</div>
