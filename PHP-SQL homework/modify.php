<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier utilisateur</title>
</head>
<body>
<style>
        body {
            font-family: Arial;
            background-color: #f0f2f5;
            padding: 40px;
            text-align: center;
        }
        form {
            display: inline-block;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2ecc71;
        }
    </style>    

<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=exercicephp", "root", "Aa123890");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"], $_POST["nom"], $_POST["email"])) {
    $id = $_POST["id"];
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);

    $stmt = $conn->prepare("UPDATE users SET nom = ?, email = ? WHERE userid = ?");
    $stmt->execute([$nom, $email, $id]);

    echo "<p style='color:green;'>Utilisateur mis à jour avec succès.</p>";
    echo '<a href="cible.php">← Retour</a>';
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if ($user) {
        ?>
        <h2>Modifier l'utilisateur</h2>
        <form method="POST" action="modify.php">
            <input type="hidden" name="id" value="<?php echo $user['userid']; ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

            <button type="submit">Enregistrer</button>
        </form>
        <?php
    } else {
        echo "<p style='color:red;'>Utilisateur introuvable.</p>";
    }
} else {
    echo "<p style='color:red;'>Accès invalide.</p>";
}
?>

</body>
</html>
