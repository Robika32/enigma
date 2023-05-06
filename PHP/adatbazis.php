<?php

$serverName = "localhost";
$userName = "root";
$passwordName = "";
$dbName = "enigma";

$conn = mysqli_connect($serverName, $userName, $passwordName, $dbName);

$sql = "SELECT * FROM termekek WHERE featured=1";

$featured = $conn -> query($sql);

?>