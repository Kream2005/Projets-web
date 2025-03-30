<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire rempli</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <h2>Formulaire rempli avec les données</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "";
        $prenom = isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "";
        $age = isset($_POST["age"]) ? htmlspecialchars($_POST["age"]) : "";
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
        $phone = isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "";
    } else {
        header("Location: index.php");
        exit();
    }
    ?>

    <form action="cible.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $nom ?>" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>" required><br><br>

        <label for="age">Date de Naissance :</label>
        <input type="date" id="age" name="age" value="<?= $age ?>" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $email ?>" required><br><br>

        <label for="phone">Numéro de téléphone :</label>
        <input type="text" id="phone" name="phone" value="<?= $phone ?>" pattern="\+212[6-7][0-9]{8}" required><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

</body>
</html>
