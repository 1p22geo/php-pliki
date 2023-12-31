<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktualizacja transakcji</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-400">
    <a href="/hr/">BACK</a>
    <?php 

    require("../model/pracownik.php");
    if(isset($_GET["notran"])){
        echo "Brak pracownika";
    }
    if(isset($_GET["nodata"])){
        echo "Proszę wpisać nowe dane";
    }

    if(isset($_GET["saved"])){
        echo "Pomyslnie zaaktualizowano";
    }
    if(!isset($_GET["id"])){
echo '
<form action="/hr/upd/" method="GET" class=" w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-sm font-bold mb-2" name="id">
    <label for="id" class="text-gray-200 text-sm font-bold mb-2">
      ID pracownika:
    </label> 
    <input id="id" name="id"><br>
    
    <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-4">
</form>

';
    }
    else{
        $id = $_GET['id'];
        $tr = Pracownik::get_by_id($id);
        if(!$tr){
            echo "<script>window.location.replace('/hr/upd/?notran=true')</script>Your redirect should start automagically. If not, click<a href='/hr/upd?notran=true'>here</a>";
            die();
        }

        echo "Zmień dane pracownika $tr->id";

        $ent = $tr->entry->format("Y-m-d");
        $bir = $tr->birth->format("Y-m-d");

        echo <<<EOF
        <form action="/hr/api/upd/" method="POST" class="w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input class="hidden" hidden name="id" value="$tr->id">
            <label for="product" class="block text-gray-200 text-sm font-bold mb-2">
                Imie:
                <input value="$tr->imie" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imie" name="name"><br>
            </label> 
            <label class="block text-gray-200 text-sm font-bold mb-2" for="price">
                Data zatrudnienia:
                <input value="$ent" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="wejscie" name="entry"><br>
            </label> 
            <label class="block text-gray-200 text-sm font-bold mb-2" for="date">
                Data urodzenia:
                <input value="$bir" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="urodzenie" name="birth"><br>
            </label> 
            <label class="block text-gray-200 text-sm font-bold mb-2" for="date">
                Oddzial:
                <input value="$tr->oddz" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="upr" name="perm"><br>
            </label> 
            <label class="block text-gray-200 text-sm font-bold mb-2" for="date">
                Uprawnienia:
                <input value="$tr->permissions" class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="oddz" name="oddz"><br>
            </label> 

            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="submit">
        </form>
        EOF;
    }
    ?>
</body>
</html>
