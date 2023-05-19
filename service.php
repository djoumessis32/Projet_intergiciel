<?php
?>
<!DOCTYPE html>
<html>
    <meta>
    <head>
        <title>Mon Service</title>
        <link rel="stylesheet" type="text/css" href="tp.css">
    </head>
    <body>
        <div class="form">
            <h3 style="text-align: center;">Entrez l'Information</h3>
            <form name="tp" method="post" action="producer.php">
                <label for="message">Messages: </label>
                <input type="text" name="message" id="message" placeholder="Votre message" required><br>
                <label for="topic">Topic: </label>
                <input type="text" name="topic" id="topic" placeholder="Votre topic" required><br>
                <input type="submit" id="submit" value="Valider">
                <input type="reset" id="reset" value="Effacer">
            </form>
        </div>
    </body>
</html>