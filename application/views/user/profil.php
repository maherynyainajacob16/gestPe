<!DOCTYPE html>
<html>
<head>
	<title>GDPA</title>


 <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo base_url();?>assets/temp/jsAddons/datatables.js?>"></script>

    
</head>
<body class="" style="">
<nav class="navbar navbar-inverse navbar-menu">
  <div class="container-fluid ">
    <div class="">
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
    <li><a class="" href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"> </span> Modifier le mot de passe</a></li>
      <li class=""><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <!--<li><a href="<?php echo base_url()."index.php/register/regist"; ?>"><span class="glyphicon glyphicon-pencil"></span> Create</a></li>-->
      <li><a href="<?php echo base_url()."index.php/register/log"; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>	
	
	
     
<section class="section">
<section class="col-md-12">
  <div class="col-lg-12">
    <div class="">
      <div class="col-md-7 profile-text  centered">
        <h2>Nom: <?php echo $_SESSION['username'] ; ?></h2>
           
        <h2>Matricule:<?php echo $_SESSION['uMatricule'] ; ?></h2>
        
        <?php if(isset($statreliq->nbreliq)) { ?>
        <h2>Votre nombres des jours restant:<?php echo $statreliq->nbreliq; ; ?></h2>
        <?php }?>   
      </div>
              <!-- /col-md-4 -->
              
      <div class="col-md-4 centered">
        <div class="profile-pic">
              <!-- /col-md-4 <h1 class="text-center"> Bienvenue dans votre compte cher utilisateur </h1>-->
              <p><img src="<?php echo base_url();?>/assets/image/logo.jpg" class="img-circle" alt="Lights" style="width:50% ; height: 150px;"></p>
        </div>
      </div>
              <!-- /col-md-4 -->
    </div>
            <!-- /row -->
  </div>
  <div class="">
    <div class="card-title-block">
      <h3 class="text-center">Listes des demandes validées</h3>
     </div>
  </div>
  <div class="table-responsive col-md-13" >
    <table id="example2" class="table table-bordered table-hover " >
      <tr  class="info ">
          <th>Id</th>
          <th>Numero matricule</th>
          <th>Nom</th>
          <th>Date debut </th>
          <th>Date fin</th>
          <th>Nb jour</th>
          <th>Reponse</th>
          <th>Motif</th>
      </tr>
        <?php $i=1;
        foreach ($demandevalide AS $demandes) : ?>
      <tr >
          <td><?php echo $i++;?></td>
          <td><?php echo $demandes->uMatricule;?></td>
          <td><?php echo $demandes->username;?></td>
          <td><?php echo $demandes->date_debut_demande;?></td>
          <td><?php echo $demandes->date_fin_demande;?></td>
          <td><?php echo $demandes->nb_jour_demande;?></td>
          <td><?php echo $demandes->reponse;?></td>
          <td><?php echo $demandes->motif;?></td>
      </tr>
        <?php endforeach; ?>
    </table>
  </div>
    
</section>

</section>
  <!--modaleajout-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modifier le mot de passe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form  action="<?php echo base_url();?>index.php/user/update_user" method="POST" class="">
        <div class="form-group">
        <label for="numDecision" class="">Nom:</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $_SESSION['username']; ?>">  
        </div>  
        <div class="">
        <label for="uMatricule" class="">Matricule:</label>
        <input type="text" name="uMatricule" class="form-control" value = "<?php echo $_SESSION['uMatricule'] ; ?>" > 
        </div>
        <div class="form-group">
        <label for="nb_jour_donne" class="">Nouveau mot de passe:</label>
        <input type="text" name="mdp" id="mdp" class="form-control">  
        </div>
        
      
        </div>
        
        <!-- Modal footer -->
        
    <div class="modal-footer">
      <div class="">
        <button class="btn btn-success" name="update_user">Save</button>
      </div>          
      </div>
        </form>
      </div>
    </div>
  </div>	

    <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="<?php echo base_url();?>assets/text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url();?>assets/lib/common-scripts.js"></script>
  <!--script for this page-->
  <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Dashio Admin Theme!'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
  </script>

  </body>
</html>