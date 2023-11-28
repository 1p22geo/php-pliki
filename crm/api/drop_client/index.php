<?php

require("../../model/client.php");

if((!isset($_POST["id"]))){
    header("Location: /crm/drop_client/?nodata=true");
    die();

}
if((!($_POST["id"]))){
    header("Location: /crm/drop_client/?nodata=true");
    die();

}

$id = $_POST["id"];

if(Client::del_client($id)){
    header("Location: /crm/drop_client/?noclient=true");
    die();
};

header("Location: /crm/drop_client/?saved=true");
die();

?>