<?php
require 'top.php';
require 'dbopen.php';
?>
<table>
<?php

$sql = "SELECT * FROM post";
$result = $conn->prepare($sql);
$result->execute();

while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td><a href="show.php?id=' . $record['id'] . '">' . $record['titulo'] . '</a></td>';
    echo '</tr>';
}

require 'dbclose.php';
?>
</table>
<?php
require 'bottom.php'; ?>
