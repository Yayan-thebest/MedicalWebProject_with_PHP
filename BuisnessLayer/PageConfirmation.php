<?php


   include ("../DataAccessLayer/PatientDAO.php");

   include ("../DataAccessLayer/ConsultationVO.php");                           

   include ("../DataAccessLayer/DatesRdvDAO.php");

   /*Lien pour se connecter a la db*/
   include('../compteUser/database_connection.php');

   
   // Instanciation des classes VO et DAO 
   // pour accéder au attributs et fonctions des différentes classes
   $consultationvo = new ConsultationVO();

   $patientvo  = new PatientVO();

   $patientdao = new PatientDAO();

   $getDate ="";
  $pass = ($_POST['password']);
   
   // On commence par récupérer les champs
   if(isset($_POST['name'])){
   $patientvo->setNom($_POST['name']);
   }
   else $patientvo->setNom("");
   
   if(isset($_POST['birth'])){
   $patientvo->setDate($_POST['birth']);
   }
   else $patientvo->setDate("");
   
   if(isset($_POST['lieuNaissance'])){
   $patientvo->setLieuNaissance($_POST['lieuNaissance']);
   }
   else $patientvo->setLieuNaissance("");   
   
	if(isset($_POST['sexe'])){
   $patientvo->setSexe($_POST['sexe']);
   }
   else $patientvo->setSexe("");


   if(isset($_POST['tel'])){
   $patientvo->setTelephone($_POST['tel']);
   }
   else $patientvo->setTelephone("");


   if(isset($_POST['adresse']))
   {
   $patientvo->setAdresse( $_POST['adresse']);
   }
   else $patientvo->setAdresse="";

   if(isset($_POST['email'])){
   $patientvo->setEmail($_POST['email']);
   }
   else $patientvo->setEmail("");

  
   if(isset($_POST['consultation'])){
   $consultationvo->setNomConsultation($_POST['consultation']);
   }
   else $consultationvo->setNomConsultation("");

   if(isset($_POST['password']) && isset($_POST['re_password'])){
 
      $pass = ($_POST['password']);
      $re_pass=($_POST['re_password']);


      // on verifie que les mots de passe match
      if ($pass !== $re_pass){
         header("Location: ../contact.php?error=Les mots de passes ne correspondent pas$user_data");
         echo $patientvo->setPassword($pass);
         echo $re_pass;

         echo "mot de pass ne correspond pas";
         exit();
      }

      else {
         // ne pas oubler d'ncrypter le passwordavant l'ne=nevoie
         $patientvo->setPassword($pass);

          // Fonction qui permet d'inserer les infos du nouveau client dans la table newclient
         $patientdao->Create_Patient($patientvo);          
      }
   }


  if( isset($_POST['consultation']) && isset($_POST['dateRdv'])){
         $patientvo->setMessage($_POST['msg']);
         $consultationvo->setNumeroTypeConsultation($_POST['consultation']);
         $consultationvo->setNomConsultation($_POST['consultation']);
         $patientvo->setDateRdv($_POST['dateRdv']);
         $getDate=isset($_POST['dateRdv']);

   // Fonction qui permet d'inserer les infos du nouveau client dans la table newclient
   $patientdao->insert_Into_rdv($patientvo, $consultationvo);


  }
  else {
      $patientvo->setPayement="";
      $patientvo->setMessage("");
      $consultationvo->setNumeroTypeConsultation("");
      $patientvo->setDateRdv("");
      $getDate="vide";

  }

      
   ?>

<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" type="text/css" href="../styles/style.css">

  <link rel="stylesheet" type="text/javascript" href="js/registerForm.css">

     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


</head>



