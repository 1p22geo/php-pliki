<?php

require("../../model/pracownik.php");

if((!isset($_POST["name"])) || (!isset($_POST["entry"]))|| (!isset($_POST["birth"]))|| (!isset($_POST["perm"]))|| (!isset($_POST["oddz"]))){
    header("Location: /hr/add/?nodata=true");
    die();
}
if((!strlen($_POST["name"])) || (!strlen($_POST["entry"]))|| (!strlen($_POST["birth"]))|| (!strlen($_POST["perm"]))|| (!strlen($_POST["oddz"]))){
    header("Location: /hr/add/?nodata=true");
    die();
}

$name = $_POST["name"];
$entry = $_POST["entry"];
$birth = $_POST["birth"];
$perm = $_POST["perm"];
$oddz = $_POST["oddz"];

$pr = new Pracownik($name, $entry, $birth, $oddz, $perm);
$pr->save();


header("Location: /hr/add/?saved=true");
die();

?>