<?php

include('database_connection.php');

// php://input : on recoit les data de angular js function in php input stream
// file_gets-cpntents : fetch contents data form this php input stream 
// json_decode : this file get content  fucntion receuve data in json
// qu'on save dans une variable php
$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';


if(empty($form_data->password))
{
	$error[] = 'Mot de passe obligatoire';
}
else 
{
	// encryption du password
	$data[':password'] = password_hash($form_data->password, PASSWORD_DEFAULT);

}

// si il n'ya a pas d'erreur on soumet les donnee
if(empty($error))
{
	$query = "
	INSERT INTO patient (password) VALUES (:password)
	";
	$statement = $connect->prepare($query);
	if($statement->execute($data))
	{
		$message = "Enregistrement réussi";
	}
}
else 
{
	$validation_error = implode(", ", $error);

}

$output = array(
	'error'	=> $validation_error,
	'message' => $message
);

echo json_encode($output);

?>