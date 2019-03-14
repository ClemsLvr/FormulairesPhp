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
           <td><?php echo $donnees['id'];?></td>
           <td><?php echo $donnees['titre'];?></td>
           <td><?php echo $donnees['pv_ht'];?></td>
           <td><?php echo $donnees['tva'];?></td>
           <td><?php echo $donnees['description'];?></td>
           <td><?php echo $donnees['image'];?></td>
           <td><?php 
 if (($donnees['stock']) == 0)
{
    echo '<p class="epuise">stock épuisé</p>'; 
}
 elseif (($donnees['stock']) <5)
{
    echo '<p class="derniers">Derniers livres disponibles</p>';
}
else
{
    echo '<p class="dispo">Disponible</p>';
}
 
    ?></td>
      
      <td><?php 
 
        function pv_ttc($ht, $tva)
    {
        return $ht*(1+($tva/100));
    }
 
        echo pv_ttc($donnees['pv_ht'],$donnees['tva']);
        ?>  
          
      </td>
       </tr>
   </table> 
<?php
}

$reponse->closeCursor();

?>