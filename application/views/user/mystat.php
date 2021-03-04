<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>
	
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  	 <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
</head>
<body class="" style="background-color: white;">
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
	<!--Modal-->
	
  
	<div>
		
	</div>

	<div align="rigth"></div>
	<h2 class="text-center">Listes de mes décisions</h2>
	<div class="table-responsive" style="overflow-x: unset;" >
	<div class="col-md-10 col-md-offset-1">
	<div class="btn btn-default"><a class="" href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"> </span> Ajouter une décision</a></div>
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
				<th>Action</th>
			</tr>
			<?php $i = 1;
			foreach ($statut AS $statuts) : ?>

			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $statuts->numDecision;?></td>
				<td><?php echo $statuts->uMatricule;?></td>
				<td><?php echo $statuts->nb_jour_donne;?></td>
				<td><?php echo $statuts->nb_jour_ancient;?></td>
				<td><?php echo $statuts->date_debut_pa;?></td>
				<td><?php echo $statuts->date_fin_pa;?></td>
				<td>
					<a >
					<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModaledit" ><i class="glyphicon glyphicon-edit"></i></button> </a>
					<a>
					<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModalsupp"><i class="glyphicon glyphicon-trash"></i></button> 
					</a>
					<!--Modaledit-->
					<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                <div class="modal-dialog">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                      <h4 class="modal-title" id="myModalLabel">Modification</h4>
	                    </div>
	                    <div class="modal-body">
	                      Vous etes sûre?
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	                      <a type="button"  href="<?php echo base_url(); ?>index.php/mise_jour/editstat/<?php echo $statuts->idStat; ?>" class="btn btn-primary">Oui</a>
	                    </div>
	                  </div>
	                </div>
	              	</div>
					<!--modalsupp-->
					<div class="modal fade" id="myModalsupp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                <div class="modal-dialog">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                      <h4 class="modal-title" id="myModalLabel">Suppression</h4>
	                    </div>
	                    <div class="modal-body">
	                      Vous etes sûre?
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	                      <a type="button"  href="<?php echo base_url(); ?>index.php/mise_jour/deletestat/<?php echo $statuts->idStat; ?>" class="btn btn-primary">Oui</a>
	                    </div>
	                  </div>
	                </div>
	              	</div>
				</td>
			</tr>

		<?php endforeach; ?>
		</table>
	</div>
	<!--modaleajout-->
	<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nouvelle décision</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form  action="<?php echo base_url();?>index.php/mise_jour/insert_update_statut " method="POST" class="">
				<div class="form-group">
				<label for="numDecision" class="">N° Decission:</label>
				<input type="text" name="numDecision" id="numDecision" class="form-control">	
				</div>	
				<div class="">
				<label for="uMatricule" class="">Matricule:</label>
				<input type="text" name="uMatricule" class="form-control" value = "<?php echo $_SESSION['uMatricule'] ; ?>" >	
				</div>
				<div class="form-group">
				<label for="nb_jour_donne" class="">Nb jour donner:</label>
				<input type="number" name="nb_jour_donne" id="nb_jour_donne" class="form-control">	
				</div>
				<div class="form-group">
				<label for="nb_jour_ancient" class="">Nb jour d'ancienneté:</label>
				<input type="number" name="nb_jour_ancient" id="nb_jour_ancient" class="form-control">	
				</div>
				<div class="form-group">
				<label for="date_debut_pa" class="">Date debut :</label>
				<input type="date" name="date_debut_pa" id="date_debut_pa" class="form-control">	
				</div>
				<div class="form-group">
				<label for="date_fin_pa" class="">Date fin :</label>
				<input type="date" name="date_fin_pa" id="date_fin_pa" class="form-control">	
				</div>
				
			
        </div>
        
        <!-- Modal footer -->
        
		<div class="modal-footer">
			<div class="">
				<button class="btn btn-success" name="insert_stat">Save</button>
			</div>         	
	    </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modaleedit-->
  	</div>
	<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="<?php echo base_url();?>assets/text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>

</body>
</html>