<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj klienta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/crm">BACK</a>
    
    <form action="/crm/api/add_client/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1 class='text-2xl mb-2 text-red-500'>Prosze wpisać dane klienta</h1>"; //zrbcie frontend
    }
    if(isset($_GET["saved"])){
        echo "<h1 class='text-2xl mb-2 text-green-500'>Dodano klienta!</h1>"; //zrbcie frontend
    }
    ?>
        <label for="imienie" class="block text-gray-200 text-sm font-bold mb-2">
            Imię klienta:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imienie" name="imie"><br>
        </label> 
        <label class="block text-gray-200 text-sm font-bold mb-2" for="email">
            E-mail klienta:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email"><br>
        </label> 
            <p class ="text-gray-200">Subskrybcja:</p>
            <label for="subskrybcja1" class="block text-gray-200 text-sm font-bold">
            Tak
            <input type="radio" id="subskrybcja1" name="sub" value="true"><br>
            </label>
            <label class="block text-gray-200 text-sm font-bold mb-2" for="subskrybcja2">
            Nie
            <input type="radio" id="subskrybcja2" name="sub" value="false"><br>
            </label>
        
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="submit">
    </form>
</body>
</html>