<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
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
	<h1 class="text-center">Récuperation du jour-Off</h1>
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
				<label for="nbJ" class="">Nb jour:</label>
				<input type="number" name="nbJ" id="nbJ" class="form-control" value="<?php echo $recupoff->nbJ ?>">	
				</div>
				<div class="form-group">
				<label for="date_debut" class="">Date debut :</label>
				<input type="date" name="date_debut" id="date_debut" class="form-control" value="<?php echo $recupoff->date_debut ?>">	
				</div>
				<div class="form-group">
				<label for="date_fin" class="">Date fin :</label>
				<input type="date" name="date_fin" id="date_fin" class="form-control" value="<?php echo $recupoff->date_fin ?>">	
				</div>
				<div class="">
					<button class="btn btn-success" name="update_jOff">Save</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</body>
</html>