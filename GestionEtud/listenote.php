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
    <?php include('models/sidemenubar.php');?>
    <div class="Main">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Notes</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
      <div class="col-md-12 col-xs-12">   
      <a class="btn btn-primary" href="create.php?type=examen" style="background-color:#367FA9;">Ajouter Examen</a>       
      <br /> <br />
          <div class="box-body" style=" font-size:15px;">  
          <form role="form" action="controllers/updatenote.php" method="post">     
            <select class="form-control" id="exam" name="exam" style="margin-bottom:20px;">
                    <option value="">Selectionner l'examen</option>
                    <?php
                    $sem = $dao->ListExam();
                    foreach($sem as $s){
                      if(isset($_GET['uid']) && $_GET['uid']==$s[0])
                      {
                        echo'<option value="'.$s[0].'" selected>Exame N:'.$s[0].' Groupe N:'.$s[1].' de '.$s[2].' en '.$s[3].'</option>';
                      }
                      else{
                        echo'<option value="'.$s[0].'">Exame N:'.$s[0].' Groupe N:'.$s[1].' de '.$s[2].' en '.$s[3].'</option>';
                      }
                      };echo'</select>';?>
                    <a class="btn" onclick="update()" style="color: #367FA9;">Actualiser</a>
                    <br /> <br />
                    <?php    
                    if(isset($_GET['uid']) && $_GET['uid']!=null)
                    {
                    echo'                     
                  <table id="manageTable" class="table table-bordered table-striped" >
                  <thead style="color: black;">
                  <tr>
                    <th>ID Etudiant</th>
                    <th>Nom Etudiant</th>
                    <th>Nom Module</th>
                    <th>Note</th>
                  </tr>
                  </thead>
                  <tbody>';
                    $etuds=$dao->ListNote($_GET['uid']);
                    foreach($etuds as $e)
                    {
                      echo'<tr>
                    <th>'.$e[0].'</th>
                    <th>'.$e[1].' '.$e[2].'</th>
                    <th>'.$e[3].'</tthd>
                    <th><input class="Note-control" name="note-'.$e[0].'" value="'.$e[4].'"></th>
                    <input type="hidden" name="id" value="'.$_GET["uid"].'">
                   </tr>';
                    }}?>
            </table>
          <!-- /.box-body -->        <!-- /.box -->
          <button class="btn btn-primary btn-lg btn-block" style="background-color:#367FA9;" type="submit"><span>Save</span>&nbsp;&nbsp;<i class="fa fa-save"></i></button>
                    <br /> <br />
          </form>             
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
    function update() {
				var select = document.getElementById('exam');
				var option = select.value;
                window.location.href="listenote.php?uid="+option;
    }            
</script>