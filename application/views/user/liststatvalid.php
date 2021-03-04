<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>
	
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  	<link href="<?php echo base_url();?>assets/table/css/dataTables.bootstrap.css" rel="stylesheet">
  	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url();?>assets/table/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url();?>assets/table/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url();?>assets/table/angular.min.js"></script>
</head>
<body class="" style="background-color: ;">
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
	<div align="rigth"></div>
	<h2 class="text-center">Liste de mes décisions validées</h2>
	<div class="table-responsive" style="overflow-x: unset;" >
	<div class="col-md-10 col-md-offset-1">
	<div class="btn btn-default"><a class="" href="<?php echo base_url()."index.php/user/mystat"; ?>"><span class="glyphicon glyphicon-list"> </span> Les décision en cours</a></div>
	<div class="btn btn-default"><a href="<?php echo base_url()."index.php/mise_jour/listdesval";?>"><span class="glyphicon glyphicon-list"></span> Les décision validées</a></div>
		 <table class="table table-striped table-bordered" dt-options="vm.dtOptions" datatable="ng" >
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
					<td><?php echo $statuts->statvalid;?></td>
				</tr>
					<?php endforeach; ?>
		</table>
	</div>
	</div>

</body>
</html>