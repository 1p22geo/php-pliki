<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dodaj klienta</title>
</head>
<body>
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


    echo "<table class='border-2'><tr class='p-2'><th class='p-2'>Produkt</th> <th class='p-2'>Przychód</th></tr>";

  $first = true;
    foreach ($products as $pr=>$price) {
        $price = strval($price);
        $color = $first?"bg-red-200":"";
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
