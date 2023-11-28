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

    echo "<table class='border-2'><tr class='p-2'><th class='p-2'>Imie</th> <th class='p-2'>Email</th> <th class='p-2'>Subskrybcja</th> <th class='p-2'>ID</th></tr>";

    foreach ($clients as $client) {
        $sub = ($client->status=="true")?"<span>tak</span>":"<span>nie</span>";
    echo "<tr>
    <td class='p-2'>$client->imie</td>
    <td class='p-2'>$client->email</td>
    <td class='p-2'>$sub</td>
    <td class='p-2'>$client->id</td>
    </tr>";
    }

    echo "</table>"
    ?>

</body>
</html>