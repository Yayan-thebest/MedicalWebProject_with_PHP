<?php
	
$connect = mysqli_connect("localhost", "root", "", "cliniquesb");

$output='';
$query = "SELECT * FROM horaireConsultation where NumeroTypeConsultation=".$_POST['consultationId'];
$result = mysqli_query($connect, $query);
$output = '<option value="">Select Date</option>';

	while ($row = mysqli_fetch_array($result)) {

	$output .= '<label value="'.$row['Horaire1'].'">'.$row['Horaire1'].'</label>';
		//$output .= '<option value="'.$row['Horaire2'].'">'.$row['Horaire2'].'</option>';

	}
	echo $output;

?>