# Tantara

[![Build Status](https://travis-ci.org/SylvanoTombo/tantara.svg?branch=master)](https://travis-ci.org/SylvanoTombo/tantara)

Tantara une platforme de publication d'histoire pour les passionnés. 
Lire à tout moment et en tout lieu une sélection inégalée des histoires ecrits pas les passionnés.

Voir le [demo](https://tantara.herokuapp.com/).

## Installation

### Prérequis
Pour exécuter ce projet: 
*  vous devez avoir installé PHP 7.
* vous devez avoir installé Composer.

### Etape 1

Commencez par cloner ce repos sur votre machine et installer toutes les dépendances Composer.


```bash
git clone git@github.com:SylvanoTombo/tantara.git
cd tantara && composer install
```
Lancer la migration de la base de données
```bash
php artisan migrate
```
#### ou 
Si vous voulez remplir la base de données avec des fausses données, vous devez utiliser le drapeau `--seed`

```bash
php artisan migrate --seed
```
### Etape 2
Pour server l'application vous pouver utiliser wampserver et créer une host ou utiliser le server avec le built-in server de PHP.

```bash
php artisan serve
```

