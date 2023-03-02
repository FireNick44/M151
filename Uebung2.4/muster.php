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

<?php
$preset = null;
if (isset($_GET['id']) && $_GET['id'] !== '') {
   $sql = "SELECT * FROM customers WHERE id = :id";
   $statement = $conn->prepare($sql);
   $statement->execute([
      ':id' => $_GET['id']
   ]);
   $preset = $statement->fetch();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($preset) {
      $sql = "UPDATE customers SET 
                     company = :company,
                     last_name = :last_name,
                     first_name = :first_name,
                     email_address = :email_address
                     job_title = :job_title
                     business_phone = :business_phone
                     home_phone = :home_phone
                     mobile_phone = :mobile_phone
                     fax_number = :fax_number
                     address = :address
                     city = :city
                     state_province = :state_province
                     zip_postal_code = :zip_postal_code
                     country_region = :country_region
                     web_page = :web_page
                     notes = :notes

                 WHERE id = :id";

      $statement = $conn->prepare($sql);
      $statement->execute([
         ':company' => $_POST['company'],
         ':last_name' => $_POST['lastName'],
         ':first_name' => $_POST['firstName'],
         ':email_address' => $_POST['emailAdress'],
         ':job_title' => $_POST['jobTitle'],
         ':business_phone' => $_POST['businessPhone'],
         ':home_phone' => $_POST['homePhone'],
         ':mobile_phone' => $_POST['mobilePhone'],
         ':fax_number' => $_POST['faxNumber'],
         ':address' => $_POST['address'],
         ':city' => $_POST['city'],
         ':state_province' => $_POST['stateProvince'],
         ':zip_postal_code' => $_POST['zipCode'],
         ':country_region' => $_POST['countryRegion'],
         ':web_page' => $_POST['webPage'],
         ':notes' => $_POST['notes'],

         ':id' => $_GET['id'],
      ]);
      $sql = "SELECT * FROM customers WHERE id = :id";
      $statement = $conn->prepare($sql);
      $statement->execute([
         ':id' => $_GET['id']
      ]);
      $preset = $statement->fetch();
   } else {

      $statement = $conn->prepare("
      INSERT INTO customers (company, last_name, first_name, 
                             email_address, job_title, business_phone, 
                             home_phone, mobile_phone, fax_number, 
                             address, city, state_province, 
                             zip_postal_code, country_region, web_page, 
                             notes) 

      VALUES (:company, :last_name, :first_name, 
              :email_address, :job_title, :business_phone, 
              :home_phone, :mobile_phone, :fax_number, 
              :address, :city, :state_province, 
              :zip_postal_code, :country_region, :web_page, 
              :notes);
      ");


      $statement->execute([
         ':company' => $_POST['company'],
         ':last_name' => $_POST['lastName'],
         ':first_name' => $_POST['firstName'],
         ':email_address' => $_POST['emailAdress'],
         ':job_title' => $_POST['jobTitle'],
         ':business_phone' => $_POST['businessPhone'],
         ':home_phone' => $_POST['homePhone'],
         ':mobile_phone' => $_POST['mobilePhone'],
         ':fax_number' => $_POST['faxNumber'],
         ':address' => $_POST['address'],
         ':city' => $_POST['city'],
         ':state_province' => $_POST['stateProvince'],
         ':zip_postal_code' => $_POST['zipCode'],
         ':country_region' => $_POST['countryRegion'],
         ':web_page' => $_POST['webPage'],
         ':notes' => $_POST['notes']
      ]);


      header('Location: index.php');
      die();
   }
}
?>
<form method="POST" action="edit.php?id=<?= $preset ? $preset['id'] : '' ?>">
   <input value="<?= $preset ? $preset['company'] : ''  ?>" type="text" name="company" placeholder="company"><br>
   <input value="<?= $preset ? $preset['last_name'] : ''  ?>" type="text" name="lastName" placeholder="last name"><br>
   <input value="<?= $preset ? $preset['first_name'] : ''  ?>" type="text" name="firstName" placeholder="first name"><br>
   <input value="<?= $preset ? $preset['email_address'] : ''  ?>" type="email" name="emailAdress" placeholder="email"><br>
   <input value="<?= $preset ? $preset['job_title'] : ''  ?>" type="text" name="jobTitle" placeholder="job title"><br>
   <input value="<?= $preset ? $preset['business_phone'] : ''  ?>" type="phone" name="businessPhone" placeholder="business phone"><br>
   <input value="<?= $preset ? $preset['home_phone'] : ''  ?>" type="phone" name="homePhone" placeholder="home phone"><br>
   <input value="<?= $preset ? $preset['mobile_phone'] : ''  ?>" type="phone" name="mobilePhone" placeholder="mobile phone"><br>
   <input value="<?= $preset ? $preset['fax_number'] : ''  ?>" type="phone" name="faxNumber" placeholder="fax number""><br>
   <input value="<?= $preset ? $preset['address'] : ''  ?>" type="text" name="address" placeholder="address"><br>
   <input value="<?= $preset ? $preset['city'] : ''  ?>" type="text" name="city" placeholder="city"><br>
   <input value="<?= $preset ? $preset['state_province'] : ''  ?>" type="text" name="stateProvince" placeholder="state/province"><br>
   <input value="<?= $preset ? $preset['zip_postal_code'] : ''  ?>" type="text" name="zipCode" placeholder="zip code"><br>
   <input value="<?= $preset ? $preset['country_region'] : ''  ?>" type="text" name="countryRegion" placeholder="country"><br>
   <input value="<?= $preset ? $preset['web_page'] : ''  ?>" type="text" name="webPage" placeholder="web page"><br>
   <input value="<?= $preset ? $preset['notes'] : ''  ?>" type="text" name="notes" placeholder="notes"><br>
   <button type="submit">Speichern</button>
</form>