<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="congres.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="style.css">
        <title>Liste des congrès</title>
    </head>
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
