<?php
require 'top.php';
require 'dbopen.php';


unset($_SESSION['authenticated']);
unset($_SESSION['UID']);

$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];
$senha = filter_var($senha, FILTER_SANITIZE_NUMBER_INT);

if (filter_var($email, FILTER_VALIDATE_EMAIL) &&
	filter_var($senha, FILTER_VALIDATE_INT) ) {

	$sql = "SELECT * FROM user WHERE email=:email AND senha=:senha";
	$result = $conn->prepare($sql);
	$result->bindParam(':email', $email, PDO::PARAM_STR);
	$result->bindParam(':senha', $senha, PDO::PARAM_INT);
	$result->execute();

	if ($result->rowCount() == 1 && $record = $result->fetch(PDO::FETCH_ASSOC)) {
	    $_SESSION['authenticated'] = true;
	    $_SESSION['UID'] = $record['id'];
	}
}
if (isset($_SESSION['authenticated'])) {
    echo "OK";
} else {
    echo "NOK";
}
require 'dbclose.php';
require 'bottom.php'; ?>
