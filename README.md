**Détails de la base de données:**
1. p_clients
- mail *(primary key) VARCHAR64*
- mdp *VARCHAR64* 
- nom *VARCHAR64*
- prenom *VARCHAR32*
- ville *VARCHAR64*
- code_poste *INT*
- rue *VARCHAR64*
2. p_produits
- id_prod *(primary key) INT*
- nom_prod *VARCHAR32*
- stock *INT*
- prix *DOUBLE*
- decription *VARCHAR256*
3. p_commandes
- id_comm *(primary key) INT*
- id_prod *(primary key) (foreign key) INT*
- quantité INT
4. p_comm_clients
- id_comm *(primary key) (foreigne key) INT*
- mail_client *(foreign key) VARCHAR64*


**Structure de la base:**
- p_clients.mail=p_comm_clients.mail_clients 
- p_produits.id_prod=p_commandes.id_prod
