# Laravel Training

## Grundlegende Installation

- Composer installieren
    - Am einfachsten geht dies über chocolatery (https://chocolatey.org/)
    - choco install composer
- Laravel installer in den Composer Cache laden
    - composer global require laravel/installer
- Laravel installieren
    - laravel new blog
    
## Git Clone 

- git clone https://github.com/byte5digital/laravel_training.git
- cd laravel_training
- composer install

## Docker / Docker-Compose

- Dockerfile
    - grundlegende Debugfunktionen für "xDebug" sind bereits installiert
- Docker-Compose.yaml
    - Datenbank mit Standardeinstellungen wird geladen (mySql)
    - Apache Webhost mit PHP 7.1 für die Ausführung

## .env File

## Authentication

- php artisan make:auth


## Packages

#### IDE Helper

- DBAL Package installieren
    - composer require --dev doctrine/dbal
- IDE-Helper installieren
    - composer require --dev barryvdh/laravel-ide-helper
- Config Datei publishen
    - php artisan vendor:publish
    - Datei /config/ide-helper.php ändern
        - Zeile 28 "'include_fluent' => true,"
- IDE Helper Filer erstellen / Models aktualisieren
    - php artisan ide-helper:generate
    - php artisan ide-helper:models