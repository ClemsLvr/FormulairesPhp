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

//on fait la requête SQL
$reponse= $bdd->query('SELECT * FROM livres');

//on fait une boucle pour lire les éléments 1 à 1
while ($row = $reponse->fetch())
{
?>
 
  <style>
      
      table
      {
          border: 1px solid;
      }
      
      .epuise
      {
          background-color: red;
      }
      
      .derniers
      {
          background-color: orange;
      }
      
      .dispo
      {
          background-color: lightgreen;
      }

</style>
  
   <table>
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
 
        /*function pv_ttc($ht, $tva)
    {
        return $ht*(1+($tva/100));
    }*/
 
        echo ttcPrice($row['pv_ht'],$row['tva']);
        ?>  
          
      </td>
       </tr>
   </table> 
<?php
}

$reponse->closeCursor();

?>