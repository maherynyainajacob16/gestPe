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
<body style="background-color: dodgerblue;">
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
	<div class="container">
	<h1 class="text-center">modifier la décision</h1>
	<?php if(isset($_SESSION['success'])) { ?>
	<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
	<?php echo validation_errors('<div class="alert alert-danger">' ,' </div>');  ?>
	<?php }?>
	<div class="col-md-4">
		<div class="well" style="height: 350px;">
			<div class="thumbnail"><img src="<?php echo base_url();?>/assets/image/logo.jpg" alt="Lights" style="width:100% ; height: 300px;"></div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="well">
			<form  action="" method="POST" class="">
				<div class="form-group">
				<label for="numDecision" class="">N° Decission:</label>
				<input type="text" name="numDecision" id="numDecision" class="form-control" value="<?php echo $statut->numDecision;?>">	
				</div>	
				<div class="">
				<label for="uMatricule" class="">Matricule:</label>
				<input type="text" name="uMatricule" class="form-control" value = "<?php echo $_SESSION['uMatricule'] ; ?>">	
				</div>
				<div class="form-group">
				<label for="nb_jour_donne" class="">Nb jour donner:</label>
				<input type="number" name="nb_jour_donne" id="nb_jour_donne" class="form-control" value="<?php echo $statut->nb_jour_donne;?>">	
				</div>
				<div class="form-group">
				<label for="nb_jour_ancient" class="">Nb jour d'ancienneté:</label>
				<input type="number" name="nb_jour_ancient" id="nb_jour_ancient" class="form-control" value="<?php echo $statut->nb_jour_ancient;?>">	
				</div>
				<div class="form-group">
				<label for="date_debut_pa" class="">Date debut:</label>
				<input type="date" name="date_debut_pa" id="date_debut_pa" class="form-control" value="<?php echo $statut->date_debut_pa;?>">	
				</div>
				<div class="form-group">
				<label for="date_fin_pa" class="">Date fin :</label>
				<input type="date" name="date_fin_pa" id="date_fin_pa" class="form-control" value="<?php echo $statut->date_fin_pa;?>">	
				</div>
				<div class="">
					<button class="btn btn-success" name="updatestat" data-toggle="modal" data-target="#myModalsupp">Update</button>
				</div>
				
              <

			</form>
		</div>
	</div>
	</div>
	<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="<?php echo base_url();?>assets/text/javascript" src="lib/jquery.backstretch.min.js"></script>
</body>
</html>