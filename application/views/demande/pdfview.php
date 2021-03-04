<!DOCTYPE html>
<html>
<head>
	<title></title>
	
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
table,  tr, th {
    border: 2px solid black;
     
     padding: 33px;
}
</style>

</head>
<body>

	<div>
		<h2 class="text text-center" style="color: blue;">Agence pour la Sécurité de la Navigation Aérienne en Afrique et a Madagascar</h2><br/>
		<p class="text-center">Représentation de Madagascar</p>

	</div>
	<div>
		<h3 class="text-center text-bordered">FORMULAIRE DE DEMANDE D'AUTORISATION D'ABSENCE</h3>
	</div>

	  <div class="table-responsive-xl">
	  	<table class="table table-bordered table-info" style="
    
    width: 100%;">
            <tr  class="info ">
                <?php $i=1;
                foreach ($demande AS $demandes) : ?>
                <th>Numero matricule :</th>
                <th><?php echo $demandes->uMatricule;?></th>
            </tr>
            <tr>
                <th>Nom :</th>
                <th><?php echo $demandes->username;?></th>
            </tr>
            <tr>
                <th>Date debut :</th>
                <th><?php echo $demandes->date_debut_demande;?></th>
            </tr>
            <tr>
                <th>Date fin :</th>
                <th><?php echo $demandes->date_fin_demande;?></th>
            </tr>
            <tr>
                <th>Nb jour demandé :</th>
                <th><?php echo $demandes->nb_jour_demande;?></th>
                                                	
            </tr>
            <tr>
                <th>Reponse :</th>
                <th><?php echo $demandes->reponse;?></th>
            </tr>  
            <tr>
            <th>Motif :</th>
            <th><?php echo $demandes->motif;?></th>
            </tr>
            <?php endforeach; ?>   
            <?php foreach ($statreliq AS $stat ) : ?>
            <tr>
               	<th>Nb jour restant :</th>
                <th><?php echo $stat->nbreliq; ?></th>
                <?php endforeach; ?>
            </tr>
                                                    
       </table>
	  </div>
	  <div>
	  	<p class="text" style=" text-align: right;">Le......................... à...................... </p>
	  	<p class="text" style=" text-align: center;">Signature </p>
	  </div>

</body>
</html>