<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj klienta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <a href="/crm">BACK</a>
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1 >Please type in the username and fasdgasdg</h1>"; //zrbcie frontend
    }
    if(isset($_GET["saved"])){
        echo "<h1>Added client!</h1>"; //zrbcie frontend
    }
    ?>
    <form action="/crm/api/add_client/" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <label for="imienie" class="block text-gray-700 text-sm font-bold mb-2">
            Imię klienta:
            <input id="imienie" name="imie"><br>
        </label> 
        <label for="email">
            E-mail klienta:
            <input id="email" name="email"><br>
        </label> 
            Subskrybcja:<br>
            <label for="subskrybcja1">
            Tak
            <input type="radio" id="subskrybcja1" name="sub" value="true"><br>
            </label>
            <label for="subskrybcja2">
            Nie
            <input type="radio" id="subskrybcja2" name="sub" value="false"><br>
            </label>
        
        <input type="submit" value="submit">
    </form>
</body>
</html>