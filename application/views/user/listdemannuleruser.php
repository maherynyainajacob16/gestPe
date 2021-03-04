<!DOCTYPE html>
<html>
<head>
	<title>GDPA </title>


	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
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

 <section class="section">
                           <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="text-center">Listes des demandes annulées</h3>
                                        </div>
                                        <section class="col-md-12">
                                        <div class="">
                                            <div class="table-responsive col-md-13" >
                                            <div class="btn btn-default"><a href="<?php echo base_url()."index.php/listdemUse/get_list_demande";?>"><span class="glyphicon glyphicon-list"></span> Liste demande en cours</a></div>
                                            <div class="btn btn-default"><a href="<?php echo base_url()."index.php/user/getlistdemannuler";?>"><span class="glyphicon glyphicon-list"></span> Les demandes annulées</a></div>
                                                <table class="table table-striped table-bordered" >
                                                <tr  class="info ">
                                                    <th>Id</th>
                                                    <th>Numero matricule</th>
                                                    <th>Nom</th>
                                                    <th>Date debut </th>
                                                    <th>Date fin </th>
                                                    <th>Nb jour </th>
                                                    <th>Reponse</th>
                                                    
                                                </tr>
                                                <?php $i=1;
                                                 foreach ($demandeannuler AS $demandes) : ?>

                                                <tr >
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $demandes->uMatricule;?></td>
                                                    <td><?php echo $demandes->user;?></td>
                                                    <td><?php echo $demandes->datedeb;?></td>
                                                    <td><?php echo $demandes->datefin;?></td>
                                                    <td><?php echo $demandes->nbjour;?></td>
                                                    <td>
                                                       <?php echo $demandes->reponse;?>

                                                    </td>
                                                   
                                                </tr>

                                                <?php endforeach; ?>

                                                </table>
                                                </div>
                                            </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


</body>
</html>