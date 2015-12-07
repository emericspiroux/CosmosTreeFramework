<?php

include_once ('database.php');

$file = file_get_contents('../camagru.sql');

try {
	$db = new PDO("mysql:host=127.0.0.1;port=3306;", $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true));
}catch(PDOException $e){
	echo 'Connection failed: ' . $e->getMessage();
	exit;
}
$requetes = explode(";", $file);
$error = 0;
foreach ($requetes as $key => $value) {
	$sth = $db->prepare($value);
	try {
		$sth->execute();
	} catch (Exception $e) {
		echo "Error :".$e->getmessage()."<br/>";
		$error++;
	}
}

if ($error != 0)
	echo "Erreur lors de l'installation";
else
	echo "Bdd installed";
?>
