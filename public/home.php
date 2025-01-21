<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Héros</title>
    <link rel="stylesheet" href="../public/components/css/home.css">
    <script src="../public/components/javascript/home.js"></script>
</head>

<body>

    <header>
        <div id="Logo" class="Logo">
            <img src="./assets/images/Suikoden_II_Logo.svg.png" alt="Logo avec marqué SUikoden II">
        </div>
    </header>

    <main>
        <!-- Formulaire pour entrez son pseudo -->
        <form action="../process/login_process.php" method="post" class="form-container">
            <label for="pseudo_choice">Entrez votre pseudo :</label>
            <input type="text" id="pseudo_choice" name="pseudo" required>
            <br>
            <input type="submit" value="Valider">
        </form>

    </main>
</body>

</html>