<?php

require ('functions.inc.php');

try
{
   
	$bdd = new PDO('mysql:host=localhost;dbname=smart;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
  
        die('Erreur : ' . $e->getMessage());
}

//on prépare la erquête puis on exécute anti injection SQL
$req_biblio= $bdd->prepare('SELECT bibliographie FROM auteurs WHERE id=?');
$req_biblio->execute(array($_GET['id']));

//on parcourt 
$row_biblio = $req_biblio->fetch();

//pour afficher le contenu de bibliogrpahie non pas sous forme de ligne mais en liste (saisie dans la bdd sous textarea avec retour chariot)
$biblio= explode("\n",$row_biblio["bibliographie"]);

$req_nom_pr=$bdd->prepare('SELECT nom, prenom FROM auteurs WHERE id=?');
$req_nom_pr->execute (array($_GET['id']));

$row_nom_pr=$req_nom_pr->fetch();

?>

<h2>Voici la bibliographie de <?php echo $row_nom_pr['prenom'] . ' ' . $row_nom_pr['nom'];?></h2>

<!--on lit avec une boucle foreach le resultat de $biblio qui est un tableau-->
<p><?php foreach($biblio as $element)
{
    echo $element . '<br/>';
}
    ?></p>




