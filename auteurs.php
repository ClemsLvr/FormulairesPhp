<?php

require ('functions.inc.php');

try
{
    //on se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=smart;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    //En cas d'erreur, on affiche un msg et on arrête tout
        die('Erreur : ' . $e->getMessage());
}//si rien ne s'affiche tout va bien et on peut continuer, sinon vérifier les infos

if (isset($_GET["del"]))
{
    $del=$bdd->prepare('DELETE FROM auteurs WHERE id=?');
    $del->execute(array($_GET['del']));
    header('Location:/SmartServices/FormulairesPhp/auteurs.php');
}

//$reponse contient la requête SQL
$reponse=$bdd->query('SELECT * FROM auteurs');

//$row contient la première ligne de la requête SQL, si on veut toutes les lignes il faut faire une boucle
//$row=$reponse->fetch();

#boucle pour afficher la totalité des lignes
while ($row=$reponse->fetch())
{
?>

<style>
    table {
        text-align: center;
    }

    td {
        width: 150px;
        border: 1px solid;
    }

    .nomenclature {
        background-color: cornflowerblue;
    }

    .no-stock {
        background-color: red;
    }

    .last-ones {
        background-color: darkorange;
    }

    .dispo {
        background-color: greenyellow;
    }

</style>

<table>
    <tr>
        <td class="nomenclature">id</td>
        <td class="nomenclature">nom</td>
        <td class="nomenclature">prenom</td>
        <td class="nomenclature">annee</td>
        <td class="nomenclature">style</td>
        <td class="nomenclature">bibliographie</td>
        <td class="nomenclature">livre en vente ici</td>
        <td class="nomenclature">image</td>
        <td class="nomenclature">pv_ht</td>
        <td class="nomenclature">tva</td>
        <td class="nomenclature">stock</td>
        <td class="nomenclature">pv_ttc</td>
    </tr>

    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['nom'];?><br /><a href="auteurs.php?del=<?php echo $row['id'];?>">Retirer cet auteur de ma sélection</a></td>
        <td><?php echo $row['prenom'];?></td>
        <td><?php echo $row['annee'];?></td>
        <td><?php echo $row['style'];?></td>
        <td><a href="biblio.php?id=<?php echo $row['id'];?>">Cliquez pour voir la bibliographie complète</a></td>
        <td><?php echo $row['livre_disponible'];?></td>
        <td><?php echo $row['image'];?></td>
        <td><?php echo $row['pv_ht'];?></td>
        <td><?php echo $row['tva'];?></td>
        <td><?php 
 if (($row['stock']) == 0)
     { 
 echo '<p class="no-stock">stock épuisé</p>';
     }
 elseif (($row['stock']) <5)
    {
echo '<p class="last-ones">derniers livres dispos</p>';
    }
else 
    {
echo '<p class= "dispo">disponible</p>'; 
    }
    ?>
        </td>
        <td>
            <?php echo ttcPrice($row['pv_ht'],$row['tva']);
 ?>
        </td>
    </tr>

</table>

<?php  
}
$reponse->closeCursor();
    
?>
