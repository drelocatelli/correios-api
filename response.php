<?php 
    require_once("src/ScrapController.php"); 

    if(isset($_POST['code'])){
        scrap($_POST['code']);
    }else if($_GET['code']){
        scrap($_GET['code']);
    }


    function scrap($var){
        try{
            $scrap = new Scrap($var);
            $scrap->getSomething("All");
        }catch(Exception $e){
            echo "Erro: " . $e->getMessage();
        }
    }
