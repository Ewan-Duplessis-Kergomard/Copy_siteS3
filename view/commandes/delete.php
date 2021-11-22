<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<form method="get" action="index.php">
    <fieldset>
        <legend>Suppression de commande :</legend>
        <p>
            <input type='hidden' name='action' value='deleted'>
            <label for="id_comm">Identifiant de commande</label>:
            <input type="number" placeholder="152556" name="Id Commande" id="id_comm" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
</html>
