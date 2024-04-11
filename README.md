## О проекте

Этот проект является клоном новостного портала [Tengrinews.kz](https://tengrinews.kz)

**Функциальность приложения**
- Смотреть новости
- Создовать новости
- Клонировать новости из [Tengrinews.kz](https://tengrinews.kz) в реальном времени

## Требования проекта
- PHP 8.2, Laravel 10, Vue JS 3
- Python 3.11.9
- MySQL 
- Composer
- NPM, Node JS

## Инициализация проекта (Локально)

- composer install
- npm install
- pip3 install request
- pip3 install beautifulsoup4
- pip3 install pip install mysql-connector-python
- php artisan migrate
- php artisan db:seed
- php artisan key:generate
- php artisan passport:install --force
- php artisan storage:link
- php artisan news:import  # for import news from [Tengrinews.kz](https://tengrinews.kz)
- php artisan optimize:clear
- php artisan optimize

### Для Админа
Для загрузки новостей нужна роль адмиистратора. Проект автоматически создает Админа <br/>
- Login: admin@gmail.com <br/>
- Password: 12345
