<?php
$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name)
    or die("Connection failed: " . mysqli_connect_error());
?>