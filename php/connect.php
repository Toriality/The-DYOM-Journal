<?php

# Start connection

$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'dyom_journal';

$mysqli = new mysqli($host, $username, $passwd, $dbname);

# Connection error check

if ($mysqli->connect_errno) {
    die('Connection Error: ' . $mysqli->connect_errno);
}

?>