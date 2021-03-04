<!DOCTYPE html>
<html>
<head>
    <title>GDPA</title>

<link href="<?php echo base_url();?>assets/temp/css/vendor.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/temp/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/temp/js/vendor.js?>"></script>
    <script src="<?php echo base_url();?>assets/temp/js/app.js?>"></script>
    <script src="<?php echo base_url();?>assets/temp/jsAddons/datatables.js?>"></script>

</head>
<body class="">

<section class="col-md-3" style="height: 100%;">
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div>Administrateur
                    </div>
                </div>
                    <nav class="menu">
                       <ul class="sidebar-menu metismenu" id="sidebar-menu">
                            <li >
                                <a href="<?php echo base_url()."index.php/admin/viewlistdemencour"; ?>"><i class="fa fa-home"></i> Accueil</a>
                            </li>

                            <hr/>
                            <li class="ml-2" >
                                Liste des traitements : 
                            </li>
                            <hr/>
                            <li class='active'>
                                <a href="<?php echo base_url()."index.php/user/listUser"; ?>">
                                <i class="fa fa-list"></i> Les utilisateurs</a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-th-large"></i> Les demandes de PA
                                    <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                       <li class="active">
                                        <a href="<?php echo base_url()."index.php/admin/viewlistdemencour"; ?>">
                                        <i class="fa fa-list"></i> Liste des demandes en cours</a>
                                     </li>
                                    <li class="active">
                                        <a href="<?php echo base_url()."index.php/admin/viewdemvalider"; ?>">
                                        <i class="fa fa-list"></i> Liste des demandes validées</a>
                                    </li>
                                    <li class="active">
                                        <a href="<?php echo base_url()."index.php/admin/listdemannuler"; ?>">
                                        <i class="fa fa-list"></i> Liste des demandes annulées</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-th-large"></i> Les décisions
                                    <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                    <li class="active">
                                    <a href="<?php echo base_url()."index.php/admin/all_decision"; ?>">
                                    <i class="fa fa-list"></i> Liste des décisions en cours</a>
                                    </li>
                                    <li class="active">
                                    <a href="<?php echo base_url()."index.php/admin/list_des_val"; ?>">
                                    <i class="fa fa-list"></i> Liste des décision validées</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-th-large"></i> Récupération jour-off
                                    <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                    <li class="active">
                                    <a href="<?php echo base_url()."index.php/model_recupOff/list_all_recupoff"; ?>">
                                    <i class="fa fa-list"></i> Les demandes de RJO en cours </a>
                                    </li>
                                    <li class="active">
                                    <a href="<?php echo base_url()."index.php/model_recupOff/rjovalid"; ?>">
                                    <i class="fa fa-list"></i> Les jour-off récupérées </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
        </aside>
    </section>

  
<section class="section" style="margin-left: 20%;">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class="card-title-block">
                <h3 class="title">Liste des personnels</h3>
                </div>
                <section class="col-md-12">
                <div class="btn btn-default">
                <a href="<?php echo base_url()."index.php/pdf/pdf_list_user"; ?>">
                <i class="fa fa-pdf"></i> Convertire en pdf les listes</a>
                </div>
                <div class="" >
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr >
                                <th>Id user</th>
                                <th>Numero matricule</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Fonction</th>
                                <th>Mot de passe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $i=1;
                        foreach ($user AS $users) : ?>
                        <tbody id="#myTable">
                            <tr >
                                <td><?php echo $i++;?></td>
                                <td><?php echo $users->uMatricule;?></td>
                               <td><?php echo $users->username;?></td>
                                <td><?php echo $users->uAddress;?></td>
                                <td><?php echo $users->uGrade;?></td>
                                <td><?php echo $users->uPassword;?></td>
                                <td>
                                <a href="<?php echo base_url(); ?>index.php/user/visit/<?php echo $users->uId; ?>">
                                <button class="btn btn-sm btn-primary" ><i class="">Visiter</i></button> </a>
                                <a >
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModalsupp"><i class="">Supprimer</i></button> </a>
                                <!-- suppmodal-->
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
                                      <a type="button"  href="<?php echo base_url(); ?>index.php/user/delete/<?php echo $users->uId; ?>" class="btn btn-primary">Oui</a>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <!--modal Visite-->
                                
                                </td>
                            </tr>
                        <?php endforeach; ?>
                                                                                     
                        </tbody>
                    </table>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</section>
        
<!--<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>-->

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
$(document).ready(function(){
  $("example1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>