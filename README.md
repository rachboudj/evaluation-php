# Évaluation de php

Important : ne pas oublier d'enlever le mot de passe 'root' si le projet et regardé sur un windows.

## Les accès

L'email et mot de passe pour se connecter aux différents accès : 

- utilisateur inscrit = mail : user@gmail.com ; mdp : user
- modérateur = mail : modo@gmail.com ; mdp : modo
- rédacteur = mail : redac@gmail.com ; mdp : redac
- administrateur = mail : admin@gmail.com ; mdp : admin

## Comment déployer le projet ?

La solution choisi est Heroku. Nous partirons du principe que le repositorie du projet a déjà été créé.

Dans un premier temps, il faut se créer un compte sur https://signup.heroku.com/, et se connecter à celui-ci. 

Une fois connecter, il faut aller sur l'onglet 'new' et 'Create new app'. Ensuite, il faudra donner un nom au projet, choisir la région (ici Europe) et cliquer sur 'Create app'.

Après avoir créer le projet, il faut se connecter à son compte Github et une fois celui-ci connecter, choisir le repositorie du projet que l'on veut déployer (ici, evaluation-php) en cliquant sur 'search'. 

Une fois le projet GitHub connecter, il faut choisir la branche que l'on veut déployer (ici, ce sera la branch 'main'), cliquer sur 'Enable Automatic Deploys' (pour que Heroku mette à jour automatiquement les changements effectués sur la branche main), et 'Deploy Branch' pour déployer le projet. 

Voilà, le projet a été déployer !