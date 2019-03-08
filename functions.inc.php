<?php


$uploads_dir = './upload/';
//indique la direction depuis l'emplacement actuel, selon l'emplacement ne pas oublier le . devant
$name=$_FILES['logo']['name'];
$tmp_name=$_FILES['logo']['tmp_name'];

function uploadFile($uploads_dir, $name, $tmp_name)
{
  move_uploaded_file($tmp_name, $uploads_dir . $name);

    echo'<img src= "upload/' . $_FILES['logo']['name'] . '"/>';   
}
  
uploadFile($uploads_dir, $_FILES['logo']['name'], $_FILES['logo']['tmp_name']);



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

    function tvaPrice($prix, $tva)
    {
        return $prix * ($tva/100);
    }


?>