<?php
session_start();
include("controllers/DAO.php");
$dao=new DAO();
if( !isset($_SESSION['nono']) && !$dao->User($nono) ){
	header("location:into.php?erreur=1");
	die();
}
else{
    $nono=$_SESSION['nono'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include('models/sidemenubar.php');?>
    <div class="Main">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Update 
      <small>Profile</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
      <div class="col-md-12 col-xs-12">
        <div class="box">
        <br><br>
          <!-- /.box-header -->
          <?php
          if(isset($_GET['res'])&&($_GET['res']==1)) echo '<div class="form-group">
          <div class="alert alert-info" style=" background-color:#498D02;" role="alert">Mise à jour réussie.</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==5)) echo '<div class="form-group">
          <div class="alert alert-info" style=" background-color:#498D02;" role="alert">Mise à jour réussie.</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==2)) echo '<div class="form-group">
          <div class="alert alert-info"style=" background-color:#FF9800;" role="alert">Un problème s\'est produit lors de la mise à jour.</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==3)) echo '<div class="form-group">
          <div class="alert alert-info"style=" background-color:#FF9800;" role="alert">Le champ Confirm password doit correspondre au champ Password.</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==4)) echo '<div class="form-group">
          <div class="alert alert-info"style=" background-color:#FF9800;" role="alert">veullez saisir dabord le champ Confirm password .</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==6)) echo '<div class="form-group">
          <div class="alert alert-info"style=" background-color:#FF9800;" role="alert">Un problème s\'est produit lors de la mise à jour.</div>
          </div>';
          if(isset($_GET['res'])&&($_GET['res']==7)) echo '<div class="form-group">
          <div class="alert alert-info"style=" background-color:#FF9800;" role="alert">Ancien Mot de Passe est Incorrect</div>
          </div>';
          $user = $dao->GetUser($nono);
          foreach($user as $u)
          {
          echo'<form role="form" action="controllers/UpdateUser.php" method="post" enctype="multipart/form-data">
                            <div class="box-body" style=" font-size:15px;">                            
              
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="'.$u[3].'" class="form-control" id="email" name="email" autocomplete="off" >
                              </div>
      
                              <div class="form-group">
                                  <label for="fname">Prénom</label>
                                  <input type="text" value="'.$u[1].'" class="form-control" id="fname" name="fname" >
                              </div>
                              <div class="form-group">
                                  <label for="lname">Nom</label>
                                  <input type="text" value="'.$u[2].'" class="form-control" id="lname" name="lname" >
                              </div>
                              <div class="form-group">
                                  <label for="password">Mot de Passe Actuel <span style="color:red;">*</span></label>
                                  <input type="password" class="form-control" id="password" name="password" required>
                              </div>
                              <div class="form-group">
                                  <label for="npassword">Nouveau Mot de Passe</label>
                                  <input type="password" class="form-control" id="npassword"  name="npassword" >
                              </div>
                              <div class="form-group">
                                  <label for="cnpassword">Comfirmation de Nouveau Mot de Passe</label>
                                  <input type="password" class="form-control" id="cnpassword" name="cnpassword" >
                              </div>
                            </div>
                            <!-- /.box-body -->
              
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                              <a href="profile.php" class="btn btn-warning">Back</a>
                            </div>
                          </form>';
                        }
                        ?>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>   
</body>
</html>