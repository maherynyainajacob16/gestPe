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

    <script >
        $(document).ready(function(){
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function(){
                $("#date1").datepicker();
                $("#date2").datepicker();
            });
            $('#chercher').click(function(){
                var date1 = $('#date1').val();
                var date2 = $('#date2').val();
                if (date1 != '' && date2 != '') {
                    $.ajax({
                        url : "<?php echo base_url()."index.php/admin/chercherdem"; ?>",
                        method: "POST",
                        data: {date1 : date1, date2 : date2},
                        success : function(data)
                        {
                            $('#table').html(data);
                        }
                    });
                }
                else{
                    alert("please Select the data");

                }

            });
        });
        
    </script>
</head>
<body class="" style="">
    
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

                <section class="section">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title">Liste des demandes validées</h3>
                                        </div>
                                        <section class="col-md-12">
                                        <div > 
                                        
                                        </div>
                                            <div id="table" class="table-responsive col-md-13" >
                                                <table class="table table-bordered table-hover">
                                                <tr  class="info ">
                                                    <th>Id</th>
                                                    <th>Numero matricule</th>
                                                    <th>Nom</th>
                                                    <th>Date debut</th>
                                                    <th>Date fin</th>
                                                    <th>Nb jour</th>
                                                    <th>Reponse</th>
                                                    <th>Motif</th>
                                                    <th>Action</th>

                                                </tr>
                                                <?php $i=1;
                                                 foreach ($demandevalid AS $demandes) : ?>

                                                <tr >
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo $demandes->uMatricule;?></td>
                                                    <td><?php echo $demandes->username;?></td>
                                                    <td><?php echo $demandes->date_debut_demande;?></td>
                                                    <td><?php echo $demandes->date_fin_demande;?></td>
                                                    <td><?php echo $demandes->nb_jour_demande;?></td>
                                                    <td>
                                                       <?php echo $demandes->reponse;?>

                                                    </td>
                                                    <td>
                                                       <?php echo $demandes->motif;?>

                                                    </td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/pdf/detailspdf/<?php echo $demandes->idval; ?>">
                                                    <button class="btn btn-sm btn-danger"><i class="">Convertire en pdf</i></button> </a>
                                                    </td>
                                                    
                                                </tr>

                                                <?php endforeach; ?>

                                                </table>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        
            </div>
        </div>

</body>
</html>