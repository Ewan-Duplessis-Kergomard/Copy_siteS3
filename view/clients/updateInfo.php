<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title></title>
</head>
<body>
	<form method="post" action="index.php">
	  	<fieldset>
    		<legend>Mon formulaire :</legend>
    		<p>
    			<input type='hidden' name='action' value='updated'>
      			<label for="mail">Email: </label> :
      			<?php
                if (isset($c)) {
                    echo '<input type="email" value="'.htmlspecialchars($c->getMail()).'" name="mail" id="mail" readonly="readonly" required/>
                          <label for="nom">Nom: </label> :
                          <input type="text" value="'.htmlspecialchars($c->getNom()).'" name="nom" id="nom" required/>
                          <label for="prenom">Prenom: </label> :
                          <input type="text" value="'.htmlspecialchars($c->getPrenom()).'" name="prenom" id="prenom" required/>
                          <label for="rue">Adresse: </label> :
                          <input type="text" value="'.htmlspecialchars($c->getRue()).'" name="rue" id="rue" required/>
                          <label for="code"></label> :
                          <input type="number" value="'.htmlspecialchars($c->getCodePoste()).'" name="code" id="code" required/>
                          <label for="ville"></label> :
                          <input type="text" value="'.htmlspecialchars($c->getVille()).'" name="ville" id="ville" required/>';
                }
?>
      			
    		</p>
    		<p>
      			<input type="submit" value="Envoyer" />
    		</p>
  		</fieldset> 
	</form>
</body>
</html>
