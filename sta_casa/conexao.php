<?php

$conn = new MySqli('localhost', 'root', '', 'sta_casa');

if ($conn->connect_error) {
    die("Conection failed: " . $conn->connect_error);
}

?>