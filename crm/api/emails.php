<?php
require("../model/client.php");

$users = Client::load();
foreach ($users as  $user) {
  echo "$user->imie:$user->email\n";
}
?>
