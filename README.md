## Cadriciel – TP2 
### Forum des Étudiants du Collège Maisonneuve

- Lien github : https://github.com/vivianebenevides/forum-etudiants-maisonneuve

- Lien webdev : https://e2295412.webdev.cmaisonneuve.qc.ca/TP2-Cadriciel-Maisonneuve2295412-Webdev/ 

#### Pour tester :
Nom d’utilisateur : laura@email.com
Mot de passe : 123456

#### Commandes utilisées :

##### Création du Controller CustomAuthController :
Air-de-Viviane:Maisonneuve2295412 vivianebenevides$ php artisan make:controller CustomAuthController -m User

##### Création de la colonne user_id dans la table estudiant :
Air-de-Viviane:Maisonneuve2295412 vivianebenevides$ php artisan make:migration add_user_id_to_etudiants_table --table=etudiants

##### Création du Controller LocalizationController :
Air-de-Viviane:Maisonneuve2295412 vivianebenevides$ php artisan make:controller LocalizationController

##### Création du Model ForumPost :
Air-de-Viviane:Maisonneuve2295412 vivianebenevides$ php artisan make:model ForumPost

##### Création du Controller ForumPost :
Air-de-Viviane:Maisonneuve2295412 vivianebenevides$ php artisan make:controller ForumPostController -m ForumPost
