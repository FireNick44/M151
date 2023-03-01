<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";
try {
   $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully <br>";
} catch (PDOException $e) {
   echo "Connection failed: " . $e->getMessage() . "<br>";
}

sendDeleteStatement('invoices', 'order_id', $conn);
sendDeleteStatement('order_details', 'order_id', $conn);
sendDeleteStatement('orders', 'id', $conn);

function sendDeleteStatement($table, $row, $pdo)
{
   $sql = "DELETE FROM $table WHERE $row = :id";
   $statement = $pdo->prepare($sql);
   $statement->execute([':id' => $_GET['id']]); //könnte auch via param mit gegeben werden (danke demian :3)
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>