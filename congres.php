<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste des congrès</title>
    </head>
    <style>
    table{
      padding: 1px;
      border-spacing : 3px;
      text-align: center;
      border: 1px solid black;
    }

    a{
      text-decoration: none;
    }
    </style>
    <body>
      <?php
      // Connexion
      include_once("utils.php");
      $connexion = connect();

        if($connexion){
          // Faire la requête SQL
          $sql = "SELECT CODECONGRES, VILLECONGRES, NUMEDITIONCONGRES, DTDEBUTCONGRES,
          DTFINCONGRES FROM congres";

          // Interroger la BDD
          $congres = query($connexion, $sql);

          // Afficher le résultat
          if($congres){
              include_once("fonctions.php");
              affichercongres($congres);
            }
          }

        // Déconnexion
        disconnect($connexion);
      ?>
      <a href="index.php" style="text-decoration:none;"><br> Accueil</a>
    </body>
</html>
