<?php 
session_start();
	include('../compteUser/database_connection.php');

	if(isset($_POST['num']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['re_password'])){
		function validate ($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$user = validate($_POST['num']);
		$pass = validate($_POST['password']);

		$re_pass = validate($_POST['re_password']);
		$nom = validate($_POST['nom']);

		$user_data = 'user'. $user. '&nom='.$nom;

		echo $user_data;

		if(empty($user)){
			header("Location: compteUser/signup.php?error=Identifiant requis$user_data");
			exit();
		}else if (empty($pass)){
			header("Location: compteUser/signup.php?error=Mot de passe requis$user_data");
			exit();
		}

		else if (empty($re_pass)){
			header("Location: compteUser/signup.php?error=Retaper Mot de passe requis$user_data");
			exit();
		}
		else if (empty($nom)){
			header("Location: compteUser/signup.php?error=Nom requis$user_data");
			exit();
		}

		// on verifie que les mots de passde match
		else if ($pass !== $re_pass){
			header("Location: compteUser/signup.php?error=Les mots de passes ne correspondent pas$user_data");
			exit();
		}



		else{

			// hashing password
			$pass = md5($pass);

			// on verifie que le user name n'existe pas
			$sql = "SELECT * FROM docteur WHERE NumeroDocteur = '$user'";
			$result = mysqli_query($connect, $sql);

			if(mysqli_num_rows($result)  > 0){
				header("Location: compteUser/signup.php?error=Nom d'utilisateur existant$user_data");
				exit();
			}else {
				$sql2 = "INSERT INTO patient(Password) ";
				$result2 = mysqli_query($connect, $sql2);

				if(mysqli_num_rows($result2)  > 0){
					header("Location: compteUser/signup.php?error=Enregistrement réussi$user_data");
					exit();
				}else {
					header("Location: compteUser/signup.php?error=Une erreure c'est produite$user_data");
				}
			}
		}

	}
	else {
		header("Location: C:/xampp/htdocs/ProjetWeb_clinique/compteUser/signup.php");
		exit();
	}
 ?>