<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="../images/logo3.png" alt="Logo" style="width:75%;" >
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
        <a class="nav-link" aria-current="page" href="../index.html">ACCEUIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../services.html">SERVICES</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="../contact.php">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.html">A PORPOS</a>
        </li>
        <ul class="nav navbar-nav navbar-right">
         <li><a class="nav-link" href="../compteUser/connexion.php"><span class="glyphicon glyphicon-log-in"></span> CONNEXION</a></li>
      </ul>      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
  <!-- Fin nav -->
  <br><br><br>

   <body>
      <div class="Container">
      <div class="md d-block mx-auto" style="text-align: center;">
          <h2 >Confirmation Consultation  <i class="fa fa-check" aria-hidden="true" style="color:#66b3ff;"></i></h2>
          <?php
          // Instanciation des classes VO et DAO
             $patientdao = new PatientDAO();
             $patientvo = new PatientVO();
             
             // variable pour accéder à la fonction getInfosClient
             $patientvo = $patientdao->getInfosPatient();

             foreach((array)$patientvo as $patient){
                echo "<p>"."Merci de nous avoir fait confiance M. "."<strong>".$patient->getNom()."</strong>"." vos informations on été bien reçus. Vous receverez un email de confirmation avec plus de détails concernant votre rendez-vous sous peu."."</p></strong>";
             }
             
         ?>
      </div>

      <body>

      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type='hidden' value="1" name="amount" />
        <input name="currency_code" type="hidden" value="CAD" />
        <input name="shipping" type="hidden" value="0.00" />
        <input name="tax" type="hidden" value="0.00" />
        <input name="return" type="hidden" value="http://votredomaine/paiementValide.php" />
        <input name="cancel_return" type="hidden" value="http://votredomaine/paiementAnnule.php" />
        <input name="notify_url" type="hidden" value="http://votredomaine/validationPaiement.php" />
        <input name="cmd" type="hidden" value="_xclick" />
        <input name="business" type="hidden" value="dalapoi@lacitec.on.ca" />
        <input name="item_name" type="hidden" value="TestAchat1" />
        <input name="no_note" type="hidden" value="1" />
        <input name="lc" type="hidden" value="FR" />
        <input name="bn" type="hidden" value="PP-BuyNowBF" />
        <input name="custom" type="hidden" value="ID_ACHETEUR" />
        <input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
      </form>
       <br><br><br>
      <div style="text-align: center;">
      <h2 >Récapulatif de votre consultation </h2>
      <p id="txtconfirm">Informations reçues! Si y'a une modification à apporter concernant votre rendez-vous veuillez contactez notre service à la clientèle.</p>
             <p id="txtconfirm">NB : Veuillez noté votre identifiant (Id client) pour vos prochaines visites.</p>
      <fieldset class="fieldConfirmation" >
         <ul >
         <?php 
            // Definition de l'heure et la date local
            $timeZone = 'America/New_York';
            $heure= time();
            $date = new DateTime("now", new DateTimeZone($timeZone)); 
            $date->setTimestamp($heure); 
            
          // Instanciation des classes VO et DAO
         $patientdao = new PatientDAO();
         $patientvo = new PatientVO();

         if(isset($_POST['dateRdv'])){
            $patientvo->setDateRdv($_POST['dateRdv']);
         }
         else $patientvo->setDateRdv("");
               
         // variable pour accéder à la fonction getInfosClient
         $patientvo = $patientdao->getInfosPatient();
            
                foreach((array)$patientvo as $patient){
                            echo "<p><strong >"."Id client :         "."</strong>".$patient->getNumeroPatient()."</p>";
                            echo "<p><strong >"."Nom et Prénom :     "."</strong>".$patient->getNom()."</p>";
                            echo "<p><strong >"."Date Naissance   :  "."</strong>".$patient->getDate()."</p>";
                            echo "<p><strong >"."Lieu de naissance   :"."</strong>".$patient->getLieuNaissance()."</p>";
                            echo "<p><strong >"."Genre   :           "."</strong>".$patient->getSexe()."</p>";
                            echo "<p><strong >"."Email :             "."</strong>".$patient->getEmail()."</p>";
                            echo "<p><strong >"."Télephone :         "."</strong>".$patient->getTelephone()."</p>";
                            echo "<p><strong >"."Adresse   :         "."</strong>".$patient->getAdresse()."</p>";
                            echo "<p><strong >"."Message   :         "."</strong>".$patient->getMessage()."</p><br>";
                            echo"<br>";
            
                            echo "<p><strong class='a'>"." Soumis le : ". "</strong>". $date->format('d.m.Y, H:i:s')."</p>";
                            echo"test". $patient->getNomConsultation() ;
                }
            ?>
         <br>
         <p>Date de consultation prévue : <strong ><?php echo $patient->getDateRdv() ?></strong > pour
                                          <strong ><?php echo $patient->getNomConsultation() ?></strong ></p>
         <br>
        <div>
     

        </div>

      </fieldset >
      </div>
      </div>
      <hr class="ligne">
    </body>
</html>

      <script type="text/javascript" src="">
  /*ce script permet de recuperer la position de la consultatin selectionner dans le selectbox et ainsi 
  configurer le prix et le nom pour l'envoyer à paypal*/
  alert(globalVariable.x);
   /* var position =  this.selectedIndex;
    alert(position);
    if(position == 1){
         document.getElementById('prixPP').value = '5000';
         document.getElementById('nomItem').value = 'cons. General';
     }
     if(position == 2){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Echographie';  
      }
      if(position == 3){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Gyne';
       }
      if(position == 4){
         document.getElementById('prixPP').value = '15000';
         document.getElementById('nomItem').value = 'cons. Firbroscopie';  
      }*/


</script>

