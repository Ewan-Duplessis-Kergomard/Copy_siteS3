<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title></title>
</head>
<body>
	<form method="get" action="index.php">
	  	<fieldset>
    		<legend>Mon formulaire :</legend>
    		<p>
    			<input type='hidden' name='action' value='updated'>
      			<label for="mail">Changement de quantité: </label> :
      			<?php 
					echo '<input type="number" value="'.htmlspecialchars($c->getIdComm()).'" name="Identifiant de commande" id="id_comm" readonly="readonly" required/>
      					<label for="id_comm">Identifiant de commande: </label> :
      					<input type="number" value="'.htmlspecialchars($c->getIdProd()).'" name="Identifiant de produit" id="id_prod" readonly="readonly" required/>
      					<label for="id_prod">Identifiant de produit: </label> :
      					<input type="number" value="'.htmlspecialchars($c->getQuantite()).'" name="Quantité" id="quantite" required/>
                	<label for="quantite">Quantité: </label> :'
?>
      			
    		</p>
    		<p>
      			<input type="submit" value="Envoyer" />
    		</p>
  		</fieldset> 
	</form>
</body>
</html>
