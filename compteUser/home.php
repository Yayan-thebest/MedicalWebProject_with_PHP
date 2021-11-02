<?php 
session_start();

if (isset($_SESSION['NumeroDocteur']) && isset($_SESSION['NomPrenom'])) {

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


     <!-- lien font familly -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


</head>


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
	         <a class="nav-link" href=" logout.php">Se déconnecter</a>
	      </li>      <!-- Left links -->
	   </ul>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
  <!-- Fin nav -->
         <div class="Container">   

<div class="">   
    <section class="hero-patient">
        <div class="hero-inner-patient">
          <h1 style="text-align: center"> 
            Mon espace Médécin
            </h1>                        
        </div>
    </section>
</div>

</div>

<div class="blockPrincipal p-4 ml-md-5 mr-md-5">
	<div class="row" style= "padding-top: 60px;">
		    <div class="col-md-4">
		     <h1 align="center">Hello, Dr <?php echo $_SESSION['NomPrenom']; ?></h1>
		    </div>
		  <div class="col-md-6">
		     <!-- List group -->
		    <div class="list-group" id="myList" role="tablist">
		      <a class="list-group-item list-group-item-action " data-toggle="list" href="#home" role="tab"> <i class="fas fa-plus"></i>&nbsp;  Rendez-vous à venir</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab"> <i class="fas fa-plus"></i>&nbsp; Mes informations</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab"> <i class="fas fa-plus"></i>&nbsp; Fiches de paye</a>
		      <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab"> <i class="fas fa-plus"></i>&nbsp; Mes patients</a>
		   
		    </div><br>
	


	<!-- Tab panes -->
<div class="tab-content">
	  <div class="tab-pane" id="home" role="tabpanel">
	      
	       	<?php 
			     include ("../DataAccessLayer/ConsultationDAO.php");

		          // Instanciation des classes VO et DAO
		         $docdao = new ConsultationDAO();
		         $docvo = new ConsultationVO();

		         $docvo = $docdao->getDocteur();

  				foreach((array)$docvo as $doc){
                       echo "<p><strong >"."Note : "."</strong>".'en configuration'."</p>";
		       		    
                }

		    
	       	?>
	
	  </div>
	  

	  <div class="tab-pane" id="profile" role="tabpanel">
	      <span class="titre" > Mes informations</span><br><br>
	      <div>
	          <?php 
	            
                  foreach((array)$docvo as $doc){
                            echo "<p><strong >"."Identifiant :       "."</strong>".$doc->getNumeroDocteur()."</p>";
                            echo "<p><strong >"."Nom et Prénom :     "."</strong>".$doc->getNomDocteur()."</p>";
                            echo "<p><strong >"."Date Naissance   :  "."</strong>".$doc->getBirthDocteur()."</p>";
                            echo "<p><strong >"."Lieu de naissance   :"."</strong>".$doc->getLieuNDocteur()."</p>";
                            
                            echo "<p><strong >"."Email :             "."</strong>".$doc->getEmailDocteur()."</p>";
                            echo "<p><strong >"."Télephone :         "."</strong>".$doc->getTelDocteur()."</p>";
                            echo"<br>";                        
                            
                }
            ?>
            </div>
	  </div>
 </div>
</div>
	</div>
	</div>
</body>
</html>

<?php 
}else{
     header("Location: connexion.php");
     exit();
}
 ?>