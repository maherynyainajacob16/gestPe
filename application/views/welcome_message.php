<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>GDPA</title>

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/styleslide.css" rel="stylesheet">

<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">


<link href="<?php echo base_url();?>assets/css/styleKL.css" rel="stylesheet">
  <style>
    body{
      background-color: dodgerblue;
      background-repeat: no-repeat;
      background-position: center;
      border-width: 100%;

    }
  </style>
   <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">

<body >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>

    <ul class="nav navbar-nav">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li class=""><a class="navbar-brand" href="">Gestion du congé personnel</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <li><a  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span>  Create</a></li>
      <li><a href="<?php echo base_url()."index.php/register/log"; ?>"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
      <li><a href="#"></a></li>
      <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Créer le compte</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
               <form  action="<?php echo base_url(); ?>index.php/register/regist" method="POST" class="">
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
            
          
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                  <div class="">
              <button class="btn btn-success" name="insert_user" ><span class="glyphicon glyphicon-ok"></span>Save</button>
            </div>
              </div>
              </form>
            </div>
          </div>
        </div>
  </div>
</nav>
<div class="card-body">
<div class="container">
  <div class="card border p-7" style="width:100% ; h">
    <img class="card-img-top" src="<?php echo base_url();?>assets/image/font1" alt="Card image" style="width:100%">
  </div>
</div>  
</div>

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