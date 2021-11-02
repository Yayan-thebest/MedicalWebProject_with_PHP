<?php 
session_start();

if (isset($_SESSION['NumeroPatient']) && isset($_SESSION['NomPrenom'])) {

 ?>
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" type="text/css" href="styles/styleLogin.css">


     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">

</head>

<div class="Container">
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.html">
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
	        <li class="nav navbar-nav navbar-right">
	         <a class="nav-link" href="logout.php">Se déconnecter</a>
	      </li>      <!-- Left links -->
	   </ul>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
  <!-- Fin nav -->
  	   <!-- background image --> 
  	   <div class="Container">   

<div class="">   
    <section class="hero-patient">
        <div class="hero-inner-patient">
          <h1 style="text-align: center"> 
            Mon espace client
            </h1>                        
        </div>
    </section>
</div>
</div>

    

<div class="blockPrincipal p-4 ml-md-5 mr-md-5">

	<div class="row" style= "padding-top: 60px;">

		    <div class="col-md-4">

			 <h1 align="center">Hello, <?php echo $_SESSION['NomPrenom']; ?></h1><br>
		     <h2></h2>
		    </div>

		  <div class="col-md-6">
		     <!-- List group -->
		    <div class="list-group" id="myList" role="tablist">
		      <a class="list-group-item list-group-item-action " data-toggle="list" href="#rdv" role="tab"> <i class="fas fa-plus"></i>&nbsp;  Rendez-vous à venir</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab"> <i class="fas fa-plus"></i>&nbsp; Mes informations</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#res" role="tab"> <i class="fas fa-plus"></i>&nbsp; Mes résultats</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#recus" role="tab"> <i class="fas fa-plus"></i>&nbsp; Mes reçus</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#rdv_p" role="tab"> <i class="fas fa-plus"></i>&nbsp; Prendre rendez-vous</a>
		   
		    </div><br>
	


	<!-- Tab panes -->
<div class="tab-content">
	  <div class="tab-pane" id="rdv" role="tabpanel">
	      <span class="titre" > Mes rendez-vous </span><br><br>
	       	<?php 
			     include ("../DataAccessLayer/PatientDAO.php");

		          // Instanciation des classes VO et DAO
		         $patientdao = new PatientDAO();
		         $patientvo = new PatientVO();
		         $patientvo = $patientdao->getInfosRdv();

  				foreach((array)$patientvo as $patient){
  					echo "<p><strong >"."#rendez-vous : "."</strong>".$patient->getNumRdv()."</p>";
  					echo "<p><strong >"."Consultation : "."</strong>".$patient->getNomConsultation()."</p>";
                       echo "<p><strong >"."Consultation : "."</strong>".$patient->getDateRdv()."</p>";
                }

	       	?>
	
	  </div>
	  

	  <div class="tab-pane" id="profile" role="tabpanel">
	      <span class="titre" > Mes informations</span><br><br>
	      <div>
	          <?php 
	            /*function php qui permet d'aaficher les infos d'un patients quand il se log in*/
	            $patientvo = $patientdao->getInfos_espacePatient();
            
                foreach((array)$patientvo as $patient){
                            echo "<p><strong >"."Identifiant :       "."</strong>".$patient->getNumeroPatient()."</p>";
                            echo "<p><strong >"."Nom et Prénom :     "."</strong>".$patient->getNom()."</p>";
                            echo "<p><strong >"."Date Naissance   :  "."</strong>".$patient->getDate()."</p>";
                            echo "<p><strong >"."Lieu de naissance   :"."</strong>".$patient->getLieuNaissance()."</p>";
                            echo "<p><strong >"."Genre   :           "."</strong>".$patient->getSexe()."</p>";
                            echo "<p><strong >"."Email :             "."</strong>".$patient->getEmail()."</p>";
                            echo "<p><strong >"."Télephone :         "."</strong>".$patient->getTelephone()."</p>";
                            echo "<p><strong >"."Adresse   :         "."</strong>".$patient->getAdresse()."</p>";
                            echo "<p><strong >"."Message   :         "."</strong>".'--'."</p><br>";
                            echo"<br>";                        
                            
                }
            ?>
            </div>
	  </div>

	  <div class="tab-pane" id="rdv_p" role="tabpanel">
	      <span class="titre" >Formulaire</span><br><br>
	          <div class="panel panel-default" ng-show="register_form">
                  


                     <form target="frame" method="post" action="" id="myform"  >
                     <!-- consultation -->
                       <div class="form-group label-floating">
                        <label class="control-label" for="typeDeConsultation">Type de consultation</label>
                        <select id="consultation" name="consultation" class="form-control action" required>
                          <option selected="" disabled="" value="">Choisir consulutation</option>
                       		<?php
                                    include ("../DataAccessLayer/ConsultationDAO.php"); 
                              
                                    // Instanciation de la classe ConsultationDAO et ConsultationVO
                                    $patient = new ConsultationDAO();
                                    $consultations = new ConsultationVO();

                                     $prix;

                                    // variable pour acceder à la fonction getTypeCOnsultation de la classe consultationDAO
                                    $consultations = $patient->getTypeConsultation();
                                
                                    foreach($consultations as $consultation){
                                      $prix = $consultation->getPrix();
                                        echo '<option >'.$consultation->getNumeroTypeConsultation()."  -  " .$consultation->getNomConsultation()."  -  ".$consultation->getPrix()." Fcfa ".'</option>';

                                          '<option value="hidden" name="prix" >'.$consultation->getPrix()." Fcfa ".'</option>';
                                  	}
                            ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>

                      <!-- horaire -->
                       <div class="form-group label-floating">
                        <label class="control-label" for="typeDeConsultation">Selectionner date RDV</label>
                              <input type="date" id="dateRdv" name="dateRdv"  class="form-control" required/>
                        <div class="help-block with-errors"></div>
                      </div>

                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>                         
                          <textarea type="text" name="msg" id="msg" class="form-control"  rows="3" ></textarea>
                          <div class="help-block with-errors"></div>
                      </div>


                           <input type="submit" name="submit" class=" btn btn-primary " value="S'enregister" id="btn_submit"  />    

                  </form>   <br>


      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" id="prixPP" name="amount" />
                            <input name="currency_code" type="hidden" value="CAD" />
                            <input name="shipping" type="hidden" value="0.00" />
                            <input name="tax" type="hidden" value="0.00" />
                            <input name="return" type="hidden" href="../index.php" />
                            <input name="cancel_return" type="hidden" value="http://votredomaine/paiementAnnule.php" />
                            <input name="notify_url" type="hidden" value="http://votredomaine/validationPaiement.php" />
                            <input name="cmd" type="hidden" value="_xclick" />
                            <input name="business" type="hidden" value="dalapoi@lacitec.on.ca" />
                            <input name="item_name" type="hidden" id="nomItem"  />
                            <input name="no_note" type="hidden" value="1" />
                            <input name="lc" type="hidden" value="FR" />
                            <input name="bn" type="hidden" value="PP-BuyNowBF" />
                            <input name="custom" type="hidden" value="ID_ACHETEUR" />
<input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
</form>                          
              </div>	
	  </div>	
 </div>
</div>
	</div>
	</div>
</body>
<iframe name="frame" id="frame"></iframe>


 </div>

</html>

<?php 
}else{
     header("Location: connexionPatient.php");
     exit();
}
 ?>

