<p align="center"><img src="https://mykoneli.com/themes/mykoneli/images/logo.png" width="200" /></p>

## Installation

1) Run Docker Desktop
2) Navigate to the application directory in your terminal:
```
cd mykoneli
```

3) Copy file **.env.local** to **.env**
```
cp .env.local .env
```

4) Start Laravel Sail:
```
./vendor/bin/sail up
```

5) Once the application's Docker containers have started, you should run your application's database migrations:
```
./vendor/bin/sail artisan migrate
```

6) Install frontend dependencies:
```
./vendor/bin/sail npm install
```

7) You can access the application in your web browser at: http://localhost or http://mykoneli.test/

## Useful Links

- PhpMyAdmin  http://localhost:8080/
- Mailpit http://localhost:8025/


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


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs).

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.
