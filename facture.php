<?php

// à retenir var_dump($_POST); die(); pour afficher les infos de la $

    
    $champs = ["nom","adresse","description","prix","tva"];
// => array('nom', 'adresse', 'description','prix', 'tva');

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

    echo '<p>Vous êtes ' . $_POST['nom'] . '</p>', 
            '<p>Vous habitez ' . $_POST['adresse'] . '</p>',
            '<p>Vous souhaitez ' . $_POST['description'] . '</p>',
            '<p>Le prix unitaire :' . $_POST['prix'] . '</p>', 
            '<p> La TVA : ' . $_POST['tva'] . '</p>',
            '<p> Le prix TTC est de :' . ttcPrice($_POST['prix'],$_POST['tva']) . '</p>';


?>
