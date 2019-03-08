<?php

// à retenir var_dump($_POST); die(); pour afficher les infos de la $


//$_FILES['icone']['name']     Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
//$_FILES['icone']['type']     Le type du fichier. Par exemple, cela peut être « image/png ».
//$_FILES['icone']['size']     La taille du fichier en octets.
//$_FILES['icone']['tmp_name'] L'adresse vers le fichier uploadé dans le répertoire temporaire.
//$_FILES['icone']['error']    Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
//var_dump($_FILES); die();

$uploads_dir = './upload/';
//indique la direction depuis l'emplacement actuel, selon ne pas oublier le .
$name=$_FILES['logo']['name'];
$tmp_name=$_FILES['logo']['tmp_name'];

  move_uploaded_file($tmp_name, $uploads_dir . $name);

    echo'<img src= "upload/' . $_FILES['logo']['name'] . '"/>';   
    
    $champs = ["nom","adresse","description","prix","tva"];
// => array('nom', 'adresse', 'description','prix', 'tva');

    include ('functions.inc.php');

    echo '<p>Vous êtes ' . $_POST['nom'] . '</p>',

            '<p>Vous habitez ' . $_POST['adresse'] . '</p>',

            '<p>Vous souhaitez ' . $_POST['description'] . '</p>',

            '<p>Le prix unitaire :' . $_POST['prix'] . '</p>', 

            '<p> La TVA : ' . $_POST['tva'] . '</p>',

            '<p> Le prix TTC est de :' . ttcPrice($_POST['prix'],$_POST['tva']) . '</p>',

            '<p>Le montant de votre TVA est de : ' . tvaPrice($_POST['prix'],$_POST['tva']);


?>
