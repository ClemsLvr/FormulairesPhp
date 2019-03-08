<?php

function checkFormlsValid($champs) 
//($champs)= les paramètres
//on définit d'abord la variable
    {
        foreach($champs as $element) 
//foreach (pour chaque) boucle qui va prendre chaque $champs du tableau
        {
            if (empty($_POST[$element]) or !isset($_POST[$element]))
//utilisation de empty afin de test si la $ est vide
//utilisation de isset affin de test si la $ est définie !!erreur commise: oubli de ! devant isset donc mauvaise interprétation
//(on veut pour la cond que la $ soit vide or non set)
            {
               header('location: /SmartServices/FormulairesPhp/index.php');
//header renvoie au formulaire si les deux cond sont vérifiées
//ne pas oublier 'location:...'
            }
        }
    }

    checkFormlsValid($champs);
//ne pas oublier d'appeler la variable préalablement définie

    function ttcPrice($prix, $tva)
    {
        return $prix * (1+($tva)/100);
//ne pas oublier return pour afficher
    }

    function tvaPrice($prix, $tva)
    {
        return $prix * ($tva/100);
    }


?>