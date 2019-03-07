<?php

//tests de $_POST et redirection vers le formulaire
//utilisation de empty afin de test si la $ est vide
//utilisation de isset affin de test si la $ est définie !!erreur commise: oubli de ! devant isset donc mauvaise interprétation
//(on veut pour la cond que la $ soit vide ou non set)
//header renvoie au formulaire si les deux cond sont ok
//ne pas oublier 'location:...'

   if (empty($_POST['nom']) or !isset($_POST['nom']))    
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }
 

    if (empty($_POST['adresse']) or !isset($_POST['adresse']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


   if (empty($_POST['description']) or !isset($_POST['description']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }

    if (empty($_POST['prix']) or !isset($_POST['prix']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


    if (empty($_POST['tva']) or !isset($_POST['tva']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }

//affichage des données avec concaténation
    
        echo '<p>Vous êtes ' . $_POST['nom'] . '</p>', 
            '<p>Vous habitez ' . $_POST['adresse'] . '</p>',
            '<p>Vous souhaitez ' . $_POST['description'] . '</p>',
            '<p>Le prix unitaire :' . $_POST['prix'] . '</p>', 
            '<p> La TVA : ' . $_POST['tva'] . '</p>'; 


?> 


