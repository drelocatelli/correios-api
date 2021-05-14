<?php
    class Scrap {
        private $url;
        private $data;
        public $correiosApi;
        
        public function __construct($code) {
            ## JSON
            header("Content-Type: application/json");
            
            $url = "https://www.linkcorreios.com.br/?id=$code";
            $data = file_get_contents($url);

            preg_match("/Útimo Status do Objeto: (.*)(?=<)/i", $data, $matches);
            $mapa = $matches[0];
            $mapa = str_replace("Útimo","Último", $mapa);
            
            preg_match("/Status: (?:<b>)(.*)(?=<\/b)(?=<)/i", $data, $matches);
            $status = $matches[0];
            $status = str_replace("<b>","", $status);

            preg_match("/Data (.*)(?=<)/i", $data, $matches);
            $date = $matches[0];

            preg_match("/Origem: (.*)(?=<)/i", $data, $matches);
            $origem = $matches[0];
            $origem = str_replace('Origem: ', '', $origem);

            preg_match("/Destino: (.*)(?=<\/li)(?=<)/i", $data, $matches);
            $destino = $matches[0];
            $destino = str_replace('Destino: ', '', $destino);

            $this->correiosApi = array(
                "Mapa" => $mapa,
                "Status" => $status,
                "Data" => $date,
                "Origem" => $origem,
                "Destino" => $destino
            );

            
        }

        public function getSomething($item){
            if($item == "All"){
                echo json_encode($this->correiosApi);
            }else{
                echo $this->correiosApi["$item"];
            }
        }
        
    }
?>