# SLMP Laravel App

This Laravel application fetches and stores data from [JSONPlaceholder](https://jsonplaceholder.typicode.com/) and exposes a RESTful API secured with Basic Authentication.

---

## 🚀 Getting Started

### 🛠️ Installation

Follow these steps to set up the project locally:

```bash
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



🔐 API Authentication
Use the following credentials to access protected API routes (Basic Auth):

Email: testemail@gmail.com

Password: password123

📬 Postman Collection
To test the API, import the Postman collection file included in the project root:

SLMP.postman_collection.json




📥 Fetching External Data
Run the following Artisan commands to fetch and store data from JSONPlaceholder:

php artisan fetch:users
php artisan fetch:todos
php artisan fetch:albums
php artisan fetch:photos
php artisan fetch:posts
php artisan fetch:comments


🔗 API Endpoints
You can test the following REST API endpoints:


| Endpoint        | Method | Description             |
| --------------- | ------ | ----------------------- |
| `/api/register` | POST   | Register a new user     |
| `/api/login`    | POST   | Login and receive token |
| `/api/users`    | GET    | Get all users           |
| `/api/todos`    | GET    | Get all todos           |
| `/api/albums`   | GET    | Get all albums          |
| `/api/photos`   | GET    | Get all photos          |
| `/api/posts`    | GET    | Get all posts           |
| `/api/comments` | GET    | Get all comments        |

Base URL: http://localhost:8000