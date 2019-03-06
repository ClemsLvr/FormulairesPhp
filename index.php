 <?php
 
 $prenom= "Clém";

 ?> 

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires PHP</title>
    <style>
        
        body{
            width: 75%;
            margin: auto;
        }
        
        .entete{
            border: 1px solid;
            text-align:center;
            background-color: #80b8f1;
        }
        
        .intro{
            padding: 8px;
            margin-top: 25px;
            border: 1px solid;
            background-color: #80b8f1;
        }
        
        .form{
            padding: 8px;
            margin-top: 25px;
            border: 1px solid;
            background-color: #80b8f1;
            height: 500px;
        }
        
        label{
            padding: 8px;
            display: block;
        }
        
        .envoyer{
            display: block;
            margin-top: 15px;
        }
    
    </style>
</head>

<body>
  
        
  <div class="entete">
     
     <?php
        
    echo "<h1>Bonjour " . $prenom . "</h1>";
  
    ?>
  
  </div>
  
  <div class="intro">
      <p>Pour créer votre devis, vous devez remplir ce formulaire.</p>
  </div> 
      
  <div class="form">  
            
         <form method="post">
          
          <p>
          
          <label for ="nom">Votre nom : </label>
          <input type="text" name="nom" id="nom" placeholder = "Ex : Dupont"/>
          
          <label for= "adresse">Votre adresse :</label>
          <textarea name="adresse" id="adresse" rows="6" cols="50">
          </textarea>
          
          <label for= "description">Description :</label>
          <textarea name="description" id="description" rows="6" cols="50">
          </textarea>
          
          <label for= "Prix unitaire">Prix unitaire (en €) : </label>
          <input type="number" name="prix" id="prix" min= "0" step="0.01"/>
          
           <label for= "tva">TVA : </label>
           <select name="tva" id="tva">
              <option value="0">0%</option>
              <option value="5.5">5,5%</option>
              <option value="10">10%</option>
              <option value="20">20%</option>
           </select>
           
           <input class="envoyer" type="submit" value="Envoyer"/>
           
          
          </p> 
      </form>   
  </div>
    
</body>
</html>

