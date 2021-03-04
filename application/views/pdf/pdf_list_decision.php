<!DOCTYPE html>
<html>
<head>
	<title></title>
	
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
table,  tr, th,td {
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
		<h3 class="text-center text-bordered">Listes des décisions validées</h3>
	</div>

	  <div class="table-responsive-xl">
	  	<table class="table table-bordered table-info" style="
    
    width: 100%;">
            <tr  class="info ">
                                                                <th>Id</th>
                                                                <th>Numero decision</th>
                                                                <th>Numero matricule</th>
                                                                <th>Nb jour donner</th>
                                                                <th>Nb jour d'ancienneté</th>
                                                                <th>Date debut </th>
                                                                <th>Date fin </th>
                                                                <th>reponse</th>
                                                            </tr>
                                                            <?php $i = 1;
                                                            foreach ($statvalid AS $statuts) : ?>

                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $statuts->numDecision;?></td>
                                                                <td><?php echo $statuts->uMatricule;?></td>
                                                                <td><?php echo $statuts->nb_jour_donne;?></td>
                                                                <td><?php echo $statuts->nb_ancien;?></td>
                                                                <td><?php echo $statuts->date_debut;?></td>
                                                                <td><?php echo $statuts->date_fin;?></td>
                                                                <td>
                                                                    
                                                                <?php echo $statuts->statvalid;?>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                    
       </table>
	  </div>
	  <div>
	  	<p class="text" style=" text-align: right;">Le......................... à...................... </p>
	  	<p class="text" style=" text-align: center;">Signature </p>
	  </div>

</body>
</html>