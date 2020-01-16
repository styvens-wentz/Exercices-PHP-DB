<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="base.css">
    <title>Mettre à jour un élèves</title>
</head>
<body>

<form action="maj_eleve.php" method="post">
    <fieldset>
        <legend>Supprimer un élève</legend>
        <label for="idmaj">Indiquer son ID: </label><br><br><input type="number" name="id" id="idmaj" required><br><br>
        <label for="nommaj">Nouveau nom: </label><br><br><input type="text" name="nom" id="nommaj" required><br><br>
        <label for="prenommaj">Nouveau Prénom: </label><br><br><input type="text" name="prenom" id="prenommaj" required><br><br>
        <label for="agemaj">Nouvelle age: </label><br><br><input type="number" name="age" id="agemaj" required><br><br>
        <input type="submit" value="Valider" id="ajouter">
        <input type="reset" value="Effacer" id="effacer">
    </fieldset>
</form>

<div id="lien">
    <a href="index.php" id="listeEleves">Allez à la liste des élèves</a>
</div>
<!-- Optional -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Script JS -->
</body>
</html>


<?php
$servername = "localhost";
$user = "id11258159_styvens";
$password = "styvens59";
$dbname = "id11258159_intro_bdd";

$bdd = new mysqli($servername, $user, $password);

$bdd->select_db($dbname);

$majEleves = function ($idEleve, $nom, $prenom, $age) use ($servername, $user, $password, $dbname, $bdd) {
    $sql = "UPDATE `eleves` SET `nom` = $nom, `prenom` = $prenom, `age` = $age WHERE `eleves`.`id` = $idEleve";
    $bdd->query($sql);
};

if (isset($_POST['id'])) {
    $majEleves($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['age']);
    echo "<script> alert(\"L'Élève ayant pour id '".$_POST['id']."' a était mis à jour\") </script>";
    echo "<script>document.location='index.php';</script>";
    exit();
}
