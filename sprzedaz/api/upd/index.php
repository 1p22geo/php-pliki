<?php

require("../../model/transaction.php");

if((!isset($_POST["product"])) || (!isset($_POST["price"]))|| (!isset($_POST["date"])) || (!isset($_POST["id"]))){
    header("Location: /sprzedaz/upd/?nodata=true");
    die();
}
if((!strlen($_POST["product"])) || (!strlen($_POST["price"]))||(!strlen($_POST["id"]))|| (!strlen($_POST["date"]))){
    header("Location: /sprzedaz/upd/?nodata=true");
    die();
}
$product = $_POST["product"];
$price = $_POST["price"];
$date = $_POST["date"];
$id = $_POST["id"];

Transaction::del($id);
$tr = new Transaction($price, $product, $date, $id);
$tr->save();

if(preg_match('/[0-9]*/', $id))
{
$redirect_id = intval($id);


header("Location: /sprzedaz/upd/?id=".intval($redirect_id)."&saved=true");
die();
}
else{
die("Invalid data");
}


?>
