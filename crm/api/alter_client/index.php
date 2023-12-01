<?php

require("../../model/client.php");

if((!isset($_POST["imie"])) || (!isset($_POST["email"]))|| (!isset($_POST["id"]))|| (!isset($_POST["sub"]))){
    header("Location: /crm/alter_client/?id=$id&nodata=true");
    die();
}
if((!strlen($_POST["imie"])) || (!strlen($_POST["email"]))|| (!strlen($_POST["sub"]))|| (!strlen($_POST["id"]))){
    header("Location: /crm/alter_client/?id=$id&nodata=true");
    die();
}

$imie = $_POST["imie"];
$email = $_POST["email"];
$status = $_POST["sub"];
$id = $_POST["id"];



Client::del_client($id);
$client = new Client($imie, $email, $status, $id);
$client->save();

header("Location: /crm/alter_client/?id=".$id."&saved=true");
die();

?>