<?php

 /*ce code php permet d'envoyer les donnees de l'user pour inserer la nouvelle consultation de l'user*/ 
 /*ce block de code est dans ce fichier html car on ne veut pas rediriger l'user sur une autre page apres sa soumission*/                        
   $patientvo  = new PatientVO();
   $patientdao = new PatientDAO();
   $consultationvo = new ConsultationVO();

	// On commence par récupérer les champs
  if(isset($_POST['consultation']) && isset($_POST['dateRdv'])){
       //  $patientvo->setMessage($_POST['msg']);
         $consultationvo->setNumeroTypeConsultation($_POST['consultation']);
         $consultationvo->setNomConsultation($_POST['consultation']);
         $patientvo->setDateRdv($_POST['dateRdv']);
         $getDate=isset($_POST['dateRdv']);

     if(isset($_POST['submit'])){ 
    		// Fonction pour inser la cosultation de l'ancien patient dans a table rendez vous
    		$patientdao->newRdv_AncienPatient($patientvo, $consultationvo);
        echo '<script>alert("Formulaire Soumis avec succès")</script>'; 
    }
  }
  else {
      $patientvo->setPayement="";
      $patientvo->setMessage("");
      $consultationvo->setNumeroTypeConsultation("");
      $patientvo->setDateRdv("");
      $getDate="vide";
  }
?>


<script type="text/javascript">
  /*ce script permet de recuperer la position de la consultatin selectionner dans le selectbox et ainsi 
  configurer le prix et le nom pour l'envoyer à paypal*/

    document.getElementById("consultation").onchange = function() {

    var position =  this.selectedIndex;
   // alert(position);
    if(position == 1){
         document.getElementById('prixPP').value = '5000';
         document.getElementById('nomItem').value = 'cons. Général';
     }
     if(position == 2){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Echographie';  
      }
      if(position == 3){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Gyne';}
      if(position == 4){
         document.getElementById('prixPP').value = '15000';
         document.getElementById('nomItem').value = 'cons. Firbroscopie';  
      }
  }

 
</script>

<script type="text/javascript">


  
</script>