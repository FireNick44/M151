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

<h1>Bestellungsübersicht</h1>

<table>
   <tr>
      <th>Nachname</th>
      <th>Vorname</th>
      <th>Anstellung</th>
      <th>Adresse</th>
      <th>Stadt</th>
   </tr>
   <?php
   $statement = $conn->prepare("SELECT * FROM customers");
   $statement->execute();

   foreach ($conn->query("SELECT * FROM customers") as $row) {
      echo "<tr>";
      echo "<td>{$row['last_name']}</td>";
      echo "<td>{$row['first_name']}</td>";
      echo "<td>{$row['job_title']}</td>";
      echo "<td>{$row['address']}</td>";
      echo "<td>{$row['city']}</td>";
      echo "<td><a href='orders.php?id={$row['id']}'>Bestellungen</a></td>";
      echo "</tr>";
   }
   ?>
</table>

<style>
   <?php include '../CSS/style.css'; ?>
</style>