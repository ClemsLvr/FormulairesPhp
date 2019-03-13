<?php

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

$reponse= $bdd->query('SELECT * FROM livres');

while ($donnees = $reponse->fetch())
{
?>
   <table style="border:1px solid">
       <tr>
           <td>id</td>
           <td>titre</td>
           <td>pv_ht</td>
           <td>tva</td>
           <td>description</td>
           <td>image</td>
           <td>stock</td>
       </tr>
       
       <tr>
           <td><?php echo $donnees['id'];?></td>
           <td><?php echo $donnees['titre'];?></td>
           <td><?php echo $donnees['pv_ht'];?></td>
           <td><?php echo $donnees['tva'];?></td>
           <td><?php echo $donnees['description'];?></td>
           <td><?php echo $donnees['image'];?></td>
           <td><?php 
 if (($donnees['stock']) == 0)
{
    echo "stock épuisé"; 
}
 elseif (($donnees['stock']) <5)
{
    echo "Derniers livres disponibles";
}
else
{
    echo "Disponible";
}
    ?></td>
       </tr>
   </table> 
<?php
}

$reponse->closeCursor();

?>