## news
В приложении для удобства используется докер для локального развертывания

Для запуска выполнить:
```
sudo docker-compose up -d
```
Установка зависимостей
```
sudo docker exec news-php-fpm composer install
```
Для работы с контейнером потребуются права на запись некоторых директорий
```
chmod 777 -R application/runtime/
```
Выполнение миграций
```
sudo docker exec news-php-fpm php yii migrate --interactive=0
```
Запуск парсера новостей
```
sudo docker exec news-php-fpm php yii parse-news
```

Приложение запускается на localhost:8080

## Описание решения
### Парсер
Для выполнения парсинга через консольную команду используется инструмент yii для консольных приложений yii\console\Controller

Контроллер для команды application/commands/ParseNewsController.php

Выполняется в контейнере news-php-fpm через
```
php yii parse-news
```

Для некоторой стандартизации введен интерфейс application/lib/Parsing/ParsedNews.php

Для парсинга других новостных источников нужно на примере LifeParsedNews реализовать интерфейс ParsedNews и добавить парсер в actionIndex в application/commands/ParseNewsController.php

### БД
Новости записываются в postgesql в базу news таблицу news

Для удобства их можно посмотреть через adminer на localhost:8085

Сервер pgsql, имя news, пароль news123

### Rest методы
Для реализации методов GET /news, GET /news/{id}, DELETE /news/{id} был использован ActiveController

Переопределен был только метод indexAction для GET параметров limit и offset

Правила для маршрутизации заданы в компоненте urlManager в application/config/web.php
