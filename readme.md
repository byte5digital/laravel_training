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
- npm install

## Docker / Docker-Compose

- Dockerfile
    - grundlegende Debugfunktionen für "xDebug" sind bereits installiert
- Docker-Compose.yaml
    - Datenbank mit Standardeinstellungen wird geladen (mySql)
    - Apache Webhost mit PHP 7.1 für die Ausführung

## .env File

- Primärer Datenbankzugriff 
- sekundärer Datenbankzugriff
    - Anbindung in config/database.php

## API Gestaltung

- Laravel Resources zur Steuerung der JSON Ausgabe / (app/Http/Resources)
- Transformation der Entitäten

## Repository Pattern (app/Http/Repositories/)

- Abstraktion des Datenzugriffs
    - Erstellung Interface (xxxInterface)  
    - Anbindung an Eloquent (xxxDatabase) 
    - Anbindung an Rest Schnittstelle mit Guzzle (xxxRestFul)
- "Anmeldung" der Implementierung
    - app/Http/Providers/AppServiceProvider.php
    ```php
     public function register()
        {
            $this->app->bind(ProjectRepositoryInterface::class, ProjectRepositoryDatabase::class);
            $this->app->bind(TaskRepositoryInterface::class, TaskRepositoryDatabase::class);
            $this->app->bind(SubTaskRepositoryInterface::class, SubTaskRepositoryDatabase::class);
        }
    ```

## Authentication

- php artisan make:auth

## Eloquent

- Relations
    - hasMany / belongsTo
    - hasOne / belongsTo

## Packages

#### VueJs

- Implementierung in App.js

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