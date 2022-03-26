<?php
session_start();
include("controllers/DAO.php");
$dao=new DAO();
if( !isset($_SESSION['nono']) || !$dao->User($_SESSION['nono']) ){
	header("location:login.php?erreur=1");
	die();
}
else{
    $nono=$_SESSION['nono'];
}
if(!isset($_GET['type'])){
  header("location:index.php");
	die();
}
else{
  $type = $_GET['type'];
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
    <div class="Main" id="Main">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small><?php echo$type?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
      <div class="col-md-12 col-xs-12">      
      <a class="btn btn-primary" href="create.php?type=<?php echo$type?>" style="background-color:#367FA9;">Ajouter  <?php echo$type?></a>
      <br /> <br />
          <div class="box-body" style="background-color: white; font-size:15px;">
            <table id="manageTable" class="table table-bordered table-striped" >
            <thead style="color: black;">
            <?php if($type=="etudiant"){echo'
              <tr>
                <th>Id Etudiant</th>
                <th>Code</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Nom Arabe</th>
                <th>Prenom Arabe</th>
                <th>Diplome</th>
                <th>Id Groupe</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>';
                $etuds=$dao->ListEtud();
                foreach($etuds as $e)
                {
                  echo'<tr>
                <th>'.$e[0].'</th>
                <th>'.$e[1].'</th>
                <th>'.$e[2].'</th>
                <th>'.$e[3].'</th>
                <th>'.$e[4].'</th>
                <th>'.$e[5].'</th>
                <th>'.$e[6].'</th>
                <th>'.$e[7].'</th>
                <th><a class="btn btn-default btn-sm" href="update.php?type='.$type.'&id='.$e[0].'"><i class="fa fa-edit"></i></a> &nbsp&nbsp&nbsp<a class="btn btn-default btn-sm" href="controllers/deleteEtud.php?id='.$e[0].'"><i class="fa fa-trash"></i></a></th>
                </tr>';
                }
              }
              if($type=="professeur"){echo'
                <tr>
                  <th>ID Professeur</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Code PPR</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>';
                  $etuds=$dao->ListProf();
                  foreach($etuds as $e)
                  {
                    echo'<tr>
                  <th>'.$e[0].'</th>
                  <th>'.$e[1].'</th>
                  <th>'.$e[2].'</th>
                  <th>'.$e[3].'</th>
                  <th>'.$e[4].'</th>
                  <th><a class="btn btn-default btn-sm" href="update.php?type='.$type.'&id='.$e[0].'"><i class="fa fa-edit"></i></a> &nbsp&nbsp&nbsp<a class="btn btn-default btn-sm" href="controllers/deleteProf.php?id='.$e[0].'"><i class="fa fa-trash"></i></a></th>
                  </tr>';
                  }
                }
                
              if($type=="module"){echo'
                <tr>
                  <th>ID Module</th>
                  <th>Code Module</th>
                  <th>Nom</th>
                  <th>Coefficient</th>
                  <th>Semestre</th>
                  <th>Professeur</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>';
                  $etuds=$dao->Listmodule();
                  foreach($etuds as $e)
                  {
                    echo'<tr>
                  <th>'.$e[0].'</th>
                  <th>'.$e[1].'</th>
                  <th>'.$e[2].'</th>
                  <th>'.$e[3].'</th>
                  <th>'.$e[4].'</th>
                  <th>'.$e[5].' '.$e[6].'</th>
                  <th><a class="btn btn-default btn-sm" href="update.php?type='.$type.'&id='.$e[0].'"><i class="fa fa-edit"></i></a> &nbsp&nbsp&nbsp<a class="btn btn-default btn-sm" href="controllers/deleteModule.php?id='.$e[0].'"><i class="fa fa-trash"></i></a></th>
                  </tr>';
                  }
                }
              
                ?>
              
            </table>
          <!-- /.box-body -->        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>   
</body>
</html>