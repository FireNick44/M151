<h1>Pizza Configurator</h1>
<br>
<p> Your pizza consists of the following ingredients: </p>
<ol>
   <?php
   session_start(); //wichtig sonnst geht $_SESSION nicht!!!
   $array = []; //leeres array

   if (isset($_SESSION['a'])) {
      $array = $_SESSION['a']; //array wird via $_SESSION geholt & ├╝berschrieben
   }

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['name'] !== ''){
	      array_push($array, $_POST['name']); //array += POST
	      $_SESSION['a'] = $array; //speicherung in session
      }
   }

   foreach ($array as $value) {
	   echo '<li>' . $value . '</li>'; //Ausgabe
   }
   ?>
</ol>
<br>
<p>Add more ingredients:</p>
<form method="POST" action="?">
    <input type="text" name="name" placeholder="Ingredient" />
    <input type="submit" value="Add" />
</form>