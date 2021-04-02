<?php 
    require_once("src/ScrapController.php"); 

    if($_GET['code']){
        echo '<div id="rastreio">';
            $scrap = new Scrap($_GET['code']);
        echo '</div>';
    }else{
        echo '{"error": "nenhum objeto encontrado"}';
    }
?>

<script>
    let body = document.body;

    let objeto = body.innerText.match(/Útimo Status do Objeto: (.*)/g)[0];
    let status = body.innerText.match(/Status: (.*)/g)[0];
    let date =  body.innerText.match(/Data : (.*)/g)[0];
    let percurso = body.innerText.match(/De (.*)/g)[0];

    let res = {
                "código": objeto.replace('Útimo Status do Objeto: ', ''),
                "status": status,
                "date"  : date,
                "percurso": percurso
            }
    
    body.innerHTML = JSON.stringify(res);

    console.log(res)


</script>