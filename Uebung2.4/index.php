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

<h1>Kunde Erstellen</h1>

<form method="POST" action="?">
   <input type="text"  name="company" placeholder="company"><br>
   <input type="text"  name="lastName" placeholder="last name"><br>
   <input type="text"  name="firstName" placeholder="first name"><br>
   <input type="email" name="emailAdress" placeholder="email"><br>
   <input type="text"  name="jobTitle" placeholder="job title"><br>
   <input type="phone" name="businessPhone" placeholder="business phone"><br>
   <input type="phone" name="homePhone" placeholder="home phone"><br>
   <input type="phone" name="mobilePhone" placeholder="mobile phone"><br>
   <input type="phone" name="faxNumber" placeholder="fax number"><br>
   <input type="text"  name="address" placeholder="address"><br>
   <input type="text"  name="city" placeholder="city"><br>
   <input type="text"  name="stateProvince" placeholder="state/province"><br>
   <input type="text"  name="zipCode" placeholder="zip code"><br>
   <input type="text"  name="countryRegion" placeholder="country"><br>
   <input type="text"  name="webPage" placeholder="web page"><br>
   <input type="text"  name="notes" placeholder="notes"><br>

   <button type="submit">Erstellen</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $statement = $conn->prepare(" INSERT INTO customers (company, last_name, first_name, 
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


   $statement->execute([':company' => $_POST['company'],
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
        ]
    );
   }
?>



<style>
<?php include '../CSS/style.css'; ?>
</style>