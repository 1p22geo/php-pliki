<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj transakcje</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/sprzedaz">BACK</a>
    
    <form action="/sprzedaz/api/add/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1 class='text-2xl mb-2 text-red-500'>Prosze wpisać dane transakcji</h1>";
    }
    if(isset($_GET["saved"])){
        echo "<h1 class='text-2xl mb-2 text-green-500'>Dodano transakcję!</h1>";
    }
    ?>
        <label for="product" class="block text-gray-200 text-sm font-bold mb-2">
            Zakupiony produkt:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product" placeholder="jabłka" name="product"><br>
        </label>  
       <label for="price" class="block text-gray-200 text-sm font-bold mb-2">
            Cena produktu:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" placeholder="4.99" name="price"><br>
        </label>  
       <label for="date" class="block text-gray-200 text-sm font-bold mb-2">
            Data:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" name="date"><br>
        </label> 

        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="submit">
    </form>
</body>
</html>
