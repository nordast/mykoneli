<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation

1) Run Docker Desktop

2) Navigate to the application directory in your terminal and run:
```
./install.sh
```

3) You can access the application in your web browser at http://localhost.

4) You can access the backend panel: http://localhost/backend
```
login: webmaster@gmail.com
password: webmaster
``` 


## Installation (Manual Mode)

1) Run Docker Desktop

2) Navigate to the application directory in your terminal:
```
cd mykoneli
```

3) Install dependencies
```
composer install
```

4) Copy file **.env.local** to **.env**
```
cp .env.local .env
```

5) Start Laravel Sail:
```
./vendor/bin/sail up
```

6) Once the application's Docker containers have started, you should run your application's database migrations:
```
./vendor/bin/sail artisan migrate
```

7) \[Optional\] Seed the database with records:
```
./vendor/bin/sail artisan db:seed
```

8) Create the symbolic links configured for the application:
```
./vendor/bin/sail artisan storage:link
```

9) Install frontend dependencies:
```
./vendor/bin/sail npm install
```

10) You can access the application in your web browser at: http://localhost

## Useful Links

- PhpMyAdmin http://localhost:8080/
- Mailpit http://localhost:8025/


- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Heroicon](https://heroicons.com/)
- [Configuring A Shell Alias](https://laravel.com/docs/11.x/sail#configuring-a-shell-alias)

## Useful Commands

To start all the Docker containers in the background:
```
sail up -d
```
If the containers are running in the background, you may use the stop command:
```
sail stop
```

Commands to connect to your application's container:
```
sail shell
 
sail root-shell
```

Run the Vite development server:
```
sail npm run dev
```

Build and version the assets for production:
```
sail npm run build
```

Make resource for Filament (Backend Panel):
```
sail artisan make:filament-resource User --generate --view
sail artisan make:filament-resource User --generate --view --soft-deletes
```
