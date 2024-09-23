## Sistema de gestión de inventarios y compras

```bash
cd inventory-sys
```

1. Install Packages 

```bash
composer install
```

2. Copy `.env` file 

```bash

cp .env.example .env

```

3. Generate app key 

```bash
php artisan key:generate
```

4. Setting up your database credentials in your `.env` file.
5. Seed Database: 

```bash

php artisan migrate:fresh --seed

```
6. Create Storage Link

```bash
php artisan storage:link
```

7. Install NPM dependencies 

```bash

npm install && npm run dev

```
8. Run 

```bash

php artisan serve

