<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>
	
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: ;">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		    <div class="navbar-header">
		    </div>
		     <ul class="nav navbar-nav">
		    	   	
		    	<li><a href="<?php echo base_url()."index.php/user/profil"; ?>"><span class="glyphicon glyphicon-home"> Profil </span></a></li>
		        <li ></li>
		        <li ></li>
		        <li ></li>
		      	<li><a href="<?php echo base_url()."index.php/user/mystat"; ?>"><span class="glyphicon glyphicon-list"></span> Les décisions en cours</a></li>
		        <li><a href="<?php echo base_url()."index.php/listdemUse/get_list_demande";?>"><span class="glyphicon glyphicon-list"></span> Les demandes en cours</a></li>
		        <li><a href="<?php echo base_url()."index.php/model_recupOff/rjo_get";?>"><span class="glyphicon glyphicon-list"></span> Récupération jour-off</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		        <li class=""><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
		        <!--<li><a href="<?php echo base_url()."index.php/register/regist"; ?>"><span class="glyphicon glyphicon-pencil"></span> Create</a></li>-->
		        <li><a href="<?php echo base_url()."index.php/register/log"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		</div>
	</nav>
	<div class="">
	<h2 class="text-center">Les jour-off récupérées</h2>
	<div class="col-md-10 col-md-offset-1">
	<div class="btn btn-default"><a href="<?php echo base_url()."index.php/model_recupOff/rjo_get";?>"><span class="glyphicon glyphicon-list"></span> Demande jour-off en cours</a></div>
	<div class="btn btn-default"><a href="<?php echo base_url()."index.php/user/getlistdemannuler";?>"><span class="glyphicon glyphicon-list"></span> Les jour-off récupérées</a></div>
	<div class="weel">
		<table class="table table-striped table-bordered" dt-options="vm.dtOptions" datatable="ng" >
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
				<td><?php echo $recup->reponse;?></td>
			</tr>
			<?php endforeach; ?>
			</table>
	</div>
	</div>
	</div>

</body>
</html>