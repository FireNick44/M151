<form action="calc.php" method="get">
   <input type="text" name="x">
   <select name="operator">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
   </select>
   <input type="text" name="y">
   <input type="submit" value="Berechne">
</form>

<?php
$x = isset($_GET['x']) ? intval($_GET['x']) : 0;
$y = isset($_GET['y']) ? intval($_GET['y']) : 0;
$res = 0;

if (isset($_GET['operator'])) {
   $operator = $_GET['operator'];
   if ($operator == "-") {
      $res = intval($x - $y);
      echo " {$res}";
   } else if ($operator == "+") {
      $res = intval($x + $y);
      echo " {$res}";
   } else if ($operator == "*") {
      $res = intval($x * $y);
      echo " {$res}";
   } else if ($operator == "/") {
      $res = intval($x / $y);
      echo " {$res}";
   }
}
