up:
	@sed 's/APP_URL/$(shell cat .env | grep APP_URL | sed 's/APP_URL=//g')/g' docker/docker-compose.yml.example | \
		sed 's/DB_HOST/$(shell cat .env | grep DB_HOST | sed 's/DB_HOST=//g')/g' | \
		sed 's/DB_PASSWORD/$(shell cat .env | grep DB_PASSWORD| sed 's/DB_PASSWORD=//g')/g' > docker/docker-compose.yml
	@sed 's/APP_URL/$(shell cat .env | grep APP_URL | sed 's/APP_URL=//g')/g' docker/default.conf.example > docker/default.conf
	docker-compose -f docker/docker-compose.yml up -d
down:
	docker stop $(shell docker ps -a -q)
stop:
	rm -rf docker/mysql
	docker rm $(shell docker ps -a -q)
.IGNORE: install
install:
	docker exec -it $(shell cat .env | grep DB_HOST | sed 's/DB_HOST=//g') /usr/bin/mysql -uroot -p$(shell cat .env | grep DB_PASSWORD| sed 's/DB_PASSWORD=//g') -e "create database $(shell cat .env | grep DB_DATABASE | sed 's/DB_DATABASE=//g')"
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/bin/composer config -g repo.packagist composer https://packagist.phpcomposer.com
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/bin/composer install
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/local/bin/php artisan key:generate
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/local/bin/php artisan config:clear
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/local/bin/php artisan migrate
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/bin/composer dump-autoload
	docker exec -it $(shell cat .env | grep APP_URL | sed 's/APP_URL=//g') /usr/local/bin/php artisan db:seed
