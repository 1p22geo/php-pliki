<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dodaj klienta</title>
</head>
<body class="bg-slate-400">
    <a href="/sprzedaz/">BACK</a>
    <?php 
require("../model/transaction.php");

function compare(Transaction $tr1, Transaction $tr2){
  return $tr1->price<$tr2->price;
}

    $transactions = Transaction::load();
usort($transactions, "compare");


    echo "<table class=' text-gray-200 text-sm font-bold mb-2 w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4'><tr class='p-2'><th class='p-2'>Produkt</th> <th class='p-2'>Cena</th> <th class='p-2'>Data</th> <th class='p-2'>ID</th></tr>";

  $first = true;
    foreach ($transactions as $tr) {
        $date = $tr->date->format("Y-m-d");
        $price = strval($tr->price);
        $color = $first?"bg-slate-400":"";
        $first = false;
    echo "<tr class='$color'>
    <td class='p-2'>$tr->product</td>
    <td class='p-2'>$price</td>
    <td class='p-2'>$date</td>
    <td class='p-2'>$tr->id</td>
    </tr>";
    }

    echo "</table>"
    ?>

</body>
</html>
