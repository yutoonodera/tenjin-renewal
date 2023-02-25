up:
	if ! [ -f src/.env ];then cp src/.env.example src/.env;fi
	docker-compose up web app db mail
down:
	docker-compose down
destroy:
	docker-compose down --rmi all --volumes
start:
	# php artisan config:cache
	# php artisan migrate
	# php artisan key:generate
tinker:
    # 初期データ挿入
    php artisan db:seed --class MainsTableSeeder
	php artisan db:seed --class UsersTableSeeder