<?php 
session_start();
	include('../compteUser/database_connection.php');

	if(isset($_POST['num']) && isset($_POST['password'])){
		function validate ($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$user = validate($_POST['num']);
		$pass = validate($_POST['password']);

		if(empty($user)){
			header("Location: connexion.php?error=Identifiant requis");
			exit();
		}else if (empty($pass)){
			header("Location: connexion.php?error=Mot de passe requis");
			exit();
		}
		else{

			// hashing password
			//$pass = md5($pass);

			$sql = "SELECT * FROM docteur WHERE NumeroDocteur = '$user' AND Password ='$pass'";

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
						$_SESSION['NumeroDocteur'] = $row['NumeroDocteur'];
						$_SESSION['NomPrenom'] = $row['NomPrenom'];
						$_SESSION['DateNaissance'] = $row['DateNaissance'];
						$_SESSION['LieuNaissance'] = $row['LieuNaissance'];
						$_SESSION['Sexe'] = $row['Sexe'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['Salaire'] = $row['Salaire'];
						$_SESSION['Type'] = $row['Type'];
						
						header("Location: home.php");
						exit();
					
					}
				
						
				}
				else {
					header("Location: connexion.php?error=Identifiant ou mot de passe incorrect");
					exit();
					
				}
			}
		}

	}
	else {
		header("Location: connexion.php");
		exit();
	}
 ?>