<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Activités</title>
    </head>
    <style>
    table{
      text-align: center;
      border-collapse: collapse;
    }

    form{
      padding: 15px;
    }

    body{
      text-align: center;
      display: grid;
      justify-content: center;
    }

    td, th{
      padding: 0.5rem;
      border: 1px solid black;
    }
    </style>
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
            GROUP BY activites.CODEACTIVITE";

          // Interroger la BDD
          $activites = query($connexion, $sql);

          // // Afficher le résultat
          //   echo "<form class='' action='activites.php' method='post'>";
          //     foreach($activites as $a){
          //       echo "<input type='radio' name='activites' id='"." ".$a['NOMACTIVITE']."'value='".$a['PRIXACTIVITE']."'>";                
          //       echo "<label for='".$a['NOMACTIVITE']."'>".$a['NOMACTIVITE']." - ".$a['PRIXACTIVITE']."€"."</label><br>";
          //       echo "<br>";
          //     }
          //     echo "<br>";
          //     echo "<input type='submit' value='Go'>";
          //   echo "</form>";

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
