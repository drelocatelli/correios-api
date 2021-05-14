<?php 
    require_once("../src/ScrapController.php"); 

    if($_GET['code']){
        try{
            $scrap = new Scrap($_GET['code']);
            $scrap->getSomething("All");
        }catch(Exception $e){
            echo "Erro: " . $e->getMessage();
        }
    }
