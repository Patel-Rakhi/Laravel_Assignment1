# Assignment_Laravel
Laravel API Assignment - Auth and Movie Detail API with JWT Authentication

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Patel-Rakhi/Assignment_Laravel1.git
    ```

2. Navigate to the project directory:
    ```bash
    cd Assignment_Laravel1
    ```
    
3. Install the required dependencies using Composer:
   ```bash
   composer install
    ```
   
4. Set up your environment variables by copying the `.env.example` file:   
   Run the following command in your project root directory:  
      ```bash
       cp .env.example .env
    ```
    If you are on Windows (PowerShell), use:
    ```bash
    copy .env.example .env
    ```
5. Generate a new application key:
    ```bash
    php artisan key:generate
    ```
6. Create a database and Configure your database connection in the `.env` file.
   For Example DB_DATABASE=newproject
8. Run the migrations:
    ```bash
    php artisan migrate
    ```
9. Generate a JWT secret key:

   ```bash
   php artisan jwt:secret
    ```
10. Run the seeder for adding temp data in the Movie table
    ```bash
    php artisan db:seed --class=MovieSeeder
    ``` 
## Endpoints

| Method   |      Endpoint      |  Description                             |
|----------|--------------------|------------------------------------------|
| POST     | /api/login         | User login and token generation          |
| GET      | /api/movie/{id}    | Get Retrieves movie details by id.       |
| POST     | /api/register	    | Registers a new user                     |

