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
        echo "zły poziom upraniwnień";
    }
    if(isset($_GET["nodata"])){
        echo "Proszę wpisać nowe dane";
    }

    if(isset($_GET["saved"])){
        echo "Pomyslnie zaaktualizowano";
    }
    if(!isset($_GET["id"])){

echo <<<EOF
<form action="/hr/per/" method="GET" class=" w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-sm font-bold mb-2" name="id">  
<label for="id" class="text-gray-200 text-sm font-bold mb-2">
      Uprawnienia:
    </label> 
    <input id="id" name="id" type="range" min="1" max="3"><br>
    
    <input type="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-4">
</form>

EOF;
    }
    else{
        $id = $_GET['id'];
        if(!in_array($id, ["1", "2", "3"])){
            echo "<script>window.location.replace('/hr/per/?notran=true')</script>Your redirect should start automagically. If not, click<a href='/hr/per?notran=true'>here</a>";
            die();
        }

        echo "Pracwonicy o poziomie uprawnuień $id";

        $pracownicy = Pracownik::load();
    echo "<table class=' text-gray-200 text-sm font-bold mb-2 w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4'><tr class='p-2'><th class='p-2'>id</th><th class='p-2'>Imie</th> <th class='p-2'>Data zatrudnienia</th> <th class='p-2'>Data ur</th> <th class='p-2'>Uprawnienia</th> <th class='p-2'>Oddzial</th></tr>";


        foreach ($pracownicy as $p) {

            if(intval($p->permissions) < intval($id)){
                continue;
            }

            $ent = $p->entry->format("Y-m-d");
            $bir = $p->birth->format("Y-m-d");
        echo "<tr>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->id</td>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->imie</td>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$ent</td>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$bir</td>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->oddz</td>
        <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->permissions</td>
        </tr>";
        };

        echo "</table>";
;;;;
    }
    ?>
</body>
</html>
