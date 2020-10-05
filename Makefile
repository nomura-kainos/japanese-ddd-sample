up:
	docker-compose up -d
build:
	docker-compose build
create-project:
	cp .env-example .env
	docker-compose up -d --build
	docker-compose exec app composer create-project --prefer-dist laravel/laravel .
	docker-compose exec app composer require predis/predis
install:
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan migrate:fresh --seed
reinstall:
	@make destroy
	@make install
stop:
	docker-compose stop
restart:
	docker-compose restart
down:
	docker-compose down
destroy:
	docker-compose down --rmi all --volumes
ps:
	docker-compose ps
auto:
	docker-compose exec app composer dump-autoload
fresh:
	docker-compose exec app php artisan migrate:fresh
seed:
	docker-compose exec app php artisan db:seed
tinker:
	docker-compose exec app php artisan tinker
dump:
	docker-compose exec app php artisan dump-server
test:
	docker-compose exec app php ./vendor/bin/phpunit
# make test-group group=***
test-group:
	docker-compose exec app php ./vendor/bin/phpunit --group=${group}
metrics:
    docker-compose exec app php ./vendor/bin/phpmetrics --report-html=myreport ./packages
cache:
	docker-compose exec app composer dump-autoload -o
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan optimize
cache-clear:
	docker-compose exec app php artisan optimize:clear
cs:
	docker-compose exec app ./vendor/bin/phpcs ./packages ./tests/packages --standard=./phpcs.xml
cbf:
	docker-compose exec app ./vendor/bin/phpcbf ./packages ./tests/packages --standard=./phpcs.xml
db:
	docker-compose exec db bash
mysql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'