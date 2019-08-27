<div class="jumbotron">
	<h3>Gestion Clients:</h3>
</div>
<div class="container">
 <div class="row">
     <?php echo anchor("addClient","Ajouter",['class'=>'btn btn-primary']); ?>
 </div>   
 <hr>
 <div class="row">
    <div class="col-md-12">
        <h1>Liste des Clients:</h1>
        <table id="client" class="table table-bordered table-striped table-hover">
         <thead>
             <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Age</td>
                <td>Courriel</td>
                <td>Adresse</td>
                <td>Ville</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
</div>
</div>