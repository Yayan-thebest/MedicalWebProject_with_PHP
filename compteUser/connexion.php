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
  <link rel="stylesheet" type="text/css" href="../styles/styleLogin.css">

  <link rel="stylesheet" type="text/javascript" href="js/registerForm.css">

     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


 </head>

    <body >
<div class="container">


          
  <div class="row justify-content-center">
    <div class="col-xs-6">
        <nav class="">
            <a class="" href="../index.html">
              <img src="../images/logo3.png" alt="Logo" class="mx-auto d-block" style="width:60%;" >
            </a>
        <!-- Container wrapper -->
      </nav> 
             

              <div class="panel-body">
                <form method="post" action="login.php" >
                  <div class="">
                      <h4 class="panel-title" align="center">
                        Connexion employé
                      </h4>              
                    </div> <br>
                      <?php if(isset($_GET["error"])) { ?>
                      <p class="error"><?php echo $_GET["error"]; ?></p>
                     <?php } ?>

                    <div class="form-group label-floating">
                      <input type="text" name="num" placeholder="Identifiant" class="form-control"/>      
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" placeholder="Mot de passe" class="form-control"/> 
                    </div>
                     <div class="form-group" align="center">
                        <!-- j'ai enlever btn dans class -->
                      <input type="submit" name="login" class="btn btn-primary" value="Connexion" /> 
                      <a href="connexionPatient.php" class="ca">Espace patient</a>

                  </div>             
                </form>
              </div>            
          </div>
        </div>            
      </div>
      </div>  
              
    </body>
</html>
