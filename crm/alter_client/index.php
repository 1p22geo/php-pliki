<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmień klienta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/crm">BACK</a>
    <?php 

    require("../model/client.php");
    if(isset($_GET["noclient"])){
        echo "Brak klienta";
    }

    if(isset($_GET["nodata"])){
        echo "Proszę wpisać nowe dane";
    }
    if(isset($_GET["saved"])){
        echo "Pomyslnie zaaktualizowano";
    }
    if(!isset($_GET["id"])){
echo '
<form action="/crm/alter_client/" method="GET" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <label for="id">
        ID klienta:
        <input id="id" name="id"><br>
    </label> 
    
    <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-4">
</form>

';
    }
    else{
        $id = $_GET['id'];
        $client = Client::get_client($id);
        if(!$client){
            echo "<script>window.location.replace('/crm/alter_client?noclient=true')</script>Your redirect should start automagically. If not, click<a href='/crm/alter_client?noclient=true'>here</a>";
            die();
        }

        echo "Zmień dane klienta $client->email";

        $subs = $client->status=="true";
        $c1 = $subs?"checked":"";
        $c2 = (!$subs)?"checked":"";

        echo <<<EOF
        <form action="/crm/api/alter_client/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input class="hidden" hidden name="id" value="$client->id">
            <label for="imienie" class="block text-gray-200 text-sm font-bold mb-2">
                Imię klienta:
                <input value="$client->imie" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imienie" name="imie"><br>
            </label> 
            <label class="block text-gray-200 text-sm font-bold mb-2" for="email">
                E-mail klienta:
                <input value="$client->email" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email"><br>
            </label> 
                <p class ="text-gray-200">Subskrybcja:</p>
                <label for="subskrybcja1" class="block text-gray-200 text-sm font-bold">
                Tak
                <input type="radio" id="subskrybcja1" $c1 name="sub" value="true"><br>
                </label>
                <label class="block text-gray-200 text-sm font-bold mb-2" for="subskrybcja2">
                Nie
                <input type="radio" id="subskrybcja2" $c2 name="sub" value="false"><br>
                </label>
            
            <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
        EOF;
    }
    ?>
</body>
</html>