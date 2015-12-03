<?php
require 'top.php';
require 'dbopen.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
if (filter_var($id, FILTER_VALIDATE_INT)) {
	$sql = "SELECT * FROM post WHERE id=:id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id, PDO::PARAM_INT);
	$result->execute();

	while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
	    echo $record['titulo'] . '<hr>';
	    echo $record['texto'];
	}

	if ($result->rowCount() == 0) {
		echo "Not found";
	}

} else {
	echo "Invalid";
}

require 'dbclose.php';
?>
</table>
<?php
require 'bottom.php'; ?>
