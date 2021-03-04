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
		<h3 class="text-center text-bordered">LES LISTES DES CADRES MAINTENANCES</h3>
	</div>

	  <div class="table-responsive-xl">
	  	<table class="table table-bordered table-info" style="
    
    width: 100%;">
           <thead>
                                                        <tr class="info ">
                                                                <th>Id user</th>
                                                                <th>Numero matricule</th>
                                                                <th>Nom</th>
                                                                <th>Adresse</th>
                                                                <th>Fonction</th>
                                                            </tr>
                                                            </thead>
                                                            <?php $i=1;
                                                             foreach ($user AS $users) : ?>
                                                            <tbody>
                                                            <tr >
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $users->uMatricule;?></td>
                                                                <td><?php echo $users->username;?></td>
                                                                <td><?php echo $users->uAddress;?></td>
                                                                <td><?php echo $users->uGrade;?></td>                                                               
                                                            </tr>

                                                        <?php endforeach; ?>
                                                                                                       
                                                    </tbody>
       </table>
	  </div>
	  <div>
	  	<p class="text" style=" text-align: right;">Le......................... à...................... </p>
	  	<p class="text" style=" text-align: center;">Signature </p>
	  </div>

</body>
</html>