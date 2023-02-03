<?php
$username = isset($_GET['username']) ? intval($_GET['username']) : '[Kein Name definiert]';

echo "Hallo {$username}!<br/>";

if (isset($_GET['age'])) {
    if ($_GET['age']) {
        $age = $_GET['age'];
        echo "Du bist {$age} Jahre alt.";
    }
}
