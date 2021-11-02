<?php

session_start();
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
    <link rel="stylesheet" type="text/css" href="styles/style.css">


  <link rel="stylesheet" type="text/javascript" href="js/registerForm.css">

     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">



</head>



<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">
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
        <a class="nav-link" aria-current="page" href="index.html" id="acceuil">ACCEUIL</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="services.html" id="service">SERVICES</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="contact.php" id="contact">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html" id="about">A PROPOS</a>
        </li>
        <ul class="nav navbar-nav navbar-right">
         <li>
          <a class="nav-link" href="compteUser/connexion.php" id="connexion"><span class="glyphicon glyphicon-log-in"></span> CONNEXION</a></li>
      </ul>      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>    

  <!-- Fin nav -->

<div class="blockPrincipal p-4 ml-md-5 mr-md-5">   <!-- p : paddind, m : margin , l,r,d : côtés-->

	<br><br>
	


	  <!-- DEBUT body principal (text et images) -->

 <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">
      <div class="container">
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                  <h1 class="section-title" style="color:black;">Pour un rendez-vous</h1>
              </div>
          </div>



          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                <p>
                   <li> Vous n'avez pas besoin d'être référée nécessairement pour avoir une consultation.  </li>
                   <br>
                   <li> Vous devez remplir le formulaire patient disponible à votre droite</li>
                   <br>  
                   <li>Vous devez apporter une copie de vos rapports médicaux et d'imageries antérieurs.  </li>
                   <br> N'hesiter pas à nous contacter si vous avez des questions. 
               </p>

                
                <div class="find-widget">
                  Téléphone :  <a href="#">+ 879-890-9767</a>
                </div>
                
                <div class="find-widget">
                  Mail:  <a href="">aaaa@cliniquesaitebernatte.com</a>
                </div>
                <div class="find-widget">
                   Horaire : <a href="#">Lun - Dim : 09:30 AM - 10.30 PM</a>
                                 <br> <br><br> <br>

                </div>
              </div>


              <!-- contact form -->

              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                               <div  ng-app="login_register_app"  ng-controller="login_register_controller" class="container form_style">

              <div class="panel panel-default" ng-show="register_form">
                  
                  <?php if(isset($_GET["error"])) { ?>
                      <p class="error"><?php echo $_GET["error"]; ?></p>
                     <?php } ?>
                   <form target="frame" method="post" action="BuisnessLayer/PageConfirmation.php">

                    
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Nom & Prénom</label>
                      
                        <input type="text" name="name" required class="form-control"/> 

                        <div class="help-block with-errors"></div>
                      </div>
                     <!-- Date naissance -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="dateNaissance">Date de naissance</label>
                       <input type="date" name="birth" required class="form-control"/>
                        <div class="help-block with-errors"></div>
                      </div>


                        <!-- Lieu naissance -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="lieuNaissance">Lieu de naissance</label>                         
                      <select name="lieuNaissance" required class="form-control field-select"/>

                      <datalist>
                          <option selected="" disabled="" value="">selectionner lieu de naissance</option>
                          <option>Ouagadougou</option>
                          <option>Bobo-Dioulasso</option>
                          <option>Koudougou</option>
                          <option>Ouahigouya</option>
                          <option>Dédougou</option>
                          <option>Pissila</option>
                          <option>Kaya</option>
                          <option>Tanguin-Dassouri</option>
                          <option>Tenkodogo</option>
                          <option>Pouytenga</option>
                          <option>Fada Gourma</option>
                          <option>Kordié</option>
                          <option>Ouargaye</option>
                          <option>Garango</option>
                          <option>Dori</option>
                          <option>Kongoussi</option>
                          <option>Kokologo</option>
                          <option>Réo</option>
                          <option>Diapaga</option>
                          <option>Houndé</option>
                          <option>Kouka</option>
                          <option>Yako</option>
                          <option>Djibo</option>
                          <option>Khyon</option>
                          <option>Léo</option>
                          <option>Nouna</option>
                          <option>Pô</option>
                          <option>Koupéla</option>
                          <option>Zorgho</option>
                          <option>Kombissiri</option>
                          <option>Bonou-Toaga</option>
                          <option>Orodara</option>
                          <option>Gourcy</option>
                          <option>Tougan</option>
                          <option>Boulsa</option>
                          <option>Titao</option>
                          <option>Manga</option>
                          <option>Pama</option>
                          <option>Borono</option>
                          <option>Diébougou</option>
                          <option>Ziniaré</option>
                          <option>Dano</option>
                          <option>Boussé</option>
                          <option>Solenzo</option>
                          <option></option>
                          <option value="ci">Côte d'Ivoire </option>
                          <option value="sn">Sénégal </option>
                          <option value="ml">Mali </option>
                          <option value="ne">Niger </option>
                          <option value="ng">Nigeria </option>
                          <option value="gh">Ghana </option>
                          <option value="tg">Togo </option>
                          <option></option>
                          <option value="fr">France </option>
                          <option value="be">Belgium </option>
                          <option value="ca">Canada </option>
                          <option value="it">Italy </option>
                          <option value="us">United States of America</option>
                       </datalist>
                       </select>
                       <div class="help-block with-errors"></div>
                      </div>

                      <!-- sexe -->
                       <div class="form-group label-floating">
                        <label class="control-label" for="sexe">Genre</label>
                        <select name="sexe" selected="" class="form-control field-select" required/>

                          <option selected="" disabled="" value="">Selectionner genre</option>
                         <option>M</option>
                         <option>F</option>
                         <option>Enfant</option>
                         </select>
                        <div class="help-block with-errors"></div>
                      </div>

                          <!-- Telephone -->
                      <div class="form-group label-floating">
                        <label class="control-label">Téléphone</label>
                        <input type="tel" name="tel" required class="form-control"/>

                        <div class="help-block with-errors"></div>
                      </div>

                       <!-- Adresse -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="adresse">Adresse</label>
                       <input type="text" name="adresse" required class="form-control"/>
                        <div class="help-block with-errors"></div>
                      </div>

                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input type="text" name="email" class="form-control"/>

                      <div class="help-block with-errors"></div>
                      </div>


                      <!-- email -->
                    <div class="row">
                      <div class="col">
                          <label class="control-label">Créer mot de passe</label>
                        <input type="password" name="password" required id="password" class="form-control" placeholder="Mot de passe">
                      </div>
                      <div class="col">
                             <label class="control-label">Retaper mot de passe</label>
                        <input type="password" name="re_password" required id="re_password" class="form-control" placeholder="Retaper mot de passe">
                      </div>
                       <div class="help-block with-errors"></div>
                    </div><br>
                   

                     <!-- consultation -->
                       <div class="form-group label-floating">
                        <label class="control-label" for="typeDeConsultation">Type de consultation</label>
                        <select name="consultation" id="consultation" class="form-control action" required>
                          <option selected="" disabled="" value="">Choisir consulutation</option>
                       <?php
                              include ("DataAccessLayer/ConsultationDAO.php"); 
                              include ("DataAccessLayer/ConsultationVO.php"); 
                         
                                // Instanciation de la classe ConsultationDAO et ConsultationVO
                                $patient = new ConsultationDAO();
                                $consultations = new ConsultationVO();

                                // variable pour acceder à la fonction getTypeConsultation de la classe consultationDAO
                                $consultations = $patient->getTypeConsultation();
                            
                                foreach($consultations as $consultation){
                                    echo '<option >'.$consultation->getNumeroTypeConsultation()."   -  " .$consultation->getNomConsultation()."   -  ".$consultation->getPrix()." Fcfa ".'</option>';
                              }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>


                      <!-- horaire -->
                       <div class="form-group label-floating">
                        <label class="control-label" for="typeDeConsultation">Selectionner date RDV</label>
                              <input type="date" id="dateRdv" name="dateRdv" ng-model="registerData.dateRdv" class="form-control" required/>
                        <div class="help-block with-errors"></div>
                      </div>

          

                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>                         
                          <textarea type="text" name="msg" ng-model="registerData.msg" class="form-control"  rows="3" ></textarea>
                          <div class="help-block with-errors"></div>
                      </div>

                    
                        <!-- Form Submit -->
                      <div class="form-submit mt-5">                        
                          <input type="submit" name="submit"  id ="btn_submit" class=" btn btn-primary " value="S'enregister" onclick="return encrypt()" />
                
                          <div id="msgSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>

                  </form>

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
    </section>
    <br><br><br>

      <div class="container">
           <h2> Nous trouver </h2> <br>
        <div class="container-iframe col-md-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.9407671946597!2d-2.3683744497921264!3d12.252287733525565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2e1b49316c5be9%3A0x57f1f61cb1108638!2sClinique%20Sainte%20Bernadette!5e0!3m2!1sfr!2sca!4v1605039372889!5m2!1sfr!2sca" width="1080" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>  
     </div>

