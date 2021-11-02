<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <title>Bootstrap Example</title>

 <meta charset="utf-8">

      <!-- lien BS -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
     <!-- script angularjs -->
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- lien icones -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- lien fichier css -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" type="text/javascript" href="js/registerForm.css">

     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


 </head>

    <body >

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="images/logo3.png" alt="Logo" style="width:75%;" >
  </a>
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarCenteredExample"
      aria-controls="navbarCenteredExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
      <!-- Left links -->
 <ul class="navbar-nav mb-2 mb-lg-0">
       <li class="nav-item">
        <a class="nav-link"  href="../index.html">ACCEUIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../services.html">Services</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.html">A propos</a>
        </li>
        <ul class="nav navbar-nav navbar-right">
         <li><a class="nav-link" href="../connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
      </ul>      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<br><br><br><br>
             <?php if(isset($_GET["error"])) { ?>
              <p class="error"><?php echo $_GET["error"]; ?></p>
             <?php } ?>

             <?php if(isset($_GET["success"])) { ?>
              <p class="success"><?php echo $_GET["success"]; ?></p>
             <?php } ?>

              <label>Nom & prénom</label>
           <?php if(isset($_GET["nom"])) { ?>
              <input 
                  type="text"
                  name="num"
                  class="form-control"
                  value="<?php echo $_GET["nom"]; ?>" /> 


            <?php } else { ?>
                <input 
                type="text"
                name="num" 
                class="form-control" 
                 />     
            <?php }   ?>

           <label>Mot de passe</label>
            <?php if(isset($_GET["password"])) { ?>
              <input type="text"
                     name="password"  
                     class="form-control"
                     value="<?php echo $_GET["password"]; ?>"/> 


            <?php } else { ?>
                <input 
                type="text"
                name="password" 
                class="form-control"
                />     
            <?php }   ?>
          
     <div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
              <div class="panel-heading">
                <h3 class="panel-title" align="center">
                  S'enregistrer
                </h3>              
              </div>

              <div class="panel-body">
                <form method="post" action="compteUser/signup-check.php" >
                   
                  <div class="form-group label-floating">
                      <label>Nom & Prénom</label>
                      <input type="text" name="nom" ng-model="loginData.email" class="form-control"/>      
                    </div>
                 
                    <div class="form-group">
                      <label>Mot de passe</label>
                      <input type="password" name="password" class="form-control"/> 
                    </div>

                    <div class="form-group label-floating">
                      <label>Retaper mot de passe</label>
                      <input type="password" name="re_password" placeholder="Entrer de nouveau mot de passe"  class="form-control"/>      
                    </div>

                     <div class="form-group" align="center">
                        <!-- j'ai enlever btn dans class -->
                      <input type="submit" name="login" class="btn btn-primary" value="Soumettre" /> 
                      <a href="connexion.php" class="ca">Déja inscrit?</a>
                  </div>             
                </form>
              </div>            
          </div>
        </div>            
      </div>
      </div>  
              
    </body>
</html>
