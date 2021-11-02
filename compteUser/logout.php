<?PHP
/*fichier ui permet de log out un user*/
session_start();
session_destroy();

header("Location: connexionPatient.php");// retour à la page de connexion
?>