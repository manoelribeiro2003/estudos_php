<?php

$conn = new MySqli('localhost', 'root', '', 'produtos_full');

if ($conn->connect_error) {
    die("Conection failed: " . $conn->connect_error);
}

?>