В ветке main лежат скрипты, формы, бд(front)
К сожалению не получилось сделать реализацию через api обновление данных гостя и удаление гостя, сам функционал есть но он работает через скрипты (pdo)
С api работает только создание гостя и вывод и то вывод заглушен т.к коректно у себя локально не смог наладить
Валидацию форм тоже выполнил не совсем удачно можно было и лучше, сделал через паттерны html
Подключение и манипуляции с данными из бд сделал через pdo
Ответ с api приходит в json
Для работы с базой использовал phpMyadmin,
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12

||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

В ветке branch лежит api(backend)

API все CRUD команды описанны, работают, проверял через RESTer

Для подключения апи потребуется 
1. выкачать ветку branch
2. поместить как отдельную папку api
3. выкачать ветку main
4. выкачать guest.sql подключить бд guest.sql
5. подключить бд guest
6. Поместить папку api в директорию с папками из ветки main
7. Обратите внимание на поле в файле main.js в папке js let res = await fetch('http://localhost/Backend/index/posts'), в переменную res нужно будет вставить ссылку на апи, иначе не будет работать создание новой записи
8. запустить скрипт index.php в папке web (из ветки main)
