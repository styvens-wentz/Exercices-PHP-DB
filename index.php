<?php
session_start();

$servername = "localhost";
$user = "id11258159_styvens";
$password = "styvens59";
$dbname = "id11258159_intro_bdd";

$bdd = new mysqli($servername,$user,$password);

$bdd->select_db($dbname);

$sql = "SELECT * FROM `eleves` WHERE 1";
$resultat1 = $bdd->query($sql);
$resultat2 = $bdd->query($sql);
$resultat3 = $bdd->query($sql);
$resultat4 = $bdd->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="base.css">
    <title>Liste des élèves</title>
</head>
<body>

<div class="row afficher">
    <div class="col-md-3" id="id"><h4>ID</h4>
        <?php while ($row = $resultat1->fetch_assoc()) {
            echo "<div class=\"col-sm-12\">".$row['id']."</div>";
        } ?>
    </div>

    <div class="col-md-3" id="nom"><h4>NOM</h4>
        <?php while ($row = $resultat2->fetch_assoc()) {
            echo "<div class=\"col-sm-12\">".$row['nom']."</div>";
        } ?>
    </div>
    <div class="col-md-3" id="prenom"><h4>PRÉNOM</h4>
        <?php while ($row = $resultat3->fetch_assoc()) {
            echo "<div class=\"col-sm-12\">".$row['prenom']."</div>";
        } ?>
    </div>
    <div class="col-md-3" id="age"><h4>AGE</h4>
        <?php while ($row = $resultat4->fetch_assoc()) {
            echo "<div class=\"col-sm-12\">".$row['age']."</div>";
        } ?>
    </div>
</div>

<div id="lien">
    <a href="ajout_eleves.php">Ajouter un élève</a>
</div>

<!-- Optional -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Script JS -->
</body>
</html>







$majEleves = function ($idEleve, $nom, $prenom, $age) use ($servername, $user, $password, $dbname, $bdd) {
    $sql = "UPDATE `eleves` SET `nom` = $nom, `prenom` = $prenom, `age` = $age WHERE `eleves`.`id` = $idEleve";
    $bdd->query($sql);
};

$supprimerEleve = function ($idEleve) use ($servername, $user, $password, $dbname, $bdd) {
    $sql = "DELETE FROM `eleves` WHERE `eleves`.`id` = $idEleve";
    $bdd->query($sql);
};

