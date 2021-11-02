<?php

$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'cliniquesb';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Echec de connection : ". $db->connect_error);
}


if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("SELECT * FROM horaireConsultation where NumeroTypeConsultation='$id'");
while($row=mysql_fetch_array($sql))
{
$id=$row['NumeroTypeConsultation'];
$data=$row['Horaire1'];
echo '<option value="'.$id.'">'.$data.'</option>';
}
}
?>