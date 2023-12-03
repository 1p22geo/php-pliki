<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zabij klienta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/crm">BACK</a>
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1>Prosze wpisać imie klienta do uciszenia</h1>";
    }
    if(isset($_GET["saved"])){
        echo "<h1>Zlikwidowano klienta!</h1>";
    }
    if(isset($_GET["noclient"])){
        echo "<h1>Nie ma takiego klienta</h1>";
    }
    ?>
    <form action="/crm/api/drop_client/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <label for="id" class="block text-gray-200 text-sm font-bold mb-2">
            ID klienta:
            <input id="id" name="id"><br>
        </label> 
        
        <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-4">
    </form>
</body>
</html>