<?php

$conn = new MySqli('localhost', 'root', '', 'banco');

if ($conn->connect_error) {
    die("Conection failed: " . $conn->connect_error);
}

?>