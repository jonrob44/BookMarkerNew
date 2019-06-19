CWD := $(abspath $(patsubst %/,%,$(dir $(abspath $(lastword $(MAKEFILE_LIST))))))

composer-install:
	docker run --rm -v $(CWD)/code:/app composer install

chown:
	sudo chown -R $(USER): $(CWD)

key-generate:
	docker-compose exec app php artisan key:generate

config-cache:
	docker-compose exec app php artisan config:cache
