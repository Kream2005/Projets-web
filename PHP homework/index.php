<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <h2>Formulaire d'inscription</h2>
    <form action="cible.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="age">Date de Naissance :</label>
        <input type="date" id="age" name="age" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Numéro de téléphone :</label>
        <input type="text" id="phone" name="phone" pattern="\+212[6-7][0-9]{8}" placeholder="doit commencer par +212" required><br><br>

        <button type="submit">Envoyer</button>
    </form>

</body>
</html>
