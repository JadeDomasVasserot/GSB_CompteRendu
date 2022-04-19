Composer install
Yarn install
Npm install

Lance le vue JS 
yarn encore dev-server --hot 

Lance le symfony
symfony serve:start

BDD à entité 
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
Génerer getters/setters 
php bin/console make:entity --regenerate App