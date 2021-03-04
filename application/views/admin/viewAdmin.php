<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>

	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"> <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</head>
<body class="container" style="">
	<div class="col-lg-8 col-lg-offset-6">
	<h1 class="text-center">view admin</h1>
	<?php if(isset($_SESSION['success'])) { ?>
	<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
	<?php echo validation_errors('<div class="alert alert-danger">' ,' </div>');  ?>

	<?php }?>
	<div>
		<label>Nom:</label>
		<input type="text" name="nomUs" value ="<?php echo $_SESSION['username'] ; ?>" disabled>
	</div>
	<div>
		<label>Matricule:</label>
		<input type="text" name="nomUs" value ="<?php echo $_SESSION['uMatricule'] ; ?>" disabled>
	</div>
<?php echo anchor( "user/listUser",'list',['class'=>'btn btn-primary'] ); ?>

	</div>	
	<form method="POST">
                                        <input type="date" name="date1" id="date1" class="form-control" placeholder="date1">
                                        <input type="date" name="date2" id="date2" placeholder="date2" class="form-control">
                                        <button  name="chercher" id="chercher" class="btn btn-success" value=""> Chercher</button>  
                                        </form>
</body>
</html>