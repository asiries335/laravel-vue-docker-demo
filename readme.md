**Demo project**

Steps:
1. docker-composer up -d
2. docker exec -it app composer install
3. docker exec -it app cp .env.example .env
4. docker exec -it app php artisan migrate
5. docker exec -it app npm install

use local url: http://0.0.0.0:8080/
