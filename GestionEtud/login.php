<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <title>Admin</title>
    <meta name="description" content="Admin">
    <meta name="author" content="EduMath">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/earlyaccess/notonaskharabicui.css" rel="stylesheet" type="text/css">
<link href="https://cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <style>.course .ul-timeline li.head  .t{ background-color:#c62828;}.course .ul-timeline > li.head > .t:before{border-color: transparent #c62828;}.course .ul-timeline > li.head > .t:after{border-color: transparent;}.course a.accordeon-text {color:#c62828; text-decoration:none;}.course .accordeon-head a:visited {color:#c62828; text-decoration:none;}.course a.accordeon-text > .mdi::before {color:#c62828;}</style>
<link rel="stylesheet" href="css/style0.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div>
  <div class="card login">
  <div class="card-header  bg-default">Admin Authentification</div>
  <div class="card-body">
  	
	<form action="controllers/adcnx.php" method="post" enctype="multipart/form-data". >
	  <div class="form-group">
	    <label for="email">Login :</label>
	    <input type="text" name="email" class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="password">Password :</label>
	    <input type="password" name="password" class="form-control">
	  </div>
	  <div style="color:red">
	  	<?php
		    if(isset($_GET['erreur'])&&($_GET['erreur']==1)) echo "Please enter email first!!!";
	  		if(isset($_GET['erreur'])&&($_GET['erreur']==2)) echo "Email or Password invalid!!!";
	  	?>
	  </div>
	  <button type="reset" class="reset">Reset</button>
	  <button type="submit" name="submit" class="enregistrer">Connexion</button>
	</form>
  </div>

</div>


</div>
</body>