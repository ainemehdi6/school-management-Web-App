<?php
session_start();
include("controllers/DAO.php");
$dao=new DAO();
if( !isset($_SESSION['nono']) && !$dao->User($nono) ){
	header("location:login.php?erreur=1");
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
    <title>Admin</title>
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
      Manage
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
          <div class="box-body" style="background-color: white; font-size:15px;">
          <table id="manageTable" class="table table-bordered table-striped">
              <?php
              $cmd = $dao->GetUser($nono);
                foreach($cmd as $c)
                    {
                    echo'
                    <tr>
                    <th style="color: black;">Prénom</th>
                    <td>'.$c[1].'</td>
                    </tr>
                    <tr>
                    <th style="color: black;">Nom</th>
                    <td>'.$c[2].'</td>
                    </tr>
                    <tr>
                    <th style="color: black;">Email</th>
                    <td>'.$c[3].'</td>
                    </tr>
                    ';
                    }
                ?>  
          </table>
          </div>
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