<?php 
    require_once("src/ScrapController.php"); 

    if($_GET['code']){
        $scrap = new Scrap($_GET['code']);
    }else{
        echo '{"error": "nenhum objeto encontrado"}';
    }
