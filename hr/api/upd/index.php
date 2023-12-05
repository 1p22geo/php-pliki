<?php

require("../../model/pracownik.php");

if((!isset($_POST["name"]))|| (!isset($_POST["id"])) || (!isset($_POST["entry"]))|| (!isset($_POST["birth"]))|| (!isset($_POST["perm"]))|| (!isset($_POST["oddz"]))){
    header("Location: /hr/add/?nodata=true");
    die();
}
if((!strlen($_POST["name"]))|| (!strlen($_POST["id"])) || (!strlen($_POST["entry"]))|| (!strlen($_POST["birth"]))|| (!strlen($_POST["perm"]))|| (!strlen($_POST["oddz"]))){
    header("Location: /hr/add/?nodata=true");
    die();
}

$name = $_POST["name"];
$entry = $_POST["entry"];
$birth = $_POST["birth"];
$perm = $_POST["perm"];
$oddz = $_POST["oddz"];
$id = $_POST["id"];

Pracownik::del($id);
$tr = new Pracownik($name, $entry, $birth, $perm, $oddz, $id);
$tr->save();

if(preg_match('/[0-9]*/', $id))
{
$redirect_id = intval($id);


header("Location: /hr/upd/?id=".intval($redirect_id)."&saved=true");
die();
}
else{
die("Invalid data");
}

?>