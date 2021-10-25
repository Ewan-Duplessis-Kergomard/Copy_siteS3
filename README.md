Détails de la base de données:
1. Clients
- mail (primary key) VARCHAR64
- mdp VARCHAR64 
- nom VARCHAR64
- prenom VARCHAR32
- ville VARCHAR64
- code_poste INT
- rue VARCHAR64
2. Produits
- id_prod (primary key) INT
- nom_prod VARCHAR32
- stock INT
- prix DOUBLE
- decription VARCHAR256
3. Commandes
- id_comm (primary key) INT
- id_prod (primary key) (foreign key) INT
- mail_client (foreign key) VARCHAR
- quantité INT