<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="activites.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="style.css">
        <title>Activités</title>
    </head>
    <body>
      <p>Les activités proposées par chaque congrès</p>
      <?php
        // connexion
        include_once("utils.php");
        $connexion = connect();

        if($connexion){
          // Faire la requête SQL
          $sql = "SELECT * FROM congres, proposer, activites
          WHERE activites.CODEACTIVITE = proposer.CODEACTIVITE
            AND proposer.CODECONGRES = congres.CODECONGRES
            GROUP BY activites.CODEACTIVITE
            ORDER BY activites.PRIXACTIVITE";

          // Interroger la BDD
          $activites = query($connexion, $sql);

          // Afficher le résultat
          if($activites){
            include_once("fonctions.php");
            afficherActivites($activites);
          }
        }

          if(isset($_POST['congres'])){
            $activite = $_POST['congres'];
            $sql = "SELECT NOMACTIVITE, PRIXACTIVITE FROM activites, congres, proposer
            WHERE activites.CODEACTIVITE = proposer.CODEACTIVITE
            AND proposer.CODECONGRES = congres.CODECONGRES";
            $activite = query($connexion, $sql);
            if($activite){
              include_once("fonctions.php");
              afficherActivites($activite);
            }
          }
          // Déconnexion
          disconnect($connexion);
      ?>
      <a href="index.php" style="text-decoration:none;"><br> Accueil</a>
    </body>
