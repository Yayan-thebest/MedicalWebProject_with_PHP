<?php

$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'cliniquesb';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Echec de connection : ". $db->connect_error);
}
 


if (isset($_POST['consultation_id'])) {
	$query = "SELECT * FROM horaireConsultation where NumeroTypeConsultation=".$_POST['consultation_id'];
		$result = $db->query($query);

?>

<form method="post" ng-submit="submitRegister()" action="BuisnessLayer/PageConfirmation.php">

<select name="date" id="date">
	<option value="" selected="selected">Choisir VOtre Date</option>
	<?php
	if ($result->num_rows > 0 ) {

		 while ($row = $result->fetch_assoc()) {
	?>	 	
		 	<option value="<?php echo $row['Horaire1'];?>"><?php echo $row['Horaire1'];?></option>
		 	<option value="<?php echo $row['Horaire2'];?>"><?php echo $row['Horaire2'];?></option>
		 	<option value="<?php echo $row['Horaire3'];?>"><?php echo $row['Horaire3'];?></option>
		 	<option value="<?php echo $row['Horaire4'];?>"><?php echo $row['Horaire4'];?></option>
	<?php
		 }
	}else{
		echo '<option>Aucune date disponible</option>';
	}
	?>

	</select>
	</form>

	<?php
	}
	?>


?>