<?php

$sname = "localhost";
$uname = "root";
$pass = "";

$dbName = "cliniquesb";
// connection a la base de donnée
$connect =  mysqli_connect($sname, $uname, $pass, $dbName );

if(!$connect){
	echo "erreur de connection";
}

?>