<div class="serverStatus">
   <?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "northwind";

   try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      echo "<div class='connected'>";
      echo "Connected successfully <br>";
      echo "</div>";
   } catch (PDOException $e) {
      echo "<div class='disconnected'>";
      echo "Connection failed: " . $e->getMessage() . "<br>";
      echo "</div>";
   }
   ?>
</div>

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
      echo "<td><a href='delete.php?id={$row['id']}'>Löschen</a></td>";
      echo "</tr>";
   }
   ?>
</table>

<style>
<?php include '../CSS/style.css'; ?>
</style>