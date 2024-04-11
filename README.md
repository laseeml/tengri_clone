## О проекте
Клон новостного портала [Tengrinews.kz](https://tengrinews.kz)

## Функциальность приложения
- Просмотр списка новостей: Пользователи могут просматривать список новостей, а также получать детальную информацию о каждой из них.

![IMG_1071](https://github.com/laseeml/tengri_clone/assets/102917982/5c19e078-9e04-44a9-971a-b04c077956dc)
![IMG_1072](https://github.com/laseeml/tengri_clone/assets/102917982/5ae512ff-caa1-4f37-b352-08ae98fd2b1d)
- Пагинация: Для удобной навигации по новостям реализована пагинация, позволяющая переходить между страницами.

![IMG_1073](https://github.com/laseeml/tengri_clone/assets/102917982/e0acadef-4b02-494f-bf83-bfe558d1efef)
- Фильтрация по категориям: Предусмотрена возможность фильтрации новостей по двум основным категориям: life и edu

![IMG_1074](https://github.com/laseeml/tengri_clone/assets/102917982/f7a1bf7c-b189-444b-9ec7-f44cde01f632)
- Поиск по заголовку: Пользователи могут находить конкретные новости, вводя ключевое слово в строку поиска.
  
![IMG_1075](https://github.com/laseeml/tengri_clone/assets/102917982/0c1026fd-0533-4136-a4c1-30b59e182cd0)

- Отображение последних новостей: На главной странице первыми отображаются самые последние новости. Новости загружаются через административную панель, при этом последняя загруженная новость отображается в самом верху списка.

- Загрузка новостей через админ-панель: Администраторы имеют возможность загружать новости через специализированную административную панель. (Указав заголовок новости, детальную информацию и загрузив фотографию для поста)
  
![IMG_1069](https://github.com/laseeml/tengri_clone/assets/102917982/e746e71b-fb84-40b7-81e7-299c2b544aac)
- Клонирование новостей с Tengrinews.kz: Реализована функция клонирования новостей с сайта Tengrinews.kz в реальном времени, обеспечивая непрерывное поступление актуальных новостей каждый час.

## Требования проекта
- PHP 8.2, Laravel 10, Vue JS 3
- Python 3.11.9
- MySQL 
- Composer
- NPM, Node JS

## Инициализация проекта (Локально)
- В терминале перейти в проект
- composer install
- npm install
- pip3 install request
- pip3 install beautifulsoup4
- pip3 install mysql-connector-python

- В корневой папке с проектом создать файл .env и скопировать туда файл .env.example
В файле .env

DB_CONNECTION=

DB_HOST=

DB_PORT=

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

Заполнить эти поля в соответсвии с вашей базой данных

- php artisan migrate
- php artisan db:seed
- php artisan key:generate
- php artisan passport:install 
- php artisan storage:link
- php artisan news:import  # to import news from [Tengrinews.kz]
- php artisan optimize:clear
- php artisan optimize
- php artisan serve
- php artisan npm run serve

## Для Админа
Для загрузки новостей нужна роль адмиистратора.
- Login: admin@gmail.com <br/>
- Password: 12345

## Недостатки
- Не смогла найти бесплатные хостинги, чтобы поддерживали и бэк и фронт, выдало ошибку когда пыталась задеплоить их по отдельности, поэтому не удалось захостить сайт.
- Можно было бы добавить побольше категорий.
