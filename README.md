## Доступ к MySQL

Хост: `89.35.119.143`  
Порт: `3306`  
База данных: `laravel_api`  
Пользователь: `readonly_user`  
Пароль: `1234`


## Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/tsoyvit/test-api.git
cd test-api
```
2. Выполните установку зависимостей и настройку проекта:
```bash
make setup
```
3. Отредактируйте файл .env
```bash
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

API_BASE_URL=  Хост API
API_KEY=       Ключ API
```
4. Выполните миграции:
```bash
php artisan migrate
```
5. Запустите синхронизацию данных с внешнего API:
```bash
make sync
```
Команда `make sync` выполняет следующие действия:

- Полностью сбрасывает и пересоздаёт все таблицы в базе данных (`php artisan migrate:fresh`).
- Подгружает и сохраняет данные по четырём сущностям: доходы, заказы, продажи, склады.
- Каждая сущность проходит через валидацию и сохраняется в соответствующую таблицу в базе данных.

> Важно: сброс таблиц нужен, так как данные из API не содержат уникального идентификатора, который позволял бы обновлять записи без дублирования.

## Архитектура и структура

Проект построен с разделением на слои: Services, Repositories, Validators, Models. Такой подход облегчает поддержку и расширение кода.
Каждая сущность (доходы, заказы, продажи, склады) имеет собственные Validator, Repository и Service, что соблюдает принцип единственной ответственности.
