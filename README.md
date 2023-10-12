### Adjust your .env
<a href="https://github.com/jose-luan19/introduction-the-laravel/blob/master/.env.example">.env </a>
# After

Commands for execute app with docker:

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

    docker exec laravel-docker bash -c "php artisan storage:link"

generate key, if need:

    docker exec laravel-docker bash -c "php artisan key:generate"
