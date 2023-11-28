<?php

require("../../model/client.php");

if((!isset($_POST["id"]))){
    header("Location: /crm/drop_client/?nodata=true");
}
if((!($_POST["id"]))){
    header("Location: /crm/drop_client/?nodata=true");
}

$id = $_POST["id"];



$client->save();

header("Location: /crm/drop_client/?saved=true")

?>