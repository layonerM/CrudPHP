<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud";

try {
  $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>