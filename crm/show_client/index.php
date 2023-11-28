<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dodaj klienta</title>
</head>
<body>
    <a href="/crm">BACK</a>
    <?php 
    require("../model/client.php");

    $clients = Client::load();

    foreach ($clients as $client) {
        $sub = $client->id?"<span>tak</span>":"<span>nie</span>";
    echo "<div>Klient:
    Imie: $client->imie
    Email: $client->email
    Subskrybuje: $sub
    ID: $client->id
    </div>";
    }
    ?>

</body>
</html>