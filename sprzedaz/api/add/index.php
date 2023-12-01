<?php

require("../../model/transaction.php");

if((!isset($_POST["product"])) || (!isset($_POST["price"]))|| (!isset($_POST["date"]))){
    header("Location: /sprzedaz/add/?nodata=true");
    die();
}
if((!strlen($_POST["product"])) || (!strlen($_POST["price"]))|| (!strlen($_POST["date"]))){
    header("Location: /sprzedaz/add/?nodata=true");
    die();
}
$product = $_POST["product"];
$price = $_POST["price"];
$date = $_POST["date"];

$tr = new Transaction($price, $product, $date);
$tr->save();

header("Location: /sprzedaz/add/?saved=true");
die();
?>
