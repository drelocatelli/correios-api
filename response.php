<?php 
    require_once("src/ScrapController.php"); 

    if($_POST['code']){
        try{
            $scrap = new Scrap($_POST['code']);
            $scrap->getSomething("All");
        }catch(Exception $e){
            echo "Erro: " . $e->getMessage();
        }
    }
