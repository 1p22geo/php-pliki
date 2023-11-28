<?php

require("../../model/client.php");

if((!isset($_POST["imie"])) || (!isset($_POST["email"]))|| (!isset($_POST["sub"]))){
    header("Location: /crm/add_client/?nodata=true");
}
if((!($_POST["imie"])) || (!($_POST["email"]))|| (!($_POST["sub"]))){
    header("Location: /crm/add_client/?nodata=true");
}

$imie = $_POST["imie"];
$email = $_POST["email"];
$status = $_POST["sub"];


$client = new Client($imie, $email, $status);

echo $client->id;


?>