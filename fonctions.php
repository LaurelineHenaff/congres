<style>
th{
  font-weight: normal;
 
}

td{
  padding: 1.5rem;
}

body, table{
  text-align: center;
  justify-content: center;
  display: grid;
}

table{
  margin-top: 2rem;
  padding: 1rem;
}
</style>
<?php
function afficherCongres($congres){
  echo '<table>';
  echo '<tr><th>Code</th><th>Ville</th><th>Edition</th><th>Date de début</th>
  <th>Date de fin</th><th>Activités du congrès</th></tr>';
    foreach($congres as $c){
      echo "<tr><td>".$c['CODECONGRES']."</td><td>".$c['VILLECONGRES']."</td>
      <td>".$c['NUMEDITIONCONGRES']."</td><td>".$c['DTDEBUTCONGRES']."</td>
      <td>".$c['DTFINCONGRES']."</td>
      <td><button type='button'><a href='activites.php'>"."Activités"."</button></a></td></tr>";
    }
    echo "</table>";
}

function afficherActivites($activites){
  echo '<table>';
  echo '<tr><th>Nom de l\'activité</th><th>Prix</th></tr>';
    foreach($activites as $a){
      echo "<tr><td>".$a['NOMACTIVITE']."</td>
      <td>".$a['PRIXACTIVITE']."</td></tr>";
    }
    echo "</table>";
}
?>
