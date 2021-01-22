<h1>Arquivos</h1>

<?php

    chdir('/home/andressa');
    $dir = getcwd();
    $files = scandir($dir);
    
    foreach($files as $file){
        echo $file . '<br>';
    }

?>