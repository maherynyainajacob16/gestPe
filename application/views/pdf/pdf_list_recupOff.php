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
		<h3 class="text-center text-bordered">Listes des jour-off récupérées</h3>
	</div>

	  <div class="table-responsive-xl">
	  	<table class="table table-striped table-bordered" dt-options="vm.dtOptions" datatable="ng"  style="height: 100%;">
                                                            <tr  class="info ">
                                                                <th>Id</th>
                                                                <th>Nom</th>
                                                                <th>Numero matricule</th>
                                                                <th>Nb jour</th>
                                                                <th>Date debut </th>
                                                                <th>Date fin </th>
                                                                <th>Réponses</th>
                                                            </tr>
                                                            <?php $i = 1;
                                                            foreach ($recupoffval AS $recup) : ?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $recup->username;?></td>
                                                                <td><?php echo $recup->uMatricule;?></td>
                                                                <td><?php echo $recup->nbjOff;?></td>
                                                                
                                                                <td><?php echo $recup->date_debut;?></td>
                                                                <td><?php echo $recup->date_fin;?></td>
                                                                <td><?php echo $recup->reponse;?>                       

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