<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU CRM</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="gap-4 p-6 flex flex-col h-screen w-screen items-center">
    <a href="/"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">MENU</button></a>
    <a href="/crm/add_client"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">dodaj klienta</button></a>
    <a href="/crm/show_client"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">wyświetl klientów</button></a>
    <a href="/crm/alter_client"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">zmień dane klienta</button></a>
    <a href="/crm/drop_client"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">usuń klienta</button></a>
    <a href="/crm/api/emails.php" target="_blank" download="emails.txt"><button class=" text-6xl border-2 w-fit p-2 rounded-xl border-slate-800	">pobierz adresy email</button>
    </main>
</body>
</html>
