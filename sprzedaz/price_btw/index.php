<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Wypisz transakcje</title>
</head>
<body class="bg-slate-400">
    <a href="/sprzedaz/">BACK</a>
    <?php 
if(!isset($_GET["start"]) || !isset($_GET["stop"])){
  echo "
    <form action='/sprzedaz/price_btw/' method='GET' class='w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-gray-200 text-sm font-bold mb-2'>
    <h1>Proszę wybrać zakres czasu</h1>
<label for=start>
            start:
            <input id=start name=start type=date><br>
        </label> 
 <label for=stop>
            stop:
            <input id=stop name=stop type=date><br>
        </label> 
       
        <input type=submit value=submit class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-4'>

</form>    
    ";
    }
else{

  function ft(Transaction $tr){
    if($tr->date->format("Y-m-d")>$_GET["start"] && $tr->date->format("Y-m-d")<$_GET['stop']){
      return true;
    }
  }

    require("../model/transaction.php");

    $transactions = Transaction::load();
    $transactions = (array_filter($transactions, "ft"));
    $ct = count($transactions);
    $st = $_GET["start"];
    $tp = $_GET["stop"];
    echo "<h1 class='text-xl font-bold'>Było $ct transakcji między $st a $tp</h1>";
    $sum = 0;
    foreach($transactions as $tr){
      $sum += $tr->price;
    }

    echo "<h1 class='text-xl font-bold'>Ich łączna cena to $sum złotych</h1>";

    echo "<table class='w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4'><tr class='p-2'><th class='p-2'>Produkt</th> <th class='p-2'>Cena</th> <th class='p-2'>Data</th> <th class='p-2'>ID</th></tr>";

    foreach ($transactions as $tr) {
        $date = $tr->date->format("Y-m-d");
        $price = strval($tr->price);
    echo "<tr>
    <td class='p-2'>$tr->product</td>
    <td class='p-2'>$price</td>
    <td class='p-2'>$date</td>
    <td class='p-2'>$tr->id</td>
    </tr>";
    }

    echo "</table>";
}
    ?>

</body>
</html>
