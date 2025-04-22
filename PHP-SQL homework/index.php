<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 40px;
            text-align: center;
        }
        form {
            display: inline-block;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
    <h2>Formulaire d'inscription</h2>
    <form action="cible.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom complet:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>


        <button type="submit">Envoyer</button>
    </form>

</body>
</html>