<iframe name="frame" id="frame"></iframe>


	<br><br>
		<hr>
	<br><br>

</div>
  <!-- FIN body principal (text et images) -->
</body>

<!-- Footer -->
<footer class="bg-white text-center text-lg-left">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Bock a propos-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">A propos de nous</h5>

      <p id="textFooter">
          Nous sommes là pour vous servir et prendre soin de vous. N'hésitez pas à nous contacter 
          si vous avez des questions.
        </p>
      </div>
      <!--Fon block a propos-->

      <!--blcok de contact-->
      <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Nous contacter </h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Tel : +(226) 00 00 00 00</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Email : aaaa@cliniquesaitebernatte.com</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Horaire : Lun - Dim : 8h - 20h</a>
          </li>
          <li>
            <a href="#!" class="text-dark">BP 68 Koudougou</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->  
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Clinique Sainte Bernadette:
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  /*script encryption AES */
  function encrypt(){
var CryptoJSAesJson = {
stringify: function (cipherParams) {
var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
if (cipherParams.iv) j.iv = cipherParams.iv.toString();
if (cipherParams.salt) j.s = cipherParams.salt.toString();
return JSON.stringify(j);
},
parse: function (jsonStr) {
var j = JSON.parse(jsonStr);
var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
return cipherParams;
}
}
var pass = document.getElementById("password").value; // variable qui va contenir le mot de pass entrer
var encrypted = CryptoJS.AES.encrypt(JSON.stringify(pass), "PasswordEncryption", {format: CryptoJSAesJson}).toString();
var formData = "encrypted="+encrypted;
alert(document.getElementById("password").value);
$.ajax({
url : "decrypt_in_php3.php",
type: "POST",
data : formData,
success: function(data)
{
alert(data);
}
});

}
</script>

<script type="text/javascript">
  /*ce script permet de recuperer la position de la consultatin selectionner dans le selectbox et ainsi 
  configurer le prix et le nom pour l'envoyer à paypal*/

    document.getElementById("consultation").onchange = function() {

    var position =  this.selectedIndex;

    var globalVariable={
      pos:   this.selectedIndex
    };

   // alert(position);
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
         document.getElementById('nomItem').value = 'cons. Gyne';}
      if(position == 4){
         document.getElementById('prixPP').value = '15000';
         document.getElementById('nomItem').value = 'cons. Firbroscopie';  
      }
  }
</script>


