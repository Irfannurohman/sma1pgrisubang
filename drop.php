<?php
require 'vendor/autoload.php';
$db = \Config\Database::connect();
$db->query('DROP TABLE IF EXISTS users');
echo "Dropped";
?>