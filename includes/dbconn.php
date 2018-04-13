<?php

include '../etc/config.inc';

try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

?>