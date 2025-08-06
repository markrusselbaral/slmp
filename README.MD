FOLLOW THESE STEPS

1. git clone https://github.com/markrusselbaral/slmp.git
2. cd slmp
3. docker-compose build
4. docker-compose up -d
5. docker exec -it laravel-backend bash
6. cp .env.example .env
7. composer install
8. php artisan key:generate
9. php artisan migrate
10. php artisan db:seed


🔐 API User Credentials
You can use the following credentials to authenticate API requests:

Email: testemail@gmail.com

Password: password123

📬 Postman Collection

Import the provided Postman collection located in the project root: SLMP.postman_collection.json