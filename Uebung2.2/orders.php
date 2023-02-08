<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully <br> <br>";
} catch (PDOException $e) {
   echo "Connection failed: " . $e->getMessage() . "<br>";
}


//GET abfangen usw... SQL injection verhindern


?>





