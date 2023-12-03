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



$products = array();

    $transactions = Transaction::load();
    foreach ($transactions as $tr) {
      if(!isset($products[$tr->product])){
        $products[$tr->product] = 0;
      }
      $products[$tr->product]+=$tr->price;
    }

    asort($products);
    $products = array_reverse($products);


    echo "<table class='text-gray-200 text-sm font-bold mb-2 w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4'><tr class='p-2'><th class='p-2'>Produkt</th> <th class='p-2'>Przychód</th></tr>";

  $first = true;
    foreach ($products as $pr=>$price) {
        $price = strval($price);
        $color = $first?"bg-slate-400":"";
        $first = false;
    echo "<tr class='$color'>
    <td class='p-2'>$pr</td>
    <td class='p-2'>$price</td>
    </tr>";
    }

    echo "</table>"
    ?>

</body>
</html>
