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
    <?php include('models/sidemenubar.php');    ?>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ajouter <?php echo$type?></h3>
            </div>
            <?php if($type=="etudiant"){echo'
            <form role="form" action="controllers/addEtud.php" method="post">
              <div class="box-body" style=" font-size:15px;">      
              <div class="form-group">
                  <label for="code">Code Etudiant</label>
                  <input type="text" class="form-control" id="code" name="code" placeholder="ex: K111416" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="nom">Nom</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="ex: Chanaa" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="ex: Ahmed" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="nomar">Nom Arabe</label>
                  <input type="text" class="form-control" id="nomar" name="nomar" placeholder="ex: شانع" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="prenomar">Prénom Arabe</label>
                  <input type="text" class="form-control" id="prenomar" name="prenomar" placeholder="ex: أحمد" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="diplome">Diplome</label>
                  <input type="text" class="form-control" id="diplome" name="diplome" placeholder="ex: Licence Pro" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="idgroupe">ID Groupe</label>
                  <input type="text" class="form-control" id="idgroupe" name="idgroupe" placeholder="ex: 2" autocomplete="off" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="liste.php?type='.$type.'" class="btn btn-warning">Back</a>
              </div>
            </form>';
            }
            if($type=="professeur"){echo'
            <form role="form" action="controllers/addProf.php" method="post">
              <div class="box-body" style=" font-size:15px;">      
                <div class="form-group">
                  <label for="nom">Nom</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="ex: Chanaa" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="ex: Ahmed" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="code">Code PPR</label>
                  <input type="text" class="form-control" id="code" name="code" placeholder="ex: P1212" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="type">Type</label>
                  <select class="form-control" id="type" name="type" required>
                    <option value="">Selectionner le type</option>
                    <option value="Permanant">Permanant</option>
                    <option value="Vacataire">Vacataire</option>
                  </select>  
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="liste.php?type='.$type.'" class="btn btn-warning">Back</a>
              </div>
            </form>';
            }
            if($type=="module"){echo'
            <form role="form" action="controllers/addModule.php" method="post">
              <div class="box-body" style=" font-size:15px;">      
                <div class="form-group">
                  <label for="code">Code Module</label>
                  <input type="text" class="form-control" id="code" name="code" placeholder="ex: M1211" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="nom">Nom Module</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="ex: JAVA" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="coef">Coefficient</label>
                  <input type="text" class="form-control" id="coef" name="coef" placeholder="ex: 0.5" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="semestre">Semestre</label>
                  <select class="form-control" id="semestre" name="semestre" required>
                    <option value="">Selectionner Semestre</option>';
                    $sem = $dao->ListSemestre();
                    foreach($sem as $s){
                                          echo'<option value="'.$s[0].'">'.$s[1].'</option>';
                                      };echo'</select>   
                </div>
                <div class="form-group">
                  <label for="prof">Professeur</label>
                  <select class="form-control" id="prof" name="prof" required>
                    <option value="">Selectionner Professeur</option>';
                    $prof = $dao->ListProf();
                    foreach($prof as $p){
                                          echo'<option value="'.$p[0].'">'.$p[1].' '.$p[2].'</option>';
                                      };echo'</select>   
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="liste.php?type='.$type.'" class="btn btn-warning">Back</a>
              </div>
            </form>';
            }
            if($type=="examen"){echo'
              <form role="form" action="controllers/addExamen.php" method="post">
                <div class="box-body" style=" font-size:15px;">  
                <div class="form-group">    
                <label for="nom">Professeur</label>
                <select class="form-control" id="prof" name="prof" required>
                <option value="">Selectionner Professeur</option>';
                $sem = $dao->ListProf();
                foreach($sem as $s){
                                      echo'<option value="'.$s[0].'">'.$s[1].' '.$s[2].'</option>';
                                  };echo'</select>  
                </div>                  
                  <div class="form-group">
                    <label for="nom">ID Groupe</label>
                    <input type="text" class="form-control" id="groupe" name="groupe" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                  <label for="nom">Module</label>
                  <select class="form-control" id="module" name="module" required>
                      <option value="">Selectionner Module</option>';
                      $sem = $dao->ListModule();
                      foreach($sem as $s){
                                            echo'<option value="'.$s[0].'">'.$s[2].'</option>';
                                        };echo'</select>  
                  </div>                      
                  <div class="form-group">
                    <label for="semestre">Date d\'Examen</label>
                    <input type="date" class="form-control" id="date" name="date" autocomplete="off" required>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                  <a href="liste.php?type='.$type.'" class="btn btn-warning">Back</a>
                </div>
              </form>';
              }?>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </div>
</body>
</html>