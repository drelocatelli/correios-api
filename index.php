<?php require_once('src/ScrapController.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correios API</title>
</head>
<body>

    <form method="get" name="form_rast" action="response.php">
        <input type="text" name="code" placeholder="Digite o código de rastreio" required value="<?php if($_GET['code']){ echo $_GET['code'];} ?>" />
        <button type="submit">Rastrear</button>
    </form>
    
    <br>

    <?php

        if($_GET['code']){
            echo '<div id="rastreio">';
            echo "<a href='response.php?code=".$_GET['code']."'>JSON</a><br>";
                $scrap = new Scrap($_GET['code']);
            echo '</div>';
        }

    ?>
</body>
</html>

<style>
    body{display:flex; align-items:center; flex-direction:column;}
    form{user-select:none;}
    *{font-family:sans-serif;}
    button{cursor:pointer;}
</style>
