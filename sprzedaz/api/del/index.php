<?php

require("../../model/transaction.php");

if((!isset($_POST["id"]))){
    header("Location: /sprzedaz/del/?nodata=true");
    die();

}
if((!($_POST["id"]))){
    header("Location: /sprzedaz/del/?nodata=true");
    die();

}

$id = $_POST["id"];

if(Transaction::del($id)){
    header("Location: /sprzedaz/del/?notran=true");
    die();
};

    header("Location: /sprzedaz/del/?saved=true");
die();

?>
