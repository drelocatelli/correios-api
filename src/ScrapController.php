<?php
    class Scrap {
        private $url;
        private $data;
        
        public function __construct($code) {
            header("Content-Type: application/json");
            $url = "https://www.linkcorreios.com.br/?id=$code";
            $data = file_get_contents($url);

            preg_match("/Útimo Status do Objeto: (.*)/i", $data, $matches);
            $mapa = $matches[0];

            echo $mapa;
            echo "<title>$code</title>";
            echo '<br>';       
                
            preg_match("/Status: (.*)/i", $data, $matches);
            $status = $matches[0];
            // $status = str_replace("Status: ", "",$status);

            echo $status;
            echo '<br>';

            preg_match("/Data (.*)/i", $data, $matches);
            $date = $matches[0];

            echo $date;
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
?>