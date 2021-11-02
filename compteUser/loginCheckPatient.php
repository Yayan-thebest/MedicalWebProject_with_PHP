<?php 
session_start();
	include('../compteUser/database_connection.php');

	if(isset($_POST['num']) && isset($_POST['password'])){

		// fucntion qui permet de verifier que la bd va recevoir du text pas du code 
		// pour eviter les injections
		function validate ($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$user = validate($_POST['num']);
		$pass = validate($_POST['password']);

		if(empty($user)){
			header("Location: connexionPatient.php?error=Identifiant requis");
			exit();
		}else if (empty($pass)){
			header("Location: connexionPatient.php?error=Mot de passe requis");
			exit();
		}
		else{

			// hashing password
			//$pass = md5($pass);
			//mysqli_real_escape() //indique a la bd que cest du text pas du code


			// on cree un templte
			$sql = "SELECT * FROM patient WHERE NumeroPatient = ? AND Password = ?";

			// on cree un preapared statement
			$stmt=  mysqli_stmt_init($connect);
			
			// on prepare le prepared stmt
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL stmt failed";
			} else {
				// bind parameters to the placeholder
				mysqli_stmt_bind_param(
					$stmt, 	// le preapred stmt
					"ss",	// indique que se sera un string qui sera envoyer dans la requete. Si, int on met 'i'. Si on passe de string on met "ss"
					$user,
					$pass
				);

				// on execute les parameters dans la bd
				mysqli_stmt_execute($stmt);

				$result = mysqli_stmt_get_result($stmt);

				if(mysqli_num_rows($result) === 1){
					while($row = mysqli_fetch_assoc($result)){
							echo $row ['NumeroPatient'];
							echo $row ['Password'];
							$_SESSION['NumeroPatient'] = $row['NumeroPatient'];
							$_SESSION['NomPrenom'] 	   = $row['NomPrenom'];
							$_SESSION['DateNaissance'] = $row['DateNaissance'];
							$_SESSION['LieuNaissance'] = $row['LieuNaissance'];
							$_SESSION['Sexe'] 		   = $row['Sexe'];
							$_SESSION['Email']		   = $row['Email'];
							$_SESSION['Salaire']	   = $row['Salaire'];
							$_SESSION['Type']		   = $row['Type'];
							
							header("Location: espacePatient.php");
							exit();
						
						}
						
					}
					else {
							header("Location: connexionPatient.php?error=Identifiant ou mot de passe incorrect. Réessayez.");
							exit();
					}
				}

//Note perso : en php c'est tjrs mieux de vérifier l'erreur avant de verifier si ca réussi
			/*if(mysqli_num_rows($result) === 1){
				$row = mysqli_fetch_assoc($result);
					if($row['NumeroPatient'] === $user && $row['Password'] === $pass){
						$_SESSION['NumeroPatient'] = $row['NumeroPatient'];
						$_SESSION['NomPrenom'] = $row['NomPrenom'];
						$_SESSION['DateNaissance'] = $row['DateNaissance'];
						$_SESSION['LieuNaissance'] = $row['LieuNaissance'];
						$_SESSION['Sexe'] = $row['Sexe'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['Salaire'] = $row['Salaire'];
						$_SESSION['Type'] = $row['Type'];
						
						header("Location: espacePatient.php");
						exit();
					
					}
					else {
						header("Location: connexionPatient.php?error=Identifiant ou mot de passe incorrect");
						exit();
					}
				//print_r($row);
			} else {
				header("Location: connexionPatient.php?error=Identifiant ou mot de passe incorrect");
				exit();
			}*/
		}

	}
	else {
		header("Location: connexionPatient.php");
		exit();
	}
 ?>