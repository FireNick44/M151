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
?>

<h1>Bestellung</h1>

<table>
   <tr>
      <th>Order Date</th>
      <th>Ship Name</th>
      <th>Payment Type</th>
      <th>Paid Date</th>
   </tr>

   <?php
   $order = $_GET['id'];
   $statement = $conn->prepare("SELECT * from orders where orders.customer_id = :id ");
   $statement->execute([':id' => $order]);

   foreach ($statement as $row) {
      echo "<tr>";
      echo "<td>{$row['order_date']}</td>";
      echo "<td>{$row['ship_name']}</td>";
      echo "<td>{$row['payment_type']}</td>";
      echo "<td>{$row['paid_date']}</td>";
      echo "</tr>";
   }
   ?>
</table>