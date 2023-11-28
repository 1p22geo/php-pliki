<?php

require("../../model/client.php");

if((!isset($_POST["imie"])) || (!isset($_POST["email"]))|| (!isset($_POST["sub"]))){
    header("Location: /crm/add_client/?nodata=true");
    die();
}
if((!strlen($_POST["imie"])) || (!strlen($_POST["email"]))|| (!strlen($_POST["sub"]))){
    header("Location: /crm/add_client/?nodata=true");
    die();
}

$imie = $_POST["imie"];
$email = $_POST["email"];
$status = $_POST["sub"];


$client = new Client($imie, $email, $status);

$client->save();

header("Location: /crm/add_client/?saved=true");
die();

?>