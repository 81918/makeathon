<?php
//DATABASE connectie
$db_hostname = "192.168.88.45";
$db_username = "brownies";
$db_password = "#1Geheim";
$db_database = "brownies";

// maak de verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// Als de verbinding moet gemaakt kan worden
if (!$mysqli){
  echo "OEPSIE FLOEPSIE, Je bent niet geconnect!!!";
}