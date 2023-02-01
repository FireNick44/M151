<?php
   $anzahl_aufrufe = 1;
   
   echo "Die Seite wurde {$anzahl_aufrufe}x aufgerufen.";
   
   $anzahl_aufrufe++;
?>

<!--
   Nein, weil es ein Fehler Gibt. 
   php arbeitet nur auf requests / sessions
   php kann sich nicht an benutzer erinnern
-->