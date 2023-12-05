<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Wypisz transakcje</title>
</head>
<body class="bg-slate-400">
    <a href="/hr/">BACK</a>
    <?php 
    require("../model/pracownik.php");

    $pr = Pracownik::load();
    usort($pr, function($a, $b) {return $a->get_age()>$b->get_age();});



    echo "<table class=' text-gray-200 text-sm font-bold mb-2 w-1/3 bg-slate-600 shadow-md rounded px-8 pt-6 pb-8 mb-4'><tr class='p-2'><th class='p-2'>id</th><th class='p-2'>Imie</th> <th class='p-2'>Data zatrudnienia</th> <th class='p-2'>Data ur</th> <th class='p-2'>Uprawnienia</th> <th class='p-2'>Oddzial</th></tr>";

    foreach ($pr as $p) {

        $b1 = date_create("2000-".$p->entry->format("m-d"));
        $b2 = date_create("2000-".$p->birth->format("m-d"));

        $interval = date_diff($b1, $b2);
        $d = $interval->format("%a");
        $d = intval($d);

        if($d>14){
            continue;
        }
        
        $age = $p->get_age();

        $ent = $p->entry->format("Y-m-d");
        $bir = $p->birth->format("Y-m-d");
    echo "<tr>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->id</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->imie</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$ent</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$bir</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$age</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->oddz</td>
    <td class='p-2 text-gray-200 text-sm font-bold mb-2'>$p->permissions</td>
    </tr>";
    }

    echo "</table>"
    ?>

</body>
</html>
