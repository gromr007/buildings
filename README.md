<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Pet-проект Api Конструктора Зданий\Квартир

##Требования к системе:

- установлен laravel 12
- php 8.2
- MariaDB 10.3+ или MySQL 5.7+.

##Работы по задаче:

1) организовать CRUD Houses
2) организовать CRUD Rooms
3) сделать swagger документацию ("/api/documentation")

###Используемые инструменты:

- Библиотека "spatie/laravel-data"
- Библиотека "darkaonline/l5-swagger"
- Laravel dependency injection
    - app/Http/Controllers/
- Repository
    - app/Repositories/
- Response Json
    - app/Http/Resources/
- Validate request
    - app/Http/Requests
- Seeders
    - database/seeders/


### Поля сущностей:

-----------------
Дома:
- адрес
- этажность
- встроен гараж
- цвет крыши
- материал стен
- подключенные услуги

-----------------
Комнаты:
- название
- кол-во электро точек
- натяжной потолок
- пол
- мебель

-----------------
#### Словари:

------------------
Материал стен:
- кирпич
- газоблок
- дерево
- плиты

------------------
Подключенные услуги:
- газ
- вода
- канализация
- электричество
- интернет
- вывоз мусора

------------------
Покрытие пола:
- ламинат
- плитка
- линолеум
- паркет

------------------
Мебель:
- стул
- стол
- диван
- шкаф

