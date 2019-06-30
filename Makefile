CWD := $(abspath $(patsubst %/,%,$(dir $(abspath $(lastword $(MAKEFILE_LIST))))))

composer-install:
	docker-compose exec app composer install

chown:
	sudo chown -R $(USER): $(CWD)

key-generate:
	docker-compose exec app php artisan key:generate

config-cache:
	docker-compose exec app php artisan config:cache

config-clear:
	docker-compose exec app php artisan config:clear

tests:
	docker-compose exec app vendor/bin/phpunit


