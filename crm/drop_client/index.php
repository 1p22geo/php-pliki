<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj klienta</title>
</head>
<body>
    <a href="/crm">BACK</a>
    <?php 
    if(isset($_GET["nodata"])){
        echo "<h1>Please type in the username and fasdgasdg</h1>"; //zrbcie frontend
    }
    ?>
    <form action="/crm/api/drop_client/" method="POST">
        <label for="id">
            ID klienta:
            <input id="id" name="id"><br>
        </label> 
        
        <input type="submit" value="submit">
    </form>
</body>
</html>