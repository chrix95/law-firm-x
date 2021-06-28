## About Law Firm X

Law Firm X receives potential clients daily. These people come to secure the services of a legal counsel to handle court cases.

## Technology used
- [Laravel framework](https://laravel.com/docs).
- [Vue JS](https://vuejs.org).

## Project setup
1. Install wampserver or xamp on your computer. The project uses PHP >= 7.2
2. Clone the project [github repo](https://github.com/chrix95/law-firm-x.git) into your local directory (www for wampserver users || htdocs for xamp users)
3. Change into the directory using your command line interface (cmd) `cd law-firm-x`
4. Install the required composer packages and dependencies for the project using the code below
```
composer install
```
5. Install the npm dependencies using the code below: <br>
NB: You need to have node v12.0 and above to install
```
npm install
```
6. After installation is complete, you need to duplicate the `.env.example` file and rename to `.env` and set your configurations
```
DB_DATABASE=DATABASE_NAME <br>
DB_USERNAME=DATABASE_USERNAME <br>
DB_PASSWORD=DATABASE_PASSWORD <br>
DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
```
Don't forget to run `php artisan key:generate` to generate a new key for your application
6. Run `php artisan migrate` to create the `client` table into your database
7. Setup your [mailtrap](https://mailtrap.io/signin) account credentials in your `.env`
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=MAILTRAP_USERNAME
MAIL_PASSWORD=MAILTRAP_PASSWORD
MAIL_ENCRYPTION=tls
```

### Serving your application
We can use the built-in PHP development server code below while in the project root directory:
```
php artisan serve
```
Also to ensure the javascript assets are compiled as well, run:
```
npm run prod
```
The project will now run on (http://127.0.0.1:8000)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
