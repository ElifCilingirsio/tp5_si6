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
        <table border="2px">
            <tr>
                <td>
                <?php
                
                if (isset($_SESSION['id_utilisateur'])){
                    echo '<td>'.'<a href="create/"> créer une page</a>'.'</td>';
                    echo '<td>'.'<a href=logout/> deconnexion </a>'.'</td>';
                }
                ?></td>
                <td><a href="inscription/"> S'inscrire</a></td>
                <td><a href="connexion/"> Se connecter</a></td>
            </tr>
            <tr>
        <?php
        echo '<td>'.'<h2>'."Les themes :".'</h2>'.'</td>';
        foreach ($theme as $theme): ?>
                <td><h3><?php echo $theme['nom'] ?></h3>
                    <p><a href="view/<?php echo $theme['idTheme'] ?>">Voir les articles</a></p></td>
        <?php endforeach ?>
        </tr>
        <tr>
       <?php echo '<td>'.'<h2>'."Les auteurs : ".'</h2>'.'</td>';
       foreach ($utilisateurs as $utilisateurs): ?>
            <td>  <h3><?php echo $utilisateurs['nom']." ".$utilisateurs['prenom']?></h3>
                <p><a href="vue/<?php echo $utilisateurs['id_utilisateur'] ?>">Voir les articles</a></p></td>
        <?php endforeach ?> 
        </tr>
        </table>
    </body>
</html>
