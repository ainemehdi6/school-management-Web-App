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
    <div class="Main">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small><?php echo $type?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
      <div class="col-md-12 col-xs-12">          
      <br /> <br />
          <div class="box-body" style=" font-size:15px;">  
          <?php if($type=="delibmodule")
          {echo'
            <select class="form-control" id="exam" name="exam" style="margin-bottom:20px;">
                    <option value="">Selectionner le module</option>';
                    $sem = $dao->ListModule();
                    foreach($sem as $s){
                      if(isset($_GET['uid']) && $_GET['uid']==$s[0])
                      {
                        echo'<option value="'.$s[0].'" selected>'.$s[2].'</option>';
                      }
                      else{
                        echo'<option value="'.$s[0].'">'.$s[2].'</option>';
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
                    <th>ID Examen</th>
                    <th>Nom Module</th>
                    <th>Note</th>
                  </tr>
                  </thead>
                  <tbody>';
                    $etuds=$dao->delibmodule($_GET['uid']);
                    foreach($etuds as $e)
                    {
                      echo'<tr>
                      <th>'.$e[0].'</th>
                    <th>'.$e[1].' '.$e[2].'</th>
                    <th>'.$e[3].'</th>
                    <th>'.$e[5].'</th>
                    <th>'.$e[6].'</th>
                    <input type="hidden" name="id" value="'.$_GET["uid"].'">
                   </tr>';
                    }}echo'
            </table>
          <!-- /.box-body -->        <!-- /.box -->                    <br /> <br />
          ';}
          if($type=="delibsemestre")
          {echo'
            <select class="form-control" id="exam" name="exam" style="margin-bottom:20px;">
                    <option value="">Selectionner Semestre</option>';
                    $sem = $dao->ListSemestre();
                    foreach($sem as $s){
                      if(isset($_GET['uid']) && $_GET['uid']==$s[0])
                      {
                        echo'<option value="'.$s[0].'" selected>'.$s[1].'</option>';
                      }
                      else{
                        echo'<option value="'.$s[0].'">'.$s[1].'</option>';
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
                    <th>Semestre</th>
                    <th>Note Semestre</th>
                  </tr>
                  </thead>
                  <tbody>';
                  $ids = $dao->GetIdEtudiantBySem($_GET['uid']);
                  foreach($ids as $i)
                  {
                      $note = $dao->GetEtud($_GET["uid"],$i[0]);
                      foreach($note as $e)
                      {
                        echo'<tr>
                        <th>'.$e[0].'</th>
                        <th>'.$e[1].' '.$e[2].'</th>
                        <th>'.$e[3].'</th>
                        <th>'.$e[4].'</th>
                        <input type="hidden" name="id" value="'.$_GET["uid"].'">
                        </tr>';
                    }   
                  }}      
                  echo'
            </table>
          <!-- /.box-body -->        <!-- /.box -->                    <br /> <br />
          ';}
          if($type=="delibannee")
          {echo'
            <select class="form-control" id="exam" name="exam" style="margin-bottom:20px;">
                    <option value="">Selectionner Année</option>';
                    if(isset($_GET['uid']) && $_GET['uid']!=null)
                      {
                        echo'<option value="'.$_GET['uid'].'" selected>'.$_GET['uid'].'</option>
                        <option value="2020/2021">2020/2021</option>
                    <option value="2021/2022">2021/2022</option>
                    <option value="2022/2023">2022/2023</option>
                    <option value="2023/2024">2023/2024</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
                    </select>';
                      }
                      else{
                        echo'
                    <option value="2020/2021">2020/2021</option>
                    <option value="2021/2022">2021/2022</option>
                    <option value="2022/2023">2022/2023</option>
                    <option value="2023/2024">2023/2024</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
            </select>';}?>
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
                  }     
                  echo'
            </table>
                  <a href="pdfgenerater.php?uid='.$_GET["uid"].'" name="export" class="btn btn-danger">Export to PDF</a>
          <!-- /.box-body -->        <!-- /.box -->                    <br /> <br />
          ';} }?>
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
                var type = <?php echo json_encode($type); ?>;
				var select = document.getElementById('exam');
				var option = select.value;
                window.location.href="delib.php?uid="+option+"&type="+type;
    }            
</script>