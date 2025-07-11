start:
	php artisan serve
lint:
	vendor/bin/phpcs
fix:
	vendor/bin/phpcbf
dump:
	composer dump-autoload
sync:
	php artisan migrate:fresh
	php artisan sync:incomes
	php artisan sync:orders
	php artisan sync:sales
	php artisan sync:stocks
setup:
	composer install
	cp .env.example .env
	php artisan key:generate
	touch database/database.sqlite
