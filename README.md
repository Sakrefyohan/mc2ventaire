# mc2ventaire- Yohan Sakref
Application d'inventaire MC2A
------------------------------

Ce répository contien tout les fichiers sources conernant l'application de stock pour MC2A


## But du projet
------------------------------
Afin de référencer toutes les entrées et sorties de materiel, il faut développer une application rapide et claire avec un interface rapide pour tout controler. 


Features ajoutées:

    - Création de materiel dans la BDD
    - Suppression de materiel dans la BDD
    - Consultation de la BDD avec filtre et trie.

## L'application :
==================

Adresse GitHub du programme :
-----------------------------
    https://github.com/Sakrefyohan/mc2ventaire.git

Installation :
------------
* Telecharger les fichiers dans le dossier du serveur Web voulu. 
* modifier le fichiers "traitement/connexion_bdd" avec vos information de base de données
* Créer la base de données selon ce modèle avec ces nom de tables et champs de table : 
    

    categorie : 
    - id
    - type
    
    materiel:
    - id	
    - modele	
    - categorie
    - etat
    - date_entree	
    - numero_contrat
    
    modele: 
    - id
    - modele

Fonctionnement :
-----------
* La page d'accueil permet l'ajout et la suppression de materiel   
* Le bouton consultation redirige vers la page d'affichage du stock
* Dans la consultation il ne faut pas cocher "La catégorie ainsi que le modèle pour un trie"

Technique :
-----------
* Dossier __"Consultation"__ concerne la page de consultation de la BDD et tourne sur elle même, elle est générer via le formulaire __"section/form-consult-materiel.php"__
* Dossier __"CSS"__ concerne l'affichage de la page
* Dossier __"Formulaire"__ concerne l'affichage des formulaire de la page index (ajout et sortie de materiel)
* Chaque formulaire est coupler au champs dans le dossier __"SECTION"__
* Le fichier __"Section/form-categorie"__ & __"Section/form-model"__ sont remplis par les modèle et catégorie dans la BDD, il faut donc ajouter les modèle et catégorie a la BDD
    * J'utilise des fichiers CSV des modèles placer dans le dossier CSV, une fois la catégorie ou le modèle ajouter au bon endroit, je __Truncate__ la table _modèle_ ou _catégorie_ pour ensuite réimporter complètement la table avec les nouveaux champs et ainsi garder l'ordre des champs.  



Details :
-----------
L'application est totalement autonome et ne nécéssite aucune connexion internet si le serveur BDD et apache est sur la même machine. 


License :
============
Yohan SAKREF
