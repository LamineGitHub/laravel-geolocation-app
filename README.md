<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Oracle Project (laravel-geolocation-app)

Ce projet constitue un petit challenge lancé par notre professeur d'Oracle afin de mettre à l'épreuve nos 
compétences en Laravel,  
en particulier dans la gestion des `zones`, `régions`, `terrains` et `promoteurs`.

## Outils Utilisés

1. Framework : **`Laravel 10`**
2. Moteur de templating : **`Blade`**
3. Système d'authentification : **`Breeze`**
4. Framework CSS : **`Tailwind CSS`**

## Prérequis

Avant de commencer à travailler sur ce projet, assurez-vous d'avoir installé les éléments suivants :

- [Composer](https://getcomposer.org/) : Pour gérer les dépendances PHP.
- [Node.js](https://nodejs.org/) : Nécessaire pour l'utilisation de npm.
- [npm](https://www.npmjs.com/) : Gestionnaire de packages pour JavaScript.

## Installation

Suivez ces étapes pour installer et démarrer le projet localement :

1. Clonez ce dépôt sur votre machine locale :

    ```bash
    git clone https://github.com/LamineGitHub/laravel-geolocation-app.git
    ```

2. Accédez au répertoire fraîchement cloné :

    ```bash
    cd laravel-geolocation-app
    ```

3. Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```

4. Copiez le fichier `.env.example` et renommez-le en `.env` :

    ```bash
    cp .env.example .env
    ```

5. Générez la clé d'application Laravel :

    ```bash
    php artisan key:generate
    ```

6. Configurez votre base de données dans le fichier `.env`.

7. Exécutez les migrations pour créer les tables de base de données :

    ```bash
    php artisan migrate
    ```

8. Compilez les assets CSS et JavaScript :

    ```bash
    npm install && npm run dev
    ```

## Utilisation

Une fois le projet installé, vous pouvez le démarrer en local en exécutant la commande suivante :

```bash
php artisan serve
```

Cela démarrera un serveur de développement local à l'adresse http://localhost:8000. Vous pouvez alors accéder au projet dans votre navigateur.

## Contribution
Les contributions sont les bienvenues ! Avant de soumettre une pull request, veuillez vous assurer de suivre ces étapes :

1. Créez une branche pour votre fonctionnalité ou correctif :
    ```bash
    git checkout -b nom-de-votre-branche
    ```

2. Effectuez vos modifications et ajoutez-les à l'index :
    ```bash
    git add .
    ```

3. Faites un commit de vos modifications avec un message clair :
    ```bash
    git commit -m "Votre message de commit ici"
    ```

4. Poussez vos modifications vers votre branche :
    ```bash
    git push origin nom-de-votre-branche
    ```
   
5. Ouvrez une pull request sur la branche principale du projet.

## Licence

Ce projet est sous licence MIT. Pour plus d'informations, veuillez consulter le fichier [LICENSE](LICENSE).
