<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correios API</title>
</head>
<body>

    <form method="get" name="form_rast">
        <input type="text" name="code" value="QE217991319BR"/>
        <button type="submit">Rastrear</button>
    </form>
    

    <?php
    class Scrap {
        public $url;
        public $data;
    
        public function __construct($code) {
            $url = "https://www.linkcorreios.com.br/?id=$code";

            $data = file_get_contents($url);
            preg_match("/Útimo Status do Objeto: (.*)/i", $data, $matches);
            $result = $matches[0];

            echo '<br>';
            echo $result;
            echo '<br>';       
            
            preg_match("/Status: (.*)/i", $data, $matches);
            $result = $matches[0];
            $result = str_replace("Status: ", "",$result);

            echo $result;
            echo '<br>';

            preg_match("/Origem: (.*)/i", $data, $matches);
            $origem = $matches[0];
            $origem = str_replace('Origem: ', '', $origem);

            preg_match("/Destino: (.*)/i", $data, $matches);
            $destino = $matches[0];
            $destino = str_replace('Destino: ', '', $destino);

            echo "De $origem para $destino";
            
        }
    }

    if($_GET['code']){
        $scrap = new Scrap($_GET['code']);
    }

    ?>
</body>
</html>

<style>
    *{font-family:sans-serif;}
</style>

<script>

    let objetosTextarea = document.querySelector('#objetos');
    let rastrearBtn = document.querySelector('#btnPesq');

    let form_rast = document.querySelector('form[name=form_rast]');

    // form_rast.onsubmit = function(e){
    //     e.preventDefault();

    // }


</script>