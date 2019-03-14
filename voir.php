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
}

//si rien ne s'affiche tout va bien et on peut continuer, sinon vérifier les infos

//on prepare la requête SQL
$req= $bdd->prepare('SELECT * FROM livres WHERE id= ?');

//on exécute la requête SQL 
$req->execute([$_GET['id']]);

$row = $req->fetch();

?>

<style>
    td
    {
        border: 1px solid;
        text-align: center;
    }

</style>

<table>
     <table>
      <caption>Voici les détails de votre livre</caption>
       <tr>
           <td>id</td>
           <td>titre</td>
           <td>pv_ht</td>
           <td>tva</td>
           <td>description</td>
           <td>image</td>
           <td>stock</td>
           <td>prix ttc</td>
           
       </tr>
       
       <tr>
           <td><?php echo $row['id'];?></td>
           <td><?php echo $row['titre'];?></td>
           <td><?php echo $row['pv_ht'];?></td>
           <td><?php echo $row['tva'];?></td>
           <td><?php echo $row['description'];?></td>
           <td><?php echo $row['image'];?></td>
           <td><?php 
 if (($row['stock']) == 0)
{
    echo '<p class="epuise">stock épuisé</p>'; 
}
 elseif (($row['stock']) <5)
{
    echo '<p class="derniers">Derniers livres disponibles</p>';
}
else
{
    echo '<p class="dispo">Disponible</p>';
}
 
    ?></td>
           <td><?php 
               
        echo ttcPrice($row['pv_ht'],$row['tva']);
        ?></td>
           
       </tr>
    
</table>