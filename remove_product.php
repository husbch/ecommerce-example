<?php
session_start();
$id = $_GET['id'];
$us = array_search("$id", $_SESSION['cart']);

array_splice($_SESSION['cart'], $us, 0);

header('Location:cart.php');
echo "array ". $id. " have been unset on ". $us. "<br>";

echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?>