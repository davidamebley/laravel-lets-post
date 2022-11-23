# Let's Post (FullStack App with Laravel)

## Description
This web application was designed to be used with some friends to post anything on our minds, especially gossips. Please let's release some stress
## Installation
- To run this application, first make sure you have [PHP](https://www.php.net/manual/en/install.php), [Laravel](https://laravel.com/docs/9.x/installation), and [Composer](https://getcomposer.org/download/) installed. **Note:** You have to install Composer first, then you can install Laravel.

- The database used was created with Postgresql. Please make sure you have it installed or follow the instructions [here](https://www.postgresql.org/download/) to install it. <strong>Create an empty database for this application.</strong> You may use MySQL, SQLite, or any other RDMS.

- After installing these, clone this project repo onto your local machine.

- In the project root directory, run the following to install the Composer dependencies for this project:
<br /> <code>composer install</code>

- Create a copy of the <code> .env </code> file by cloning the <code> .env.example </code> file that comes with this project and renaming it. 
Use the following command: 
<br /> <code> cp .env.example .env</code> 
    - This clones and renames it to <code>.env</code>
    
- Generate an app encryption key in the <code> .env </code> file (which is required by Laravel to encode various elements of the app). Run the following command in the Terminal:
<br /> <code> php artisan key:generate </code>
    - **Note:** make sure Laravel is installed via Composer and the <code> .env</code> file is created before completing this step.
    
- Open the <code> .env </code> file and fill the various database connection fields with credentials from your created database. You may retrieve the necessary information using pgAdmin or the database tool you used. The fields you need to fill are:
<br /> DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, & DB_PASSWORD.
    - **Note:** Change the default <code> DB_CONNECTION </code> value in the <code> .env </code> file to __*'pgsql'*__ if you're using Postgres
    
- Run your database migrations after completing the credentials above with:
<br /> <code> php artisan migrate </code>
    - **Note:** You may use your database tool like pgAdmin to check if all your database tables were migrated successfully
    
- After running your migration successfully, run the following command:
<br /> <code> php artisan serve </code>
    - Running this command starts the application server and runs the app at: http://127.0.0.1:8000


<hr />

- Login
<img src="https://github.com/davidamebley/laravel-lets-post/blob/60ef46a49e3fa2806d4ab45a9c6ce4eea17297c4/sign%20in.png"/>

- Posts 
<img src="https://github.com/davidamebley/laravel-lets-post/blob/main/posts.png" />

- Single user posts history
<img src="https://github.com/davidamebley/laravel-lets-post/blob/main/single%20user%20posts.png" />

### Tech stack:
- <strong>Language:</strong> PHP
- <strong>Framework:</strong> Laravel
- <strong>Styling:</strong> Tailwind CSS
- <strong>Emailing users of liked posts:</strong> Mailtrap
- <strong>Database:</strong> PostgreSQL

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
