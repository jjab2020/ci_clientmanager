<div class="jumbotron">
	<p><h3>Gestion des commandes des clients:</h3></p>
</div>
<input type="hidden" id="idClient" name="idClient" value="<?php echo $idClient?>"/>
<div class="container-fluid">
	<div class="row">
		<div id="result"></div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>Passer une commande pour le client: <?php echo $nomClient ?></h4>
			<hr>
			<table id="commandes" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<td>Id</td>
						<td>Description</td>
						<td>Prix</td>
						<td>Quantité disponible</td>
						<td>Quantité</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>

		</div>
	</div>
	<div class="container-fluid">
		<div class="btn-toolbar">
		<button type="button"  id="btn-clear-command"  class="btn btn-danger"><i class="far fa-trash-alt"></i> Effacer</button>	
		<button type="button"  id="btn-add-command"  class="btn btn-info mybutton">Commander</button>
		</div>		
	</div>
</div>
