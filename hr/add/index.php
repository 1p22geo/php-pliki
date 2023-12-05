<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj pracownika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/hr">BACK</a>
    
    <form action="/hr/api/add/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1 class='text-2xl mb-2 text-red-500'>Prosze wpisać dane transakcji</h1>";
    }
    if(isset($_GET["saved"])){
        echo "<h1 class='text-2xl mb-2 text-green-500'>Dodano pracownika!</h1>";
    }
    ?>
        <label for="name" class="block text-gray-200 text-sm font-bold mb-2">
            Nazwa:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Stanisław Brzoza" name="name"><br>
        </label>  
        <label for="entry" class="block text-gray-200 text-sm font-bold mb-2">
            Data zatrudnienia:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="entry" type="date" name="entry"><br>
        </label> 
        <label for="birth" class="block text-gray-200 text-sm font-bold mb-2">
            Data urodzenia:
            <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birth" type="date" name="birth"><br>
        </label> 
        <label for="perm" class="block text-gray-200 text-sm font-bold mb-2">
             Poziom uprawnień:
             <input type="range" min="1" max="3" step="1" value="1" id="perm" name="perm">
         </label>  
        <label for="oddz" class="block text-gray-200 text-sm font-bold mb-2">
             Oddział:
             <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="oddz" placeholder="dep1" name="oddz"><br>
         </label>  
        
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="submit">
    </form>
</body>
</html>
