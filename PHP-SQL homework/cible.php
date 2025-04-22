<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button id="home"><a href="index.php">HOME</button>
</br>

<style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f4f6f8;
        }
        .user-card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        form {
            display: inline;
        }
        button {
            padding: 5px 10px;
            border: none;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #e74c3c;
            color: white;
        }
        .modify-btn {
            background-color: #f1c40f;
            color: black;
        }
        a {
            text-decoration: none;
        }
        #home {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
    <?php
        
        try {
            $conn = new PDO("mysql:host=localhost;dbname=exercicephp", "root", "Aa123890");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
            $userid = $_POST["id"]; 
            $stmt = $conn->prepare("DELETE FROM users WHERE userid = ?");
            $stmt->execute([$userid]);
            echo "<p style='color: red;'>Utilisateur avec ID $userid supprimé.</p>";
            header("Location: cible.php?deleted=$userid");
            exit();
        }

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "";
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
        
    } else {
        header("Location: index.php");
        exit();
        
    }

    echo '</br>';
    $sql="insert into users(nom,email) values ('$nom','$email')";
    $conn->exec($sql);
    
    $response = $conn->query("select * from users");
    while($data=$response->fetch()){
        echo '</br>';
        echo '</br>';
        echo "ID :".$data['userid']."</br>Nom complet :" . $data['nom'] . "</br>E-mail :" . $data['email'].'</br>' ;           
        echo '
                <form method="POST" action="cible.php" style="display:inline;">
                    <input type="hidden" name="id" value="' . $data['userid'] . '">
                    <button type="submit">Delete</button>
                </form>
                
            ';
        echo '
                <form method="POST" action="modify.php" style="display:inline;">
                    <input type="hidden" name="id" value="' . $data['userid'] . '">
                    <button type="submit">Modify</button>
                </form>
                <br><br>
            ';    
        }
    

    ?>
</body>
</html>