<?php

require ('functions.inc.php');
//on a sorti les fonctions 
      
    echo   '<img src= "upload/' . $_FILES['logo']['name'] . '"/>',
        
        '<p>Vous êtes ' . $_POST['nom'] . '</p>',

            '<p>Vous habitez ' . $_POST['adresse'] . '</p>',

            '<p>Vous souhaitez ' . $_POST['description'] . '</p>',

            '<p>Le prix unitaire :' . $_POST['prix'] . '</p>', 

            '<p> La TVA : ' . $_POST['tva'] . '</p>',

            '<p> Le prix TTC est de :' . ttcPrice($_POST['prix'],$_POST['tva']) . '</p>',

            '<p>Le montant de votre TVA est de : ' . tvaPrice($_POST['prix'],$_POST['tva']);


?>
