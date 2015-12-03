<?php
require 'top.php';
require 'dbopen.php';

$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];
$senha = filter_var($senha, FILTER_SANITIZE_NUMBER_INT);

$res = false;
if (filter_var($email, FILTER_VALIDATE_EMAIL) &&
	filter_var($senha, FILTER_VALIDATE_INT) ) {

	$sql = "INSERT INTO user (email, senha) VALUES ('$email', '$senha')";
	$result = $conn->prepare($sql);
	$result->bindParam(':email', $email, PDO::PARAM_STR);
	$result->bindParam(':senha', $senha, PDO::PARAM_INT);
	$result->execute();

	if ($result->rowCount() == 1) {
		$res = true;
	}
}

if ($res) {
    echo "OK";
} else {
	echo "NOK";
}

require 'dbclose.php';
require 'bottom.php'; 

?>
