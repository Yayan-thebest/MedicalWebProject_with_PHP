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

       <h1 align="center">Soumission réussi, <?php echo $_SESSION['NomPrenom']; ?></h1><br>
         <h2></h2>
        </div>

  

    <div class="tab-pane" id="rdv_p" role="tabpanel">
        <span class="titre" >Formulaire</span><br><br>
            <div class="panel panel-default" ng-show="register_form">
                  


                     <form  method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="myform">

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


                           <input type="submit" name="submit" class=" btn btn-primary " id="btn_pp" value="S'enregister et payer" formaction="https://www.sandbox.paypal.com/cgi-bin/webscr"   
                           
 disabled />
                  </form>                            
              </div>  
    </div>  
 </div>
</div>
  </div>
  </div>
</body>


 </div>

</html>


<script type="text/javascript">
  /*ce script permet de recuperer la position de la consultatin selectionner dans le selectbox et ainsi 
  configurer le prix et le nom pour l'envoyer à paypal*/

    document.getElementById(<?php echo json_encode($_POST['consultation'] ?? null) ?>).onchange = function() {

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

