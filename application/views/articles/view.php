<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($articles as $articles): ?>
       <h2><?php echo $articles['titre'] ?></h2>
        <div id="main">
        <?php echo $articles['texte_libre'].'</br>' ;
                echo $articles['date'];?>
            
        </div>
    <?php endforeach ?>
    </body>
</html>
