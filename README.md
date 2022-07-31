## Installation of Test Project

1. Clone this test project by download the Zip of the code. Then, extract it on your computer.
2. Go to the folder application using cd command on your cmd or terminal
3. Run composer install on your cmd or terminal
4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
5. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
6. Run php artisan key:generate
7. Run php artisan migrate --seed
8. After doing it, you need to run php artisan make:migration drop_ratings_table, because as I alredy experienced during making this project whenever I finised doing either migrate only or migrate:fresh, my ratings table did not show any records. So after I commit this "php artisan make:migration drop_ratings_table" everything just went well.
9. Run php artisan serve
10. Go to http://localhost:8000/
