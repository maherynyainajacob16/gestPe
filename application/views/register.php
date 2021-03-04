<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="" style="background-color: dodgerblue;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>

    <ul class="nav navbar-nav">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li class=""><a class="navbar-brand" href="">Gestion du congé des personnels</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <li><a href="<?php echo base_url()."index.php/register/regist"; ?>"><span class="glyphicon glyphicon-edit"></span>  Create</a></li>
      <li><a href="<?php echo base_url()."index.php/register/log"; ?>"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
      <li><a href="#"></a></li>
  </div>
</nav>

	<div class="">
	<h1 class="text-center">Ajouter un utilisateur</h1>
	<?php if(isset($_SESSION['success'])) { ?>
	<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
	<?php echo validation_errors('<div class="alert alert-danger">' ,' </div>');  ?>
	<?php }?>
	
	<div class="col-md-3">
		<div class="well">
			<div class="thumbnail"><img src="<?php echo base_url();?>/assets/image/logo.jpg" alt="Lights" style="width:100% ; height: 330px;">
			</div>
		</div>
	</div>
	<div class=" col-md-8">
		<div class="well">
			<div align="right">
			<button type="button" name="create" class="btn btn-default"  ><a href="<?php echo base_url(); ?>index.php/register/log"><span class="glyphicon glyphicon-log-in"></span> Login</a></button>
			</div>
			<form  action="" method="POST" class="">
				<div class="form-group">
				<label for="username" class="">Nom:</label>
				<input type="text" name="username" id="username" class="form-control">	
				</div>	
				<div class="form-group">
				<label for="uMatricule" class="">Matricule:</label>
				<input type="text" name="uMatricule" id="uMatricule" class="form-control">	
				</div>
				<div class="form-group">
				<label for="uAddress" class="">Adresse:</label>
				<input type="text" name="uAddress" id="uAddress" class="form-control">	
				</div>
				<div class="form-group">
				<label for="uPassword" class="">Mot de passe:</label>
				<input type="password" name="uPassword" id="uPassword" class="form-control">	
				</div>
				<div class="form-group">
				<label for="uGrade" class="">Fonction:</label>
				<select class="form-control" id="uGrade" name="uGrade">
					<option value="admin">Chef unité</option>
					<option value="user">Cadre maintenance</option>
				</select>
				</div>
				<div class="">
					<button class="btn btn-success" name="insert_user"><span class="glyphicon glyphicon-ok"></span>Save</button>
				</div>
			</form>
		</div>
	</div>
	</div>	

</body>
</html>