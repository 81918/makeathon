<?php
// database logingegevens
$db_hostname = 'localhost';
$db_username = 'makeathon';
$db_password = 'pOg4x68';
$db_database = 'makeathon';

// Maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// Als de verbinding niet gemaakt kan worden: geef een melding
if (!$mysqli){
    echo "FOUT: Geen connectie naar database. <br>";
    echo " Errno: " . mysqli_connect_errno() . "<br>";
    echo " Error: " . mysqli_connect_errno() .  "<br>";
    exit;
}
