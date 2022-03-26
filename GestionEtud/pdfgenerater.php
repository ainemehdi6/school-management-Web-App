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
    <div class="Main">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <center><h1>Délibiration de l'Année <?php echo $_GET['uid']?></h1></center>
      <div class="col-md-12 col-xs-12">          
      <br /> <br />
          <div class="box-body" style=" font-size:15px;">  
          <?php     
                if(isset($_GET['uid']) && $_GET['uid']!=null)
                {
                    echo'                     
                  <table id="manageTable" class="table table-bordered table-striped" >
                  <thead style="color: black;">
                  <tr>
                    <th>ID Etudiant</th>
                    <th>Nom Etudiant</th>
                    <th>Année</th>
                    <th>Note de l\'Année</th>
                    <th>Décision</th>
                  </tr>
                  </thead>
                  <tbody>';
                  $ids = $dao->GetIdEtudiantByAnne($_GET['uid']);
                  foreach($ids as $i)
                  {
                      $note = $dao->GetEtudByAnne($_GET["uid"],$i[0]);
                      foreach($note as $e)
                      {
                        echo'<tr>
                        <th>'.$e[0].'</th>
                        <th>'.$e[1].' '.$e[2].'</th>
                        <th>'.$_GET['uid'].'</th>
                        <th>'.$e[4].'</th>
                        <th>';
                        if($e[4]>10) echo'Validé'; else echo'Redoubant';
                        echo'</th>
                        <input type="hidden" name="id" value="'.$_GET["uid"].'">
                        </tr>';
                    }   
                  }}?>      
            </table>
          <!-- /.box-body -->        <!-- /.box -->                    <br /> <br />
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

<script> 
    window.print()         
</script>