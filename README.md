<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Pet-проект Api Конструктора Зданий\Квартир

##Требования к системе:

- установлен laravel 12
- php 8.2
- MariaDB 10.3+ или MySQL 5.7+.

##Работы по задаче:

1) организовать CRUD Houses
2) организовать CRUD Rooms
3) сделать swagger документацию

###Используемые инструменты:

- Библиотека League csv 9.0
- Laravel dependency injection
    - app/Http/Controllers/PerseCsvController.php
    - app/Http/Controllers/HomeController.php
- Laravel service container, service provider, Contract, Service,
    - app/Providers/ParseCsvServiceProvider.php
    - app/Contracts/ParseCsv.php
    - app/Services/ParseCsv/League/League.php
- Repository
    - app/Repositories/DatacsvRepository.php
- Response Json
    - app/Http/Resources/DataCsvPaginateResource.php
- Get Data Scroll Cursor Pagination
    - app/Repositories/DatacsvRepository.php
- Inserting Large Data
    - app/Services/ParseCsv/League/League.php
- Validate request
    - app/Services/ParseCsv/ParentParseCsv.php
- Seeders
    - database/seeders/DatacsvsTableSeeder.php
- Models
    - Scope (app/Models/Datacsv.php)
- OOP
    - MVC
    - Inheritance
    - Polymorphism
    - Dependency Injection
    - Registry
    - Repository


### Структура csv файлов:


### Используемые Материалы

