<?php
      
   if (empty($_POST['nom']) == false or isset($_POST['nom']) == false)
    {
    echo $_POST['nom'] . '<br>'; 
    }

    elseif (empty($_POST['nom']) or isset($_POST['nom']))    
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


    if (empty($_POST['adresse']) == false or isset($_POST['adresse']) == false)
    {
    echo $_POST['adresse'] . '<br>'; 
    }

    elseif (empty($_POST['adresse']) or isset($_POST['adresse']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


    if (empty($_POST['description']) == false or isset($_POST['description']) == false)
    {
    echo $_POST['description'] . '<br>'; 
    }

    elseif (empty($_POST['description']) or isset($_POST['description']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


    if (empty($_POST['prix']) == false or isset($_POST['prix']) == false)
    {
    echo $_POST['prix'] . '<br>'; 
    }

    elseif (empty($_POST['prix']) or isset($_POST['prix']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }


     if (empty($_POST['tva']) == false or isset($_POST['tva']) == false)
    {
    echo $_POST['tva'] . '<br>'; 
    }

    elseif (empty($_POST['tva']) or isset($_POST['tva']))   
    {
        header('location: /SmartServices/FormulairesPhp/index.php');
    }
    

?> 


