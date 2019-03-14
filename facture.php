<?php

require ('functions.inc.php');
//appel du fichiers avec les fonctions 

if (!isset($_FILES['logo']['name']) or empty($_FILES['logo']['name']))
    {
      header('Location: /SmartServices/FormulairesPhp/index.php');
    
//Appel de la fonction avec les paramètres souhaités
 uploadFile($_FILES['logo']['name'], $_FILES['logo']['tmp_name']);
  
  
$champs = ["nom","adresse","description","prix","tva"];
// => array('nom', 'adresse', 'description','prix', 'tva');

 checkFormlsValid($champs);
//ne pas oublier d'appeler la variable préalablement définie
      
    echo   '<img src= "upload/' . $_FILES['logo']['name'] . '"/>',
        
            '<p>Vous êtes ' . $_POST['nom'] . '</p>',

            '<p>Vous habitez ' . $_POST['adresse'] . '</p>',

            '<p>Vous souhaitez ' . $_POST['description'] . '</p>',

            '<p>Le prix unitaire :' . $_POST['prix'] . '</p>', 

            '<p> La TVA : ' . $_POST['tva'] . '</p>',

            '<p> Le prix TTC est de :' . ttcPrice($_POST['prix'],$_POST['tva']) . '</p>',

            '<p>Le montant de votre TVA est de : ' . tvaPrice($_POST['prix'],$_POST['tva']);


?>
