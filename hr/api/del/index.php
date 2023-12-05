<?php

require("../../model/pracownik.php");

if((!isset($_POST["id"]))){
    header("Location: /hr/del/?nodata=true");
    die();

}
if((!($_POST["id"]))){
    header("Location: /hr/del/?nodata=true");
    die();

}

$id = $_POST["id"];

if(Pracownik::del($id)){
    header("Location: /hr/del/?notran=true");
    die();
};

    header("Location: /hr/del/?saved=true");
die();

?>
