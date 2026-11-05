# Congrès

## Contrôle de PHP

Petite application web en PHP / MySQL qui affiche une liste de congrès et les activités qu'ils proposent.

_Laureline_

## Fonctionnalités

- **Accueil** (`index.php`) : menu avec un lien vers la liste des congrès.
- **Liste des congrès** (`congres.php`) : tableau avec le code, la ville, l'édition, la date de début et la date de fin de chaque congrès. Un bouton « Activités » mène à la page des activités.
- **Activités** (`activites.php`) : tableau avec le nom et le prix des activités proposées, triées par prix croissant.

## Structure du projet

| Fichier | Rôle |
|---|---|
| `index.php` | Page d'accueil / menu |
| `congres.php` | Page « Liste des congrès » |
| `activites.php` | Page « Activités » |
| `fonctions.php` | Fonctions d'affichage (`afficherCongres`, `afficherActivites`) |
| `utils.php` | Accès à la base : `connect`, `disconnect`, `query` (PDO) |
| `style.css` | Feuille de style |
| `SimpleHandmade.otf` / `.ttf` | Police utilisée par le site |
| `congres.ico`, `activites.ico` | Favicons des pages |

## Prérequis

- PHP 7.4 ou plus récent, avec l'extension `pdo_mysql`
- MySQL ou MariaDB
- Un serveur local, par exemple XAMPP, MAMP, WAMP, ou `php -S`

## Installation

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/laurelinehenaff/congres.git
   cd congres
   ```
2. Créer une base de données nommée `congres`. Elle doit contenir au minimum les tables :
   - `congres` : `CODECONGRES`, `VILLECONGRES`, `NUMEDITIONCONGRES`, `DTDEBUTCONGRES`, `DTFINCONGRES`
   - `activites` : `CODEACTIVITE`, `NOMACTIVITE`, `PRIXACTIVITE`
   - `proposer` : `CODECONGRES`, `CODEACTIVITE` (table d'association)
3. Adapter les identifiants de connexion dans `utils.php`. Par défaut : hôte `localhost`, utilisateur `root`, mot de passe `root`, base `congres`.
4. Lancer le serveur :
   ```bash
   php -S localhost:8000
   ```
5. Ouvrir <http://localhost:8000/index.php>.

## Limites connues

- Les identifiants de la base sont écrits en dur dans `utils.php`. Il vaudrait mieux les placer dans un fichier de configuration ignoré par Git.
- Le bouton « Activités » de la liste des congrès ne filtre pas par congrès : `activites.php` affiche toutes les activités.
- Le bloc `$_POST['congres']` de `activites.php` n'applique pas de filtre non plus. Il charge la valeur reçue, puis l'écrase.
- La fonction `execute()` de `utils.php` utilise `$connexion` et `$sql` sans les recevoir en paramètres.
- `congres.php` appelle `affichercongres`, alors que la fonction s'appelle `afficherCongres`. PHP ignore la casse des noms de fonctions, donc cela marche.
