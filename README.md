Comandos para execução do app com docker:

setup:

    @make build
	@make up
	@make data

build:

	docker-compose build --no-cache --force-rm
stop:

	docker-compose stop
up:

	docker-compose up -d
data:

	docker exec laravel-docker bash -c "php artisan migrate"
	docker exec laravel-docker bash -c "php artisan db:seed"
link storage, need for link images in storage:

    php artisan storage:link

generate key, if need:

    php artisan key:generate
